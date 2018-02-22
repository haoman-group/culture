<?php

// +----------------------------------------------------------------------
// | 文化产品展示馆 控制器
// +----------------------------------------------------------------------
// | 创建时间: 2017-07-28 16:13:14
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;

class IndustryproductController extends AdminBase {
    private $model = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Admin/IndustryProduct');
        $this->assign('maxPicNum',1);
    }
    //首页列表
    public function index(){
		$data = $this->model->getField('id,title,image,url');
		$this->assign('data',$data);
		$this->display();
    }
    //新增
    public function add(){
        if(IS_POST){
            $data = I('post.',null);
            if($this->model->create($data)){
                $id = $this->model->add();
                if($id){
                    $this->success('添加成功!',U('index'));
                }else{
                    $this->error('添加错误:'.$this->model->getError());
                }
            }else{
                $this->error('添加数据错误:'.$this->model->getError());
            }
        }else{
            $this->display();
        }
    }
    //修改
    public function edit(){
        $id = I('request.id',null);
        if($id){
            if(IS_POST){
                $data = $_POST;
                $data['image'] = $data['image_url'][0];
                if($this->model->create($data)){
                    $id = $this->model->save();
                    if($id){
                        $this->success('更新成功!',U('index'));
                    }else{
                        $this->error('更新错误:'.$this->model->getError());
                    }
                }else{
                    $this->error('更新数据错误:'.$this->model->getError());
                }
            }else{
                $data = $this->model->where(['id'=>$id])->find();
                $this->assign('data',$data);
                $this->display();
            }
        }else{
            $this->error('为指定内容ID');
        }
    }
    //删除
    public function delete(){
        $where['id'] = I('id');
        $this->model->where($where)->delete();
        $this->success('删除成功!', U('index'));
    }
}