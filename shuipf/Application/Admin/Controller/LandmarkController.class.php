<?php

// +----------------------------------------------------------------------
// | 公共文化服务平台   文化地标后台页
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Common\Controller\AdminBase;

class LandmarkController extends AdminBase {
    protected $model = null;
    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Admin/Landmark');
    }

    //列表页
    public function index(){
        $pagenum = I('get.page',1);
        $count = $this->model->scope('normal')->count();
        $page = new \Libs\Util\Page($count, 20, $pagenum);
        //设置分页参数
        $page->SetPager('landmark', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        //获取当前页数据
        $data = $this->model->scope('normal')->page($pagenum . ',20')->select();
        //分页跳转的时候保证查询条件
        foreach ($where as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }
        //分页显示输出
        $pageinfo["page"] = $page->show('landmark');
        $pageinfo["data"] = $data;
        $this->assign('pageinfo',$pageinfo);
        $this->display();
    }
    //新增及修改页
    public function addEdit(){
        if(IS_POST){
            if($this->model->create($_POST)){
                if($_POST['id'] !=''){
                    $this->model->save();
                }else{
                    $this->model->add();
                }
            }else{
                 $this->error($this->model->getError());
            }
            $this->success('添加成功!',U('index'));
        }else{
            $id = I('request.id',null);
            if(!empty($id)){
                $data = $this->model->scope('normal')->where(array('id'=>$id))->find();
                $this->assign('data',$data);
            }
            $this->display();   
        }
    }
    //删除操作
    public function delete(){
        $id = I('request.id','');
        $this->model->scope('normal')->where(array('id'=>$id))->setField('isdelete','1');
        $this->success('删除成功!',U('index'));
    }
}