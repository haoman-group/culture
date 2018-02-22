<?php

namespace Industry\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
use Content\Model\ContentModel;

class ShopController extends IndustryBaseController {
    protected function _initialize() {
        parent::_initialize();
    }
    //- Tpshop正在建设中的方法
    public function index()
    {
        return $this->display();
    }
}