<?php

namespace Pubservice\Controller;

use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
use Libs\Util\BaiduTJ;
class YangquanController extends PubBaseController {
     protected function _initialize(){
        parent::_initialize();
         $userInfo = User::getInstance()->getInfo();
         $this->assign('userInfo', $userInfo);
         $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
         $this->assign('login_type',$this->login_type=="admin"?1:0);
    }
    public function index(){
        
    	$data=array();
    	$category=array('185','186','187','188');

    	$data['category']=D('Admin/ArtCategory')->where(array('cid'=>array('in',$category)))->select();
    	foreach ($data['category'] as $key => $value) {
    		$data['category'][$key]['parent']=D('Admin/ArtCategory')->where(array('parent_cid'=>$value['cid']))->select();
    		
    		foreach ($data['category'][$key]['parent'] as $k => $v) {
    			$data['category'][$key]['parent'][$k]['detail']=D('Admin/ArtCategory')->where(array('parent_cid'=>$v['cid']))->select();
    		}
    		
    	}
        $Lib=D('Admin/Library')->where(array('status'=>1))->select();
        
        if(!empty($Lib)){
            foreach($Lib as $k1 =>$v1){
            $Lib[$k1]['tablename']='Library';

        }
        }
        $Com=D('Admin/Comartcenter')->where(array('status'=>1))->select();
        if(!empty($Com)){
             foreach ($Com as $k2 => $v2) {
           $Com[$k2]['name']=$Com[$key]['cac_name'];
           $Com[$k2]['tablename']='Comartcenter';
        }
        }
       
        if($Lib == NULL && $Com != NULL){
              $Service=$Com;
            }elseif($Lib != NULL && $Com == NULL){
               $Service=$Lib;
            }else{
                $Service=array_merge($Lib,$Com);
            }

        //周边活动
        $endtime=date('Y-m-d',strtotime("+3 day"));
        $begintime=date("Y-m-d",time());
        $where['area']= $this->area['id'];
        $where['isdelete']=0;
        $where['parent_id']=0;
        $where['area']= $this->area['id'];
        // 我的周边活动
        $periphery=D('Admin/Active')->where($where)->limit(3)->select();
        //正在进行的活动
        $nowshow=D('Admin/Active')->where(array('isdelete'=>0, 'act_time'=>array('lt',$endtime),'parent_id'=>0,'area'=>$this->area['id']))->limit(6)->select();
        // 即将进行的活动
        $comshow=D('Admin/Active')->where(array('isdelete'=>0,'act_time'=>array('gt', $begintime),'parent_id'=>0,'area'=>$this->area['id']))->limit(6)->select();

        //获取首页轮播
        $slide = D('Admin/AreaData')->where(['area_id'=>$this->area['id']])->getField('pub_slide');
        $slide = unserialize($slide);
        $this->assign('slideData',$slide);

        //艺术档案馆数据
        $this->getArtArchiveData(4);
        //山西戏曲数据
        $this->getArtOperaData(12);

        //获取产品推荐分类数据
        // $tpshopcate=$this->getTpshopcategory();
        $tpshopcate = [
            ['id'=>1226,'name'=>'茶具'],
            ['id'=>1158,'name'=>'琉璃'],
            ['id'=>152,'name'=>'陶瓷'],
            ['id'=>153,'name'=>'漆器'],
            ['id'=>1159,'name'=>'手串'],
            ['id'=>151,'name'=>'针织刺绣'],
            ['id'=>1157,'name'=>'金属工艺'],
            ['id'=>1155,'name'=>'珠宝、玉石'],
            ['id'=>1383,'name'=>'其他']
        ];
        $this->assign('tpshopcate',$tpshopcate);
        //产品推荐
        $categoryup    =M('Winchance')->where(array('isdelete'=>0,'is_show'=>1))->order('id desc')->order('id desc')->limit(3)->select();
        $categorycenter=M('Winchance')->where(array('isdelete'=>0,'is_show'=>1,'url'=>array('neq','')))->order('id desc')->limit(6)->select();
        $categoryright =M('Winchance')->where(array('isdelete'=>0,'is_show'=>1))->order('id desc')->limit(3)->select();

        // 最新咨询
        $this->getnewest();
        //最新推荐
        $groom=D('Admin/Groom')->where(array('isdelete'=>0,'area'=>$this->area['id']))->limit(7)->order("id desc,click_num desc")->select();
        //文化活动
        $speak  =D('Admin/Active')->where(['art_cid'=>227,'isdelete'=>0,'area'=>$this->area['id']])->limit(4)->order('id desc')->select();//活动
        $lecture=D('Admin/Active')->where(['art_cid'=>224,'isdelete'=>0,'area'=>$this->area['id']])->limit(4)->order('id desc')->select();//展览
        $show   =D('Admin/Active')->where(['art_cid'=>223,'isdelete'=>0,'area'=>$this->area['id']])->limit(4)->order('id desc')->select();//讲座
        //市县文化云:获取本地市级信息 按照特定顺序
        $this->getLocalCultureData();

        $this->assign('modules',$this->area['modules']);
        $this->assign('slide_style',$this->area['slide_style']);
        $this->assign('groom',$groom);
        $this->assign('data',$data);
        $this->assign('categoryInfo',$categoryInfo);
        $this->assign('speak',$speak);
        $this->assign("lecture",$lecture);
        $this->assign("show",$show);
        $this->assign('service',$Service);
        $this->assign('categoryup',$categoryup);
        $this->assign('categorycenter',$categorycenter);
        $this->assign('categoryright',$categoryright);
        $this->assign('periphery',$periphery);
        $this->assign('nowshow',$nowshow);
        $this->assign('comshow',$comshow);
        $this->display();
    }
    public function yangquan(){
        //轮播
        $slide = D('Admin/AreaData')->where(['area_id'=>25050000,'isdelete'=>0])->getField('pub_slide');
        $slideData=unserialize($slide);
        //文化活动
        $active=D('Admin/Active')->where(['area'=>25050000,'isdelete'=>0])->limit(4)->order('id desc')->select();
        //最新咨询
        $news=D('Admin/Newest')->where(['area'=>25050000,'isdelete'=>0])->limit(3)->order('id desc')->select();
        //$news['content'] =htmlspecialchars_decode($news['content']);
        
        foreach ($news as $key => $value) {
            $news[$key]['content']=strip_tags($value['content']);
        }
        //最新推荐
        $recomm=M('Groom')->where(['area'=>25050000,'isdelete'=>0])->limit(1)->order('id desc')->find();
        //产品推荐
        $winchance=M('Winchance')->where(['area'=>25050000,'is_show'=>1])->limit(5)->order('id desc')->select();
        //var_dump($news);exit;
        //echo M('Winchance')->getLastsql();exit;
        //新闻出版
        $publications=M('CityContent')->where(array('category'=>'publications'))->limit(4)->order('id desc')->select();
        //
        $broadcast=M('CityContent')->where(array('category'=>'broadcast'))->limit(4)->order('id desc')->select();
        //
        $artstyle=M('CityContent')->where(array('category'=>'artstyle'))->limit(3)->order('id desc')->select();
        $this->assign('publications',$publications);
        $this->assign('broadcast',$broadcast);
        $this->assign('artstyle',$artstyle);
        $this->assign('winchance',$winchance);
        $this->assign('slideData',$slideData);
        $this->assign('active',$active);
         $this->assign('recomm',$recomm);
        $this->assign('news',$news);
       
        $this->display();
    }
}