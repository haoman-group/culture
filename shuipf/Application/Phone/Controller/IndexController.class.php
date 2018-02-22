<?php
namespace Phone\Controller;
use Common\Controller\Base;
class IndexController extends Base {
    protected $area = [];
    protected $Page_size =10;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
    }
    public function index(){
        
        //轮播数据
        $slide = D('Admin/AreaData')->where(['area_id'=>$this->area['id']])->getField('pub_slide');
        $carousel = unserialize($slide);
        //var_dump($carousel);exit;
        //最新资讯
        $now = date('Y-m-d H:i:s');
        $post_time_where = [['ELT',$now],['exp','is null'],'or'];
        $where = array('isdelete'=>0,'area'=>$this->area['id'],'post_time'=>$post_time_where);
        $newest=M('Newest')->where($where)->order('id desc')->limit(4)->select();
        foreach($newest as $k=>$v){  
            if(!empty($v['image'])){
                $newest[$k]['cover']=array_shift(explode(",",$v['image']));
                $newest[$k]['image']=explode(",",$v['image']);
            }
            $newest[$k]['news_name']=D('Admin/ArtCategory')->where(array('cid'=>$v['news_id']))->getField('name');
        }
        //var_dump($newest);exit;
        //文化活动
       $actives = D('Admin/Active')->where(['isdelete'=>0,'area'=>$this->area['id']])->limit(4)->order('id desc')->select();
        //var_dump($actives);exit;
        //艺术档案馆
        $archive = D('Admin/Archive')->where(array('if_position'=>'1','area'=>$this->area['id']))->limit(4)->order('id desc')->select();
        foreach ($archive as $key => $value) {
            $archive[$key]['images']=unserialize($archive[$key]['images'])[0];
        }
        //最新推荐
        //var_dump($archive);exit;
        $recommend = D('Admin/Groom')->where(array('isdelete'=>0,'area'=>$this->area['id']))->limit(7)->order("id desc,click_num desc")->select();;
       
        //产品推荐
        $product = M('Winchance')->where(array('isdelete'=>0,'is_show'=>1,'url'=>array('neq','')))->order('id desc')->limit(6)->select();

        //山西戏曲
        $opera = D('Admin/ArtCategory')->where(['parent_cid'=>'14','isdelete'=>'0','cid'=>['gt',264]])->limit(5)->select();;
         //var_dump( $opera);exit;
        $this->assign(compact('carousel','newest','actives','archive','recommend','product','opera'));
        $this->display();
    }
 
//最新消息的列表
  public function newestlist(){
     
      $category=D('Admin/ArtCategory')->where(array('parent_cid'=>328))->select();
      foreach ($category as $key => $value) {
        $where['isdelete']=0;
        $where['news_id']=$value['cid'];  
        $category[$key]['data'] = M('Newest')->where($where)->order('id desc')->select(); 
      }
       
      $this->assign(compact('category'));
      $this->display();
  } 
  //详情

  public function newestshow(){
      $id=I('id');
      $data= M('Newest')->where(array('id'=>$id))->find();
      $data['image']=explode(",",$data['image']);
     // var_dump($data);exit;
      $this->assign(compact('data'));
      $this->display();
  }
  //文消卡 静态页面
  public function wenxiao(){
      $this->assign('title','山西文消卡');
      $this->display();
  }
}