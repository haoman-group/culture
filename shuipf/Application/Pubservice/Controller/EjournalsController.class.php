<?php
//电子期刊
namespace Pubservice\Controller;

use Admin\Service\User;

class EjournalsController extends PubBaseController
{
    protected function _initialize()
    {
        parent::_initialize();
        $this->model = D("Admin/Ejournals");
        $userInfo = User::getInstance()->getInfo();
        $this->assign('userInfo', $userInfo);
        $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
    }
    public function index(){
        $pagenum = I('get.page',1);
        $where['status'] = 'on';
        $count = $this->model->scope('normal')->where($where)->count();
        $page = new \Libs\Util\Page($count, 12, $pagenum);
        //设置分页参数
        $page->SetPager('baseservices', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        //获取当前页数据
        $data = $this->model->scope('normal')->page($pagenum . ',12')->where($where)->order('id desc')->select();
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
    public function show(){
        $id = I('request.id',null);
        if($id){
            $data = $this->model->where(['id'=>$id])->find();
            $data['content'] = unserialize($data['content']);
            $this->assign('data',$data);
        }
        $this->display();
    }
}