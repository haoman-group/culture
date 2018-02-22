<?php
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;
use Common\Model\Model;
class FestivalController extends AdminBase{
       protected $Page_Size =20;
        protected $Page_size =20;
       protected $page_size =20;
       protected $Pager_size =20; 
       protected $Page_sizer=20;
       protected $maxVideoNum=1;
     protected function _initialize() {
        parent::_initialize();
        //可用模块列表
        $this->model = D('Admin/Festival');
        $category = $this->model->getCategory();
        $this->assign('category',$category);
        $this->assign('maxPicNum', 6);
         $this->assign('maxVideoNum', 1);
       
    }
  //媒体报道
    public function  media()
      {
        $pagenum = I('get.page', '1', '');
        $where['categorytype']=1;  
        $where['isdelete']=0;
        $count = D('Admin/Festival')->where($where)->count();
         $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Festival')->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['userid']))->getField('username');
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
       
    }


    public function  mediaedit(){
        $id=I('id');
        if(IS_POST){
           $data=$_POST;
           $data['images'][0]=$data['images_url'][0];           
           if($data['categorytype'] == 0){
              $this->error("请选择类目");
           }
            if (!D('Admin/Festival')->create($data)) {
                
                $this->error(D('Admin/Festival')->getError());
            } else {
                D('Admin/Festival')->create($data);
                D('Admin/Festival')->where(array('id'=>$data['id']))->save();
                $this->success('修改成功', U('media'));
            }
           
        }else{
         $data=D('Admin/Festival')->where(array('id'=>$id))->find();
         $this->assign('images',unserialize($data['images']));
         $this->assign('data', $data);
         $this->display();
        }
       
    }
    
    public function  mediaadd(){
        if(IS_POST){
           $data=$_POST;
           $data['userid']=User::getInstance()->getInfo()['id'];
           //var_dump($data);exit;
           $data['images']=$data['images_url'];
           $data['position']='no';
           if($data['categorytype'] == 0){
              $this->error("请选择类目");
           }
        //    if(empty($data['images'])){
        //       $this->error("请上传一张封面图片！");
        //    }
            if (!D('Admin/Festival')->create($data)) {
                
                $this->error(D('Admin/Festival')->getError());
            } else {
                D('Admin/Festival')->create($data);
                D('Admin/Festival')->add();
                $this->success('添加成功', U('media'));
            }
           

        }else{
           $this->display();
        }
        
    }

    public function  mediadelete(){
        $id=I('id');
        $data=D('Admin/Festival')->where(array('id'=>$id))->setField('isdelete',1);
        $this->success('删除成功',U('media'));
       
    }
    


    public function exhibition(){
         $pagenum = I('get.page', '1', '');
         $categorytype=I('get.categorytype',null);
         $title=I('get.title',null);
         
         if($categorytype){
             if($categorytype == 'all'){
               $rand=array(201,202,203,204,205,206,207,208,209,210,212,213,214);
               $where['categorytype']=array('in',$rand);
             }else{
                 $where['categorytype']=$categorytype;
             }
         }else{
           $rand=array(201,202,203,204,205,206,207,208,209,210,212,213,214);
          $where['categorytype']=array('in',$rand);  
         }
        
         if($title){
          $where['title']=array('like','%'.$title.'%');
         } 
        $where['isdelete']=0;
        $count = D('Admin/Festival')->where($where)->count();
         $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Festival')->where($where)->page($pagenum . ',' . $this->Page_size)->order('id desc')->select();
       //echo D('Admin/Festival')->getLastsql();exit;
        foreach ($data as $key => $value) {
            $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['userid']))->getField('username');
            switch ($value['categorytype']) {
                case  201:
                   $data[$key]['categoryname']="时代华章——首届山西艺术节美术作品展";
                    break;
                case  202:
                   $data[$key]['categoryname']="翰逸神飞——山西画院藏画精品展";
                    break;
               case  203:
                   $data[$key]['categoryname']="塑说三晋——首届山西艺术节雕塑作品展";
                    break;
               case  204:
                   $data[$key]['categoryname']="翰墨三晋--书法篆刻作品展";
                    break;
                case  205:
                   $data[$key]['categoryname']="人说山西好风光——百位书法名家书法作品邀请展";
                    break;
                case  206:
                   $data[$key]['categoryname']="壮美山西——首届山西艺术节网络摄影展";
                    break;
                case  207:
                   $data[$key]['categoryname']="粉墨传神——首届山西艺术节舞台艺术摄影作品展";
                    break;
                case  209:
                   $data[$key]['categoryname']="古韵拾遗——首届山西艺术节非物质文化遗产展";
                    break;
                 case  210:
                   $data[$key]['categoryname']="梦从这里出发——山西省高校学生优秀美术作品展";
                    break;
                 case  211:
                   $data[$key]['categoryname']="长风艺术展";
                    break;
                 case  212:
                   $data[$key]['categoryname']="千年丹青——山西古代壁画掇英展";
                    break; 
                 case  213:
                   $data[$key]['categoryname']="艺术山西——艺术作品展";
                    break;
                    case  214:
                   $data[$key]['categoryname']="风情山西——首届山西艺术节民俗民居美术摄影展";
                    break;                                     
                default:
                    # code...
                    break;
            }
        }

        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
       
        $this->display();
    }
    public function exhibitionadd(){
        
        if(IS_POST){
           $data=$_POST;
           $data['userid']=User::getInstance()->getInfo()['id'];
           $data['images']=$data['images_url'];
            if(empty($data['images'])){
              $this->error("请上传一张封面图片！");
           }
           if($data['categorytype'] == 0){
              $this->error("请选择类目");
           }
            if (!D('Admin/Festival')->create($data)) {
                
                $this->error(D('Admin/Festival')->getError());
            } else {
                D('Admin/Festival')->create($data);
                D('Admin/Festival')->add();
                $this->success('添加成功', U('exhibition'));
            }
           

        }else{
           $this->display();
        }
    }

    public function exhibitionedit(){
         $id=I('id');
        if(IS_POST){
           $data=$_POST;
           $data['images']=$data['images_url'];
           //var_dump($data);exit;
           if($data['categorytype'] == 0){
              $this->error("请选择类目");
           }
            if (!D('Admin/Festival')->create($data)) {
               // echo 123;exit;
                $this->error(D('Admin/Festival')->getError());
            } else {
                D('Admin/Festival')->create($data);
                D('Admin/Festival')->where(array('id'=>$data['id']))->save();
                //D('Admin/Festival')->getLastsql();exit;
                $this->success('修改成功', U('exhibition'));
            }
           
        }else{
         $data=D('Admin/Festival')->where(array('id'=>$id))->find();
         $this->assign('images',unserialize($data['images']));
         $this->assign('data', $data);
         $this->display();
        }
    }
    
    public function exhibitiondelete(){
       $id=I('id');
        $data=D('Admin/Festival')->where(array('id'=>$id))->setField('isdelete',1);
        $this->success('删除成功',U('exhibition'));
    }
    //表演类活动

    public function perform(){
         $pagenum = I('get.page', '1', '');
          $categorytype=I('get.categorytype',null);
          // var_dump($categorytype);
           $title=I('get.title',null);
           if($categorytype){
               if($categorytype =="all"){
                  $rand=array(11,12,13,14,15,16);
                  $where['categorytype']=array('in',$rand);
               }else{
                  $where['categorytype']=$categorytype;
               }
            
         
           
         }else{
              $rand=array(11,12,13,14,15,16);
            $where['categorytype']=array('in',$rand);
         }
        
         if($title){
          $where['title']=array('like','%'.$title.'%');
         }
          
        $where['isdelete']=0;
        $count = D('Admin/Festival')->where($where)->count();
         $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Festival')->where($where)->page($pagenum . ',' . $this->page_size)->order('id desc')->select();
       // echo D('Admin/Festival')->getLastsql();exit;
        foreach ($data as $key => $value) {
            $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['userid']))->getField('username');
            switch ($value['categorytype']) {
                case '11':
                   $data[$key]['categoryname']="优秀剧目汇演";
                    break;
                case '12':
                   $data[$key]['categoryname']="音乐舞蹈曲艺杂技大赛";
                    break;
                 case '13':
                   $data[$key]['categoryname']="喝彩山西-山西籍文艺名家演唱会";
                    break;
                case '14':
                   $data[$key]['categoryname']="韵味山西'梅花奖";
                    break;
                case '15':
                   $data[$key]['categoryname']="文艺精品惠民演出";
                    break;
                case '16':
                   $data[$key]['categoryname']="优秀舞台剧交流演出";
                    break;             
                
                default:
                    # code...
                    break;
            }
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        //var_dump($pageinfo);
        //var_dump($datas);exit;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
       
        $this->display();
        
    }
     public function performadd(){
         if(IS_POST){
           $data=$_POST;
           $data['userid']=User::getInstance()->getInfo()['id'];
          $data['images']=$data['images_url'];
           if(empty($data['images'])){
              $this->error("请上传一张封面图片！");
           }
          
          $data['voide']=$data['music_video'][0];
          $data['source']=$data['music_video_title'][0];
           if($data['categorytype'] == 0){
              $this->error("请选择类目");
           }
            if (!D('Admin/Festival')->create($data)) {
                
                $this->error(D('Admin/Festival')->getError());
            } else {
                D('Admin/Festival')->create($data);
                D('Admin/Festival')->add();
                $this->success('添加成功', U('perform'));
            }
           

        }else{
           $this->display();
        }
    }
     public function performedit(){
        $id=I('id');
        if(IS_POST){
           $data=$_POST;
           
           $data['voide']=$data['music_video'][0];
          $data['source']=$data['music_video_title'][0];
           $data['images']=$data['images_url'];
           if($data['categorytype'] == 0){
              $this->error("请选择类目");
           }
            if (!D('Admin/Festival')->create($data)) {
               // echo 123;exit;
                $this->error(D('Admin/Festival')->getError());
            } else {
                D('Admin/Festival')->create($data);
                D('Admin/Festival')->where(array('id'=>$data['id']))->save();
                //D('Admin/Festival')->getLastsql();exit;
                $this->success('修改成功', U('perform'));
            }
           
        }else{
         $data=D('Admin/Festival')->where(array('id'=>$id))->find();
          $this->assign('images',unserialize($data['images']));
         $this->assign('data', $data);
         $this->display();
        }
    }

    public function performdelete(){
        $id=I('id');
        $data=D('Admin/Festival')->where(array('id'=>$id))->setField('isdelete',1);
        $this->success('删除成功',U('perform'));
    }

//主题
    public function theme(){
         $pagenum = I('get.page', '1', '');
           $categorytype=I('get.categorytype',null);
         $title=I('get.title',null);
           if($categorytype){
               if($categorytype=="all"){
                 $rand=array(21,22,23,24,25,26,28);
                $where['categorytype']=array('in',$rand);
               }else{
                  $where['categorytype']=$categorytype;
               }
             
         }else{
         $rand=array(21,22,23,24,25,26,28);
         $where['categorytype']=array('in',$rand);
         }
         if($title){
          $where['title']=array('like','%'.$title.'%');
         }
           
        $where['isdelete']=0;
        $count = D('Admin/Festival')->where($where)->count();
         $page = new \Libs\Util\Page($count, $this->Pager_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Festival')->where($where)->page($pagenum . ',' . $this->Pager_size)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['userid']))->getField('username');
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
       
        $this->display();
    }
  public function themeadd(){
       if(IS_POST){
           $data=$_POST;
           //var_dump($data);exit;
           $data['userid']=User::getInstance()->getInfo()['id'];
           $data['images']=$data['images_url'];
           
          $data['voide']=$data['acrobatics_video'][0];
          $data['source']=$data['acrobatics_video_title'][0];
           if($data['categorytype'] == 0){
              $this->error("请选择类目");
           }
            if (!D('Admin/Festival')->create($data)) {
                
                $this->error(D('Admin/Festival')->getError());
            } else {
                D('Admin/Festival')->add();
                $this->success('添加成功', U('theme'));
            }
        }else{
           $this->display();
        }
  }

   public function themeedit(){
       $id=I('id');
        if(IS_POST){
           $data=$_POST;
           $data['images']=$data['images_url'];
          $data['voide']=$data['acrobatics_video'][0];
          $data['source']=$data['acrobatics_video_title'][0];
           //var_dump($data);exit;
           if($data['categorytype'] == 0){
              $this->error("请选择类目");
           }
            if (!D('Admin/Festival')->create($data)) {
               // echo 123;exit;
                $this->error(D('Admin/Festival')->getError());
            } else {
                D('Admin/Festival')->where(array('id'=>$data['id']))->save();
                $this->success('修改成功', U('theme'));
            }
           
        }else{
         $data=D('Admin/Festival')->where(array('id'=>$id))->find();
         $this->assign('images',unserialize($data['images']));
         $this->assign('video_ids',$data['voide']);
         $this->assign('video_titles',$data['source']);
         $this->assign('data', $data);
         $this->display();
        }
  }

   public function themedelete(){
        $id=I('id');
        $data=D('Admin/Festival')->where(array('id'=>$id))->setField('isdelete',1);
        $this->success('删除成功',U('theme'));
  }

 public function notic(){
         $pagenum = I('get.page', '1', '');
        
         $where['categorytype']=301;    
        $where['isdelete']=0;
        $count = D('Admin/Festival')->where($where)->count();
         $page = new \Libs\Util\Page($count, $this->Page_sizer, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Festival')->where($where)->page($pagenum . ',' . $this->Page_sizer)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['userid']))->getField('username');
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
       
        $this->display();
    }

     public function noticadd(){
       if(IS_POST){
           $data=$_POST;
           $data['userid']=User::getInstance()->getInfo()['id'];
           $data['images']=$data['images_url'];
           $data['categorytype']=301;
           $data['position']='no';
            if (!D('Admin/Festival')->create($data)) {
                
                $this->error(D('Admin/Festival')->getError());
            } else {
                D('Admin/Festival')->add();
                $this->success('添加成功', U('notic'));
            }
        }else{
           $this->display();
        }
  }

    public function noticedit(){
       $id=I('id');
        if(IS_POST){
           $data=$_POST;
           $data['images']=$data['image_url'];
           $data['position']='no';
            if (!D('Admin/Festival')->create($data)) {
               // echo 123;exit;
                $this->error(D('Admin/Festival')->getError());
            } else {
                D('Admin/Festival')->where(array('id'=>$data['id']))->save();
                $this->success('修改成功', U('notic'));
            }
           
        }else{
         $data=D('Admin/Festival')->where(array('id'=>$id))->find();
         $this->assign('images',unserialize($data['images']));
         $this->assign('data', $data);
         $this->display();
        }
  }

     public function noticdelete(){
        $id=I('id');
        $data=D('Admin/Festival')->where(array('id'=>$id))->setField('isdelete',1);
        $this->success('删除成功',U('notic'));
  }
    public function position(){
        $id = I('get.id',null);
        if(!empty($id)){
            D('Admin/Festival')->where(['id'=>$id])->setField('position','no');
        }
        $data = D('Admin/Festival')->where(array('position'=>'yes','categorytype'=>['neq','401']))->select();
        $this->assign('data',$data);
        $this->display();
    }
    /**
     * 直播列表
     *
     * @return void
     */
    public function live(){
        $pagenum = I('get.page', '1', '');
        $where['categorytype']=401;    
        $where['isdelete']=0;
        $count = $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_sizer, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = $this->model->where($where)->page($pagenum . ',' . $this->Page_sizer)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['userid']))->getField('username');
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }
    /**
     * 直播添加
     *
     * @return void
     */
    public function liveadd(){
        if(IS_POST){
            $data=$_POST;
            $data['userid']=User::getInstance()->getInfo()['id'];
            $data['images']=$data['images_url'];
            $data['categorytype']=401;
            $data['voide']=$data['music_video'][0];
            $data['source']=$data['music_video_title'][0];
            if(!$this->model->create($data)) {
                $this->error($this->model->getError());
            }else {
                $this->model->add();
                $this->success('添加成功', U('live'));
            }
         }else{
            $this->display();
         }
    }
    /**
     * 直播修改
     *
     * @return void
     */
    public function liveedit(){
        $id=I('id');
        if(IS_POST){
           $data=$_POST;
           $data['images']=$data['image_url'];
           $data['voide']=$data['music_video'][0];
           $data['source']=$data['music_video_title'][0];
            if (!$this->model->create($data)) {
               // echo 123;exit;
                $this->error($this->model->getError());
            } else {
                $this->model->where(array('id'=>$data['id']))->save();
                $this->success('修改成功', U('live'));
            }
           
        }else{
         $data=$this->model->where(array('id'=>$id))->find();
         $this->assign('images',unserialize($data['images']));
         $this->assign('data', $data);
         $this->display();
        }
    }
    /**
     * 直播删除
     *
     * @return void
     */
    public function livedelete(){
        $id=I('id');
        $data = $this->model->where(array('id'=>$id))->setField('isdelete',1);
        $this->success('删除成功',U('lvie'));
    }
    
}

 