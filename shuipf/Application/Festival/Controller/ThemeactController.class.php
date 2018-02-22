<?php
namespace Festival\Controller;
//主题性活动
class ThemeactController extends BaseController {
    protected $Page_Size =10;
    protected function _initialize(){
        parent::_initialize();
    }
    public function index(){
        $message=D('Admin/Festival')->where(array('categorytype'=>array('in',array(21,22,23,24,25,26,27,28)),'isdelete'=>0,'image'=>['neq','']))->order('id desc')->limit(5)->select();
        // foreach ($message as $key => $value) {
        //    switch ($value['category']) {
        //        case '21':
        //          $message[$key]['categoryname']="";
        //            break;
               
        //        default:
        //            # code...
        //            break;
        //    }
        // }
        //各市文化艺术周
        $cultural_arts=D('Admin/Festival')->where(array('categorytype'=>21,'isdelete'=>0,'image'=>['neq','']))->limit(4)->order('id desc')->select();
        //校园文化周
        $culture_week=D('Admin/Festival')->where(array('categorytype'=>22,'isdelete'=>0))->limit(12)->order('id desc')->select();
        //群星奖
        $star_award=D('Admin/Festival')->where(array('categorytype'=>23,'isdelete'=>0))->limit(8)->order('id desc')->select();
        //var_dump($star_award);exit;
        //唱响山西－农民工歌手大赛
        $singing_contest=D('Admin/Festival')->where(array('categorytype'=>24,'isdelete'=>0))->limit(1)->order('id desc')->find();
        //舞动山西－广场舞大赛
        $dance_contest=D('Admin/Festival')->where(array('categorytype'=>25,'isdelete'=>0))->limit(1)->order('id desc')->find();
        //鼓舞山西－锣鼓艺术邀请赛
        $art_invitational=D('Admin/Festival')->where(array('categorytype'=>26,'isdelete'=>0))->limit(2)->order('id desc')->select();
        //文化艺术高峰论坛
        $art_forum=D('Admin/Festival')->where(array('categorytype'=>27,'isdelete'=>0))->limit(2)->order('updatetime desc')->select();
         $art=D('Admin/Festival')->where(array('categorytype'=>28,'isdelete'=>0))->limit(3)->order('id desc')->select();
         //山西省历届“群星奖”获奖作品展演
         //$sxlj==D('Admin/Festival')->where(array('categorytype'=>28,'isdelete'=>0))->limit(5)->order('id desc')->select();
        $this->assign('cultural_arts',$cultural_arts);
        $this->assign('message',$message);
        $this->assign('culture_week',$culture_week);
        $this->assign('singing_contest',$singing_contest);
        $this->assign('star_award',$star_award);
        $this->assign('dance_contest',$dance_contest);
        $this->assign('art',$art);
        $this->assign('art_invitational',$art_invitational);
        $this->assign('art_forum',$art_forum);
        $this->display();
    }

    public function lists(){
         $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
        $where['categorytype']=I('cid');
        $count =D('Admin/Festival')->where($where)->order('id desc')->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Festival')->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        $category=D('Admin/Festival')->getCategory();
        foreach ($category as $key => $value) {
           if(I('cid') == $key){
              $name=$value;
           }
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('name', $name);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }

}