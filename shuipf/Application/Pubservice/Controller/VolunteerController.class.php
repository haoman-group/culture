<?php

namespace Pubservice\Controller;
use Pubservice\Controller\PubBaseController;
use Admin\Service\User;
class VolunteerController extends PubBaseController {

    protected $recruit = null;
    protected $volunteer = null;
    protected $train = null;
    protected function _initialize(){
        parent::_initialize();
        $this->volunteer =D("Admin/Volunteer");
        $this->recruit = D('Admin/VolunteerRecruit');
        $this->train = D('Admin/VolunteerTrain');
        $userInfo = User::getInstance()->getInfo();
        $this->assign('userInfo', $userInfo);
        $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
    }
    
    public function index(){
        $pagenum = I('get.page',1);
        $where = $this->_getWhere();
        $count = $this->recruit->scope('normal')->where($where)->count();
        $page = new \Libs\Util\Page($count, 12, $pagenum);
        //设置分页参数
        $page->SetPager('baseservices', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        //获取当前页数据
        $data = $this->recruit->scope('normal')->page($pagenum . ',12')->where($where)->order('id desc')->select();
        //分页跳转的时候保证查询条件
        foreach ($where as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }
        foreach($data as $index=>$item){
            $data[$index]['yet'] = $this->volunteer->where(['volunteer_recruit_id'=>$item['id']])->count();
        }
        //分页显示输出
        $page = $page->show('landmark');
        //输出
        $this->assign(compact('page','data'));
        $this->display();
    }

    public function ser_activity(){
        $pagenum = I('get.page',1);
        $where = $this->_getWhere();
        $count = $this->train->scope('normal')->where($where)->count();
        $page = new \Libs\Util\Page($count, 12, $pagenum);
        //设置分页参数
        $page->SetPager('baseservices', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        //获取当前页数据
        $data = $this->train->scope('normal')->page($pagenum . ',12')->where($where)->order('id desc')->select();
        //分页跳转的时候保证查询条件
        foreach ($where as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }
        //分页显示输出
        $page = $page->show('landmark');
        //输出
        $this->assign(compact('page','data'));
        $this->display();
    }
    //招募登记页-表单
    public function recruit(){
        if(IS_POST){
            $data = I('post.');
            $data['uid'] = service("Passport")->userid;
            if($this->volunteer->create($data)){
                $id = $this->volunteer->add();
                if(!$id){
                    $this->error('提交失败:['.$this->volunteer->getError().']');
                }else{
                    $this->redirect('recruit_show?id='.$id);
                }
            }else{
                $this->error('提交失败:['.$this->volunteer->getError().']');
            }
        }else{
           
            if(!$this->checkLogin()){
                $this->error('请先登录','/Pubservice/Index/doLogin');
            }
            $vrid = I('get.id',null);
            if(!$vrid){
                $this->error('未指定参数');
            }
            $data = $this->recruit->where(['id'=>$vrid])->find();
            $options = $this->volunteer->getAllArray();
            $this->assign($options);
            $this->assign(compact('data'));
            $this->_position_active();
            $this->display();
        }
    }
    //招募登记页-输入回显
    public function recruit_show(){
        if(!$this->checkLogin()){
            $this->error('请先登录','/Pubservice/Index/doLogin');
        }
        $id = I('get.id',null);
        if($id){
            $data = $this->volunteer->where(['id'=>$id])->find();
            $this->assign(compact('data'));
        }
        $options = $this->volunteer->getAllArray();
        $this->assign($options);
        $this->display();
    }

    private function _position_active($num = 4){
        $data =  D('Admin/Active')->getPosition($num);
        $this->assign('position',$data);
    }
    // public function ser_base(){
    //     $this->display();
    // }

    // public function show1(){
    //     $this->display();
    // }

    // public function show2(){
    //     $this->display();
    // }

    public function show(){
        $vrid = I('get.id',null);
        if(!$vrid){
            $this->error('未指定参数');
        }
        $data = $this->recruit->where(['id'=>$vrid])->find();
        $data['pic'] =unserialize($data['pic']);
        $this->assign(compact('data'));
        $this->display();
    }

    public function show1()
    {
        $vrid = I('get.id',null);
        if(!$vrid){
            $this->error('未指定参数');
        }
        $data = $this->train->where(['id'=>$vrid])->find();
        $data['pic'] =unserialize($data['pic']);
        $this->assign(compact('data'));
        $this->display();
    }
    //检测是否登陆
    private function checkLogin(){
        //$userInfo = User::getInstance()->getInfo();
       $username=service("Passport")->username;
       
        return empty($username)?false:true;
    }
}


