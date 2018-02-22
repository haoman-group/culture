<?php
//文化政策
namespace Cudatabase\Controller;
use Cudatabase\Controller\CuBaseController;
class PolicyController extends CuBaseController{
	protected $model = null;
	protected function _initialize() {
		parent::_initialize();
		$this->model=D('Admin/PolicyCulture');
	}
	
	public function index(){
		//获取左侧菜单数据
        $menu_data = D('Admin/ArtCategory')->getMenu();
        //获取右侧菜单数据
    	$cid = I('get.cid',174);
        if(!empty($cid)){
			$catgory = D('Admin/ArtCategory')->where(['cid'=>$cid])->find();
			if($catgory['is_parent'] == '1'){
				$data = D('Admin/ArtCategory')->where(array('parent_cid'=>$cid))->select();
			}else{
				$data = D('Admin/ArtCategory')->where(array('parent_cid'=>'5'))->select();
			}
            $this->assign("data",$data);
        }
        // $data = D('Admin/ArtCategory')->where(array('parent_cid'=>'5'))->select();
        // $this->assign("data",$data);
        $this->assign("menu",$menu_data);
		$this->display();
	}
	public function lists(){
		$cid = I('get.cid',174);
		$area_display=I('get.area');
		$where =array();
		$where['art_cid'] = $cid;
		$where['isdelete']=0;
        $where['auditstatus']=35;
		 if(!empty($area_display)){
            $where['area_display']=array('LIKE','%'.$area_display.'%');
        }
		//var_dump($where);exit;
		$this->_prepDataUsingDb($where);
		$this->display();
	}
	public function show(){
		$id = I('get.id',null);
		$data = $this->model->where(array('id'=>$id))->find();
		// $data['publish_content']=strip_tags($data['publish_content']);
		 $data['dramaname']=D('Admin/ArtCategory')->where(array('cid'=>$data['art_cid']))->getField('name');
		$this->_Get_breadcrumb($data['art_cid']);
        $this->assign('breadcrumb',$this->breadcrumb);
		$this->assign('data',$data);
		$this->display();
	}
	
    //添加分类
    protected  function _special(&$data){
        foreach($data as $key=>$item){
            $data[$key]['cate_name'] = M("ArtCategory")->where(array('cid'=>$item['art_cid']))->getField('name');
        }
    }

}
