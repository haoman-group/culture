<?php


namespace Industry\Controller;

use Common\Controller\Base;
use Libs\Util\CuSearch;
use Admin\Service\User;
use Member\Controller\Memberbase;
class IndustryBaseController extends Base
{
	//用户id
    protected $userid = 0;
    //用户名
    protected $username = NULL;
   	protected function _initialize() {
    	parent::_initialize();
		$this->userid =(int) service("Passport")->userid;
        $this->assign('uid',$this->userid );
		$this->username = service("Passport")->username;
        $this->assign('username', $this->username);
   	}

	   
}
