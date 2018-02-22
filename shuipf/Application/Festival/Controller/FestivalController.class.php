<?php

namespace Api\Controller;

use Common\Controller\ShuipFCMS;

class FestivalController extends Base {
    protected function _initialize(){
        parent::_initialize();
        $this->model =  null;
    }
}