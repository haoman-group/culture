<?php

namespace Api\Controller;
use Common\Controller\Base;
use Common\Controller\ShuipFCMS;

class FestivalController extends Base {
    protected function _initialize(){
        parent::_initialize();
        $this->model =  null;
    }

   public function index(){
        $rand=array('in',array(21,22,23,24,25,26,27,28,201,202,203,204,205,206,207,208,209,210,211,212,213));
        $data['recommend']=D('Admin/Festival')->where(array('categorytype'=>$rand,'isdelete'=>0,'title'=>['neq','']))->limit(3)->order('id desc')->select();
        $data['notice']=D('Admin/Festival')->where(array('categorytype'=>301,'isdelete'=>0))->limit(3)->order('id desc')->select();
        $data['report']=D('Admin/Festival')->where(array('categorytype'=>1,'isdelete'=>0))->limit(2)->order('id desc')->select();
         $category=D('Admin/Festival')->getCategory(); 
        foreach($category as $key=>$value){
           if($key>=11 && $key<=15){
              $perform[$key]['son']=D('Admin/Festival')->where(array('categorytype'=>$key,'isdelete'=>0))->limit(4)->order('id desc')->select();
              $perform[$key]['categoryname']=$value;
           }
        }
        $data['perform']=$perform;
       
        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
   } 
  //精品推荐
   public function recommend(){
        $data = D('Admin/Festival')->where(array('isdelete'=>0,'title'=>['neq',''],'content'=>['neq',''],'position'=>'yes'))->limit(4)->order('id desc')->select();
        // $data=D('Admin/Festival')->where(array('categorytype'=>$rand,'isdelete'=>0,'title'=>['neq','']))->order('id desc')->select();
        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
   }

   public function recommendshow($id){
       $id=I('id');
       $data=D('Admin/Festival')->where(array('id'=>$id))->find();
       $data['images']=unserialize($data['images']);
       $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));

   }
   //表演类活动
   public function perform($cid){
       $cid=I('cid');
       $data['lunbo']=D('Admin/Festival')->where(array('categorytype'=>$cid,'isdelete'=>0,'title'=>['neq','']))->limit(1)->order('id desc')->select();
      
       $data['news']=D('Admin/Festival')->where(array('categorytype'=>$cid,'isdelete'=>0,'title'=>['neq',''],'id'=>array('neq',$data['lunbo'][0]['id'])))->limit(3)->order('id desc')->select();
      
       $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
   }
   //展览类活动

   public function exhact(){
       $category=D('Admin/Festival')->getCategory();
        foreach($category[2] as $key =>$value){
          $data[$key][category]=$value;
        }
       foreach ($data as $k => $v) {
           $data[$k]['son']=D('Admin/Festival')->where(array('categorytype'=>$k))->limit(3)->order('id desc')->select();
          
       }
      $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
   }

    public function performshow($id){
       $id=I('id');
       $data['show']=D('Admin/Festival')->where(array('id'=>$id))->find();
       $data['other']=D('Admin/Festival')->where(array('id'=>array('neq',$data['show']['id']),'isdelete'=>0,'categorytype'=>$data['show']['categorytype']))->limit(3)->order('id desc')->select();
      $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
   }
   //主题行活动

   public function theme(){
      $category=array('11'=>"优秀剧目汇演",
            '12'=>"音乐舞蹈曲艺杂技展演",
            '14'=>"韵味山西'梅花奖'",
            '13'=>"喝彩山西——音诗舞专题文艺晚会",
            '15'=>"文艺精品惠民演出");
     foreach ($category as $key => $value) {
        $data[$value]=D('Admin/Festival')->where(array('isdelete'=>0,'categorytype'=>$key))->limit(3)->order('id desc')->select();
         $data[$value]['cid']=$key;
     }      
       
      $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
   }

//    public function themelist($cid){
//        $cid=I('cid');
//        $data=D('Admin/Festival')->where(array('categorytype'=>$cid,'isdelete'=>0,'title'=>['neq','']))->limit(1)->order('id desc')->select();
//         $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
//    }

   public function themeshow($id){
       $id=I('id');
       $data=D('Admin/Festival')->where(array('id'=>$id))->find();
        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
   }
//日程安排

public function arrange($time){
    $time=I('time');
    $time=strtotime($time);
    $map['start'] = array('elt',$time);
    $map['_logic']='and';
    $map['end']=array('egt',$time);
    $data=D('Admin/FestivalCalendar')->where($map)->select();
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
   
}

public function arrangeshow($id){
  $data=D('Admin/FestivalCalendar')->where(array('id'=>$id))->find();
   $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
}


//详情页

public function festivalshow($id){
    $id=I('id');
    $data=D('Admin/Festival')->where(array('id'=>$id))->find();
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));

}
//主题行活动


public function themecategory(){
  $data=array( 21 => '各市文化艺术周',
  22 => '校园文化周',
  23 => '第十八届‘群星奖’选拔赛',
  24 => '唱响山西——农民工歌手展演',
  25 => '舞动三晋——广场舞展演',
  26 => '鼓舞山西——锣鼓艺术展演',
  27 => '文化艺术高峰论坛',
  28 =>'山西省历届“群星奖”获奖作品展演' );
  foreach($data as $key=>$value){
      //var_dump($key);
      $data[$key]=D('Admin/Festival')->where(array('categorytype'=>$key))->limit('4')->order('id desc')->select();

  }
 $category=array( 21 => '各市文化艺术周',
  22 => '校园文化周',
  23 => '第十八届‘群星奖’选拔赛',
  24 => '唱响山西——农民工歌手展演',
  25 => '舞动三晋——广场舞展演',
  26 => '鼓舞山西——锣鼓艺术展演',
  27 => '文化艺术高峰论坛',
  28 =>'山西省历届“群星奖”获奖作品展演' );
   $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,
   'message'=>$category));
   
}
public function themelists($cid){
    $cid=I('cid');
   $data= D('Admin/Festival')->where(array('categorytype'=>$cid))->order('id desc')->select();
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));

}

}