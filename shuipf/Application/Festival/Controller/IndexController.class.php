<?php
namespace Festival\Controller;

class IndexController extends BaseController {
    protected $page_Size =15;
    protected function _initialize(){
        parent::_initialize();
        $this->model=D('Admin/Festival');
    }
    public function index(){
        //精品推荐
        // $rand=array('in',array(21,22,23,24,25,26,27,28,201,202,203,204,205,206,207,208,209,210,211,212,213));
        $spare=D('Admin/Festival')->where(array('isdelete'=>0,'title'=>['neq',''],'content'=>['neq',''],'position'=>'yes'))->limit(3)->order('updatetime desc')->select();
        //var_dump($spare);exit;
        //媒体报道
        $media=D('Admin/Festival')->where(array('categorytype'=>1,'isdelete'=>0))->limit(4)->order('updatetime desc')->select();
        $category=D('Admin/Festival')->getCategory(); 
         
        foreach($category as $key=>$value){
           if($key>=11 && $key<=15){
              $perform[$key]['son']=D('Admin/Festival')->where(array('categorytype'=>$key,'isdelete'=>0,'title'=>array('neq','')))->limit(6)->order('updatetime desc')->select();
              $perform[$key]['categoryname']=$value;
           }
        }
        $message=D('Admin/Festival')->where(array('categorytype'=>301,'isdelete'=>0))->limit(4)->order('updatetime desc')->select();
        $interpret = D('Admin/Interpret')->where(array('isdelete'=>0))->limit(8)->order('id desc')->select();
        $notic = $this->model->where(['categorytype'=>'301','isdelete'=>0])->order('updatetime desc')->find();
        $briefing= D('Admin/Briefing')->where(array('isdelete'=>0))->limit(6)->order('position desc,id desc')->select();
        $exhibition=D('Admin/Festival')->getExhibition(3);
        //直播信息
        $live = $this->model->getLiveData(3);
        $this->assign('message',$message);
        $this->assign('notic',$notic);
        $this->assign('interpret',$interpret);
        $this->assign('briefing',$briefing);
        $this->assign('perform',$perform);
        $this->assign('exhibition',$exhibition);
        $this->assign('spare',$spare);
        $this->assign('media',$media);
        $this->assign('live',$live);
        $this->display();
    }
    //日程安排
    public function calendar(){
        $calendar = D('Admin/FestivalCalendar');
        $data = $calendar->getCalendar();
        // $data =  D('Admin/FestivalCalendar')->order('start')->select();
        $sites = D('Admin/FestivalCalendar')->getSiteArray();
        $this->assign(compact('data','sites'));
        $this->display();
    }



   


    //活动新闻简报
    public function show(){
        $id=I('id');
        $data=D('Admin/Briefing')->where(array('id'=>$id))->find();
        $this->assign('data', $data);
        $this->display();
    }
    //媒体报道列表

    public function media(){
        $this->Page_Size =10;
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
        $where['categorytype']= 1;
        $count =D('Admin/Festival')->where($where)->order('id desc')->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Festival')->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();

        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
   }
   //文化论坛列表

   public function interpretlist(){
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
        $count =D('Admin/Interpret')->where($where)->order('id desc')->count();
        $page = new \Libs\Util\Page($count, $this->page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Interpret')->where($where)->page($pagenum . ',' . $this->page_Size)->order('id desc')->select();

        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();

    }
    public function interpretshow(){
        $id=I('id');
        $data=D('Admin/Interpret')->where(array('id'=>$id))->find();
        $this->assign('data', $data);
        $this->display();
    }

    public function briefinglist()
    {
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
        $count =D('Admin/Briefing')->where($where)->order('id desc')->count();
        $page = new \Libs\Util\Page($count, $this->page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Briefing')->where($where)->page($pagenum . ',' . $this->page_Size)->order('id desc')->select();

        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }
    public function briefingshow()
    {
        $id=I('id');
        $data=D('Admin/Briefing')->where(array('id'=>$id))->find();
        $this->assign('data', $data);
        $this->display('show');
    }
}