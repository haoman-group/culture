<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 获取当前登陆信息
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Api\Controller;
use Common\Controller\Base;
class CalendarController extends Base {

    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Admin/FestivalCalendar');
    }


    public function index(){
        $data = $this->model->select();
        
        $res = [];
        foreach($data as $index=>$item){
            $tmp['id']=$item['id'];
            $tmp['title']=$item['title'];
            $tmp['class']=$item['class'];
            $tmp['start']=$item['start'].'000';
            $tmp['end']=$item['end'].'999';
            $res[] = $tmp;
        }
        
        echo json_encode(['success'=>1,'result'=>$res]);die();
    }
}