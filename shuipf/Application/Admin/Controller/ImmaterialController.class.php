<?php
//非物质文化遗产
namespace Admin\Controller;

use Common\Controller\AdminBase;
use Admin\Service\User;
use Admin\Model\ArtCategoryModel;

class ImmaterialController extends AdminBase{
	protected $Page_Size=20;
	protected $page_size=20;
	
	protected $Immaterial= null;
	protected function _initialize() {
        parent::_initialize();
        $result = D('Admin/ArtCategory')->getCategory(ArtCategoryModel::TYPE_IMMATERIAL);
       //var_dump($result);exit;
	    $this->Category = D('Admin/ArtCategory');
        $this->Immaterial=D('Admin/Immaterial');
         $this->assign('result', $result);
        $this->assign('AuditStatus',\Admin\Controller\AuditController::$auditStatus);
		$this->assign('maxPicNum',10);
    }

    //资源采集->非物质文化遗产
	public function index(){
		 $parent_cid=I('get.parent_cid',null);
		 $art_cid=I('get.art_cid',null);
         $auditstatus=I('auditstatus',null);
         if($auditstatus){
           $this->where['auditstatus']=$auditstatus;
         }
       if($parent_cid && $art_cid == 0){
           $art_cid=D('Admin/ArtCategory')->where(array('parent_cid'=>I('parent_cid')))->getField('cid',true);
                $art_cid=implode(',',$art_cid);
                $this->where['art_cid'] = array('in', $art_cid);
       }elseif($art_cid){
            $this->where['art_cid'] = array('in', $art_cid);
       }
	    $re_projectname=I('re_projectname',null);
         if($re_projectname){
         $this->where['re_projectname']=array("like", '%' .$re_projectname . '%');
         }
		$pagenum = I('get.page','1','');
		$author = I('get.author','mine');
		if($author && $author == 'mine'){
			$this->where['author_id'] = (int) User::getInstance()->isLogin();
		}
		$this->where['isdelete']=0;
		//var_dump($this->where);
        $count=$this->Immaterial->where($this->where)->count();
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data=$this->Immaterial->where($this->where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
		//echo$this->Immaterial->getLastsql();exit;
		foreach ($data as $key => $value) {
			$data[$key]['categoryname']=M("ArtCategory")->where(array('cid'=>$value['art_cid']))->getField('name');
		}

		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
		$this->assign('pageinfo',$pageinfo);
		$this->display();
	}
    
	public function add(){
		if(IS_POST){
			//var_dump($_POST);exit;
			$_POST['level'] = ($_POST['art_cid']>84 && $_POST['art_cid']<95)?$_POST['level']:'';
			$_POST['re_represen'] = ($_POST['art_cid']>84 && $_POST['art_cid']<95)?$_POST['re_represen']:'';
			if($this->Immaterial->create($_POST)){
				$this->Immaterial->add();
				$this->success('添加成功!',U('index'));
			}else{
				$this->error($this->Immaterial->getError());
			}
		}else{
			$category=D('Admin/ArtCategory')->getCategory(ArtCategoryModel::TYPE_IMMATERIAL);
			$data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
			$data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
			$this->assign('category',$category);
			$this->assign('data',$data);
			$this->display();
		}
	}
	public function edit(){
		$id=I('id');
         
         if(IS_POST){
			// $_POST['level'] = ($_POST['art_cid']>84 && $_POST['art_cid']<95)?$_POST['level']:'';
			$_POST['re_represen'] = ($_POST['art_cid']>84 && $_POST['art_cid']<95)?$_POST['re_represen']:'';
			 if(empty($_POST['if_resources'])){
                $_POST['if_resources']=0;
            }else{
                $_POST['if_resources']=1;
            }
          D('Admin/Immaterial')->create($_POST);
		  D('Admin/Immaterial')->where(array('id'=>$id))->save();
		  
           $this->success('修改成功!',U('index'));
          }else{
		$data = $this->Immaterial->where(array('id'=>$id))->find();
		//var_dump($data);exit;
		$data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
		$data['parent_artcid']=D('Admin/ArtCategory')->getparent($data['art_cid']);
		$data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
		$data['image']=unserialize($data['image']);
		$data['categoryname']=M("ArtCategory")->where(array('cid'=>$data['art_cid']))->getField('name');
		$this->assign('data',$data);
   	    $this->display();
	}
}
	public function del(){
		$id = I('get.id','');
		$this->Immaterial->where(array('id'=>$id))->setField('isdelete','1');
		$this->success('删除成功!');
	}

	//资源检索->非物质文化遗产
	public function search(){

	$search = I('get.search','');

		if($search =="1"){

			$pagenum = I('get.page','1','');
			$where_start_time = !empty(I('start_time')) ? I('start_time') : '';
			$where_end_time = !empty(I('end_time')) ? I('end_time') : date('Y-m-d', time());
		
			if ($where_start_time > $where_end_time) {
					$tmp = $where_start_time;
					$where_start_time = $where_end_time;
					$where_end_time = $tmp;
					$tmptime = $start_time;
					$start_time = $end_time;
					$end_time = $tmptime;
					unset($tmp, $tmptime);
				}
				if($where_start_time){
				$this->where['addtime']=array('between', array($where_start_time, $where_end_time));
			}
			$this->where['isdelete']=0;
			 $cid = I('art_cid');
			
            $childCidList = D('Admin/ArtCategory')->getRecursiveChildCidList($cid);
            //var_dump($_GET);exit;
            empty(I('art_cid')) ? NULL : $this->where['art_cid'] = array('in', array_merge(array($cid), $childCidList));
			empty(I('re_represen'))?NULL:$this->where['re_represen']=I('re_represen');
			//empty(I('area')) ? NULL : $this->where['area'] = array('between', D('Admin/Area')->getIDSpan(I('area')));
			empty(I('level'))?NULL:$this->where['level']=I('level');
			empty(I('re_projectname'))?NULL:$this->where['re_projectname']=array("like",'%'.I('re_projectname').'%');
			empty(I('re_batch'))?NULL:$this->where['re_batch']=array("like",'%'.I('re_batch').'%');
			empty(I('prot_projects'))?NULL:$this->where['prot_projects']=array('like','%'.I('prot_projects').'%');
			empty(I('ba_name'))?NULL:$this->where['ba_name']=array('like','%'.I('ba_name').'%');
			empty(I('me_plan'))?NULL:$this->where['me_plan']=array('like','%'.I('me_plan').'%');
			empty(I('me_manual'))?NULL:$this->where['me_manual']=array('like','%'.I('me_manual').'%');
			empty(I('me_list'))?NULL:$this->where['me_list']=array('like','%'.I('me_list').'%');
			empty(I('me_more'))?NULL:$this->where['me_more']=array('like','%'.I('me_more').'%');
			empty(I('me_typical'))?NULL:$this->where['me_typical']=array('like','%'.I('me_typical').'%');
			empty(I('me_exchange'))?NULL:$this->where['me_exchange']=array('like','%'.I('me_exchange').'%');
			empty(I('me_media'))?NULL:$this->where['me_media']=array('like','%'.I('me_media').'%');
            empty(I('sh_name'))?NULL:$this->where['sh_name']=array('like','%'.I('sh_name').'%');
            empty(I('sh_situation'))?NULL:$this->where['sh_situation']=array('like','%'.I('sh_situation').'%');
            empty(I('sh_content'))?NULL:$this->where['sh_content']=array('like','%'.I('sh_content').'%');
            empty(I('sh_key'))?NULL:$this->where['sh_key']=array('like','%'.I('sh_key').'%'); 
            empty(I('sh_actcontent'))?NULL:$this->where['sh_actcontent']=array('like','%'.I('sh_actcontent').'%');
			$count=$this->Immaterial->where($this->where)->count();
			$page = new \Libs\Util\Page($count,$this->page_size,$pagenum);
			$page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
			$data['list']=$this->Immaterial->where($this->where)->page($pagenum.','.$this->page_size)->order('id desc')->select();
			//echo $this->Immaterial->getLastsql();exit;
			foreach ($data['list'] as $key => $value) {
				$data['list'][$key]['categoryname']=M("ArtCategory")->where(array('cid'=>$value['art_cid']))->getField('name');
                $data['list'][$key]['parent_artcid']=D('Admin/ArtCategory')->getparent($value['art_cid']);
			}
			$category=D('Admin/ArtCategory')->getCategory(ArtCategoryModel::TYPE_IMMATERIAL);
            $lists=$data;
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);

			$pageinfo["page"] = $page->show('sellercenter');
			$pageinfo['count'] = $count;
			$this->assign('data',$data);
           // $this->assign('lists',$lists);
			$this->assign('category',$category);
			$this->assign('pageinfo',$pageinfo);
			$this->display();
		}else{
			$pagenum = I('get.page','1','');
			$category=D('Admin/ArtCategory')->getCategory(ArtCategoryModel::TYPE_IMMATERIAL);
			
			$this->where['isdelete']=0;
			$this->where['area']=array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']));
			$count=$this->Immaterial->where($this->where)->count();
			$page = new \Libs\Util\Page($count,$this->page_size,$pagenum);
			//var_dump($page);exit;
			$page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
			$data=array();
			$data['list']=$this->Immaterial->where($this->where)->page($pagenum.','.$this->page_size)->order('id desc')->select();

			foreach ($data['list'] as $key => $value) {
				$data['list'][$key]['categoryname']=M("ArtCategory")->where(array('cid'=>$value['art_cid']))->getField('name');
			}
	        //$lists=$data;
		    $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
			$pageinfo["page"] = $page->show('sellercenter');
			$pageinfo['count'] = $count;
			$this->assign('data',$data);
           // $this->assign('lists',$lists);
			$this->assign('category',$category);
			$this->assign('pageinfo',$pageinfo);
			$this->display();
		}
	}

	public function show(){
        $id = I('id','');
		$data = $this->Immaterial->where(array('id'=>$id))->find();
		$data['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['art_cid']);
		$data['categoryname']=M("ArtCategory")->where(array('cid'=>$data['art_cid']))->getField('name');
		$data['image']=unserialize($data['image']);
		// var_dump($data);
		$this->assign('data',$data);
		$this->display();
		
	}

	
}
?>
