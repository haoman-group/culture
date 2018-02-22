<?php

//公共文化
namespace Cudatabase\Controller;
use Cudatabase\Controller\CuBaseController;
class ComArtCenterController extends CuBaseController {
    protected $Page_Size=20;

    //图书馆
    public function index(){
        $cid=I('get.cid');
        $where['auditstatus']=35;
        $where['isdelete']=0;
        $info=array();
        $menu_data = D('Admin/ArtCategory')->getMenu();
        foreach ($menu_data['1']['child'] as $key => $value) {
            $menu_data['1']['child'][$key]['num1']=M('CategoryStatistics')->where(array('cid'=>$value['cid'],'level'=>'国家级'))->order('addtime desc')->count();
            $menu_data['1']['child'][$key]['num2']=M('CategoryStatistics')->where(array('cid'=>$value['cid'],'level'=>'省级'))->order('addtime desc')->count();
            $menu_data['1']['child'][$key]['num3']=M('CategoryStatistics')->where(array('cid'=>$value['cid'],'level'=>'市级'))->order('addtime desc')->count();
            $menu_data['1']['child'][$key]['num4']=M('CategoryStatistics')->where(array('cid'=>$value['cid'],'level'=>'县级'))->order('addtime desc')->count();
        }
        //var_dump($menu_data[1]);exit;
        $info['lib']=D('Admin/library')->where($where)->order('addtime desc')->select();
        // echo D('Admin/library')->getLastSql();
        // var_dump( $info['lib']);
        $info['com']=D('Admin/Comartcenter')->where($where)->order('addtime desc')->select();
        // var_dump($info['com']);
        if(!empty($cid)){
            $data = D('Admin/ArtCategory')->getMenu($cid);
             
            $this->assign("data",$data);
            
        }
         //var_dump($menu_data['1']);exit;
        $this->assign('info',$info);
        $this->assign("menu",$menu_data);

        $this->display();
    	
       
    }
   //图书馆列表
   
    //图书馆详情页
    public function libshow(){
        $id=I('get.id','');
        $data=D('Admin/Library')->relation(true)->where(array('id'=>$id))->find();
    	$this->assign('data',$data);
        $this->display();
    }


    public  function comshow(){
        $id=I('get.id','');
        $data=D('Admin/Comartcenter')->relation(true)->where(array('id'=>$id))->find();
        //馆办活动统计
        $data['CacOfficeact_Count'] = M('CacOfficeact')->field("officeact_catalog,count(*) as count")->group('officeact_catalog')->where(array('id_cac'=>$id,'is_delete'=>'0'))->select();
        //服务活动统计
        $data['CacAct_Count'] = M('CacAct')->field("act_object,count(*) as count,sum(act_pernum) as pernum")->group('act_object')->where(array('id_cac'=>$id,'is_delete'=>'0'))->select();
        // ($data['CacAct_Count']);
        $this->assign('data',$data);
        $this->display();
    	
    }
     //下载
    public function upload(){
     
    }

     public function menu(){
        $root_cid= I('rootcid',1);
        $cid = I('cid');
        switch($root_cid){
            case '1':redirect(U('Index/index',array('cid'=>$cid)));break;
            case '2':redirect(U('ComArtCenter/Index',array('cid'=>$cid)));break;
            case '3':redirect(U('Immaterial/Index',array('cid'=>$cid)));break;
            case '4':redirect(U('Industry/Index',array('cid'=>$cid)));break;
            case '5':redirect(U('Policy/Index',array('cid'=>$cid)));break;
        }
    }
    //列表数据特殊处理
    protected  function _special(&$data){
        foreach($data as $key=>$item){
            $data[$key]['cate_name'] = M("ArtCategory")->where(array('cid'=>$item['art_cid']))->getField('name');
        }
    }

    public function lists(){
        $pagenum = I('get.page','1','');
        $where['auditstatus']=35;
        $where['isdelete']=0;
        $type=I('get.type');
        switch ($type) {
            case '0':
        $count=D('Admin/Library')->where($where)->count();
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
        $data=D('Admin/Library')->where($where)->page($pagenum.','.$this->Page_Size)->select();
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
        $this->display('liblists');
                break;
                 case '1':
        $count=D('Admin/Comartcenter')->where($where)->count();
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
        $data=D('Admin/Comartcenter')->where($where)->page($pagenum.','.$this->Page_Size)->select();
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
        $this->display('comlists');
                break;
            
            default:
                # code...
                break;
        }
    }

   
}