<?php
namespace Admin\Controller;

use Common\Controller\AdminBase;
use Admin\Service\User;
class ProductController extends AdminBase{
	public function _initialize(){
		parent::_initialize();
		$this->model = M('product');
		$this->categorymodel = M('product_category');
		$this->brandmodel = M('product_brand');
		$this->brand_type_model = M('product_brand_type');
		$this->typemodel = M('product_type');
		$this->union_active = M('union_active');
	}


	//记录展示
	public function index(){
		//获得参数
		$status = I('get.status');
		//查询条件
		$where = array('status'=>$status);
		// var_dump($status);
		$count = $this->model->where($where)->count();
		$page = $this->page($count,20);
		$data = $this->model->where($where)->limit($page->firstRow.','.$page->lastRows)->order('id DESC')->select();
		// ->join('cu_member ON cu_member.userid = cu_product.uid')->
		// var_dump($data);die;
		$this->assign('page',$page);
		$this->assign('data',$data);
		$this->display();
	}


	//展示页面
	public function show(){
		$id = I('get.id',0,'intval');
		$where = array('id'=>$id);
		$data = $this->model->where($where)->find();
//		var_dump($data);die;
		$this->assign('data',$data);
		$this->display();
	}
	
	
	
	//后台审核
	public function audit(){
		if(IS_AJAX){
			$id = I('post.id');
			$value = I('post.val');
    		if( !$this->model->where(array('id'=>$id))->setField('status',$value) ){
    			$this->ajaxreturn(array('status'=>0,'message' => '失败'));
    		}else{
    			$this->ajaxreturn(array('status'=>1,'message' => '成功'));
    		}
    		
    	}
	}


	//后台分类列表
	public function category(){

		$data = $this->categorymodel->select();
		$this->assign('data',$data);
		$this->display();
	}


	//删除分类
	public function delete(){
		$id = I('get.id');
		$where = array('id'=>$id);
		$this->categorymodel->where($where)->delete();
		// echo '<script> window.location.href="'.{:U('Admin/Product/category')}.'"</script>';
	}
	//添加分类
	public function category_add(){
		if(IS_POST){
			if( $this->categorymodel->add($_POST) ){
				$this->ajaxreturn(array('info'=>'添加成功','status'=>1));
			}
		}
		$this->display();
	}
	//编辑分类
	public function category_edit(){
		$id = I('get.id');
		if(IS_POST){
			$data = $_POST;
			if( $this->categorymodel->where(array('id'=>$data['cid']))->save($_POST) ){
				$this->ajaxreturn(array('info'=>'编辑成功','status'=>1));
			}else{
				$this->ajaxreturn(array('info'=>'编辑失败','status'=>0));
			}
		}
		$oldData = $this->categorymodel->where(array('id'=>$id))->find();
		$this->assign('oldData',$oldData);
		$this->display();
	}

	//品牌列表
	public function brand(){
		$count = $this->brandmodel->count();
		$page = $this->page($count,15);
		$data = $this->brandmodel->limit($page->firstRow.','.$page->listRows)->select();
		foreach ($data as $key => $value) {
			$a = $this->brand_type_model->join('cu_product_type ON cu_product_type.tid=cu_product_brand_type.type_id')->where(array('brand_id'=>$value['bid']))->getField('tid,typename');
			$data[$key]['typename'] = implode(' ', $a);
		}

		// var_dump($data);
		$this->assign('data',$data);
		$this->assign('page',$page->show());
		$this->display();
	}
	//添加品牌
	public function brand_add(){
		$typedata = $this->typemodel->select();
		if(empty($typedata)){
			$this->error('请先添加功能',U("Admin/product/type"));
		}
		if(IS_POST){

			$data = array(
				'brandname' => I('post.brandname'),
				);
			if(!$data['brandname']){
				$this->error('请填写品牌名称');
			}
			$type_id = $_POST['type_id'];
			if(!$type_id){
				$this->error('请选择功能');
			}

			// var_dump($type_id);die;
			$this->brandmodel->startTrans();
			
			$brand_id = $this->brandmodel->add($data);
			foreach ($type_id as $key => $value) {
				$middata = array(
					'brand_id' => $brand_id,
					'type_id' => $value
				);
				$info = $this->brand_type_model->add($middata);
				if(!$info){
					$this->brandmodel->rollback();
				}
			}
			$this->brandmodel->commit();
			$this->ajaxreturn(array('info'=>'添加成功','status'=>1));
			
			
			// if( $this->brandmodel->add($data) ){

			// 	$this->ajaxreturn(array('info'=>'添加成功','status'=>1));
			// }
		}
		// $typedata = $this->typemodel->select();
		$this->assign('typedata',$typedata);
		$this->display();
	} 
	//品牌删除
	public function brand_delete(){
		$bid = I('get.bid',0,'intval');
		$where = array('bid'=>$bid);
		if($this->brandmodel->where($where)->delete()){
			$this->success('删除成功！');
		}else{$this->error('删除失败！'); }
		
	}

	/*
	 * type
	 */
	public function type(){
		$count = $this->typemodel->count();
		$page = $this->page($count,15);
		// var_dump($page);
		$data = $this->typemodel->join('cu_product_category ON cu_product_type.cate_id=cu_product_category.id')->limit($page->firstRow.','.$page->listRows)->select();
		// echo $this->typemodel->_sql();
		// var_dump($data);
		$this->assign('data',$data);
		$this->assign('page',$page->show());
		$this->display();
	}

	public function type_add(){
		$category = $this->categorymodel->select();
		if(!$category){
			$this->error('请先添加分类',U("Admin/product/category"));
		}
		if(IS_AJAX){
			$data['typename'] = I('post.typename');
			if(!$data['typename']){
				$this->error('请填写功能名称');
			}
			$data['cate_id'] = I('post.cate_id');
			if(!$data['cate_id']){
				$this->error('请选择分类');
			}
			$info = $this->typemodel->add($data);
			if($info){
				$this->ajaxreturn(array('info'=>'添加成功','status'=>1));
			}
		}

		

		$this->assign('category',$category);
		$this->display();
	}
	public function type_delete(){
		$tid = I('get.tid',0,'intval');
		$where = array('tid'=>$tid);
		if($this->typemodel->where($where)->delete()){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
		
	}



	/*联盟活动*/
	public function union_active(){
		$data = $this->union_active->order('id desc')->select();
		// $adminname = User::getInstance()->getInfo();
		foreach ($data as $key => $value) {
			# code...
			$data[$key]['a_name'] = M('user')->where(array('id'=>$value['adminid']))->getField('username');
			$data[$key]['nickname'] = M('user')->where(array('id'=>$value['adminid']))->getField('nickname');
		}
		
		// var_dump($data);
		$this->assign('data',$data);
		$this->display();
	}
	public function union_active_add(){

		if($_POST){
			$data = $_POST;
			$userinfo = User::getInstance()->getInfo();
			$data['adminid'] = $userinfo['id'];
			$data['inputime'] = time();
			
			if($this->union_active->add($data)){
				$this->ajaxreturn(array('info'=>'添加成功','status'=>1));
			}else{
				$this->ajaxreturn(array('info'=>'添加失败','status'=>0));
			}
		}
		$this->display();
	}
	public function union_active_del(){
		$id = I('get.id',0,'intval');
		$where = array('id'=>$id);
		if($this->union_active->where($where)->delete()){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	public function union_active_show(){
		$id = I('get.id',0,'intval');
		$data = $this->union_active->where(array('id'=>$id))->find();
		$this->assign('data',$data);
		$this->display();
	}
	public function union_active_edit(){
		$id = I('get.id',0,'intval');
		if(IS_POST){
			$data = $_POST;
			$data["updatatime"] = time();
			$userinfo = User::getInstance()->getInfo();
			$data['updataadminid'] = $userinfo['id'];
			if( $this->union_active->where(array('id'=>$data['id']))->save($data) ){
				$this->ajaxreturn(array('info'=>'编辑成功','status'=>1));
			}else{
				$this->ajaxreturn(array('info'=>'编辑失败','status'=>0));
			}
		}
		$data = $this->union_active->where(array('id'=>$id))->find();
		$this->assign('data',$data);
		$this->display();
	}
}
