<?php
	namespace Admin\Controller;
	use Common\Controller\AdminBase;
	class NeinController extends AdminBase{
		public function _initialize(){
			parent::_initialize();
			$this->model=M('business_alliance');
		}
		//审核未通过首页
		public function index(){
			$count = $this->model->where(array('pass'=>2))->order('id desc')->count();
//			var_dump($count);die;
			$page = $this->page($count,20);
			$data = $this->model->where(array('pass'=>2))->limit($page->firstRow.','.$page->ListRows)->order('id desc')->select();
			$this->assign('Page',$page->show());
			$this->assign('data',$data);
			$this->display();
		}
		//查看
		public function check(){
			$id = I('get.id',0,'intval');
			$data = $this->model->find($id);
			$this->assign('data',$data);
			$this->display();
		}
		//删除
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
			$this->success('删除成功');
			
		}
	}
