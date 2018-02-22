<?php

namespace Api\Controller;

use Common\Controller\ShuipFCMS;

class ApiBaseController extends ShuipFCMS {
    protected $model = null;
    protected function _initialize(){
        parent::_initialize();
    }
}