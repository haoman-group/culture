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
class PublicserviceController extends Base {
	//首页
	public function index(){
		$this -> display();
	}
}