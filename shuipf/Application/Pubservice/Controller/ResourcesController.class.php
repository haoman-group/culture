<?php

//文化资源
namespace Pubservice\Controller;
use Common\Controller\Base;
use Admin\Service\User;
use Think\Controller;
use Pubservice\Controller\PubBaseController;
class ResourcesController extends PubBaseController {
     protected $Page_Size = 10;
      protected $page_size = 20;
    protected function _initialize(){
        parent::_initialize();
         $userInfo = User::getInstance()->getInfo();
         $this->assign('userInfo', $userInfo);
         $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
    }
	//面包屑导航
    protected function _Get_breadcrumb($cid = '',$breadcrumb=null)
    {
        if (empty($cid) || $cid == '') {
            return false;
        }
        $category = D('Admin/ArtCategory')->where(array('cid' => $cid, 'isdelete' => 0))->find();
        if ($category['parent_cid'] === '0') {
            $current_cate = "<a href='".U('Pubservice/Resources/index')."'>" . $category['name'] . "</a>";
        } else {
            if($breadcrumb){
                $current_cate = "<a href='".U('Pubservice/Resources/lists',['cid'=>$cid])."'>" . $category['name'] . "</a>";
            }else{
                $current_cate = "<a href='###'>" . $category['name'] . "</a>";
            }
        }

        $breadcrumb = $current_cate . ">" . $breadcrumb;
        if ($category['parent_cid'] != '0') {
            $breadcrumb = $this->_Get_breadcrumb($category['parent_cid'],$breadcrumb);
        }
        return $breadcrumb;
    }
    public function index(){
        $where['cid']=array('in','2,3,4,5,6');
        $data=D('Admin/ArtCategory')->scope('normal')->where($where)->select();
       
        foreach ($data as $key => $value) {
            $data[$key]['child']=D('Admin/ArtCategory')->scope('normal')->where(array('parent_cid'=>$value['cid']))->order("listorder asc,cid asc ")->select();
        }
        array_unshift($data,$data[4]);
        array_pop($data);
       // var_dump($data);exit;
        $this->assign('data',$data);
        $this->display();
    }
    //文化艺术列表
    public function lists(){
        $cid=I('get.cid');
        $data=D('Admin/ArtCategory')->scope('normal')->where(array('cid'=>$cid))->find();
        
        if($cid ==43 ){ 
            $data['category']=D('Admin/Library')->where(array('isdelete'=>0,'auditstatus'=>35))->order("id asc ")->select();
            foreach ($data['category'] as $key => $value) {
                $data['category'][$key]['tabname']='Library';
            }

        }elseif($cid ==44){
            $data['category']=D('Admin/Comartcenter')->where(array('isdelete'=>0,'auditstatus'=>35))->order("id asc ")->select();
            foreach ($data['category'] as $key => $value) {
                $data['category'][$key]['tabname']='Comartcenter';
            }
        }elseif($cid ==346){
            $data['category']= D('Admin/Theatre')->where(array('isdelete'=>0))->order("id asc ")->select();

        }elseif(in_array($cid,['174','175','176','177','178','179'])){//文化政策
            $this->redirect('policylists',['cid'=>$cid]);
        }elseif(in_array($cid,['75','231','232','241'])){//非遗
            $this->redirect('immlists',['cid'=>$cid]);
        }elseif(in_array($cid,['119','120','121','122','123'])){
            $this->redirect('industrylists',['cid'=>$cid]);
        }else{
            $data['category']=D('Admin/ArtCategory')->scope('normal')->where(array('isdelete'=>0,'parent_cid'=>$cid))->order("listorder asc,cid asc ")->select();
           
            foreach($data['category'] as $index=>$cate){
                $data['category'][$index]['child']=D('Admin/ArtCategory')->scope('normal')->where(array('isdelete'=>0,'parent_cid'=>$cate['cid']))->order("listorder asc,cid asc ")->select();
            }
        }
        //var_dump($data);exit;
         $this->assign("data",$data);
    	$this->display();
    }
    //非遗分类列表
    public function immlists(){
        $cid = I('get.cid');
        $data=D('Admin/ArtCategory')->scope('normal')->where(array('cid'=>$cid,'isdelete'=>0))->find();
        $data['category'] = D('Admin/ArtCategory')->scope('normal')->where(array('parent_cid'=>$cid,'isdelete'=>0))->select();
        $this->assign("data",$data);
        if($cid == '75'){
            $this->display('immlists75');
        }else{
            $this->display();
        }
    }
    //非遗内容列表
    public function immparent(){
        $cid = I('get.cid');
        $re_represen = I('get.re_represen',null);
        $where = [];
        $where['art_cid']=$cid;
        $where['isdelete']=0;
        $where['if_resources']=1;
        if(!empty($re_represen)){
            $where['re_represen'] = $re_represen;
        }
        $data=D('Admin/ArtCategory')->scope('normal')->where(array('cid'=>$cid,'isdelete'=>0))->find();
        $data['category'] = D('Admin/Immaterial')->scope('normal')->where($where)->select();
        $this->assign('data',$data);
        $this->display();
    }
    //非遗详情页
    public function immshow(){
        $id = I('get.id');
        $data = D('Admin/Immaterial')->scope('normal')->where(['id'=>$id])->find();
        $this->assign("data",$data);
        $this->display();
    }
    //产业分类列表
    public function industryparent(){
        $pagenum = I('get.page', '1', '');
        $cid = I('get.cid');
        $data=D('Admin/ArtCategory')->scope('normal')->where(array('cid'=>$cid,'isdelete'=>0))->find();
        $count= D('Admin/Industry')->scope('normal')->where(['art_cid'=>$cid],['if_resources'=>1])->order('id desc')->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data['category'] = D('Admin/Industry')->scope('normal')->where(['art_cid'=>$cid],['if_resources'=>1])->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
         //var_dump($page);
        $this->assign('data',$data);
        $pageinfo["page"] = $page->show('sellercenter');
      
        $pageinfo['count'] = $count;
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }
    //产业内容列表
    public function industrylists(){
         
        $cid = I('get.cid');
        $data=D('Admin/ArtCategory')->scope('normal')->where(array('cid'=>$cid,'isdelete'=>0))->find();
        $data['category'] = D('Admin/ArtCategory')->scope('normal')->where(array('parent_cid'=>$cid,'isdelete'=>0))->select();
        $this->assign("data",$data);
        $this->display();
    }
    //产业内容列表
    public function industryshow(){
        $id = I('get.id');
        $data = D('Admin/Industry')->scope('normal')->where(['id'=>$id])->find();
        $data['acrobatics_picture_url'] =explode(',',$data['acrobatics_picture_url']);
        $this->assign("breadcrumb",$this->_Get_breadcrumb($data['art_cid']));
        $this->assign("data",$data);
        $this->display();
    }
    //政策法规列表
    public function policylists(){
         $pagenum = I('get.page', '1', '');
        $cid = I('get.cid');
        $data=D('Admin/ArtCategory')->scope('normal')->where(array('cid'=>$cid,'isdelete'=>0))->find();
        if($data['is_parent'] == 1){
           $cidinfo=D('Admin/ArtCategory')->where(array('parent_cid'=>$cid))->getField('cid',true);
           $cidinfo=implode(",",$cidinfo);
           $count=  D('Admin/PolicyCulture')->scope('normal')->where(array('art_cid'=>array('in',$cidinfo),'if_resources'=>1))->count();
          $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
          $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
           $data['category'] = D('Admin/PolicyCulture')->scope('normal')->where(array('art_cid'=>array('in',$cidinfo),'if_resources'=>1))->page($pagenum . ',' . $this->page_size)->select();
           // echo D('Admin/PolicyCulture')->getLastsql();
        }else{
          $count=  D('Admin/PolicyCulture')->scope('normal')->where(['art_cid'=>$cid],['if_resources'=>1])->count();
          $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
          $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));    
        $data['category'] = D('Admin/PolicyCulture')->scope('normal')->where(['art_cid'=>$cid],['if_resources'=>1])->page($pagenum . ',' . $this->page_size)->select();
        }
        //echo D('Admin/PolicyCulture')->getLastsql();
       // var_dump($data);exit;
       $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('pageinfo', $pageinfo);
        $this->assign("data",$data);
        $this->display();
    }
    //政策法规详情页
    public function policyshow(){
        $id = I('get.id');
        $data = D('Admin/PolicyCulture')->scope('normal')->where(['id'=>$id])->find();
        $this->assign("data",$data);
        $this->display();
    }
    //文化艺术内容列表页
    public function parentlists(){
         $cid=I('get.cid');
        
        $data=D('Admin/ArtCategory')->scope('normal')->where(array('cid'=>$cid,'isdelete'=>0))->find();
      
        $data['category']=D('Admin/ArtCategory')->scope('normal')->where(array('parent_cid'=>$cid,'isdelete'=>0,'if_resources'=>1))->select();
        //echo D('Admin/ArtCategory')->scope('normal')->getLastsql();
       //var_dump($data);exit;
        if($data['category'] == NULL){
            
               $data['category1']=D('Admin/ReCulture')->where(array('art_cid'=>$cid,'isdelete'=>0,'auditstatus'=>35,'if_resources'=>1))->select();
           if( $data['category1'] == NULL){
               $data['category1']=D('Admin/ReCulture')->where(array('drama'=>$cid,'isdelete'=>0,'auditstatus'=>35,'if_resources'=>1))->select();
           }
            
             
        }else{

        }
        foreach ($data['category'] as $key => $value) {
            $data['category'][$key]['picture']=explode(",",$value['picture']);
        }
         foreach ($data['category1'] as $k => $v) {
            $data['category1'][$k]['image']=explode(",",$v['image']);
        }
       // var_dump($data);exit;
        $this->assign("data",$data);
        $this->display();
        

    }

    public function showlists(){
        $cid=I('get.cid');
        $data=D('Admin/ArtCategory')->scope('normal')->where(array('cid'=>$cid,'isdelete'=>0))->find();
        $lists=D('Admin/ReCulture')->where(array('drama'=>$cid,'isdelete'=>0,'auditstatus'=>35))->select();

        foreach ($lists as $key => $value) {
            $lists[$key]['image']=explode(",",$value['image']);
        }

        $this->assign("data",$data);
        $this->assign('lists',$lists);
        $this->display();
    }

    public function show(){
        $id=I('id');
        $data=D('Admin/ReCulture')->where(array('id'=>$id))->find();
        $this->assign('data',$data);
        $this->display();
    }

    public function theatreshow(){
        $id=I('id');
        $data=D('Admin/Theatre')->where(array('id'=>$id))->find();
        $data['drama_picture_url']=explode(",",$data['drama_picture_url']);
        $this->assign('data',$data);
        $this->display();
    }
}