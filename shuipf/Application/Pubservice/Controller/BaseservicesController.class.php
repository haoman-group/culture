<?php
// +----------------------------------------------------------------------
// | PUbserveice Base Public server 公共文化服务平台-基本服务项目公示
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Pubservice\Controller;
use Admin\Service\User;
use Pubservice\Controller\PubBaseController;
class BaseservicesController extends PubBaseController {
    protected $model = null;
    protected function _initialize(){
        parent::_initialize();
         $this->model = D('Admin/BaseServices');
         $userInfo = User::getInstance()->getInfo();
         $this->assign('userInfo', $userInfo);
         $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
    }
    //主页
    public function index(){
        $pagenum = I('get.page',1);
        $where = $this->_getWhere();
        $count = $this->model->scope('normal')->where($where)->count();
        $page = new \Libs\Util\Page($count, 12, $pagenum);
        //设置分页参数
        $page->SetPager('baseservices', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        //获取当前页数据
        $data = $this->model->scope('normal')->relation(true)->page($pagenum . ',12')->where($where)->order('id desc')->select();
        //分页跳转的时候保证查询条件
        foreach ($where as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }
        //分页显示输出
        $pageinfo["page"] = $page->show('landmark');
        $pageinfo["data"] = $data;
        //输出
        $this->assign('pageinfo',$pageinfo);
        $this->display();
    }
    //详情页
    public function show(){
        $id = I('request.id',null);
        if(!empty($id)){
            $data = $this->model->scope('normal')->relation(true)->where(array('id'=>$id))->find();
            $this->assign('data',$data);
        }
        $this->display();
    }
}


