<?php

//公共文化
namespace Admin\Controller;

use Common\Controller\AdminBase;
use Admin\Service\User;

class ComArtCenterController extends AdminBase{
      protected $Comartcenter = null;
	  protected function _initialize() {
        parent::_initialize();
         $this->assign('maxPicNum', 1);
		C('TOKEN_ON',true);
        $this->Comartcenter = D('Admin/Comartcenter');
		$this->assign('AuditStatus',\Admin\Controller\AuditController::$auditStatus);
    }
 
    //资源采集->公共文化->文化馆
	public function index(){
		$this->where['isdelete']=0;
		$count=$this->Comartcenter->where($this->where)->count();
		 $page = $this->page($count, 20);
        $data = $this->Comartcenter->where($this->where)->limit($page->firstRow . ',' . $page->listRows)->order(array('id' => 'DESC'))->select();
		$this->assign("Page", $page->show())
                ->assign("data", $data)
                ->assign('where', $this->where)
                ->display();
		
	}

    public function add(){
    	if(IS_POST && !IS_AJAX){
			$data = I('post.');
            $data['picture'] = implode(',', $data['drama_picture_url']);
            
			if(empty($data['master']) && empty($data['id'])){
				$this->error('请先添加图书馆基本概况！');
			}
			if(!$this->Comartcenter->create($data)){
				$this->error('添加错误'.$this->Comartcenter->getError());
			}else{
				if(empty($data['id'])){
					
					$data['id'] = $this->Comartcenter->add();
				
				}else{
					$this->Comartcenter->save();
				}
			}
			$this->redirect('add',array('id'=>$data['id']));
			
		}if(IS_AJAX){
			$data = I('post.');
			if(empty($data['id'])){
				$this->error('请先添加图书馆基本概况！');
				exit();
			}
			if(!$this->Comartcenter->create($data)){
				$this->error('添加错误'.$this->Comartcenter->getError());
				exit();
			}else{
				$this->Comartcenter->save();
				$this->success('提交成功！','no');
			}
		}else{
			$id = I('get.id');
			//开启关联模式
			$data = $this->Comartcenter->relation(true)->where(array('id'=>$id))->find();
			$data['publish_content']= htmlspecialchars_decode($data['publish_content']);
			$this->assign('picture_urls', explode(",", $data['picture']));
			$data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
			$data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
			$this->assign('data',$data);
			$this->display();	
		}
    	
    }

    // public function edit(){
    	
    // 	$this->redirect('add');
    // }
	//检索查看页面
	public function show(){
			$id = I('get.id');
			//开启关联模式
			$data = $this->Comartcenter->relation(true)->where(array('id'=>$id))->find();
			$data['publish_content']= htmlspecialchars_decode($data['publish_content']);
			$data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
			$this->assign('data',$data);
			$this->display();
    }

    //资源检索->公共文化->文化馆
	public function search(){
      $search = I('search','0');
		$this->where = array();
		$this->where['isdelete'] = "0";
		if($search == '1'){
			$this->where['area'] = D("Admin/Area")->getIDWhereCondition(I('area'));
		}else{
			$this->where['area']=array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']));
		}
			$count =  $this->Comartcenter->where($this->where)->count();
			$page = $this->page($count, 20);

			$lists = $this->Comartcenter->where($this->where)->limit($page->firstRow . ',' . $page->listRows)->order(array('id' => 'DESC'))->select();
			$data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
			//$data['default_area'] = D('Admin/Area')->getFullAreaID($this->where['area']);
			$this->assign("Page", $page->show())
					->assign("data", $data)
					->assign('lists',$lists)
					->assign('where', $this->where)
					->display();
	}

	

	public function subAdd(){
		$type = I('get.type');
		if(empty($type)){
			$this->error('错误的类型');
		}
		$this->display($type);
	}
  //经费投入情况
	public function addFund(){
		if(IS_POST){
			D("Admin/CacFund")->create($_POST);
			if(empty($_POST['id_cac_fun'])){
			D("Admin/CacFund")->add();
		}else{
			D("Admin/CacFund")->save();
		}
			$this->ajaxReturn(array('status'=>1,'msg'=>'操作成功'));

		}
	}
    //人才队伍建设
	public function addTalent(){

		if(IS_POST){
			D('Admin/CacTalent')->create($_POST);
			if(empty($_POST['id_cac_tal'])){
				// var_dump($_POST);exit;
				D('Admin/CacTalent')->add();

			}else{

				D('Admin/CacTalent')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}

	//服务活动

	public function addAct(){
		if(IS_POST){
			D('Admin/CacAct')->create($_POST);
			if(empty($_POST['id_cac_act'])){
				
				D('Admin/CacAct')->add();

			}else{

				D('Admin/CacAct')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}

	}
	//馆办活动

	public function addOfficeact(){
		if(IS_POST){
			D('Admin/CacOfficeact')->create($_POST);
			if(empty($_POST['id_cac_officeact'])){
			
				D('Admin/CacOfficeact')->add();

			}else{

				D('Admin/CacOfficeact')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}

	public function addVolunteer(){
		if(IS_POST){

			D('Admin/CacVolunteer')->create($_POST);
			if(empty($_POST['id_cac_vol'])){
			   
				D('Admin/CacVolunteer')->add();
			}else{
                 
				D('Admin/CacVolunteer')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}

	public function addVolact(){
		if(IS_POST){
			D('Admin/CacVolact')->create($_POST);
			if(empty($_POST['id_cac_volact'])){
			
				D('Admin/CacVolact')->add();

			}else{

				D('Admin/CacVolact')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}

	public function addTrainbase(){
		if(IS_POST){

			D('Admin/CacTrainbase')->create($_POST);
			if(empty($_POST['id_cac_tb'])){
			
				D('Admin/CacTrainbase')->add();

			}else{

				D('Admin/CacTrainbase')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}

	public function addComculter(){
		if(IS_POST){

			D('Admin/CacComculter')->create($_POST);
			if(empty($_POST['id_cac_cc'])){
			
				D('Admin/CacComculter')->add();

			}else{

				D('Admin/CacComculter')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}

	public function addTrainact(){
		if(IS_POST){
			D('Admin/CacTrainact')->create($_POST);
			if(empty($_POST['id_cac_ta'])){
			
				D('Admin/CacTrainact')->add();

			}else{

				D('Admin/CacTrainact')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}


	//子页面的删除
	public function subDel(){
		$sub_id = I('get.id');
		$type = I('get.type');
		
		// echo $type;exit;

		switch ($type) {
			case 'Fund':
				# code...
				$data = D('Admin/CacFund')->where(array('id_cac_fund'=>$sub_id))->setField('is_delete','1');
				$this->success('删除成功!');
				break;
			case 'Talent':
				# code...
				$data = D('Admin/CacTalent')->where(array('id_cac_tal'=>$sub_id))->setField('is_delete','1');
				$this->success('删除成功!');
				break;
			case 'Act':
				# code...
				$data = D('Admin/CacAct')->where(array('id_cac_act'=>$sub_id))->setField('is_delete','1');
				$this->success('删除成功!');
				break;
			case 'Officeact':
				# code...
				$data = D('Admin/CacOfficeact')->where(array('id_cac_Officeact'=>$sub_id))->setField('is_delete','1');
				$this->success('删除成功!');
				break;
			case 'Volunteer':
				# code...
				$data = D('Admin/CacVolunteer')->where(array('id_cac_vol'=>$sub_id))->setField('is_delete','1');
				$this->success('删除成功!');
				break;
			case 'Volact':
				# code...
				$data = D('Admin/CacVolact')->where(array('id_cac_volact'=>$sub_id))->setField('is_delete','1');
				$this->success('删除成功!');
				break;
			case 'Trainbase':
				# code...
				$data = D('Admin/CacTrainbase')->where(array('id_cac_tb'=>$sub_id))->setField('is_delete','1');
				$this->success('删除成功!');
				break;

			case 'Trainact':
				$data = D('Admin/CacTrainact')->where(array('id_cac_ta'=>$sub_id))->setField('is_delete','1');
				$this->success('删除成功!');
				break;
			case 'Comculter':
				$data = D('Admin/CacComculter')->where(array('id_cac_cc'=>$sub_id))->setField('is_delete','1');
				$this->success('删除成功!');
				break;	
			default:
				# code...
				$this->error('错误的参数！');
				break;
		}

	}
	//子表内容修改功能
	public function subEdit(){
		$sub_id = I('get.id');
		$type = I('get.type');
		$data = null;
		switch ($type) {
			case 'Fund':
				# code...
				$data = D('Admin/CacFund')->where(array('id_cac_fun'=>$sub_id))->find();

				$this->assign("data",$data);
				$this->display("addFund");
				break;
			case 'Talent':
				# code...
				$data = D('Admin/CacTalent')->where(array('id_cac_tal'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addTalent");
				break;
			case 'Act':
				# code...
				$data = D('Admin/CacAct')->where(array('id_cac_act'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addAct");
				break;
			case 'Officeact':
				# code...
				$data = D('Admin/CacOfficeact')->where(array('id_cac_Officeact'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addOfficeact");
				break;
			case 'Volunteer':
				# code...
				$data = D('Admin/CacVolunteer')->where(array('id_cac_vol'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addVolunteer");
				break;
			case 'Volact':
				# code...
				$data = D('Admin/CacVolact')->where(array('id_cac_volact'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addVolact");
				break;
			case 'Trainbase':
				# code...
				$data = D('Admin/CacTrainbase')->where(array('id_cac_tb'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addTrainbase");
				break;

				case 'Trainact':
				# code...
				$data = D('Admin/CacTrainact')->where(array('id_cac_ta'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addTrainact");
				break;
			case 'Comculter':
				# code...
				$data = D('Admin/CacComculter')->where(array('id_cac_cc'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addComculter");
				break;
			
			default:
				# code...
				$this->error('错误的参数！');
				break;
		}
	}

	//删除


	public function indexdelete(){
		$index_id=I('id');
		if(empty($index_id)){
         $this->error("缺少参数");
		}
		$result=$this->Comartcenter->where(array('id'=>$index_id))->setField('isdelete','1');

		if($result){
			$this->success('删除成功');

		}


			}	
}
?>
