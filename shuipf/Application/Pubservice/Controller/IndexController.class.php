<?php

namespace Pubservice\Controller;

use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
use Libs\Util\BaiduTJ;
class IndexController extends PubBaseController {
     protected function _initialize(){
        parent::_initialize();
         $userInfo = User::getInstance()->getInfo();
         $this->assign('userInfo', $userInfo);
         $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
         $this->assign('login_type',$this->login_type=="admin"?1:0);
    }
    public function index(){
        if($this->area['id'] == '25050000'){
            redirect('/Pubservice/Yangquan/yangquan');
        }
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
    public function doLogin(){
        if(IS_POST){
            //登录类型 
            $id=I('id');
            $tabname=I('get.tablname');
            $tablename=I('tablename'); 
            $type = I("post.type",'normal');
            $typename=I('typename');
            //账户名称
            $url=I('post.url');
            $username = I("post.username", null, "trim");
            //账户密码
            $password = I("post.password", null, "trim");
            //下次自动登陆
            $cookieTime = I('post.cookieTime', 0, 'intval');
            //普通用户
            if($type === 'normal'){
                $userid = service('Passport')->loginLocal($username, $password, $cookieTime ? 86400 * 180 : 86400);
                if($userid >0){
                    $checked=D('Admin/Member')->where(array('userid'=>$userid))->getField('checked');
                    if($checked == '0'){
                        $this->error('该用户审核还没有通过');
                        unset($userid);
                    }else{
                    //登录成功
                    session('login_type','normal');
                    //var_dump($_SESSION);exit;
                    // redirect($_SERVER['HTTP_REFERER']);
                    if($tabname == 'pubservice-register' or  $tablename == 'index' ){
                       redirect($url);

                    }elseif($typename=='图书馆' or $typename=='群艺馆/文化馆' ){

                       redirect(U('Pubservice/Facility/index',array('type'=>$typename)));
                    }else{
                     redirect(U('Pubservice/Index/index'));
                }
            }
                }else{
                    //登录失败
                    $this->assign('error_msg','账号或密码错误！');
                }
            }else if($type === 'admin'){ //后台管理员
                if (User::getInstance()->login($username, $password)) {
                    //登录成功
                    session('login_type','admin');

                    // redirect($_SERVER['HTTP_REFERER']);
                    redirect(U('Pubservice/Index/index'));
                }else{
                    //登录失败
                    $this->assign('error_msg','账号或密码错误！');
                }
            }elseif($type == "binding"){//图书馆卡号
            $password=md5($password);
                $readerInfo = ReaderApi($username,$password,"loginByRdid");
               //git  var_dump($readerInfo);exit;
               if($readerInfo->return){
                   $usermessage=D('Admin/Member')->where(array('rdid'=>$username))->find();
                   //var_dump($usermessage);
                    if($usermessage){
                     $userid = service('Passport')->loginLibrary($usermessage['username'], $usermessage['password'], $cookieTime ? 86400 * 180 : 86400);
                     //var_dump($userid);exit;
                      $update=D('Admin/Member')->where(array('userid'=>$usermessage['userid']))->setField('reader_card_pwd',$password);
                     if($usermessage['checked'] == 0){
                        $this->error('该用户审核还没有通过');
                         unset($userid);
                     }else{
                         redirect(U('Pubservice/Index/index')); 
                     }
                    }else{
                       redirect(U('Member/Index/register',array('type'=>'pubservice-register')));  
                    }
               }else{
                   //未绑定
                   $this->assign('error_msg','您未注册图书馆卡号或者输入有误');
               }
            }
        }
        $this->display();
    }

   // 首页的最新咨询
   private function getnewest(){
        $now = date('Y-m-d H:i:s');
       $post_time_where = [['ELT',$now],['exp','is null'],'or'];
       $where = array('isdelete'=>0,'area'=>$this->area['id'],'post_time'=>$post_time_where);
       $picture=M('Newest')->where($where)->where(['image'=>array('neq','')])->limit(5)->order('addtime desc')->select();
       //echo M('Newest')->getLastsql();exit;
       foreach($picture as $key=>$value){
           $picture[$key]['image']=explode(",",$value['image']);
           $picture[$key]['news_name']=D('Admin/ArtCategory')->where(array('cid'=>$value['news_id']))->getField('name');
       }
       $newest=M('Newest')->where($where)->order('id desc')->limit(7)->select();
       foreach($newest as $k=>$v){  
           $newest[$k]['news_name']=D('Admin/ArtCategory')->where(array('cid'=>$v['news_id']))->getField('name');
       }
       $this->assign('picture',$picture);
       $this->assign('newest',$newest);
   }
   //获取艺术档案馆的数据
   private function getArtArchiveData($limit_num = 4){
       $data = D('Admin/Archive')->where(array('if_position'=>'1','area'=>$this->area['id']))->limit(4)->order('id desc')->select();
       //var_dump($data);exit;
       $this->assign('archive_data',$data);
   }
   //山西戏曲首页展示数据
   private function getArtOperaData($limit_num = 12){
    //    //文化艺术内容
    //    $where['art_cid'] = 14;
    //    $data = D('Admin/ReCulture')->where($where)->limit($limit_num)->select();
    //    foreach($data as $i=>$t){
    //        $image = explode(',',$t['image']);
    //        if(is_array($image)){
    //            $data[$i]['cover']= $image[0];
    //        }
    //    }
    //戏曲分类内容
       $data = D('Admin/ArtCategory')->where(['parent_cid'=>'14','isdelete'=>'0','cid'=>['gt',264]])->limit($limit_num)->select();
       $this->assign('opera_data',$data);
   }

    public function jump(){
        $id=I('id');
        //var_dump($id);exit;
        D('Admin/Groom')->where(array('id'=>$id))->setInc('click_num',1);
        $url=D('Admin/Groom')->where(array('id'=>$id))->getField('url'); 
        header('Location:'.$url);
    }
    /**
     * 首页宣传视频弹出页面
     *
     * @return void
     */
    public function video(){
        $type = I('request.type',null);
        switch($type){
            case 'festival':$video = "statics/video/Propaganda.mp4";break;
            case 'culture': $video = "statics/video/culture.mp4";break;
            default:$video='';
        }
        $this->assign(compact('video'));
        return $this->display();
    }
    //
    public function zonecloud(){
        $citylist = D('Admin/Area')->getLocalCity();      
        foreach($citylist as $index=>$item){
            $citylist[$index]['country'] = M('Area')->where(['pid'=>$item['id']])->order('id desc')->cache(true)->select();
        }
        
        $this->assign('lists',$citylist);
        $this->display();
    }
    /**
     * 获取市县文化云数据
     *
     * @return 输出local_culture参数到模板
     */
    public function getLocalCultureData(){
        $local_culture = [];
        if($this->area['area_span'] == D('Admin/Area')->SHENG()){
            $local_culture = D('Admin/Area')->getLocalCity(false,true);    
            foreach($local_culture as $index=>$item){
                $local_culture[$index]['sub_domain'] = D('Admin/AreaData')->where(['area_id'=>$item['id']])->getField('sub_domain');
                $local_culture[$index]['country'] = D('Admin/Area')->join('cu_area_data on cu_area_data.area_id = cu_area.id','LEFT')->where(['pid'=>$item['id']])->select();
            }
        }else if($this->area['area_span'] == D('Admin/Area')->SHI()){
            $local_culture = D('Admin/Area')->join('cu_area_data on cu_area_data.area_id = cu_area.id','LEFT')->where(['pid'=>$this->area['id']])->select();
        }
        $this->assign('local_culture',$local_culture);        
    }
}