<?php
//图书馆

namespace Admin\Controller;

use Common\Controller\AdminBase;
use Admin\Service\User;

class LibraryController extends AdminBase{
	protected $library = null;
	protected function _initialize() {
        parent::_initialize();
		C('TOKEN_ON',true);
		 $this->assign('maxPicNum', 1);
        $this->library = D('Admin/Library');
		$this->assign('AuditStatus',\Admin\Controller\AuditController::$auditStatus);
    }

    //资源采集->公共文化->图书馆
	public function index(){
		$this->where['isdelete'] = "0";
		$count =  $this->library->where($this->where)->count();
        $page = $this->page($count, 20);
        $data = $this->library->where($this->where)->limit($page->firstRow . ',' . $page->listRows)->order(array('id' => 'DESC'))->select();
        $this->assign("Page", $page->show())
                ->assign("data", $data)
                ->assign('where', $this->where)
                ->display();	
	}
	//添加页面
	public function add(){
		if(IS_POST && !IS_AJAX){
			$data = I('post.');

			 $data['picture'] = implode(',', $data['drama_picture_url']);
			
			
			if(!$this->library->create($data)){
				$this->error('添加错误'.$this->library->getError());
			}else{
				if(empty($data['id'])){
					$data['id'] = $this->library->add();
				}else{
					$this->library->save();
				}
			}
			$this->redirect('add',array('id'=>$data['id']));
			
		}if(IS_AJAX){
			$data = I('post.');
			if(empty($data['id'])){
				$this->error('请先添加图书馆基本概况！');
				exit();
			}
			if(!$this->library->create($data)){
				$this->error('添加错误'.$this->library->getError());
				exit();
			}else{
				
				$this->library->save();
				$this->success('提交成功！','no');
			}
		}else{
			$id_lib = I('get.id');
			//开启关联模式
			
			$data = $this->library->relation(true)->where(array('id'=>$id_lib))->find();
			$data['publish_content']= htmlspecialchars_decode($data['publish_content']);
			$data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
			$this->assign('picture_urls', explode(",", $data['picture']));
			$data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
			//var_dump($data);exit;
			$this->assign('data',$data);
			$this->display();	
		}
	}
	//查看页面
	public function show(){
		//echo 123;exit;
			$id = I('get.id');
			//开启关联模式
			$data = $this->library->relation(true)->where(array('id'=>$id))->find();
			$data['publish_content']= htmlspecialchars_decode($data['publish_content']);
			//var_dump($data);exit;
			$data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
			$this->assign('data',$data);
			$this->display();
	}
	//子表添加页面
	public function subAdd(){
		$type = I('get.type');
		if(empty($type)){
			$this->error('错误的类型');
		}
		$this->display($type);
	}
	//删除功能
	public function del(){
		$id = I('get.id');
		$this->library->relation(true)->where(array('id'=>$id))->setField('isdelete','1');
		$this->success('删除成功!');
	}
	//子表内容删除功能
	public function subDel(){
		$sub_id = I('get.id');
		$type = I('get.type');
		switch ($type) {
			case 'Fund':
				# code...
				$data = D('Admin/LibFund')->where(array('id_lib_fund'=>$sub_id))->setField('isdelete','1');
				$this->success('删除成功!');
				break;
			case 'Talent':
				# code...
				$data = D('Admin/LibTalent')->where(array('id_lib_tal'=>$sub_id))->setField('isdelete','1');
				$this->success('删除成功!');
				break;
			case 'Server':
				# code...
				$data = D('Admin/LibServer')->where(array('id_lib_ser'=>$sub_id))->setField('isdelete','1');
				$this->success('删除成功!');
				break;
			case 'EduAct':
				# code...
				$data = D('Admin/LibEduAct')->where(array('id_lib_eact'=>$sub_id))->setField('isdelete','1');
				$this->success('删除成功!');
				break;
			case 'Volunteer':
				# code...
				$data = D('Admin/LibVolunteer')->where(array('id_lib_vol'=>$sub_id))->setField('isdelete','1');
				$this->success('删除成功!');
				break;
			case 'VolunteerAct':
				# code...
				$data = D('Admin/LibVolAct')->where(array('id_lib_vact'=>$sub_id))->setField('isdelete','1');
				$this->success('删除成功!');
				break;
			case 'Commend':
				# code...
				$data = D('Admin/LibCommend')->where(array('id_lib_comm'=>$sub_id))->setField('isdelete','1');
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
				$data = D('Admin/LibFund')->where(array('id_lib_fund'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addFund");
				break;
			case 'Talent':
				# code...
				$data = D('Admin/LibTalent')->where(array('id_lib_tal'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addTalent");
				break;
			case 'Server':
				# code...
				$data = D('Admin/LibServer')->where(array('id_lib_ser'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addServer");
				break;
			case 'EduAct':
				# code...
				$data = D('Admin/LibEduAct')->where(array('id_lib_eact'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addEducationAct");
				break;
			case 'Volunteer':
				# code...
				$data = D('Admin/LibVolunteer')->where(array('id_lib_vol'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addVolunteer");
				break;
			case 'VolunteerAct':
				# code...
				$data = D('Admin/LibVolAct')->where(array('id_lib_vact'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addVolunteerAct");
				break;
			case 'Commend':
				# code...
				$data = D('Admin/LibCommend')->where(array('id_lib_comm'=>$sub_id))->find();
				$this->assign('data',$data);
				$this->display("addCommend");
				break;
			default:
				# code...
				$this->error('错误的参数！');
				break;
		}
	}
    //资源检索->公共文化->图书馆
	public function search(){
		$search = I('search','0');
		$this->where['isdelete'] = "0";
		if($search == '1'){
			$this->where['area'] = D("Admin/Area")->getIDWhereCondition(I('area'));
		}
			$count =  $this->library->where($this->where)->count();
			$page = $this->page($count, 20);
			$lists = $this->library->where($this->where)->limit($page->firstRow . ',' . $page->listRows)->order(array('id' => 'DESC'))->select();
			$data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
			$this->assign("Page", $page->show())
					->assign("data", $data)
					->assign("lists",$lists)
					->assign('where', $this->where)
					->display();
		
	}
	
	/*
	* 经费投入情况 添加功能
	* 图书馆与文化馆公用方法
	*/
	public function addFund(){
		if(IS_POST){
			D('Admin/LibFund')->create($_POST);
			if(empty($_POST['id_lib_fund'])){
				D('Admin/LibFund')->add();
			}else{
				D('Admin/LibFund')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}
	/*
	* 人才队伍建设情况 添加功能
	* 图书馆与文化馆公用方法
	*/
	public function addTalent(){
		if(IS_POST){
			D('Admin/LibTalent')->create($_POST);
			if(empty($_POST['id_lib_tal'])){
				D('Admin/LibTalent')->add();
			}else{
				D('Admin/LibTalent')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}
	/*
	* 服务活动 添加功能
	* 图书馆与文化馆公用方法
	*/
	public function addServer(){
		if(IS_POST){
			D('Admin/LibServer')->create($_POST);
			if(empty($_POST['id_lib_ser'])){
				D('Admin/LibServer')->add();
			}else{
				D('Admin/LibServer')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}
	/*
	* 志愿者队伍建设 添加功能
	* 图书馆与文化馆公用方法
	*/
	public function addVolunteer(){
    if(IS_POST){
			D('Admin/LibVolunteer')->create($_POST);
			if(empty($_POST['id_lib_vol'])){
				D('Admin/LibVolunteer')->add();
			}else{
				D('Admin/LibVolunteer')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}
	/*
	* 志愿者服务活动 添加功能
	* 图书馆与文化馆公用方法
	*/
	public function addVolunteerAct(){
    if(IS_POST){
			D('Admin/LibVolAct')->create($_POST);
			if(empty($_POST['id_lib_vact'])){
				D('Admin/LibVolAct')->add();
			}else{
				D('Admin/LibVolAct')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}
	/*
	* 社会教育活动 添加功能
	* 图书馆方法
	*/
	public function addEducationAct(){
    if(IS_POST){
			D('Admin/LibEduAct')->create($_POST);
			if(empty($_POST['id_lib_eact'])){
				D('Admin/LibEduAct')->add();
			}else{
				D('Admin/LibEduAct')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}
	/*
	* 上级表彰 添加功能
	* 图书馆方法
	*/
	public function addCommend(){
    if(IS_POST){
			D('Admin/LibCommend')->create($_POST);
			if(empty($_POST['id_lib_comm'])){
				D('Admin/LibCommend')->add();
			}else{
				D('Admin/LibCommend')->save();
			}
			$this->ajaxReturn(array('status'=>'1',msg=>'success'));
		}
	}
}
?>