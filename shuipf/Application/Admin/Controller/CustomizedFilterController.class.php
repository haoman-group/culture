<?php
/**
 * Created by PhpStorm.
 * User: zsun
 * Date: 1/25/17
 * Time: 07:52
 */

namespace Admin\Controller;

use Common\Controller\AdminBase;

class CustomizedFilterController extends AdminBase
{
    private $model = NULL;

    protected function _initialize()
    {
        parent::_initialize();
        $this->model = D('Admin/CustomizedFilter');
    }

    public function index()
    {
        $data = $this->model->where(array("isdelete" => 0))->select();
        $this->assign('data', $data);
        $this->assign("Custom", D('Admin/Menu')->getMenu(261));
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            $data = I('post.', '', '');
            $data['addtime'] = date("Y-m-d H:i:s", time());
            $this->model->add($data);
            redirect(U('CustomizedFilter/index'));
        } else {
            $new_filter_id = $this->model->getNewID();
            $this->assign("id", $new_filter_id);
            $this->display();
        }
    }

    public function edit()
    {
        if (IS_POST) {
            $data = I('post.', '', '');
            $data['addtime'] = date("Y-m-d H:i:s", time());
            $this->model->save($data);
            redirect(U('CustomizedFilter/index'));
        } else {
            $id = I('request.id', '', '');
            $data = $this->model->where(array('id'=>$id))->select();
            $this->assign("data", $data);
            $this->display();
        }
    }

    public function delete()
    {
        $id = I('request.id', '', '');
        if (!$id) {
            $this->error("请指定需要删除的项目！");
        }
        $cf = $this->model->find($id);
        if (!$cf) $this->error("不存在待删除数据");
        if (false == $this->model->where(array('id' => $id))->setField('isdelete', 1)) {
            $this->error('删除失败！');
        }
        $this->success('删除成功！');
    }
}