<?php
namespace Industrymem\Controller;

use Common\Controller\Base;

class IndustryController extends MemberBase{
	public function _initialize(){
		parent::_initialize();
		$this->model = M('finance_credit');
		$this->industrymodel = M('industry_issue');
	}

	//我的项目
	public function index(){
		$uid = $this->uid;
		// var_dump($uid);
		$where = array('uid'=>$uid);
		$data = $this->industrymodel->where($where)->select();
		 //var_dump($data);die;
		$this->assign('data',$data);
		$this->display();
	}
	//编辑项目
	public function obj_edit(){
		$id = I('get.id',0,'intval');
		$data = $this->industrymodel->where(array('id'=>$id))->find();
		$industry_category = M('industry_category')->select();
		 $industry_stage = M('industry_stage')->select();
		// var_dump($data);
		$this->assign('data',$data);
		 $this->assign('industry_category',$industry_category);
		 $this->assign('industry_stage',$industry_stage);
		$this->display();
	}
	//删除项目
	public function delete_obj(){
		if(IS_POST){
			$id = I('post.id',0,'intval');
			// var_dump($id);die;
			$where = array('id'=>$id);
			if($this->industrymodel->where($where)->delete()){
				$this->ajaxreturn(array('status'=>1,'message'=>'删除成功！'));
			}else{
				$this->ajaxreturn(array('status'=>0,'message'=>'删除失败！'));
			}
		}
	}
	//融资项目申请
	public function agent(){
		$this->redirect('Industry/Industry/add_conpany');
	}

	//信用评级
	public function level(){
		$uid = $this->uid;
		$where = array('member_id'=>$uid);
		$data = $this->model->where($where)->order('id desc')->select();
		$this->assign('data',$data);
		$this->display();
	}
	//编辑信用申请
	public function edit(){
		$id = I('get.id',0,'intval');
		$where = array('id'=>$id);
		// var_dump($where);
		$data = $this->model->where($where)->find();
		// var_dump($data);
		$this->assign('data',$data);
		$this->display();
	}
}