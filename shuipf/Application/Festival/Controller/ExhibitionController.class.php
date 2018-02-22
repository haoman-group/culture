<?php
namespace Festival\Controller;
//展览类活动
class ExhibitionController extends BaseController {
    protected $Page_Size =5;
    protected function _initialize(){
        parent::_initialize();
    }
    public function index(){
        $message=D('Admin/Festival')->where(array('categorytype'=>array('in',array(201,202,203,204,205,206,207,208,209,210,212,213,214)),'isdelete'=>0))->order('id desc')->limit(5)->select();
        //美术作品展
        //var_dump($data);
        $exhibition=D('Admin/Festival')->where(array('categorytype'=>201,'isdelete'=>0))->limit(4)->order('id desc')->select();
        //翰逸神飞——山西画院藏画精品展
        $painting=D('Admin/Festival')->where(array('categorytype'=>202,'isdelete'=>0))->limit(12)->order('id desc')->select();
        // 塑说三晋——首届山西艺术节雕塑作品展
        $sculpture=D('Admin/Festival')->where(array('categorytype'=>203,'isdelete'=>0))->limit(2)->order('id desc')->select(); 
        //“翰墨三晋”--书法篆刻作品展
        $calligraphy=D('Admin/Festival')->where(array('categorytype'=>204,'isdelete'=>0))->limit(1)->order('id desc')->find(); 
        //人说山西好风光——百位书法名家书法作品邀请展
        $invitational=D('Admin/Festival')->where(array('categorytype'=>205,'isdelete'=>0))->limit(1)->order('id desc')->find(); 
        //壮美山西——首届山西艺术节网络摄影展
        $photography= D('Admin/Festival')->where(array('categorytype'=>206,'isdelete'=>0))->limit(2)->order('id desc')->select();
        //舞台摄影艺术精品展
         $stage= D('Admin/Festival')->where(array('categorytype'=>207,'isdelete'=>0))->limit(2)->order('id desc')->select();
         //中华灶君文化特展
        $kitchen=D('Admin/Festival')->where(array('categorytype'=>208,'isdelete'=>0))->limit(12)->order('id desc')->select(); 
        //古韵拾遗——首届山西艺术节非物质文化遗产展
        $immaterial=D('Admin/Festival')->where(array('categorytype'=>209,'isdelete'=>0))->limit(12)->order('id desc')->select();
        //梦从这里出发——山西省高校学生优秀美术作品展
        $graduation=D('Admin/Festival')->where(array('categorytype'=>210,'isdelete'=>0))->limit(4)->order('id desc')->select();
        // var_dump($graduation);
        //长风艺术展
        // $cf=D('Admin/Festival')->where(array('categorytype'=>211,'isdelete'=>0))->limit(1)->order('id desc')->find();
        //千年丹青——山西古代壁画掇英展
        $murals=D('Admin/Festival')->where(array('categorytype'=>212,'isdelete'=>0))->limit(2)->order('id desc')->select();
        //“艺术山西”--艺术作品展
        $works=D('Admin/Festival')->where(array('categorytype'=>213,'isdelete'=>0))->limit(4)->order('id desc')->select();
        //风情山西——首届山西艺术节民俗民居美术摄影展
        $fine=D('Admin/Festival')->where(array('categorytype'=>214,'isdelete'=>0))->limit(2)->order('id desc')->select();
         $this->assign('exhibition',$exhibition);
          $this->assign('fine',$fine);
         $this->assign('message',$message);
          $this->assign('works',$works);
         $this->assign('murals',$murals);
        //  $this->assign('cf',$cf);
         $this->assign('graduation',$graduation);
         $this->assign('immaterial',$immaterial); 
         $this->assign('stage',$stage);
         $this->assign('kitchen',$kitchen);
         $this->assign('photography',$photography);
        $this->assign('invitational',$invitational);
        $this->assign('calligraphy',$calligraphy);
        $this->assign('sculpture',$sculpture);
        $this->assign('painting',$painting);
        $this->display();
    }
    
}
