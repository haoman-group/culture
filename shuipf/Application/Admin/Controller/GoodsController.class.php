<?php
	namespace Admin\Controller;
	use Common\Controller\AdminBase;
	//后台商品添加菜单类
	class GoodsController extends AdminBase{
		public function _initialize(){
			parent::_initialize();
			$this->assign('maxPicNum', 5);
			$this->model=M('goods');
		}
		//商品列表
		public function index(){
			$where=array();
			$count=$this->model->where($where)->order('id desc')->count();
			$page=$this->page($count,3);
			$data=$this->model->where($where)->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
			$this->assign('page',$page->show());
			$this->assign('data',$data);
			$this->display();
		}
		//查看
		public function check(){
			$id = I('get.id',0,'intval');
			$where=array('id'=>$id);
			$data=$this->model->where($where)->find();
			$count=count(explode(",", $data['photo']));
			$this->assign('data',$data);
			$this->assign('count',$count);

			$this->assign('picture_urls', explode(",", $data['photo']));
			$this->display();
		}
		//编辑
		public function edit(){
			$id = I('id',0);
//			var_dump($id);die;
			$where=array('id'=>$id);
			$data=$this->model->where($where)->find();
			//var_dump($data['photo']);exit;
//			if(!$data) $this->error('页面不存在');
			if(IS_POST){
				$id = I('id');
				$where=array('id'=>$id);
				$data['title'] = I('title');
				$data['thumb'] = $_POST['drama_picture_url']['0'];
				$data['price'] = I('price');
				$data['person'] = I('person');
				$data['address'] = I('address');
				$data['tel'] = I('tel');
				$data['time'] = I('time');
				$data['content'] = I('content');
				$data['status'] = I('status');
				$data['keywords'] = I('keywords');
			    $data['photo']= implode(",",$_POST['drama_picture_url']);
				//var_dump($data);exit;
				$this->model->where($where)->data($data)->save();
				//echo $this->model->getLastsql();exit;
//				var_dump($b);die;
				$this->success('提交成功');
			}else{
				$this->assign('picture_urls', explode(",", $data['photo']));
				$this->assign('data',$data);
				$this->display();
			}
			
			
		}
		//删除
		public function del(){
			$id = I('get.id',0,'intval');
			$where = array('id'=>$id);
			if(!$id){
				$this->error('请指定需要删除的项目！');
			}
			$re = $this->model->find($id);
			if(!$re) $this->error('不存在');
			if(false == $this->model->where($where)->delete()){
				$this->error('删除失败');
			}
			$this->success('删除成功');
			
		}
		//添加商品
		public function add(){
		    
			$_POST['photo'] = implode(",",$_POST['drama_picture_url']);
			
			if(IS_POST){
				
				$data=I('post.');
				
				$data['thumb'] = $_POST['drama_picture_url']['0'];
				$a=$this->model->add($_POST);
				if(!$a){
					$this->error('添加失败');
				}else{
					$this->success('添加成功');
				}
			}
			$this->display();
		}
		public function img($img){
			$upload = new \UploadFile();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->allowExts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
			$upload->savePath  =      './statics/ci/images/goods/'; // 设置附件上传目录    // 上传文件     
			$info   =   $upload->uploadOne($img);    
			if(!$info) {// 上传错误提示错误信息        
				$this->error($upload->getErrorMsg());    
			}else{// 上传成功
				$path = $info[0]['savepath'].$info[0]['savename'];        
				return $path;  
			}
		}
	}
