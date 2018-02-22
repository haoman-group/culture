<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 20/10/2016
 * Time: 17:20
 */

namespace Api\Controller;

use Common\Controller\Base;

class AddressController extends Base {
    private $model = null;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Admin/Area');
    }

    public function getArea() {
        $id = I('get.id');
        $where = array("status"=>"0");
        if(empty($id) && ($id === '0')){
            $id = '1';
            $where['id'] = "25000000";
        }
        $where['pid'] = $id;
        $result = $this->model->where($where)->select();
        $data = array();
        foreach($result as $key=>$val) {
            $data[$val['id']] = array('name' => $val['name']);
        }
        echo json_encode($data);
    }



     public function Area() {
        $id = I('get.id');
        $where = array("status"=>"0");
        if(empty($id) && ($id === '0')){
            $id = '1';
            // $where['id'] = "25000000";
        }
        $where['pid'] = $id;
        $result = $this->model->where($where)->select();
        $data = array();
        foreach($result as $key=>$val) {
            $data[$val['id']] = array('name' => $val['name']);
        }
        echo json_encode($data);
    }

}