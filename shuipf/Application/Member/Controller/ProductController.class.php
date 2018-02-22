<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员中心
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Member\Controller;

class ProductController extends MemberbaseController {
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
        // var_dump($category);die;
        foreach ($category as $key => $value) {
            $type[$value['id']] = $this->typemodel->where(array('cate_id'=>$value['id']))->select();
        }
        // var_dump($type);
        foreach ($type as $key => $value) {
            if(is_array($value)){
               foreach ($value as $k => $v) {
                $brand[$v['tid']] = $this->b_t_model->join('cu_product_brand ON cu_product_brand_type.brand_id =cu_product_brand.bid')->where(array('cu_product_brand_type.type_id'=>$v['tid']))->select();
                } 
            }
            
        }
        $this->assign('category',$category);
        $this->assign('type',$type);
        $this->assign('brand',$brand);
        // var_dump($type);
        // var_dump($brand);
		if(IS_POST){
			$data = I('post.');
            $areaarr = explode(',', $data['area']);
            $data['province'] = $this->areamodel->where(array('id'=>$areaarr['0']))->getField('name');
            $data['city'] = $this->areamodel->where(array('id'=>$areaarr["1"]))->getField('name');
            $data['region'] = $this->areamodel->where(array('id'=>$areaarr['2']))->getField('name');
            $data['thumb'] = implode(",", $data['thumb_upload_fileurl']);
           // var_dump($data);die;
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
            $data['status'] = 1;
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
     * 列表页
     */
    public function lists(){
        // $type = I('get.type');
        // $arrv = array('week_shop'=>'一周一品','sx_make'=>'山西制造','special_market'=>'特价超市','union_act'=>'联盟活动');
        // $arr = array('week_shop','sx_make','special_market','union_act');
        // if(!empty($arrv[$type])){
        //     // echo  1;die;
        //     $count = $this->model->where(array($type=>1,'status'=>1,'uid'=>$this->uid))->count();
        //     $page = $this->page($count,12);
        //     $data = $this->model->where(array($type=>1,'status'=>1,'uid'=>$this->uid))->limit($page->firstRow.",".$page->listRows)->order('id desc')->select();
        //     $type = $arrv[$type];
           
        // }else if(!empty($type)){
        //     // echo 2;die;
        //     $count = $this->model->where(array('type'=>$type,'status'=>1,"tourism"=>1,'uid'=>$this->uid))->count();
        //     $page = $this->page($count,12);
        //     $data = $this->model->where(array('type'=>$type,'status'=>1,"tourism"=>1,'uid'=>$this->uid))->limit($page->firstRow.",".$page->listRows)->order('id desc')->select();
        // }else{
            $count = $this->model->where(array('status'=>1,'uid'=>$this->uid))->count();
            $page = $this->page($count,12);
            $data = $this->model->where(array('status'=>1,'uid'=>$this->uid))->limit($page->firstRow.",".$page->listRows)->order('id desc')->select();
        // }
        $this->assign('type',$type);
        $this->assign('page',$page->show());
        $data = $this->thumb_arr($data);
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
    //删除方法
    public function delete(){
        $id = I('get.id');
        if(!empty($id)){
            $this->model->where(array('id'=>$id))->delete();
            $this->success('删除成功!');
        }else{
            $this->error('删除错误:未指定内容!');
        }
    }
}