<?php
namespace Industrymem\Controller;

use Common\Controller\Base;

class ProductController extends Base{

	public function _initialize(){
		parent::_initialize();
		$this->model = M('product');
	}
	
	//我的产品	
	public function index(){
		$uid = $this->uid;
		$data = $this->model->where(array('uid'=>$uid))->select();
		
		$this->assign('data',$data);
		$this->display();
	}
	//删除
	public function delete(){
		if(IS_POST){
			$id = I('post.id',0,'intval');
			$where = array('id'=>$id);		
			if($this->model->where($where)->delete()){
				$this->ajaxreturn(array('status'=>1,'message'=>'删除成功！'));
			}else{
				$this->ajaxreturn(array('status'=>0,'message'=>'删除失败！'));
			}
		}
	}
	
	//编辑
	public function edit(){
		$id = I('get.id',0,'intval');
		// $where = array('id'=>$id);

		// $this->model->where($where)->save();
		$this->display();
	}
}