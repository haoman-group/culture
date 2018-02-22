<?php

namespace Industry\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
use Admin\Model\IndustryIssue;
class IndustryController extends IndustryBaseController {
    
    public function index(){
    	
        $this->display();
    }

    //Todo 修改这里，使得数据从Culture的cu_industry表里获取，
    //Todo 顺便完成详情页
   public function obj_display(){
        $category = M('industry_category')->getField('id,categoryname');
        $stagedata = M('industry_stage')->getField('sid,stagename');
        $region = M('region')->where(array('parent_id'=>4))->getField('id,name');
        //echo M('area')->getLastsql();exit; 
        $industry = D('IndustryIssue');
        $pcategory = ( I('get.type')!="不限" )?I('get.type'):'';
        // echo $pcategory;
        $plimit =( I('get.scale')!="不限" )?I('get.scale'):'';
        $pstage =( I('get.stage')!="不限" )?I('get.stage'):'';
        $area = ( I('get.area')!="不限" )?I('get.area'):'';
        $pcategorywhere = array();
        $pstagewhere = array();
        // $areawhere = array();
        $plimitwhere = array();
        $map= array();
        //项目类别条件
        if($pcategory){
            $id = M('industry_category')->where(array('categoryname'=>$pcategory))->getField('id');
            if($id){
                $pcategorywhere['pcategory'] = array('eq',$id);
            }
            
        }
        //项目阶段条件
        if($pstage){
            $sid = M('industry_stage')->where(array('stagename'=>$pstage))->getField('sid');
            if($sid){
                $pcategorywhere['pstage'] = array('eq',$sid);
            }
            // $pstagewhere['pstage'] = $pstage;
        }
        $a = $industry->where($pcategorywhere)->select();
        // var_dump($a);die;
        // 投资规模条件
        switch ($plimit) {
            case '100万以下':
                $plimitwhere['plimit']=array('lt',100);
                break;
            case '100-1000万':
                $plimitwhere['plimit']=array(array('egt',100),array('lt',1000));
                break;
            case '1000-5000万':
                $plimitwhere['plimit']=array(array('egt',1000),array('lt',5000));
                break;
            case '1亿-10亿':
                $plimitwhere['plimit']=array(array('egt',10000),array('lt',100000));
                break;
            case '10亿以上':
                $plimitwhere['plimit']=array('egt',100000);
                break;
            default:
                
                break;
        }
        
        // 区域条件
        if($area){
            $key = array_search($area,$region);
            $map['area'] = array('like','4,'.$key.'%');
            // $map['status'] =array('eq',1);
        }
        $select = 0;
        $where = array_merge($pcategorywhere, $pstagewhere,$map,$plimitwhere);
        if(!$where){
            $select = 1;
        }
        $where['status'] = array('eq',1);
        $count = $industry->where($where)->count();
        $page = $this->page($count,12);
        $data = $industry->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        // var_dump($industry->_sql());die;
        foreach ($data as $key => $value) {
            $data[$key]['categoryname'] = $category[$value['pcategory']];
            $regionarr = explode(',', $value['area']);
            $data[$key]['region'] = $region[$regionarr[1]];
            // var_dump($regionarr);
            // $data[$key]['stagename'] = $stagedata[$value['pstage']];
        }
        

       // 图表数据
       // 项目阶段
        $biewhere['status'] = array('eq',1);
        $biewhere['pstage'] = array('neq',0);
        $biedata = $industry->where($biewhere)->field('count(*) AS sum')->group('pstage')->select();
        $count = $industry->where(array('status'=>1))->count();
        // echo $count;
        $biedata= json_encode($biedata);
        $this->assign('count',$count);
        $this->assign('biedata',$biedata);
        //项目类别
        $bardata = $industry->where(array('status'=>1))->field('count(*) AS sum')->group('pcategory')->select();
        foreach ($bardata as $key => $value) {
            $bardatas[] = $value['sum'];
        }
        // $bardata = array_values($bardata);
        // var_dump($bardatas);die;
        $bardata = json_encode($bardatas);
        $this->assign('bardata',$bardata);
        //区域数据
        // $quyudata = $industry->where(array('status'=>1))->field('area,count(*) AS sum')->group('area')->select();
        $quyudata =array();
        $r = array_keys($region);
        foreach ($r as $key => $value) {
            $arr['status']=1;
            $arr['area'] = array('like','4,'.$value.'%');
            $quyudata[] = $industry->where($arr)->count();
        }
        $quyudata = json_encode($quyudata);
        $this->assign('quyudata',$quyudata);
        //投资规模\
        $plimitwhere['status']=1;
        $plimitwhere['plimit']=array('lt',100);
        $gmdata[] = $industry->where($plimitwhere)->count();
        $plimitwhere['plimit']=array(array('egt',100),array('lt',1000));
        $gmdata[] = $industry->where($plimitwhere)->count();
        $plimitwhere['plimit']=array(array('egt',1000),array('lt',5000));
        $gmdata[] = $industry->where($plimitwhere)->count();
        $plimitwhere['plimit']=array(array('egt',5000),array('lt',10000));
        $gmdata[] = $industry->where($plimitwhere)->count();
        $plimitwhere['plimit']=array(array('egt',10000),array('lt',100000));
        $gmdata[] = $industry->where($plimitwhere)->count();
        $plimitwhere['plimit']=array('egt',100000);
        $gmdata[] = $industry->where($plimitwhere)->count();
        $gmdata = json_encode($gmdata);
        $this->assign('gmdata',$gmdata);


        
// var_dump($gmdata);die;
        $this->assign('category',$category);
        $this->assign('stagedata',$stagedata);
        $this->assign('region',$region);
        $this->assign('select',$select);    
        $this->assign('type',$pcategory);
        $this->assign('scale',$plimit);
        $this->assign('stage',$pstage);
        $this->assign('area',$area);
        $this->assign('resdata',$data);
        $this->assign('page',$page->show());

        $this->display();
    }

     public function detail(){
        $id = I('get.id',0,'intval');

        $data = D('Content/IndustryIssue')->where(array('id'=>$id))->find();
       // var_dump($data);exit;
        $data['categoryname'] = M('industry_category')->where(array('id'=>$data['pcategory']))->getField('categoryname');
        $data['stagename'] = M('industry_stage')->where(array('sid'=>$data['pstage']))->getField('stagename');
       
        //判断该项目属于个人还是公司
        
        if($data['type']==1){
            //公司项目
            $data['agent'] = M('finance_agent')->where(array('objid'=>$id))->find();
            $this->assign('data',$data);
            $this->display('detail_conpany');
        }else{
             $this->assign('data',$data);
            $this->display('detail_personal');
        }
    }

    public function recommend(){
        $category = M('industry_category')->getField('id,categoryname');
        $stagedata = M('industry_stage')->getField('sid,stagename');
        $region = M('area')->where(array('parent_id'=>4))->getField('id,name');
       
        $industry = D('IndustryIssue');
        $pcategory = ( I('get.type')!="不限" )?I('get.type'):'';
        // echo $pcategory;
        $plimit =( I('get.scale')!="不限" )?I('get.scale'):'';
        $pstage =( I('get.stage')!="不限" )?I('get.stage'):'';
        $area = ( I('get.area')!="不限" )?I('get.area'):'';
        $pcategorywhere = array();
        $pstagewhere = array();
        // $areawhere = array();
        $plimitwhere = array();
        $map= array();
        //项目类别条件
        if($pcategory){
            $id = M('industry_category')->where(array('categoryname'=>$pcategory))->getField('id');
            if($id){
                $pcategorywhere['pcategory'] = array('eq',$id);
            }
            
        }
        //项目阶段条件
        if($pstage){
            $sid = M('industry_stage')->where(array('stagename'=>$pstage))->getField('sid');
            if($sid){
                $pcategorywhere['pstage'] = array('eq',$sid);
            }
            // $pstagewhere['pstage'] = $pstage;
        }
        $a = $industry->where($pcategorywhere)->select();
        // var_dump($a);die;
        // 投资规模条件
        switch ($plimit) {
            case '100万以下':
                $plimitwhere['plimit']=array('lt',100);
                break;
            case '100-1000万':
                $plimitwhere['plimit']=array(array('egt',100),array('lt',1000));
                break;
            case '1000-5000万':
                $plimitwhere['plimit']=array(array('egt',1000),array('lt',5000));
                break;
            case '1亿-10亿':
                $plimitwhere['plimit']=array(array('egt',10000),array('lt',100000));
                break;
            case '10亿以上':
                $plimitwhere['plimit']=array('egt',100000);
                break;
            default:
                
                break;
        }
        
        // 区域条件
        if($area){
            $key = array_search($area,$region);
            $map['area'] = array('like','4,'.$key.'%');
            // $map['status'] =array('eq',1);
        }
        $select = 0;
        $where = array_merge($pcategorywhere, $pstagewhere,$map,$plimitwhere);
        if(!$where){
            $select = 1;
        }
        $where['status'] = array('eq',1);
        $count = $industry->where($where)->count();
        $page = $this->page($count,12);
        $data = $industry->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        // var_dump($industry->_sql());die;
        foreach ($data as $key => $value) {
            $data[$key]['categoryname'] = $category[$value['pcategory']];
            $regionarr = explode(',', $value['area']);
            $data[$key]['region'] = $region[$regionarr[1]];
            // var_dump($regionarr);
            // $data[$key]['stagename'] = $stagedata[$value['pstage']];
        }
       $where['status'] = array('eq',1);
       $where['pstage'] = array('neq',0); 
        $c = $industry->where($where)->field('pstage,count(*) AS sum')->group('pstage')->select();
        $c= json_encode($c);
// var_dump($c);die;
        $this->assign('category',$category);
        $this->assign('stagedata',$stagedata);
        $this->assign('region',$region);
        $this->assign('select',$select);    
        $this->assign('type',$pcategory);
        $this->assign('scale',$plimit);
        $this->assign('stage',$pstage);
        $this->assign('area',$area);
        $this->assign('resdata',$data);
        $this->assign('page',$page->show());
        $this->display();
    }

     public function add_personal(){
         if($this->userid){

         
        $data = D("Content/IndustryIssue")->select();
         $industry_category = M('industry_category')->select();
         $industry_stage = M('industry_stage')->select();
         // var_dump($industry_stage);die;
         $this->assign('industry_category',$industry_category);
         $this->assign('industry_stage',$industry_stage);
        $this->assign("data",$data);

        $this->display('add_personal');

    }else{
         $this->error("请你先登录",U('Industry/Public/login'));
    }
    }
    public function add_conpany(){
        $data = D("Admin/IndustryIssue")->select();
         $industry_category = M('industry_category')->select();
         $industry_stage = M('industry_stage')->select();
         // var_dump($industry_stage);die;
         $this->assign('industry_category',$industry_category);
         $this->assign('industry_stage',$industry_stage);


         $this->assign("data",$data);
         $this->display('add_conpany');

    }
    public function add_obj(){
        $uid = $this->uid;
        $userInfo = service("Passport")->getLocalUser((int) $uid);
        if($userInfo['type'] == 1){//个人添加  
             $this->add_personal();
             //$this->success('添加成功',U('Industry/Industry/index'));  
        }elseif($userInfo['type']==2){//公司账户添加
            $this->add_conpany();
        }else{
            $this->error('该账号未通过审核！！！');
        }
        
    }

    public function add_obj_table(){
        if(IS_POST){
            $industry = D('Admin/IndustryIssue');
             //var_dump($industry);die;
            if(!$res = $industry->add_industry()){
               
                $this->error($industry->getError());
                // echo 2;die;
            }else if($res && $_POST['pfinancing'] ==1 ){
                // $this->ajaxreturn( array( 'status'=>1,'id'=>$res,'agent'=>$_POST['pfinancing']) );
                $this->success('添加成功，正在跳转到添加金融代理页面',U('Industry/Finance/industry_agent',array('oid'=>$res)),5);
            }else{
                // $this->success('添加成功',U('Industry/Industry/personal_project'));
                $this->success('添加成功',U('Industrymem/Industry/index'));
            }
        }
    }
    //项目编辑
    public function edit_obj(){
        if(IS_AJAX){
            $industry = D('IndustryIssue');
            $id = I('post.id',0,"intval");
            $data = I('post.');
            $res = $industry->where(array('id'=>$id))->save($data);
            if($res){
                $this->ajaxreturn(array('status'=>1,'message'=>'编辑成功！'));
            }else{
                $this->ajaxreturn(array('status'=>0,'message'=>'编辑失败，请稍候再试！'));
            }
        }
    }

    //项目申报
    public function declarey(){


        $data = D("Content/IndustryIssue")->select();

        $this->assign('data',$data);

        $this->display();
    }

    public function show(){
        $id = I('get.id',0,'intval');

        $data = D('Content/IndustryIssue')->where(array('id'=>$id))->find();
        //var_dump($data);
        $this->assign('data',$data);
        $this->display();

    }

    //项目详情
    // public function detail(){
    //     $id = I('get.id',0,'intval');

    //     $data = D('Content/IndustryIssue')->where(array('id'=>$id))->find();
    //     $data['categoryname'] = M('industry_category')->where(array('id'=>$data['pcategory']))->getField('categoryname');
    //     $data['stagename'] = M('industry_stage')->where(array('sid'=>$data['pstage']))->getField('stagename');
       
    //     //判断该项目属于个人还是公司
        
    //     if($data['type']==1){
    //         //公司项目
    //         $data['agent'] = M('finance_agent')->where(array('objid'=>$id))->find();
    //         $this->assign('data',$data);
    //         $this->display('detail_conpany');
    //     }else{
    //          $this->assign('data',$data);
    //         $this->display('detail_personal');
    //     }
    // }

    //个人项目详情页
    public function detail_personal(){

        $id = I('get.id',0,'intval');

        $data = D('Content/IndustryIssue')->where(array('id'=>$id))->find();
        $data['categoryname'] = M('industry_category')->where(array('id'=>$data['pcategory']))->getField('categoryname');
         $data['stagename'] = M('industry_stage')->where(array('sid'=>$data['pstage']))->getField('stagename');
        if($data['pfinancing'] ==1){
            $data['agent'] = M('finance_agent')->where(array('objid'=>$id))->find();
        }


        $this->assign('data',$data);
        $this->display();
    }
    //个人项目列表页
    public function personal_project(){

        $uid=$this->uid;

//        var_dump($uid);die;
        $count =D('Content/IndustryIssue')->where(array('type'=>0,'uid'=>$uid))->order('id desc')->count();
        $page = $this->page($count,20);
//      var_dump($page);die;

        $data =D('Content/IndustryIssue')->where(array('type'=>0,'uid'=>$uid))->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
        $data['categoryname'] = M('industry_category')->where(array('id'=>$data['pcategory']))->getField('categoryname');
         $data['stagename'] = M('industry_stage')->where(array('sid'=>$data['pstage']))->getField('stagename');
//      var_dump($data);die;
        $this->assign('page',$page->show());
        $this->assign('data',$data);
        $this->display();

    }
    //企业项目列表页
    public function conpany_project(){
        $uid=$this->uid;

        $count =D('Content/IndustryIssue')->where(array('type'=>1,'uid'=>$uid))->order('id desc')->count();
//      var_dump($count);die;
        $page = $this->page($count,20);
//      var_dump($page);die;
        $data =D('Content/IndustryIssue')->where(array('type'=>1,'uid'=>$uid))->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['categoryname'] = M('industry_category')->where(array('id'=>$value['pcategory']))->getField('categoryname');
            $data[$key]['stagename'] = M('industry_stage')->where(array('sid'=>$value['pstage']))->getField('stagename');
        }
        
        // var_dump($data);die;
//      var_dump($page->show());die;
        $this->assign('page',$page->show());
        $this->assign('data',$data);

        $this->display();


    }

    //企业项目详情页
    public  function detail_conpany(){

        //获取选中数据的id
        $id =I('get.id',0,'intval');

        $data =D("Contet/IndustryIssue")->where(array("id"=>$id))->find();
        $data['categoryname'] = M('industry_category')->where(array('id'=>$data['pcategory']))->getField('categoryname');
         $data['stagename'] = M('industry_stage')->where(array('sid'=>$data['pstage']))->getField('stagename');
        if($data['pfinancing'] ==1){
            $data['agent'] = M('finance_agent')->where(array('objid'=>$id))->find();
        }
        // var_dump($data);die;
        $this->assign("data",$data);
        $this->display();
    }
   
    //产业项目申报
    public  function report(){

        $this->display();
    }
    /*
    *产业项目申报添加
     */
    public function add_report(){
        if(IS_AJAX){
            $model = M('industry_report');
//            var_dump($model);die;
            $data = I('post.');
            $data['inputtime']=time();
//            var_dump($data);die;
            $info = $model->add($data);
            if($info){
                $this->ajaxreturn(array('status'=>1,'message'=>"添加成功"));
            }else{
                $this->ajaxreturn(array('status'=>0,'message'=>"添加失败"));
            }

        }
    }
//    重点项目推荐

//     public function recommend(){
//         $category = M('industry_category')->getField('id,categoryname');
//         $stagedata = M('industry_stage')->getField('sid,stagename');
//         $region = M('area')->where(array('parent_id'=>4))->getField('id,name');
       
//         $industry = D('IndustryIssue');
//         $pcategory = ( I('get.type')!="不限" )?I('get.type'):'';
//         // echo $pcategory;
//         $plimit =( I('get.scale')!="不限" )?I('get.scale'):'';
//         $pstage =( I('get.stage')!="不限" )?I('get.stage'):'';
//         $area = ( I('get.area')!="不限" )?I('get.area'):'';
//         $pcategorywhere = array();
//         $pstagewhere = array();
//         // $areawhere = array();
//         $plimitwhere = array();
//         $map= array();
//         //项目类别条件
//         if($pcategory){
//             $id = M('industry_category')->where(array('categoryname'=>$pcategory))->getField('id');
//             if($id){
//                 $pcategorywhere['pcategory'] = array('eq',$id);
//             }
            
//         }
//         //项目阶段条件
//         if($pstage){
//             $sid = M('industry_stage')->where(array('stagename'=>$pstage))->getField('sid');
//             if($sid){
//                 $pcategorywhere['pstage'] = array('eq',$sid);
//             }
//             // $pstagewhere['pstage'] = $pstage;
//         }
//         $a = $industry->where($pcategorywhere)->select();
//         // var_dump($a);die;
//         // 投资规模条件
//         switch ($plimit) {
//             case '100万以下':
//                 $plimitwhere['plimit']=array('lt',100);
//                 break;
//             case '100-1000万':
//                 $plimitwhere['plimit']=array(array('egt',100),array('lt',1000));
//                 break;
//             case '1000-5000万':
//                 $plimitwhere['plimit']=array(array('egt',1000),array('lt',5000));
//                 break;
//             case '1亿-10亿':
//                 $plimitwhere['plimit']=array(array('egt',10000),array('lt',100000));
//                 break;
//             case '10亿以上':
//                 $plimitwhere['plimit']=array('egt',100000);
//                 break;
//             default:
                
//                 break;
//         }
        
//         // 区域条件
//         if($area){
//             $key = array_search($area,$region);
//             $map['area'] = array('like','4,'.$key.'%');
//             // $map['status'] =array('eq',1);
//         }
//         $select = 0;
//         $where = array_merge($pcategorywhere, $pstagewhere,$map,$plimitwhere);
//         if(!$where){
//             $select = 1;
//         }
//         $where['status'] = array('eq',1);
//         $count = $industry->where($where)->count();
//         $page = $this->page($count,12);
//         $data = $industry->where($where)->limit($page->firstRow.','.$page->listRows)->select();
//         // var_dump($industry->_sql());die;
//         foreach ($data as $key => $value) {
//             $data[$key]['categoryname'] = $category[$value['pcategory']];
//             $regionarr = explode(',', $value['area']);
//             $data[$key]['region'] = $region[$regionarr[1]];
//             // var_dump($regionarr);
//             // $data[$key]['stagename'] = $stagedata[$value['pstage']];
//         }
//        $where['status'] = array('eq',1);
//        $where['pstage'] = array('neq',0); 
//         $c = $industry->where($where)->field('pstage,count(*) AS sum')->group('pstage')->select();
//         $c= json_encode($c);
// // var_dump($c);die;
//         $this->assign('category',$category);
//         $this->assign('stagedata',$stagedata);
//         $this->assign('region',$region);
//         $this->assign('select',$select);    
//         $this->assign('type',$pcategory);
//         $this->assign('scale',$plimit);
//         $this->assign('stage',$pstage);
//         $this->assign('area',$area);
//         $this->assign('resdata',$data);
//         $this->assign('page',$page->show());
//         $this->display();
//     }

//         判断审核状态
    
    
    //项目申报文件下载
    public function download(){
        $path=M('upfile')->where(array('type'=>'产业申报文档'))->order('id desc')->getField('file_path');
//      var_dump($path);die;
        $file=fopen($path,"r");
        header("Content-Type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Accept-Length: ".filesize($path));
        header("Content-Disposition: attachment; filename=产品申报相关文档");
        echo fread($file,filesize($path));
        fclose($file);

    }

}