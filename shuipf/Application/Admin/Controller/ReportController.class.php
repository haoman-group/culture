<?php
	namespace Admin\Controller;
	use Common\Controller\AdminBase;
	//产业项目申报
	class ReportController extends AdminBase{
		public function _initialize(){
			parent::_initialize();
			$this->model=M('industry_report');
			$this->upfile=M('upfile');
		}
		//后台首页
		public function index(){
			$where=array();
			$count = $this->model->where($where)->count();
			$page = $this->page($count,15);
			$data=$this->model->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
			// var_dump($data);die;
			$this->assign('data',$data);
			$this->assign('page',$page->show());
			$this->display();
		}
//		查看详情
		public function check(){
			$id=I('get.id');
			$where=array('id'=>$id);
			$data=$this->model->where($where)->order('id desc')->find();
			$this->assign('data',$data);
			
			$this->display();
		}
		//上传相关文档
		public function up(){
			if(IS_POST){
				$file = $_FILES['file_path'];
//				var_dump($path);
					$upload = new \UploadFile();// 实例化上传类    
					$upload->maxSize   =     3145728 ;// 设置附件上传大小    
					$upload->allowExts      =     array('doc', 'docx', 'xls', 'xlsx');// 设置附件上传类型   
					$upload->savePath  =      './d/file/document/'; // 设置附件上传目录    // 上传文件     
					$info   =   $upload->uploadOne($file);  
	//				var_dump($info);die;  
					if(!$info) {// 上传错误提示错误信息        
						$this->error($upload->getErrorMsg());    
					}else{// 上传成功
						$path = $info[0]['savepath'].$info[0]['savename'];        
						 $_POST['time']=time();
						$_POST['file_path']=$path;
						$upfile=$this->upfile->add($_POST);
//						echo $this->upfile->_sql();die;
					if(!$upfile){
						$this->error('上传失败');
					}else{
						$this->success('上传成功');
					}
					}
					
//				var_dump($path);
			}
			
			$this->display();
		}
	}
