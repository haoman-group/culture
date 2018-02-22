<?php
// +----------------------------------------------------------------------
// | ShuipFCMS 公共服务平台
// +----------------------------------------------------------------------
// | Action Base: 首页
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Content\Controller;
use Common\Controller\Base;
use Content\Model\ContentModel;
class IndustrialserviceController extends Base {
	//首页
	public function index(){
		$this -> display();
	}

	// 产业项目
	public function industrial_index(){
		$this -> display();
	}

	public function industrial_general(){
		$this -> display();
	}

	public function industrial_important(){
		$this -> display();
	}

	public function industrial_report(){
		$this -> display();
	}

	public function industrial_release(){
		$this -> display();
	}

	public function industrial_show(){
		$this -> display();
	}

	// 产品展示
	public function product_show(){
		$this -> display();
	}

	public function product_theme(){
		$this -> display();
	}

	public function product_area(){
		$this -> display();
	}

	public function product_travel(){
		$this -> display();
	}

	public function product_detail(){
		$this -> display();
	}

	public function product_public(){
		$this -> display();
	}

	// 金融服务
	public function finser_service(){
		$this -> display();
	}

	public function finser_agent(){
		$this -> display();
	}

	public function finser_comment(){
		$this -> display();
	}

	public function finser_credit(){
		$this -> display();
	}

	public function finser_bank(){
		$this -> display();
	}

	// 消费服务
	public function iyc(){
		$this -> display();
	}

	public function iyc_message(){
		$this -> display();
	}

	public function iyc_strate(){
		$this -> display();
	}

	public function iyc_lianmeng(){
		$this -> display();
	}

	public function iyc_contant(){
		$this -> display();
	}
}