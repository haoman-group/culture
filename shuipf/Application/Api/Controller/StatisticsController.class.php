<?php

// +----------------------------------------------------------------------
// | 统计数据接口
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Api\Controller;

use Common\Controller\ShuipFCMS;
use Libs\Util\Page;

class StatisticsController extends ShuipFCMS {

    //地域资源分布统计
    public function AreaData(){
        //获取市级分类
        $data = array();
        $data['area'] = D('Admin/Area')->getLocalCity();
        if(!empty($data['area'])){
            $data['status'] ='success';
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn($data);
        }
    }

    public function random($cid, $area_id, $idx, $min, $max) {
        $seedstr = $cid.$area_id.$idx;
        srand(intval($seedstr));
        return rand($min, $max);
    }
    public function clickrate() {
        $art_cid = I('post.art_cid', "1");
        $area_id = I('post.area_id', "25000000");
        $data['title'] = "点击量";
        $data['column_list'] = array();
        $data['column_data'] = array();
        $columns = array(D('Admin/ArtCategory')->getCurrentCategory($art_cid));
        if ($columns[0]['is_parent'] == "1") {
            $columns = D('Admin/ArtCategory')->getCategory($art_cid);
        }

        foreach($columns as $col) {
            array_push($data['column_list'], $col['name']);
            $column_data_item = array();
            $column_data_item['name'] = $col['name'];
            $column_data_item['type'] = 'line';
            $column_data_item['stack'] = '总量';
            $column_data_item['areaStyle'] = array('normal'=>array());
            $column_data_item['data'] = array();
            for ($x = 0; $x < 7; $x++) {
                array_push($column_data_item['data'], $this->random($col['cid'], $area_id, strval($x), 100, 300));
            }
            array_push($data['column_data'], $column_data_item);
        }

        $data['pie_data'] = array();
        $data['pie_data']['MacOS'] = $this->random($art_cid, $area_id, "1", 200, 300);
        $data['pie_data']['Windows'] = $this->random($art_cid, $area_id, "2", 400, 500);
        $data['pie_data']['Linux'] = $this->random($art_cid, $area_id, "3", 100, 200);
        $data['pie_data']['iPad'] = $this->random($art_cid, $area_id, "4", 100, 200);
        $data['pie_data']['AndroidPad'] = $this->random($art_cid, $area_id, "5", 100, 200);
        $data['pie_data']['otherPad'] = $this->random($art_cid, $area_id, "6", 100, 200);
        $data['pie_data']['iPhone'] = $this->random($art_cid, $area_id, "7", 200, 300);
        $data['pie_data']['Android'] = $this->random($art_cid, $area_id, "8", 100, 200);
        $data['pie_data']['otherPhone'] = $this->random($art_cid, $area_id, "9", 100, 200);

        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$data));
    }

    public function downloadrate() {
        $art_cid = I('post.art_cid', "1");
        $area_id = I('post.area_id', "25000000");
        $data['title'] = "点击量";
        $data['column_list'] = array();
        $data['column_data'] = array();
        $columns = array(D('Admin/ArtCategory')->getCurrentCategory($art_cid));
        if ($columns[0]['is_parent'] == "1") {
            $columns = D('Admin/ArtCategory')->getCategory($art_cid);
        }

        foreach($columns as $col) {
            array_push($data['column_list'], $col['name']);
            $column_data_item = array();
            $column_data_item['name'] = $col['name'];
            $column_data_item['type'] = 'line';
            $column_data_item['stack'] = '总量';
            $column_data_item['areaStyle'] = array('normal'=>array());
            $column_data_item['data'] = array();
            for ($x = 0; $x < 7; $x++) {
                array_push($column_data_item['data'], $this->random($col['cid'], $area_id, strval($x), 100, 300));
            }
            array_push($data['column_data'], $column_data_item);
        }

        $data['pie_data'] = array();
        $data['pie_data']['MacOS'] = $this->random($art_cid, $area_id, "1", 200, 300);
        $data['pie_data']['Windows'] = $this->random($art_cid, $area_id, "2", 400, 500);
        $data['pie_data']['Linux'] = $this->random($art_cid, $area_id, "3", 100, 200);
        $data['pie_data']['iPad'] = $this->random($art_cid, $area_id, "4", 100, 200);
        $data['pie_data']['AndroidPad'] = $this->random($art_cid, $area_id, "5", 100, 200);
        $data['pie_data']['otherPad'] = $this->random($art_cid, $area_id, "6", 100, 200);
        $data['pie_data']['iPhone'] = $this->random($art_cid, $area_id, "7", 200, 300);
        $data['pie_data']['Android'] = $this->random($art_cid, $area_id, "8", 100, 200);
        $data['pie_data']['otherPhone'] = $this->random($art_cid, $area_id, "9", 100, 200);

        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$data));
    }
}
