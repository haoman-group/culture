<?php
namespace Industrymem\Controller;

class MessageInfoController extends MemberBase {

	protected function _initialize() {
        parent::_initialize();
        $this->model = D('Member/Member');
    }
    public function index(){
    	echo 2;
    	// echo $b = md5(123456);
    	$a = $this->model->ChangePassword('wangchunxin',123456);
    	echo $a;
    }
}