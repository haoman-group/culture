<?php
/**
 * 山西非物质文化遗产-影像志
 */
namespace Pubservice\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Pubservice\Controller\PubBaseController;
class HeritageController extends PubBaseController {
    protected $model = null;
    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Admin/Heritage');
    }
    //首页
    public function index(){
        $position = $this->model->order('position')->scope('normal')->find();
        $lists = $this->model->scope('normal')->where(['id'=>['NEQ',$position['id']]])->select();
        
        $this->assign(compact('lists','position'));
        $this->display();
    }
    //详情展示页
    public function show(){
        $id = I('request.id',null);
        $data = $this->model->scope('normal')->where(array('id'=>$id))->find();
        $this->assign('data',$data)->display();
    }
    //介绍页
    public function view(){
        $id = I('request.id',null);
        $data = $this->model->scope('normal')->where(array('id'=>$id))->find();
        //var_dump($data);exit;
        $this->assign('data',$data)->display();
    }
}