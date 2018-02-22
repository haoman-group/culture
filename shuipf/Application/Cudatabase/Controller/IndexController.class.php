<?php
namespace Cudatabase\Controller;

use Cudatabase\Controller\CuBaseController;
class IndexController extends CuBaseController {

    protected $Page_Size=20;
    public $model = null;
    protected function _initialize() {
		parent::_initialize();
		$this->model=D('Admin/ReCulture');
        //登录类型,取值范围['admin','normal']
        $this->assign('login_type',$this->login_type=="admin"?1:0);
	}


    //文化大数据前台首页
    public function index(){
        //获取左侧菜单数据
        $menu_data = D('Admin/ArtCategory')->getMenu();
       // var_dump($menu_data);exit;
        //echo D('Admin/ArtCategory')->getLastsql();exit;
        //获取右侧菜单数据
    	$cid = I('get.cid',6);
        if(!empty($cid)){
            $data = D('Admin/ArtCategory')->getMenu($cid);
            $this->assign("data",$data);
        }
        $this->assign("menu",$menu_data);
        $this->display();
    }
    public function menu(){
        $root_cid= I('rootcid',1);
        $cid = I('cid');
        switch($root_cid){
            case '1':redirect(U('Index/index',       array('cid'=>$cid,'rootcid'=>$root_cid)));break;
            case '2':redirect(U('ComArtCenter/index',array('cid'=>$cid,'rootcid'=>$root_cid)));break;
            case '3':redirect(U('Immaterial/index',  array('cid'=>$cid,'rootcid'=>$root_cid)));break;
            case '4':redirect(U('Industry/index',    array('cid'=>$cid,'rootcid'=>$root_cid)));break;
            case '5':redirect(U('Policy/index',      array('cid'=>$cid,'rootcid'=>$root_cid)));break;
            default:redirect(U('Index/index',        array('cid'=>$cid,'rootcid'=>$root_cid)));break;
        }
    }
    public function lists(){
        $cid=I('get.cid');
        $area_display=I('get.area');
        $awards = I('get.awards');
        $troupe = I('get.troupe');
        $drama=I('get.drama');
        $where=array();
        $where['isdelete']=0;
        $where['auditstatus']=35;
        $where['art_cid']=$cid;
        if(!empty($drama)){
            $where['drama']=$drama;
        }
        if(!empty($area_display)){
             $where['area_display']=array('LIKE','%'.$area_display.'%');
        }
        if(!empty($awards)){
            $where['awards'] = $awards;
        }
        if(!empty($troupe)){
            $where['troupe'] = $troupe;
        }
        
        $this->_prepData($where);
        
    	$this->display();
    }

    public function show(){
		$id = I('get.id',null);
		$data = $this->model->where(array('id'=>$id))->find();
         if( is_numeric($data['drama']) && $data['drama'] !=-1 ){
                   $data['dramaname']=D('Admin/ArtCategory')->where(array('cid'=>$data['drama']))->getField('name');
              }elseif($data['drama'] == "无" && empty($data['drama'])){
                  $data['dramaname']=D('Admin/ArtCategory')->where(array('cid'=>$data['art_cid']))->getField('name');
              }else{
                  $data['dramaname']=$data['drama'];
              }
        //$data['dramaname']=D('Admin/ArtCategory')->where(array('cid'=>$data['drama']))->getField('name');
		$this->_Get_breadcrumb($data['art_cid']);
        $this->assign('breadcrumb',$this->breadcrumb);
		$this->assign('data',$data);
		$this->display();
	}
    //列表数据特殊处理
    protected  function _special(&$data){
        foreach($data as $key=>$item){
            $data[$key]['cate_name'] = M("ArtCategory")->where(array('cid'=>$item['art_cid']))->getField('name');
        }
    }
}