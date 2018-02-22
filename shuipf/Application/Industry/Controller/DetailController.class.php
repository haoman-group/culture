<?php
namespace Industry\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
	class DetailController extends IndustryBaseController{
		public function index(){
			$id=I('get.id');
			$data=M('business_alliance')->where(array('id'=>$id))->find();
//			$data=$data['survey'];
			$this->assign('data',$data);
			$this->display();
		}
	}
