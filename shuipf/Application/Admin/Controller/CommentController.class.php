<?php
//评论
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;
use Admin\Model\AreaModel;
class CommentController extends AdminBase{
     protected $Page_Size=20;
	public function commentlists(){
        $where['isdelete']=0;
        $where['author_id']=User::getInstance()->id;
        $count=D('Admin/Comment')->where($where)->select();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data=D('Admin/Comment')->where($where)->page($pagenum.','.$this->Page_Size)->select();
		foreach ($data as $key => $value) {
			$data[$key]['title']=D('Admin/Active')->where(array('id'=>$value['show_id']))->getField('content_title');
			$data[$key]['commentname']=D('Admin/Member')->where(array('userid'=>$value['userid']))->getField('username');
		}
		//echo D('Admin/Comment')->getLastsql();exit;
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
		$this->assign('pageinfo',$pageinfo);
		$this->display();
	}

	public function commentdelete(){
		$id=I('id');
		$result=D('Admin/Comment')->where(array('id'=>$id))->setField('isdelete',"1");
		if($result){
           $this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function commentedit(){
		$id=I('id');
        
		if(IS_POST){
		  $id=I('id');
		  $data =$_POST;
         D('Admin/Comment')->create($data);
		  D('Admin/Comment')->where(array('id'=>$id))->save();
           $this->success('修改成功!',U('commentlists'));
		}else{

	    $data=D('Admin/Comment')->where(array('id'=>$id))->find();
	   // echo D('Admin/Comment')->getLastsql();exit;
	    $data['title']=D('Admin/Active')->where(array('id'=>$data['show_id']))->getField('content_title');
	    $data['commentname']=D('Admin/Member')->where(array('userid'=>$data['userid']))->getField('username');
	    $data['publish_content']= htmlspecialchars_decode($data['publish_content']);
	    $this->assign('data',$data);		
		  $this->display();
		}
	}
}