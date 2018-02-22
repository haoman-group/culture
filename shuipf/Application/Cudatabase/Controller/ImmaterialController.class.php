<?php
//非物质文化遗产
namespace Cudatabase\Controller;
use Cudatabase\Controller\CuBaseController;
class ImmaterialController extends CuBaseController {

       protected $Page_Size=20;

    public $model = null;
    protected function _initialize() {
		parent::_initialize();
		$this->model=D('Admin/Immaterial');
	}

  public function index(){
    //左侧菜单
  	$menu_data = D('Admin/ArtCategory')->getMenu();
    //获取右侧菜单数据
    $cid = I('get.cid',$menu_data[0]['cid']);
    if(!empty($cid)){
        $data = D('Admin/ArtCategory')->getMenu($cid,0);
        // var_dump($data);
        foreach ($data as $key => $value) {
        //    $data[$key]['level1']=M('CategoryStatistics')->where(array('cid'=>$value['cid'],'level'=>'国家级'))->order('addtime desc')->count();
        //    $data[$key]['level2']=M('CategoryStatistics')->where(array('cid'=>$value['cid'],'level'=>'省级'))->order('addtime desc')->count();
        //    $data[$key]['level3']=M('CategoryStatistics')->where(array('cid'=>$value['cid'],'level'=>'市级'))->order('addtime desc')->count();
        //    $data[$key]['level4']=M('CategoryStatistics')->where(array('cid'=>$value['cid'],'level'=>'县级'))->order('addtime desc')->count();
           $data[$key]['representone']=M('CategoryStatistics')->where(array('cid'=>$value['cid'],'represent'=>'1'))->order('addtime desc')->count();
           $data[$key]['representtwo']=M('CategoryStatistics')->where(array('cid'=>$value['cid'],'represent'=>'2'))->order('addtime desc')->count();
            $data[$key]['totle'] = $this->model->getCategoryStatistics($value['cid']);
        }
        $this->assign("data",$data);
    }
     $this->assign("menu",$menu_data);
  	 $this->display();
  }

  public function lists(){

      $cid=I('get.cid');
      $area_display=I('get.area');
        $where=array();
        $where['isdelete']=0;
        $where['auditstatus']=35;
        $where['art_cid']=$cid;
      if(!empty($area_display)){
            //$where['area_display']=$area_display;
       $where['area_display']=array('LIKE','%'.$area_display.'%');

        }
        // if(!empty(I('get.level'))){
        //   $where['level']=I('level');
        // }
        if(!empty(I('get.represen'))){
         $where['represen']=I('get.represen');
        }
        // if(!empty(I('level'))){
        //    $where['level']=I('level');
        // }
      if(!empty(I('get.age_min'))){
          $where['age_min']=I('get.age_min');
      }
      if(!empty(I('get.age_max'))){
          $where['age_max']=I('get.age_max');
      }

     //var_dump($this->_prepData($where));exit;
      $this->_prepDataUsingDb($where);
    //   $data = $this->model->where($where)->select();

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
}