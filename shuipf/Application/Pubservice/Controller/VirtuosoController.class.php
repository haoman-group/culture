<?php
/**
 * 艺术品鉴赏家 
 * 2017-12-20 libing
 * 
 */
namespace Pubservice\Controller;
use Pubservice\Controller\PubBaseController;
use Admin\Service\User;
class VirtuosoController extends PubBaseController
{ 
    protected $model = null;
    protected function _initialize(){   
        parent::_initialize();
        $this->model = D('Admin/Virtuoso');
    }
    /**
     * 首页
     *
     * @return void
     */
    public function index(){
        $this->display();
    }
    /**
     * 详情页
     *
     * @return void
     */
    public function detail(){
        $this->display();
    }
    /**
     * 搜索方法
     *
     * @return void
     */
    public function search(){

    }
}