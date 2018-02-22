<?php

//待办事件
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;
use Admin\Model\AreaModel;
class ActionController extends AdminBase{
	
	protected $model = null;
	//公共搜索条件
	public $where = array();
	protected function _initialize() {
		parent::_initialize();
		$this->model = D('Admin/Action');
		$this->where = array();
		$this->_getLevelWhere();
	}
	//根据区域层级 获取对应的搜索条件
	private function _getLevelWhere(){
		switch($this->UserLevel) {
			case AreaModel::XIANG : break;
			case AreaModel::XIAN  : 
				//县级条件：与自己area字段相同，且审核状态为'-1'的记录
				$this->where['a.area'] = User::getInstance()->area;
				$this->where['a.auditstatus'] = '-1';
				break;
			case AreaModel::SHI   : 
				//市级条件：所在市级及所属县级的所有状态为5或者'-1'的。
				$area = User::getInstance()->area;
				$level = "( a.area >=".$area." and a.area < ".($area+$this->UserLevel).")";
				$this->where['_string'] = "(a.auditstatus = '-1' and a.area =".$area.") or ( a.auditstatus = '-1' and ".$level." )";
				break;
			case AreaModel::SHENG :
			    $area = User::getInstance()->area;
                $this->where['_string'] = "(a.auditstatus = '-1' and a.area =".$area.") or ( a.auditstatus = '-1'  )";
			    break;
			default:
			break;
		}
	}
	public function getGTasks(){
		return $this->model->getAuditDataCount($this->where);
	}
	public function index(){
		//待审核
		$data_no_audit =$this->model->getAuditData($this->where);
		$this->assign('data_no_audit',$data_no_audit);
		//我的被驳回记录
		$where = array();
		$where['a.auditstatus'] = 0;
		$where['a.author_id'] = User::getInstance()->id;
		$data_audit_fail = $this->model->getAuditData($where);
		$this->assign('data_audit_fail',$data_audit_fail);
		//我的驳回记录
		$data_my_audit_fail = D('Admin/Audit')->getAuditDataCount1();
		 //var_dump($data_my_audit_fail);
		$this->assign('data_my_audit_fail',$data_my_audit_fail);
		$this->display();
	}
	
	public function lists(){
		$type = I('get.type',null);
		if(empty($type)){return false;}
		if(!I('audit_fail',false)){
			$data = $this->model->getAuditData($this->where);
		}else{
			$where = array();
			$where['a.auditstatus'] = 0;
			$where['a.author_id'] = User::getInstance()->id;
			$data =$this->model->getAuditData($where);
			
		}
		//var_dump($data);exit;
		$this->assign('data',$data[$type]);
		$this->display();
		
	}
	public function myaudit(){
		$type = I('get.type','ReCulture');
		$data = D('Admin/Audit')->getAuditData1($type);
		
		$this->assign('auditStatus',\Admin\Controller\AuditController::$auditStatus);
		$this->assign('data',$data);
		//var_dump($data);exit;
		$this->display();
	}
	
}

?>