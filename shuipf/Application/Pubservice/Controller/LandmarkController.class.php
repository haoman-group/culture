<?php
// +----------------------------------------------------------------------
// | PUbserveice Landmark 公共文化服务平台-文化地标
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Pubservice\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Pubservice\Controller\PubBaseController;
class LandmarkController extends PubBaseController {
    protected $model = null;
    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Admin/Landmark');
        $userInfo = User::getInstance()->getInfo();
         $this->assign('userInfo', $userInfo);
         $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
    }
    //首页
    public function index(){
        $lists = $this->model->scope('normal')->select();
        $this->assign('lists',$lists);
        $this->display();
    }
    //详情展示页
    public function show(){
        $id = I('request.id',null);
        $data = $this->model->scope('normal')->where(array('id'=>$id))->find();
        $this->assign('data',$data)->display();
    }
}


