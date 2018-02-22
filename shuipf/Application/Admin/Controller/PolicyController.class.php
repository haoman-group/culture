<?php

//文化政策
namespace Admin\Controller;

use Common\Controller\AdminBase;
use Admin\Service\User;
use Admin\Model\ArtCategoryModel;
class PolicyController extends AdminBase{
     
    protected $Page_Size=15; 
    protected $page_size=15;
    protected $policymodel=NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->policy=D("Admin/PolicyCulture");
        $this->Category = D('Admin/ArtCategory');
        $result = D('Admin/ArtCategory')->getCategory(ArtCategoryModel::TYPE_POLICY);
		$this->assign('result', $result);
        $this->assign('AuditStatus',\Admin\Controller\AuditController::$auditStatus);
    }

    //资源采集->文化政策
	public function index(){
		 $parent_cid=I('get.parent_cid',null);
		// echo  $parent_cid;
		$publish_name=I('get.publish_name',null);
		 $art_cid=I('get.art_cid',null);
         $auditstatus=I('auditstatus',null);
         if($auditstatus){
           $this->where['auditstatus']=$auditstatus;
         }
		 if($publish_name){
            $this->where['publish_name']=array('like',"%".$publish_name."%");
		 }
       if($parent_cid && $art_cid == 0){
			$is_parent=D('Admin/ArtCategory')->where(array('cid'=>I('parent_cid')))->getField('is_parent');
			if($is_parent == 1){
               $art_cid=D('Admin/ArtCategory')->where(array('parent_cid'=>I('parent_cid')))->getField('cid',true);
                $art_cid=implode(',',$art_cid);
                $this->where['art_cid'] = array('in', $art_cid);
			}else{
				$art_cid=$parent_cid;
				$this->where['art_cid'] = array('in', $art_cid);
			}
       }elseif($art_cid){
            $this->where['art_cid'] = array('in', $art_cid);
       }
	   //var_dump($this->where);
        $pagenum = I('get.page','1','');
		$this->where['isdelete']=0;
		$count=$this->policy->where($this->where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		//$this->collectionModel->where(array('uid'=>$uid,'isdelete'=>0,'itemid'=>array('neq','0'),'type'=>1))->page($pagenum.','.$this->Page_Size)->order($order)->getField('itemid',true);
		$data=$this->policy->where($this->where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
		foreach ($data as $key => $value) {
			$data[$key]['categoryname']=M("ArtCategory")->where(array('cid'=>$value['art_cid']))->getField("name");
			if($value['auditstatus'] == '40'){
                $data[$key]['reason'] = D('Admin/Audit')->where(['category'=>'Policy','cid'=>$value['id'],'auditstatus'=>40])->order('id_au desc')->limit(1)->getField('reason');
            }
		}
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
		$this->display();
	}
    //资源检索->文化政策
	public function search(){
		// $search = I('get.search','');
		 $this->where['area']=array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']));
		if(IS_AJAX){
			$pagenum = I('get.page','1','');
			if(!empty(I('start_time')) or !empty(I('end_time'))) {
				$where_start_time = !empty(I('start_time')) ? I('start_time')." 00:00:00": '1900-01-01 00:00:00';
				$where_end_time = !empty(I('end_time')) ? I('end_time')." 23:59:59" : date('Y-m-d 23:59:59', time());
				$this->where['addtime'] = array('between', array($where_start_time, $where_end_time));
			}
			$this->where['isdelete']=0;
			$cid = I('art_cid');
			$childCidList = D('Admin/ArtCategory')->getRecursiveChildCidList($cid);
			empty(I('art_cid')) ? NULL : $this->where['art_cid'] = array('in', array_merge(array($cid), $childCidList));
			empty(I('publish_agency'))?NULL:$this->where['publish_agency']=array("like",'%'.I('publish_agency').'%');

			empty(I('publish_name'))?NULL:$this->where['publish_name']=array("like",'%'.I('publish_name').'%');
			empty(I('publish_order'))?NULL:$this->where['publish_order']=array("like",'%'.I('publish_order').'%');
			empty(I('publish_topword'))?NULL:$this->where['publish_topword']=array("like",'%'.I('publish_topword').'%');
			//var_dump($this->where);
			$count=$this->policy->where($this->where)->count();
			
			$page = new \Libs\Util\Page($count,$this->page_size,$pagenum);
			$page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
			//$this->collectionModel->where(array('uid'=>$uid,'isdelete'=>0,'itemid'=>array('neq','0'),'type'=>1))->page($pagenum.','.$this->Page_Size)->order($order)->getField('itemid',true);
			$data['list']=$this->policy->where($this->where)->page($pagenum.','.$this->page_size)->order('publish_date desc')->select();
			foreach ($data['list'] as $key => $value) {
				$data['list'][$key]['categoryname']=M("ArtCategory")->where(array('cid'=>$value['art_cid']))->getField("name");
			}

			$pageinfo["page"] = $page->show('sellercenter');
			$pageinfo['count'] = $count;
			$data['pageinfo']=$pageinfo;
            $this->ajaxReturn(array('data'=>$data,'status'=>1));
			// $this->assign('data',$data);
			// $this->assign('pageinfo',$pageinfo);
			// $this->display();
		}else{
			$pagenum = I('get.page','1','');
			$this->where['isdelete']=0;
			//var_dump($this->where);
			$count=$this->policy->where($this->where)->count();
			$page = new \Libs\Util\Page($count,$this->page_size,$pagenum);
			$page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
			//$this->collectionModel->where(array('uid'=>$uid,'isdelete'=>0,'itemid'=>array('neq','0'),'type'=>1))->page($pagenum.','.$this->Page_Size)->order($order)->getField('itemid',true);
			$data=$this->policy->where($this->where)->page($pagenum.','.$this->page_size)->order('publish_date desc')->select();
			foreach ($data as $key => $value) {
				$data[$key]['categoryname']=M("ArtCategory")->where(array('cid'=>$value['art_cid']))->getField("name");
			}
			$pageinfo["page"] = $page->show('sellercenter');
			$pageinfo['count'] = $count;
			$this->assign('data',$data);
			$this->assign('pageinfo',$pageinfo);
			$this->display();
		
			
		}
       
	}

	public function add(){
         if(IS_POST){
			//  var_dump($_POST);exit;
			if(!$this->policy->create($_POST)){
				$this->error($this->policy->getError());
			}else{
				$this->policy->add();
				$this->success('添加成功!',U('index'));
			}
		
			
		}else{
			$category = D('Admin/ArtCategory')->getCategory(ArtCategoryModel::TYPE_POLICY);
            $data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $this->assign('category', $category);
            $this->assign('data',$data);
            $this->display();
	}
}

	public function delete(){
		$where['id']=I('id');
		$re=$this->policy->where($where)->setField('isdelete',1);
		if($re){
          $this->success("删除成功");
		}else{
			$this->error("删除失败");
		}

	}

	public function edit(){
		
		$id=I('id');
         if(IS_POST){
			  if(empty($_POST['if_resources'])){
                $_POST['if_resources']=0;
            }else{
                $_POST['if_resources']=1;
            }
           if($this->policy->create($_POST)){
          		$this->policy->where(array('id'=>$id))->save();
           		$this->success('修改成功!',U('index'));
		   }else{
			   $this->error($this->policy->getError());
		   }
          }else{
		   $data = D("Admin/PolicyCulture")->where(array('id'=>$id))->find();
		   $data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
		   $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
		   $data['parent_artcid']=D('Admin/ArtCategory')->getparent($data['art_cid']);
		   if($data['auditstatus'] == '40'){
                $data['reason'] = D('Admin/Audit')->where(['category'=>'Policy','cid'=>$id,'auditstatus'=>40])->order('id_au desc')->limit(1)->getField('reason');
            }
		   $this->assign('data',$data);	
   	       $this->display();
		 }
	}
	public function show(){
		$id = I('get.id','');
		$data = $this->policy->where(array('id'=>$id))->find();
		$data['categoryname']=M("ArtCategory")->where(array('cid'=>$data['art_cid']))->getField("name");
		$this->assign('data',$data);
		$this->display();
	}
}
?>