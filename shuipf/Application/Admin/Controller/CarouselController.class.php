<?php
//Carousel

namespace Admin\Controller;
use Admin\Model\ArtCategoryModel;
use Common\Controller\AdminBase;
use Admin\Service\User;

class CarouselController extends AdminBase
{
    protected $Page_Size = 2;
    
     protected function _initialize()
    {
        parent::_initialize();
        $this->model = D('Admin/AreaData');
        $this->areaModel = D('Admin/Area');
        $this->assign('maxPicNum',1);
       // $this->assign('maxSlidePic',$this->maxSlidePic);
    }



    public function index(){
        $pagenum = I('get.page','1','');
		
        $where['author_id']=array('neq',0);
        $where['area_id']=D('Admin/Area')->getIDWhereCondition(User::getInstance()->getInfo()['area']);
        $message=$this->model->where($where)->group('author_id')->select(); 
        $count=count($message);
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
        $data=$this->model->group('author_id')->where($where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
        foreach($data as $key =>$value){
            $data[$key]['areaname']=D('Admin/Area')->getFullAreaName($value['area_id']);

        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
        $this->display();
    }

    public function show(){
        $area=I('area');  
         
        if($area){
         $data=$this->model->where(array('area_id'=>$area))->find();
         $data['pub_slide']=unserialize($data['pub_slide']);
        }
        
        // foreach($message as $key=>$value){
        //  $data[$value['position']-1]=$value;

        // }
       // var_dump($data);exit;
        $this->assign('data',$data);
         $this->assign('area',$area);
        $this->display();
    }
    public  function edit(){
       
        if(IS_POST){
             $data=$_POST; 
              $area=$data['area'];
              $message=$this->model->where(array('area_id'=>$area))->find();
              $message['pub_slide']=unserialize($message['pub_slide']);
              if(empty($data['picture_url'])){
                unset($message['pub_slide'][$data['position']-1]);
              }else{
                $message['pub_slide'][$data['position']-1]['pub_slide']=$data['image_url']['0'];
                $message['pub_slide'][$data['position']-1]['picture_url']=$data['picture_url'];
                $message['pub_slide'][$data['position']-1]['position']=$data['position'];
                $message['pub_slide'][$data['position']-1]['picture_wap_url']=$data['picture_wap_url'];
              }
            
             
            
            
            //  if($data['position'] ==1){
            //  $message[0]['pub_slide']=$data['image_url']['0'];
            //  $message[0]['picture_url']=$data['picture_url'];
            //  $message[0]['position']=$data['position'];
           
            
            //  }elseif($data['position'] ==2){
            //  $message[1]['pub_slide']=$data['image_url']['0'];
            //  $message[1]['picture_url']=$data['picture_url'];
            //  $message[1]['position']=$data['position']; 
            
             
            //  }elseif($data['position'] ==3){
            //  $message[2]['pub_slide']=$data['image_url']['0'];
            //  $message[2]['picture_url']=$data['picture_url'];
            //  $message[2]['position']=$data['position'];
            
              
            //  }elseif($data['position'] ==4){
            //     $message[3]['pub_slide']=$data['image_url']['0'];
            //  $message[3]['picture_url']=$data['picture_url'];
            //  $message[3]['position']=$data['position'];
             
              
            //  } elseif($data['position'] ==5){
            //  $message[4]['pub_slide']=$data['image_url']['0'];
            //  $message[4]['picture_url']=$data['picture_url'];
            //  $message[4]['position']=$data['position'];
             
              
            //  }    
             $data['pub_slide']=serialize($message['pub_slide']);       
             
             if($this->model->create($data)){
                if($this->model->where(array('area_id'=>$area))->save()){ 
                    //echo $this->model->getLastsql();exit; 
                    $this->success('修改成功',U('show',array('area'=>$area)));
                }else{
                    $this->error('修改失败:'.$this->model->getError());
                }

         }
        }else{
         $area=I('area');  
         $data=$this->model->where(array('area_id'=>$area))->find();
         $data['pub_slide']=unserialize($data['pub_slide']);
        //  var_dump($data);exit; 
          $this->assign('data',$data);
         $this->assign('area',$area); 
         $this->display();
        }
        
    }



    //  public  function add(){
    //      if(IS_POST){
    //          $data=$_POST;
    //          $data['pub_slide']=$data['image_url']['0'];
    //          $data['author_id']=\Admin\Service\User::getInstance()->id;
             
    //          if($this->model->create($data)){
    //             if($this->model->add()){  
                   
    //                 $this->success('添加成功',U('show',array('author_id'=>$data['author_id'])));
    //             }else{
    //                 $this->error('添加失败:'.$this->model->getError());
    //             }

    //      }
    //      }else{
    //        $this->display();
    //      }
        
        
    //  }
    
    public function delete(){
        $id=I('id');
        //echo $id;
        $author_id=$this->model->where(array('id'=>$id))->find();
        $result=$this->model->where(array('author_id'=>$author_id['author_id']))->delete();
        if($result){
            $this->success('删除成功');

        }else{
            $this->error("删除失败");
        }

    }
    /**
     * 轮播预览
     *
     * @return void
     */
    public function preview(){
        $area = I('get.area',null);
        if($area){
            $slide = $this->model->where(['area_id'=>$area])->getField('pub_slide');
            $slide = unserialize($slide);
            $this->assign('slideData',$slide);
            $this->display();
        }else{
            $this->error("参数错误！");
        }
    }
}
 