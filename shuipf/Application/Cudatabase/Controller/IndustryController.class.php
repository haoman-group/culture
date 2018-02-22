<?php
//文化产业
namespace Cudatabase\Controller;
use Cudatabase\Controller\CuBaseController;

class IndustryController extends CuBaseController{
    protected $Page_Size=20;
    public $model = null;
    protected function _initialize() {
		parent::_initialize();
		$this->model=D('Admin/Industry');
	}
	public function index(){
        //获取左侧菜单数据
        $menu_data = D('Admin/ArtCategory')->getMenu();
        //获取右侧菜单内容
        $cid = I("get.cid",119);
        $data = D('Admin/ArtCategory')->getMenu($cid,'ALL');
        // var_dump($data);
        $cid_name = D('Admin/ArtCategory')->where(array('cid'=>$cid))->getField('name');
        $this->assign('cid_name',$cid_name);
        $this->assign('data',$data);
        $this->assign('menu',$menu_data);
  	    $this->display();
  }

  public function lists(){
        $cid=I('get.cid');
        $area_display=I('get.area');
        $level=I('get.level');
        $where=array();
        $where['isdelete']=0;
        $where['auditstatus']=35;
        $where['level']=$level;
        $where['art_cid']=$cid;
         if(!empty($area_display)){
             $where['area_display']=array('LIKE','%'.$area_display.'%');
        }
        $this->_prepData($where);
        $this->display();
  }

	public function show(){
		$id = I('get.id',null);
		$data = $this->model->where(array('id'=>$id))->find();
        $data['dramaname']=D('Admin/ArtCategory')->where(array('cid'=>$data['art_cid']))->getField('name');
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

  public function download(){
    
  }
}
