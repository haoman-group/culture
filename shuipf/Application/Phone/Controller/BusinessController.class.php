<?php
	namespace Phone\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;

	class BusinessController extends Base{
        protected $Page_size=20;
		public function _initialize(){
		parent::_initialize();
		$this->model = M("BusinessAlliance");
        // $this->addressmodel = M('city');
        

    }
		public function index(){
		 $userinfo = service("Passport")->getInfo();	
		if( $userinfo['userid']){
        $this->display();

    }else{
         $this->error("请你先登录",U('Phone/User/login'));
    }
		}
		public function do_business_alliance(){
				if(IS_POST){
		            $data= I("post.");
					$address=M('area')->where(array("id"=>$_POST['area']))->find();
					// var_dump($_POST['survey']);die;
					$address=$address['name'];
					$_POST['city']=$address;
                    //var_dump($_FILES['photo']);exit;
		            if($_FILES['photo']){
		            	$_POST['photo'] = self::img($_FILES['photo']);//所上传图片路径
	            }else{
		            	 $this->error('请选择上传图片');
		            }
				if(empty($_POST['name'])){
					$this->error('请填写企业名称');
				}
            	if(empty($_POST['city'])){
               		 $this->error('请选择企业所在地');
            	}
				if(empty($_POST['registered'])){
					$this->error('请填写注册资本');
				}
				if(empty($_POST['adress'])){
					$this->error('请填写企业地址');
				}
				if(empty($_POST['legal_person'])){
					$this->error('请填写法人代表');
				}
				if(empty($_POST['linkman'])){
					$this->error('请填写联系人');
				}
 				$preg = '/^((0\d{2,3}-\d{7,8})|(1[3584]\d{9}))$/';
	        		if(!preg_match($preg,$_POST['telephone'])){
	            		$this->error('请填写正确的联系方式');
	        		}
				if(empty($_POST['email'])){
					$this->error('请填写联系人邮箱');
				}
				if(empty($_POST['turnover'])){
					$this->error('请填写年营业额');
				}	
				if($_POST['company_type']=='请选择'){
					$this->error('请选择公司注册类型');
				}
				if($_POST['industry']=='请选择'){
					$this->error('请选择所属类型');
				}	
				if(empty($_POST['range'])){
					$this->error('请填写经营范围');
				}	
				if(empty($_POST['introduce'])){
					$this->error('请填写产品介绍');
				}
				if(empty($_POST['company_content'])){
					$this->error('请填写企业概况');
				}
				if(empty($_POST['survey'])){
					$this->error('请编辑展示页面');
				}																														
					//$data = $_POST;
					$credit=D("Content/Business");
		            if( !($res = $credit -> join() ) ){
		                $this->error('新增失败');
		            }else{
		                $this->success('新增成功',U('Phone/Business/lists'));
		            }
		        }			
		}

        public function lists(){
        $where['pass']=0;
        $pagenum = I('get.page', '1', '');
        $count =  $this->model->where($where)->count();
         $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
         $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Consume/lists/page/*'));
        $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
       $pageinfo["page"] = $page->show('sellercenter');
       $pageinfo['count'] = $count;
        $this->assign(compact('data','pageinfo'));
        $this->display();
           
        }
		public function show(){
			
			$id = I('get.id',0,'intval');
			$data  = D('Content/Business')->where(array('id'=>$id))->find();
			//var_dump($data);
			$this->assign('data',$data);
			$this->display();
		}

	//上传图片
		public function img($img = ""){
			         $upload = new \UploadFile();// 实例化上传类  
					 $upload->maxSize   =     3145728 ;// 设置附件上传大小  
					 $upload->allowExts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
					 $upload->savePath  =      './d/file/logo/'; // 设置附件上传目录    // 上传文件   
                     $info   =$upload->uploadOne($img); 	
   					if(!$info) {// 上传错误提示错误信息      
					    $this->error($upload->getErrorMsg());    
				        return;
						}else{// 上传成功      
						$path = $info[0]['savepath'].$info[0]['savename'];
						return $path;  
					 }
		}
	}
