<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员中心
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industry\Controller;

class ProductController extends IndustryBaseController {
    	public function _initialize(){
		parent::_initialize();
		$this->model = M('product');
        // $this->addressmodel = M('city');
        $this->categorymodel = M('product_category');
        $this->typemodel = M('product_type');
        $this->brandmodel = M('product_brand');
        $this->b_t_model = M('product_brand_type');
        $this->followmodel = M('product_follow');
        $this->areamodel = M('area');
        $this->membermodel = M('member');
        $this->union_active = M('union_active');

    }
    /*
     *旅游产品的类型
     */
    protected $type = array(
            '佛教用品店','黄河风情街','晋商文化馆','太行特产购','寻根觅祖祠','红色纪念馆'
        );
        /**
     * 产品发布
     */
    public function add(){
        $userid = $this->uid;
        $info = $this->membermodel->where(array('userid'=>$userid))->getField('type');
        //个人禁止发布产品
        if($info==1){
            $this->error("目前禁止个人账户发布产品！");
        }

        $type = array();
        $brand = array();
        $category = $this->categorymodel->select();
        // var_dump($category);
        foreach ($category as $key => $value) {
            $type[$value['id']] = $this->typemodel->where(array('cate_id'=>$value['id']))->select();
        }
        // var_dump($type);
        foreach ($type as $key => $value) {
            if(is_array($value)){

                foreach ($value as $k => $v) {
                    $bs = $this->b_t_model->where(array('type_id'=>$v['tid']))->select();
                    if($bs){
                        foreach ($bs as $k1 => $v1) {
                            $brand[$v['tid']][] = M('product_brand')->where(array('bid'=>$v1['brand_id']))->find();
                        }
                    }

                }

            }

        }
        // foreach ($category as $key => $value) {
        //     $data[$key]['cid'] = $value['id'];
        //     $data[$key]['c_name'] =  $value['c_name'];
        //     $type = $this->typemodel->where(array('cate_id'=>$value['id']))->select();
        //     $data[$key]['type'] = $type;
        //     foreach ($type as $k => $v) {
        //         $data[$key]['type'][$k]['brand'] = $this->brandmodel->select();
        //     }
        //     // $brand = $this->brandmodel->where(array(''))->find();
        // }
        $this->assign('category',$category);
        $this->assign('type',$type);
        $this->assign('brand',$brand);
        // var_dump($type);
        // var_dump($brand);die;
		if(IS_POST){
			$data = I('post.');
            //var_dump($data);exit;
            $areaarr = explode(',', $data['area']);
            // var_dump($areaarr);
            if(!$areaarr['2']){
                $this->error('请选择具体的产地');
            }
            $data['province'] = $this->areamodel->where(array('id'=>$areaarr['0']))->getField('name');
            $data['city'] = $this->areamodel->where(array('id'=>$areaarr["1"]))->getField('name');
            $data['region'] = $this->areamodel->where(array('id'=>$areaarr['2']))->getField('name');
            $data['thumb'] = implode(",", $data['thumb_upload_fileurl']);
//            var_dump($data);die;
			if(empty($data['p_name'])){
				$this->error('请填写产品名称');
			}
            if(empty($data['price'])){
                $this->error('请填写产品价格');
            }
            if(empty($data['manufacturer'])){
                $this->error('请填写生产厂家');
            }
            if(empty($data['phone'])){
                $this->error('请填写联系方式');
            }
            if(empty($data['thumb'])){
                $this->error('请上传产品图片');
            }
            if(empty($data['p_describe'])){
                $this->error('请对商品进行描述');
            }
            if($data['type']){
                $data['tourism'] = 1;
            }

			$data['inputtime'] = time();
			$id = $this->model->add($data);
//			echo $id;
			if($id){
				$this->success('添加成功');
			}else{
				$this->error("添加失败");
			}
//			var_dump($data);
		}else{
            $id = I("id");
            if(!empty($id)){
                //$result= $this->model->where(array('id'=>$id))->find();
            }else{
                $result['area'] = "4,84,";
            }
            $this->assign('addr',$result);
			$this->display();
		}
		
    }
    /**
     * 产品展示首页
     */
    public function index(){
        //主题
        $category = $this->categorymodel->limit(12)->order('id asc')->select();
        $i=0;
        $categorydata =array();
        while ( $i<= 4) {
            foreach ($category as $key => $value) {
                if($key >= 3*$i && $key< 3*($i+1)){
                    $categorydata[$i][$key] = $value;
                    $categorydata[$i][$key]['type']=$this->typemodel->where(array('cate_id'=> $value['id']))->limit(8)->select();
                }
               
            }
            $i++;
        }
        //猜你喜欢
        $likedata = $this->model->limit(4)->select();
        $likedata = $this->thumb_arr($likedata);
        // var_dump($categorydata[0][0]);
        //地市  组合城市
        $address = $this->areamodel->where(array('pid'=>25000000))->select();
        // var_dump($address);die;
        // $address = $this->addressmodel->where(array('pid'=>0))->select();
        foreach ($address as $key => $value) {
            $address[$key]["city"] = $this->areamodel->where(array('pid'=>$value['id']))->select();
        }
        $i=0;
        $addressdata = array();
        $count =ceil(count($address)/3);
        // echo $count;die;
        while ( $i<= $count) {
            foreach ($address as $key => $value) {
                if($key >= 3*$i && $key< 3*($i+1)){
                    $addressdata[$i][] = $value;
                }
            }
            $i++;
        }
        // var_dump($address);die;
        //获得每个城市4条数据
        $t_data = array();
        $taiyuan['status'] = array('eq',1);
        foreach ($address as $key => $value) {
            $area_id = $value['parent_id'].','.$value['id'].'%';
            $taiyuan['area'] = array('like',$area_id);
            // var_dump($taiyuan);
            $data = $this ->model ->where($taiyuan)->limit(4)->select();
            $t_data[$key][] = $this->thumb_arr($data);
        }
        // var_dump($t_data[0][0]);
        // die;
        
        $t_data = $this->thumb_arr($t_data);
        // var_dump($t_data);
        //关注排行
        $follow = $this->model->where(array('status'=>1))->order('views desc')->limit(6)->select();
        $follow = $this->thumb_arr($follow);
        //一周一品
        // $week = $this->model->where(array('week_shop'=>1,'status'=>1))->limit(12)->select();
        // $a = $this->model->_sql();
        // var_dump($week);
        //山西制造
        // $sx_make = $this->model->where(array('sx_make'=>1,'status'=>1))->limit(12)->select();
        //特价超市
        // $special_market = $this->model->where(array('special_market'=>1,'status'=>1))->limit(12)->select();
        //联盟活动
        // $union_act = $this->model->where(array('union_act'=>1,'status'=>1))->limit(12)->select();
        // var_dump($addressdata);
        //旅游产品信息
        $type = $this->type;
        // $travelData = array();
        foreach ($type as $key => $value) {
            $travelDatas = $this->model->where(array('tourism'=>1,'status'=>1,'type'=>$value))->order('id desc')->limit(5) ->select();
            $travelData[] = $this->thumb_arr($travelDatas);
        }
        
        // var_dump($travelData);die;
       
        // var_dump($address[0]);
         
        // var_dump($address);die;
        $this->assign('category',$categorydata);
        $this->assign('address',$address);
        $this->assign('addressdata',$addressdata);
        $this->assign('t_data',$t_data);
        $this->assign('follow',$follow);//分配关注排行数据  
        $this->assign('type',$this->type);
        $this->assign('week',$week);
        $this->assign('special_market',$special_market);
        $this->assign('union_act',$union_act);
        $this->assign('sx_make',$sx_make);
        $this->assign('travelData',$travelData);
        $this->assign('likedata',$likedata);
        $this->display();
    }
   
    
    /**
     * 列表页
     */
    public function lists(){
        $type = I('get.type');
        $arrv = array('week_shop'=>'一周一品','sx_make'=>'山西制造','special_market'=>'特价超市','union_act'=>'联盟活动');
        $arr = array('week_shop','sx_make','special_market','union_act');
        if(!empty($arrv[$type])){
            // echo  1;die;
            $count = $this->model->where(array($type=>1,'status'=>1))->count();
            $page = $this->page($count,12);
            $data = $this->model->where(array($type=>1,'status'=>1))->limit($page->firstRow.",".$page->listRows)->order('id desc')->select();
            $type = $arrv[$type];
           
        }else{
            // echo 2;die;
            $count = $this->model->where(array('type'=>$type,'status'=>1,"tourism"=>1))->count();
            $page = $this->page($count,12);
            $data = $this->model->where(array('type'=>$type,'status'=>1,"tourism"=>1))->limit($page->firstRow.",".$page->listRows)->order('id desc')->select();
        }
        $this->assign('type',$type);
        $this->assign('page',$page->show());
        $data = $this->thumb_arr($data);
        $this->assign('data',$data);
        $this->display();
        // $count = $this->model->where(array('type'=>$type))->count();
        // $count = $this->model->where(array($type=>1))->count();
        // $page = $this->page($count,12);
        // // var_dump($page);
        // $data = $this->model->where(array('type'=>$type))->limit($page->firstRow.",".$page->listRows)->order('id desc')->select();
        // $this->assign('page',$page);
        // $this->assign('data',$data);
        // $this->display();
    }
//联盟活动
	public function union_active(){
		
		$count = $this->union_active->count();
		$page = $this->page($count,3);
		$data = $this->union_active->order('id desc')->limit($page->firstRow.",".$page->listRows)->select();
//		var_dump($data);die;
		$this->assign('data',$data);
		$this->assign('page',$page->show());

		$this->display();
	}
	

    /**
     * 详情页
     */
    public function show(){
        $pid = I('get.pid');
        $where = array('id' =>$pid,'status'=>1);
        $data = $this->model->where($where)->find();
        $data['brandname'] = $this->brandmodel->where(array('bid'=>$data['brand_id']))->getField('brandname');
        $data['categoryname'] = $this->categorymodel->where(array('id'=>$data['cate_id']))->getField('c_name');
        $data['typename'] = $this->typemodel->where(array('tid'=>$data['tid']))->getField('typename');
        $data['thumb'] = explode(",", $data['thumb']);
        
        $data['company'] = $this->membermodel->where(array('userid'=>$data['uid']))->getField('nickname');
        // var_dump($data);die;
        $likedata = $this->like($data['id']);

        // var_dump($likedata);
        // var_dump($data);die;
        // echo $this->typemodel->_sql();
        $this->assign('likedata',$likedata);
        $this->assign('data',$data);
        $this->display();
    }
    /*
     *猜你喜欢
     */
    public function like($id,$num=4){
        $data = $this->model->where(array('id'=>$id))->find();
        $where['id'] = array('NEQ', $id);

        $where['tid'] = array('EQ', $data['tid']);
        //同类型查询
        $likearr = array();
        $likearr = $this->model->where($where)->limit(4)->getField('id,p_name,thumb');

        $count = count($likearr);
        // var_dump($likearr);die;
        $res_idArr = array_keys($likearr);
        $res_idArr[] = (int)$id;
        // var_dump($likearr);
        //不够4条 同品牌  同种类推荐
        if($i = $num-$count){
            $map['brand_id'] = array('EQ', $data['brand_id']);
            $map['cate_id'] = array('EQ', $data['cate_id']);
            // $map['_logic'] = 'OR';
            $condition['id'] = array('not in', $res_idArr);
            
            $arr = $this->model->where($map)->where($condition)->limit(4)->getField('id,p_name,thumb');
            if(!$arr){
                $arr = array();
            }
            // var_dump($arr);die;
            // var_dump($this->model->_sql());die;
            $likearr = array_merge($likearr,$arr);
            $a = array_keys($arr);
            //获得已查出的产品id
            $res_idArr = array_merge($res_idArr,$a);
            // var_dump($likearr);die;
            $count = count($likearr);
            // var_dump($count);
            if($n = $num-$count){
                // echo $n;
                $arr = $this->model->where(array('not in' => $res_idArr))->limit($n)->getField('id,p_name,thumb');
                if (!$arr) {
                    $arr = array();
                }
                if($n==4){
                    $likearr = array();
                }
                $likearr = array_merge($likearr,$arr);

            }

            // var_dump($likearr); 

        }
        $likearr = $this->thumb_arr($likearr);
        // var_dump($likearr);die;
        return $likearr;
    }
    /**
     * 主题馆
     */
    public function subject(){
//  	$url = $this->get_url();
    	$where = array('status'=>1);
    	// $arr = array('brand','craft','color','func');
    	// $brand = $craft = $color = $func = '';
    	// foreach ($arr as $key => $value) {
    	// 	if(isset($_GET[$value])){
    	// 		$$value = $_GET[$value];
    	// 		if($_GET[$value]){
    	// 			$where [$value]=$_GET[$value];
    	// 		}
    	// 	}
    	// }
 	// var_dump($where);
    	$count = $this->model->where($where)->count();
    	$page = $this->page($count,12);

    	$data = $this->model->where($where)->limit($page->firstRow.",".$page->listRows)->order("id DESC")->select();
     	// $a = $this->model->getLastSql();
        $show = $page->show();
        // var_dump($show);
     	// var_dump($page->firstRow.",".$page->listRows);die;
    	$this->assign('brand',$brand);
    	$this->assign('craft',$craft);
    	$this->assign('color',$color);
    	$this->assign('func',$func);
        $this->assign('brand_id',$_POST['brand_id']);
        $this->assign('craft_id',$_POST['craft_id']);
        $this->assign('color_id',$_POST['color_id']);
        $this->assign('func_id',$_POST['func_id']);
    	// $this->assign('url',$url);
    	$this->assign('page',$show);
        $data = $this->thumb_arr($data);
        // var_dump($data);die;
    	$this->assign('data',$data);
        $this->display();

    }
    /*
     *获得缩略图数组
     */
    protected function thumb_arr($data){
        foreach ($data as $key => $value) {
            $data[$key]['thumb'] = explode(",", $value['thumb']);
        }
        return $data;
    }
   
    /**
     * 地市馆
     */
    public function area(){
        
    	$address = $this->areamodel->where(array('pid'=>25000000))->select();

        foreach ($address as $key => $value) {
            $address[$key]['area_id'] = "4,".$value['id'];
            $address[$key]["city"] = $this->areamodel->where(array('pid'=>$value['id']))->select();
            foreach($address[$key]["city"] as $k =>$v){
                $address[$key]["city"][$k]['area_id'] = $address[$key]['area_id'].','.$v['id'];
            }
            
        }
        // var_dump($address[1]);die;
        
		// echo $this->get_url();
         
		$city = I('get.city','4,84');
        $cityarr = explode(',', $city);
        if(count($cityarr)==2){
            $area = $city . ",";
            $where['area'] = array('like',$area."%");
        }else{
            $area = $city;
            $where = array('area'=>$area);
            $region = $this->areamodel->where(array('id'=>$cityarr[2]))->find();
        }
        $citydata= $this->areamodel->where(array('id'=>$cityarr[1]))->find();
        // var_dump($city);die;
        // $region = I('get.region');
        // if($region){
        //    $where['region'] = $region; 
        // }else{
        //    $where['city'] = $city;
        // }
        
        // var_dump($where);die;
    	// import('ORG.Util.Page');
    	$count = $this->model->where($where)->where(array('status'=>1))->count();
    	$page = $this->page($conut,12);
        // var_dump($page);
        // $show = $page->show();
    	$data = $this->model->where($where)->where(array('status'=>1))->limit($page->firstRow.','.$page->listRows)->select();
        $data = $this->thumb_arr($data);
        // var_dump($this->model->_sql());die;
        // var_dump($region);
 	// var_dump($this->model->_sql());die;
        $this->assign('address',$address);
        $this->assign('city',$city);
        $this->assign('citydata',$citydata);
		$this->assign("region",$region);
		$this->assign('data',$data);
		$this->assign('page',$page);    	
        $this->display();

    }

    
    /**
     * 旅游馆
     */
    public function travel(){
    	$fj_where = array('tourism'=>1,'type'=>'佛教用品店','status'=>1);
    	$fjdata = $this->model->where($fj_where)->limit(6)->select();
        $fjdata = $this->thumb_arr($fjdata);
    	$hh_where = array('tourism'=>1,'type'=>'黄河风情街','status'=>1);
    	$hh_data = $this->model->where($hh_where)->limit(6)->select();
        $hh_data = $this->thumb_arr($hh_data);
    	$js_where = array('tourism'=>1,'type'=>'晋商文化馆','status'=>1);
    	$js_data = $this->model->where($js_where)->limit(6)->select();
        $js_data = $this->thumb_arr($js_data);
    	$th_where = array('tourism'=>1,'type'=>'太行特产购','status'=>1);
    	$th_data = $this->model->where($th_where)->limit(6)->select();
        $th_data = $this->thumb_arr($th_data);
    	$xg_where = array('tourism'=>1,'type'=>'寻根觅祖祠','status'=>1);
    	$xg_data = $this->model->where($xg_where)->limit(6)->select();
        $xg_data = $this->thumb_arr($xg_data);
    	$hs_where = array('tourism'=>1,'type'=>'红色纪念馆','status'=>1);
    	$hs_data = $this->model->where($hs_where)->limit(6)->select();
        $hs_data = $this->thumb_arr($hs_data);
 	// var_dump($this->model->_sql());
  //   var_dump($js_data);
		$this->assign('fjdata',$fjdata);
		$this->assign('hh_data',$hh_data);
		$this->assign('js_data',$js_data);
		$this->assign('th_data',$th_data);
		$this->assign('xg_data',$xg_data);
		$this->assign('hs_data',$hs_data);
        $this->display();
    }
    /**
     * 国际馆
     */
    public function internation(){
        $this->display();
    }
    
    /**
     * 一周一品
     */
    public function week(){
        $data = $this->model->where(array('week_shop'=>1,'status'=>1))->order('id desc')->find();
        $data['thumb'] = explode(",", $data['thumb']);
        $this->assign('data',$data);
        $this->display();
    }


    //关注
    public function follow(){
        if(IS_AJAX){
            $data = I('post.');
            $data['uid'] = $this->uid;
            $select = $this->followmodel->where(array('uid'=>$data['uid'],'pid'=>$data['pid']))->find();
            //没有关注过 添加
            if(!$select){
                $data['followtime'] = time();
                $data['status'] = 1;
                if($this->followmodel->add($data)){
                    $this->ajaxreturn(array('status'=>1,'message'=>'关注成功！'));
                }else{
                    $this->ajaxreturn(array('status'=>0,'message'=>'请稍后再试！'));
                }
            }else{
                //已关注过  根据状态修改
                if($select['status']==1){
                    $where = array('id'=>$select['id']);
                    $data = array('updatatime'=>time(),'status'=>2);
                    $res = $this->followmodel->where($where)->setField($data);
                    $this->ajaxreturn(array('status'=>1,'message'=>'取消关注成功！'));
                }else{
                    $where = array('id'=>$select['id']);
                    $data = array('updatatime'=>time(),'status'=>1);
                    $res = $this->followmodel->where($where)->setField($data);
                    $this->ajaxreturn(array('status'=>1,'message'=>'关注成功！'));
                }
            }
            
            // $data['uid'] = $this->uid;
            
        }
    }
    //搜索
    public function search(){
        $keywords = I('get.keywords');
        // echo $keywords;die;
        $where=array();
        $where['p_name'] = array('like','%'.$keywords.'%');
        // var_dump($where);die;
        $data = $this->model->where($where)->select();
        // echo $this->model->_sql();
        $this->assign('data',$data);
        $this->assign('keywords',$keywords);
        $this->display();

    }

    public function ditu(){
        $this->display();
    }
}