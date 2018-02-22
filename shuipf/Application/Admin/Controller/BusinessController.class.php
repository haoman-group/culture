<?php
	namespace Admin\Controller;
	use Common\Controller\AdminBase;
	class BusinessController extends AdminBase{
		public function _initialize(){
			parent::_initialize();
			$this->model=M('business_alliance');
//			$this->areaModer=D('Admin/Area');
		}
		
		//后台展示页面
		public function index(){
			$where=array();
			$count=$this->model->where($where)->order('id desc')->count();
//			var_dump($count);die;
			$page=$this->page($count,20);
//			var_dump($page);die;
			$data=$this->model->where($where)->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
//			var_dump($data);die;
			$this->assign("Page",$page->show());
			$this->assign("data",$data);
			$this->display();
		}
			//后台添加
		public function add(){
			$this->display();
		}
		//后台商家详情页
		public function minute(){
			$id = I('get.id',0,'intval');
//			var_dump($id);
			$data = $this->model->find($id);
			$this->assign("data",$data);
			$this->display();
		}
		//商家联盟删除
		public function delete(){
			$id = I('get.id',0,'intval');
			if(!$id){
				$this->error('请指定删除的项目！');
			}
			$re=$this->model->find($id);
			if(!$re){
				$this->error('不存在');
			}
			if(false==$this->model->where(array('id'=>$id))->delete()){
				$this->error('删除失败');
			}
			$this->success('删除成功！');
	    }
		//通过审核
		public function pass(){
			$id=I('get.id',0,'intval');
			if(!$id){
				$this->error('请指定审核的项目！');
			}
			$re=$this->model->find($id);
			if(!$re){
				$this->error('不存在');
			}
			$re=$this->model->where(array('id'=>$id))->setfield('pass','1');
			$re=$this->model->find($id);
//			var_dump($re);die;
			if($re['pass'] != 1){
				$this->error('提交失败');
			}
			$this->success('提交成功，此商家审核通过');
	    }
		//申请未通过
		public function nein(){
			$id=I('get.id',0,'intval');
			if(!$id){
				$this->error('请指定项目！');
			}
			$re=$this->model->find($id);
			if(!$re){
				$this->error('不存在');
			}
			$re=$this->model->where(array('id'=>$id))->setfield('pass','2');
			$re=$this->model->find($id);
//			var_dump($re);die;
//			var_dump($re);die;
			if($re['pass'] == 2){
				$this->success('提交成功，此商家未通过审核');
			}else{
				$this->error('提交失败');
			}
		}
	}
