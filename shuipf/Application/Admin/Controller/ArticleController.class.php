<?php
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;
use Admin\Model\AreaModel;
class ArticleController extends AdminBase{
	    protected $Page_Size=20;
        protected function _initialize() {
        parent::_initialize();
         $this->Category=D('Admin/ArtCategory');
         $this->ReCulture=D('Admin/ReCulture');
		 
         $this->assign('maxPicNum', 1);
         $this->assign('maxVideoNum', 1);
    }

    private function _procData() {
        $data = I('post.');
        if ($data['form_cid'] == "tianjia" && $data['drama_video'] != ""){
            $data['video'] = implode(',', $data['drama_video']);
            $data['video_title'] = implode('|', $data['drama_video_title']);
            return $data;
     }
 }

	public function lists(){
	  $pagenum = I('get.page','1','');	
	  $where=array();
	  $where['isdelete']=0;
	  $rand=array('193','194','211','212','213');
	  $where['art_cid']=array('in',$rand);
	  $where['parent_id']=0;
	  $count=D('Admin/Active')->where($where)->select();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data=D('Admin/Active')->where($where)->page($pagenum.','.$this->Page_Size)->select();

		foreach ($data as $key => $value) {
			$data[$key]['activecategory']=$this->getcategory($value['art_cid']);
			$data[$key]['category']=D('Admin/ArtCategory')->where(array('cid'=>$value['art_cid']))->getField('name');
		}
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
		$this->assign('pageinfo',$pageinfo);	
      $this->display();
	}

	public function getcategory($cid){
		$where=array();
		$where['isdelete']=0;
		$where['cid']=$cid;
		$activecategory=D('Admin/ArtCategory')->where($where)->find();
		$category=D('Admin/ArtCategory')->where(array('cid'=>$activecategory['parent_cid']))->getField('name');
        return $category; 
	}
	public function articlelists(){
		$pagenum = I('get.page','1','');
		$where=array();
		$where['isdelete']=0;
		$where['parent_id']=I('parent_id');
		$count=D('Admin/Active')->where($where)->select();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data=D('Admin/Active')->where($where)->page($pagenum.','.$this->Page_Size)->select(); 
		// echo D('Admin/Active')->getLastsql();exit;
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
		$this->assign('pageinfo',$pageinfo);
		$this->display();
	}

	public function add(){
            if(IS_POST){
			   $data =  $this->_procData();
			if(D('Admin/Active')->create($data)){
				D('Admin/Active')->add();
				$this->success('添加成功!',U('articlelists'));
			}else{
				$this->error(D('Admin/Active')->getError());
			}
		}else{
			$this->display();
		}
	}

	public function edit(){
		$id=I('id');
		if(IS_POST){
		  $id=I('id');
		  $data =  $this->_procData();

          D('Admin/Active')->create($data);
		  D('Admin/Active')->where(array('id'=>$id))->save();
           $this->success('修改成功!',U('articlelists',array('parent_id'=>I('parent_id'))));
		}else{
	    $data=D('Admin/Active')->where(array('id'=>$id))->find();
	    $data['publish_content']= htmlspecialchars_decode($data['publish_content']);
	  
	    $this->assign('picture_urls',explode(",",$data['image']));
	    $this->assign('data',$data);		
		$this->display();
		}

		
	}

	public function delete(){
		$id=I('id');
		$re=D('Admin/Active')->where(array('id'=>$id))->setField('isdelete',1);
		$this->success('删除成功',U('articlelists',array('parent_id'=>I('parent_id'))));
	}
}