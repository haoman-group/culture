<?php
//艺术品鉴赏

namespace Pubservice\Controller;
use Pubservice\Controller\PubBaseController;
use Admin\Service\User;
class AppreciateController extends PubBaseController
{ 
    protected $model = null;
    protected function _initialize(){   
        parent::_initialize();
        $this->model = D('Admin/ReCulture');
        $userInfo = User::getInstance()->getInfo();
        $this->assign('userInfo', $userInfo);
        $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
        $this->assign('category',D('Admin/ArtCategory')->where(['parent_cid'=>6])->select());
    }
    //主页
    public function index(){
        $cid = I('get.cid',null);
        $pagenum = I('get.page',1);
        $where['if_position'] = '1';
        if($cid){
            $cid_range = D('Admin/ArtCategory')->getCidRange($cid);
            $where['art_cid'] = ['in',$cid_range];
        }
        $count = $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count, 12, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = $this->model->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        $page = $page->show('sellercenter');
        $this->assign(compact('data','page'));
        $this->display();
    }
}
