<?php
namespace Industry\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;

class ForumController extends IndustryBaseController {
        protected $Page_Size=20;
        public function index(){
        $threads_new=D('Admin/Creativity')->where(array('isdelete'=>0,'pass'=>1))->select();
        foreach($threads_new as $key=>$value){
              $threads_new[$key]['username']=D('Admin/Member')->where(array('userid'=>$value['userid']))->getField('username');
        }
        $this->assign('threads_new', $threads_new);
		$this->display();
        }
        
	  

      public function list_notice(){
          $this->display();
      }

	public function add(){
        $data=$_POST;
        if(empty($data['userid'])){
           $this->error('请先登录',U('Industry/Public/Login'));
        }else{
            D('Admin/Creativity')->create($data);
            D('Admin/Creativity')->add();
            $this->success('添加成功',U('Industry/Forum/index'));
        }
      

    }

    public function show(){
        $id=I('id');
        $data=D('Admin/Creativity')->where(array('id'=>$id))->find();
        $data['username']=D('Admin/Member')->where(array('userid'=>$data['userid']))->getField('username');
        $message=D('Admin/Creativity')->where(array('isdelete'=>0,'pass'=>1))->select();
        D('Admin/Creativity')->where(array('id'=>$id))->setInc('click_num',1);
        //var_dump($data);exit;
        $this->assign('data',$data);
        $this->assign('message',$message);
        $this->display();
    }

    public function lists(){
         //echo 123;
         $pagenum = I('get.page','1','');
		$where['isdelete']=0;
        $where['pass']=1;
        $count=D('Admin/Creativity')->where($where)->count();
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data=D('Admin/Creativity')->where($where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
        $info=D('Admin/Creativity')->where($where)->order('click_num desc')->limit(10)->select();
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('info',$info);
		$this->assign('pageinfo',$pageinfo);
        $this->display();
    }
   
   
}