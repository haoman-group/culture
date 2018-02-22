<?php
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Model\ArtCategoryModel;
use Admin\Service\User;
use Admin\Model\AreaModel;
class ContentController extends AdminBase{
        protected $Page_Size = 20;
         protected $Page_size = 20;
       protected $page_size = 20;  
       protected $Winpage_size=20;
      protected function _initialize()
    {
        parent::_initialize();
        //  $result = D('Admin/ArtCategory')->getCategory(ArtCategoryModel::POLICY);
        // echo D('Admin/ArtCategory')->getLastsql();exit;
        //   $this->assign('result', $result);
        $areaid=User::getInstance()->getInfo()['area'];
        $areaname=D('Admin/Area')->getFullAreaName($areaid);
         $this->assign('maxPicNum', 5);
          $this->assign('areaname', $areaname);
        
     }
   //咨询中心
    public function newslists(){
        $this->display();
    }
    //消费服务
    public function consumerlists(){

        $this->display();

    }
     //文化资源
    public function resourceslists(){
        
        
    }
     //政策法规
    public function policylists(){
        $pagenum = I('get.page', '1', '');
        $catid=M('Categorymore')->where(array('catid'=>12))->getField("arrchildid");
        $count =M('News')->where(array('catid'=>array('in',$catid)))->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = M('News')->where(array('catid'=>array('in',$catid)))->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['categoryname'] = M("Categorymore")->where(array('catid' => $value['catid']))->getField('catname');
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }
    //经融服务
    public function commerciallists(){
        $this->display();
    }

   // 咨询中心添加

   public function policyadd(){
       if(IS_POST){
         $data=$_POST;
         
          $data['thumb']=implode(',',$data['drama_picture_url']);
          $data['description']=$data['abstract'];
          $data['username']=D('Admin/User')->where(array('id'=>$data['member_id']))->getField('username');
        
          $data['inputtime']=time();
          $data['updatetime']=time();
          $news['content']=$data['publish_content'];
        
          //var_dump( $data);exit;
          if($data['parent_cid']!=='' && $data['cid']==''){
              $data['catid']=$data['parent_cid'];    
          }else{
              $data['catid']=$data['cid']; 
          }

           $re=D('Admin/News')->add($data);
           $id=M('News')->order('id desc')->limit(1)->getField('id');
           $update=M('News')->where(array('id'=>$id))->setField('url',"/index.php?a=shows&catid={$data['catid']}&id={$id}");
           $news['content']=$data['publish_content'];
           $news['id']=$id;
           $add=M('NewsData')->add($news);
           if($re){
               $this->success("添加成功",U('policylists'));
               
           }
       }else{
          $result=$this->getallchildlist("12");
           //var_dump($category);exit;
            $this->assign('result', $result);
            $this->display();
       }
      
   }

   public function getallchildlist($cid){
    //     $cid=I("cid");
      // var_dump($cid);
        $data['parent_item']=M('Categorymore')->where(array('catid'=> $cid,'ismenu'=>'1'))->find();
                         //echo M('Categorymore')->getLastsql();
            $data['child_list']=M('Categorymore')->where(array('parentid' => $data['parent_item']['catid'],'ismenu'=>'1'))->select();
       
        foreach( $data['child_list'] as $k=>$v){
            if($v['child']==1){
               $v['arrchildid']=explode(",",$v['arrchildid']);
               $v['arrchildid']=array_splice($v['arrchildid'],1);
              
               foreach($v['arrchildid'] as $a=>$b){
                  $data['child_list'][$k]['grandson_list'][$a]=M('Categorymore')->where(array('catid' => $b,'ismenu'=>'1'))->find();

               }
            }

        }
        return $data['child_list'];
       
    }


    public function policyedit(){
        $id=I('id');
        if(IS_POST){
          $data=$_POST; 
          $data['thumb']=implode(',',$data['drama_picture_url']);
          $data['description']=$data['abstract'];
          $data['username']=D('Admin/User')->where(array('id'=>$data['member_id']))->getField('username');
        
        //   $data['inputtime']=time();
          $data['updatetime']=time();
          $news['content']=$data['publish_content'];
        
          //var_dump( $data);
          if($data['parent_cid'] !=='27'){
              $data['catid']=$data['parent_cid'];    
          }else{
              $data['catid']=$data['cid']; 
          }
        // var_dump($data['catid']);exit;
          $result=M('News')->where(array('id'=>$data['id']))->save($data);
          //echo M('News')->getLastsql();exit;
          $re=M('NewsData')->where(array('id'=>$data['id']))->save($news);
          $this->success("修改成功",U('policylists'));
        }else{
            $data=M('News')->where(array('id'=>$id))->find();
           $data['abstract']= $data['description'];
           if(($data['catid'] !=28) && ($data['catid']) !=29 && ($data['catid'] !=30) && ($data['catid'] !=31) && ($data['catid'] !=32)){
                 $data['parent_cid']=$data['catid'];
           }else{
               $data['parent_cid']=27;
           }
          
            $news=M('NewsData')->where(array('id'=>$id))->find();
            $news['publish_content']=$news['content'];
            $this->assign('picture_urls', explode(",", $data['thumb']));
            $result=$this->getallchildlist("12");
           //var_dump($category);exit;
            $this->assign('result', $result);
            $this->assign('data', $data);
            $this->assign('news', $news);
             $this->display();

        }
        

    }
    
    public function policydelete(){
        $id=I('id');
        $result=M('News')->where(array('id'=>$id))->delete();
        $delete=M('NewsData')->where(array('id'=>$id))->delete();
        $this->success("删除成功",U('policylists'));
    }


    public function newestlists(){
        $pagenum = I('get.page', '1', '');
         $where['area']=D('Admin/Area')->getIDWhereCondition(User::getInstance()->getInfo()['area']);
         $where['isdelete']=0;
         $count = M('Newest')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = M('Newest')->where($where)->page($pagenum . ',' . $this->page_size)->order('id desc')->select();
        //echo M('Newest')->getLastsql();exit;
        foreach($data as $key=>$value){
          $data[$key]['categoryname']=D('Admin/ArtCategory')->where(array('cid'=>$value['news_id']))->getField('name');
        }
        //var_dump($data);exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();

    }

    public function newestadd(){
        if(IS_POST){
          $data=$_POST;
          $data['video'] = $data['music_video'][0];
          $data['video_title'] = $data['music_video_title'][0];
          $data['image']=implode(",",$data['drama_picture_url']);
          $data['addtime']=time();
          $data['content']=$data['publish_content'];
          $data['area']=User::getInstance()->getInfo()['area'];
          M('Newest')->add($data);
          //echo M('Newest')->getLastsql();exit;
          $this->success("添加成功",U('newestlists'));
        }else{
           $category=D('Admin/ArtCategory')->where(array('parent_cid'=>328))->select(); 
           $this->assign('category',$category);
           $this->assign('maxVideoNum',1);
           $this->display();
        }
     
    }

    public function newestedit(){
        $id=I("id");
        if(IS_POST){
            $data=$_POST;
            $data['video'] = $data['music_video'][0];
            $data['video_title'] = $data['music_video_title'][0];
          $data['image']=implode(",",$data['drama_picture_url']);
          $data['addtime']=time();
          $data['content']=$data['publish_content'];
          M('Newest')->where(array('id'=>$data['id']))->save($data);
          //echo M('Newest')->getLastsql();exit;
          $this->success("修改成功",U('newestlists'));
        }else{
        $data=M('Newest')->where(array('id'=>$id))->find();
        $data['publish_content']=$data['content'];
        $data['areaname']=D('Admin/Area')->where(array('id'=>$data['area']))->getField('name');
        $this->assign('picture_urls',explode(',',$data['image']));
        $category=D('Admin/ArtCategory')->where(array('parent_cid'=>328))->select(); 
        $this->assign('category',$category);
        $this->assign('data',$data);
        $this->assign('maxVideoNum',1);
        $this->display();
        }
        
    }

    public function newestdelete(){
        $id=I('id');
        $result=M('Newest')->where(array('id'=>$id))->setField("isdelete",1);
        $this->success("删除成功",U('newestlists'));
    }

  //文创精品
    public function winchance(){
        $where['isdelete']=0;
        $where['area']=D('Admin/Area')->getIDWhereCondition(User::getInstance()->getInfo()['area']);
        $count = M('Winchance')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Winpage_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = M('Winchance')->where($where)->page($pagenum . ',' . $this->Winpage_size)->select();         
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }

    public function winchanceadd(){
          if(IS_POST){
          $data=$_POST;
          $data['image']=implode(",",$data['drama_picture_url']);
          $data['area']=User::getInstance()->getInfo()['area'];
          $data['addtime']=time();
         
          M('Winchance')->add($data);
          $this->success("添加成功",U('winchance'));
        }else{
            //$category=$this->getTpshopcategory();
            //var_dump($category);exit;
           //$this->assign('category',$category);
           $this->display();
        }
    }


    public function  winchanceedit(){
         $id=I("id");
        if(IS_POST){
            $data=$_POST;
          $data['image']=implode(",",$data['drama_picture_url']);
        
          M('Winchance')->where(array('id'=>$data['id']))->save($data);
          //echo M('Newest')->getLastsql();exit;
          $this->success("修改成功",U('winchance'));
        }else{
        $data=M('Winchance')->where(array('id'=>$id))->find();
         //$category=$this->getTpshopcategory();
            //var_dump($category);exit;
           //$this->assign('category',$category);
        $data['areaname']=D('Admin/Area')->where(array('id'=>$data['area']))->getField('name');   
        $this->assign('picture_urls',explode(',',$data['image']));
        $this->assign('data',$data);
        $this->display();
        }
    }

    public function winchancedelete(){
           $id=I('id');
        $result=M('Winchance')->where(array('id'=>$id))->setField("isdelete",1);
        $this->success("删除成功",U('winchance'));
    }

   //产业研究
    public function industry(){
        $pagenum = I('get.page', '1', '');
       
        $count =M('News')->where(array('catid'=>9,'status'=>99))->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = M('News')->where(array('catid'=>9,'status'=>99))->page($pagenum . ',' . $this->Page_size)->order('id desc')->select();
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
         $this->display();
    }

   public function industryadd(){
       if(IS_POST){
           $data=$_POST;
          
          $data['catid']=9;
          $data['thumb']=$data['drama_picture_url']['0'];
          $data['description']=$data['publish_content'];
          $data['status']=99;
          $data['inputtime']=time();
          $data['updatetime']=time();
          $re=M('News')->add($data);
         $id=M('News')->order('id desc')->limit(1)->getField('id');
         $update=M('News')->where(array('id'=>$id))->setField('url',"/index.php?a=shows&catid={$data['catid']}&id={$id}");
        $news['content']=$data['publish_content'];
        $news['id']=$id;
        $add=M('NewsData')->add($news);
        if($re){
         $this->success("添加成功",U('industry'));
               
           }

       }else{
           //M('News')->where(array('id'=>$id))->setInc('click_num',1);
         $this->display();
       }
       
   } 


   public function industryedit(){
    if(IS_POST){
        $data=$_POST;
         $data['thumb']=implode(',',$data['drama_picture_url']);
         $data['description']=$data['publish_content'];
        $data['updatetime']=time();
         $result=M('News')->where(array('id'=>$data['id']))->save($data);
         $this->success("修改成功",U('industry'));
    }else{
        $id=I('id');
        M('News')->where(array('id'=>$id))->setInc('click_num',1);
        $data=M('News')->where(array('id'=>$id))->find();
        $data['publish_content']=$data['description'];
        $this->assign('picture_urls', explode(",", $data['thumb']));
        $this->assign('data',$data);
        $this->display();
    }
   }

   public function industrydelete(){
        $id=I('id');
        $result=M('News')->where(array('id'=>$id))->delete();
        $delete=M('NewsData')->where(array('id'=>$id))->delete();
        $this->success("删除成功",U('industry'));
   }

   public function casese(){
         $pagenum = I('get.page', '1', '');
       
        $count =M('News')->where(array('catid'=>10,'status'=>99))->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = M('News')->where(array('catid'=>10,'status'=>99))->page($pagenum . ',' . $this->Page_size)->order('id desc')->select();
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
         $this->display();
   }
  //产业案例
   public function caseseadd(){
       if(IS_POST){
           $data=$_POST;
           
          $data['catid']=10;
          $data['thumb']=$data['drama_picture_url']['0'];
          $data['description']=$data['publish_content'];
          $data['status']=99;
          $data['inputtime']=time();
          $data['updatetime']=time();
          $re=M('News')->add($data);
         $id=M('News')->order('id desc')->limit(1)->getField('id');
         $update=M('News')->where(array('id'=>$id))->setField('url',"/index.php?a=shows&catid={$data['catid']}&id={$id}");
        $news['content']=$data['publish_content'];
        $news['id']=$id;
        $add=M('NewsData')->add($news);
        if($re){
         $this->success("添加成功",U('casese'));
               
           }

       }else{
           //M('News')->where(array('id'=>$id))->setInc('click_num',1);
         $this->display();
       }
   }

   public function caseseedit(){
        if(IS_POST){
        $data=$_POST;
         $data['thumb']=implode(',',$data['drama_picture_url']);
         $data['description']=$data['publish_content'];
        $data['updatetime']=time();
         $result=M('News')->where(array('id'=>$data['id']))->save($data);
         $this->success("修改成功",U('casese'));
    }else{
        $id=I('id');
       
        $data=M('News')->where(array('id'=>$id))->find();
        $data['publish_content']=$data['description'];
        $this->assign('picture_urls', explode(",", $data['thumb']));
        $this->assign('data',$data);
        $this->display();
    }
       
   }

   public function casesedelete(){
        $id=I('id');
        $result=M('News')->where(array('id'=>$id))->delete();
        $delete=M('NewsData')->where(array('id'=>$id))->delete();
        $this->success("删除成功",U('casese'));
   }
 //热点专题
   public function hot(){
         $pagenum = I('get.page', '1', '');
       
        $count =M('News')->where(array('catid'=>6,'status'=>99))->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = M('News')->where(array('catid'=>6,'status'=>99))->page($pagenum . ',' . $this->Page_size)->order('id desc')->select();
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
         $this->display();
   }

   public function hotadd(){
        if(IS_POST){
           $data=$_POST;
           
          $data['catid']=6;
          $data['thumb']=$data['drama_picture_url']['0'];
          $data['description']=$data['publish_content'];
          $data['status']=99;
          $data['inputtime']=time();
          $data['updatetime']=time();
          $re=M('News')->add($data);
         $id=M('News')->order('id desc')->limit(1)->getField('id');
         $update=M('News')->where(array('id'=>$id))->setField('url',"/index.php?a=shows&catid={$data['catid']}&id={$id}");
        $news['content']=$data['publish_content'];
        $news['id']=$id;
        $add=M('NewsData')->add($news);
        if($re){
         $this->success("添加成功",U('hot'));
               
           }

       }else{
           //M('News')->where(array('id'=>$id))->setInc('click_num',1);
         $this->display();
       }
   }

  public function hotedit(){
        if(IS_POST){
        $data=$_POST;
         $data['thumb']=implode(',',$data['drama_picture_url']);
         $data['description']=$data['publish_content'];
        $data['updatetime']=time();
         $result=M('News')->where(array('id'=>$data['id']))->save($data);
         $this->success("修改成功",U('hot'));
    }else{
        $id=I('id');
        M('News')->where(array('id'=>$id))->setInc('click_num',1);
        $data=M('News')->where(array('id'=>$id))->find();
        $data['publish_content']=$data['description'];
        $this->assign('picture_urls', explode(",", $data['thumb']));
        $this->assign('data',$data);
        $this->display();
    }
  } 

  public function hotdelete(){
        $id=I('id');
        $result=M('News')->where(array('id'=>$id))->delete();
        $delete=M('NewsData')->where(array('id'=>$id))->delete();
        $this->success("删除成功",U('hot'));
  }

 //最新推荐

 public function groom(){
         $pagenum = I('get.page', '1', '');
          $where['area']=D('Admin/Area')->getIDWhereCondition(User::getInstance()->getInfo()['area']);
         $where['isdelete']=0;
        $count =D('Admin/Groom')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Groom')->where($where)->page($pagenum . ',' . $this->Page_size)->order('id desc')->select();
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
 } 


 public function groomadd(){
     if(IS_POST){
       $data=$_POST;
       //var_dump($data);exit;
       $data['image']=$data['drama_picture_url']['0'];
       if (!D('Admin/Groom')->create($data)) {
                
                $this->error(D('Admin/Groom')->getError());
            } else {
                
                D('Admin/Groom')->add();
                $this->success('添加成功', U('groom'));
            }
     }else{
        $this->display();
     }
    
 }

  public function groomedit(){
        if(IS_POST){
         $data=$_POST;
         $data['image']=$data['drama_picture_url']['0'];
         D('Admin/Groom')->create($data);
          D('Admin/Groom')->where(array('id'=>$data['id']))->save();
         $this->success("修改成功",U('groom'));
    }else{
        $id=I('id');
        $data=D('Admin/Groom')->where(array('id'=>$id))->find();
        $data['areaname']=D('Admin/Area')->where(array('id'=>$data['area']))->getField('name'); 
        $this->assign('picture_urls', explode(",", $data['image']));
        $this->assign('data',$data);
        $this->display();
    }
 }

  public function groomdelete(){
        $id=I('id');
        
        $result=D('Admin/Groom')->where(array('id'=>$id))->setField('isdelete',1);
        $this->success("删除成功",U('groom'));
 }



}