<?php
/**
 * 文化设施
 */
namespace Phone\Controller;
use Common\Controller\Base;
class HeritageController extends Base {
    protected $model = null;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->model = D('Admin/Heritage');
        $this->assign('title',"非遗专题");
    }
    //首页
    public function index(){
     
        $lists = $this->model->scope('normal')->select();
        //svar_dump($lists);exit;
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