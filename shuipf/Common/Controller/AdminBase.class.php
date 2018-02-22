<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 后台Controller
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Common\Controller;

use Admin\Service\User;
use Admin\Model\AreaModel;
use Libs\System\RBAC;

//定义是后台
define('IN_ADMIN', true);

class AdminBase extends ShuipFCMS {
    //用户层级: 省市县
    public $UserLevel = null;
    //用户地区代码
    public $UserArea  = null;
    //地区查询条件
    public $where = array();
    //初始化
    protected function _initialize() {
        C(array(
            "USER_AUTH_ON" => true, //是否开启权限认证
            "USER_AUTH_TYPE" => 1, //默认认证类型 1 登录认证 2 实时认证
            "REQUIRE_AUTH_MODULE" => "", //需要认证模块
            "NOT_AUTH_MODULE" => "Public", //无需认证模块
            "USER_AUTH_GATEWAY" => U("Admin/Public/login"), //登录地址
        ));
        if (false == RBAC::AccessDecision(MODULE_NAME)) {
            //检查是否登录
            if (false === RBAC::checkLogin()) {
                //跳转到登录界面
                redirect(C('USER_AUTH_GATEWAY'));
            }
            //没有操作权限
            $this->error('您没有操作此项的权限！','',4000);
        }
        $this->assign('userInfo', User::getInstance()->getInfo());
        $this->UserLevel = User::getInstance()->getUserLevel();
        $this->UserArea = User::getInstance()->area;
        parent::_initialize();
        //验证登录
        $this->competence();
        $this->_getLevelWhere();
    }
    //根据区域层级 获取对应的搜索条件
	private function _getLevelWhere(){
        // var_dump($this->UserArea);exit;
        if(empty($this->UserArea) || $this->UserArea =='0'){
            return 0;
        }else{
            $this->where['area'] = D('Admin/Area')->getIDWhereCondition($this->UserArea,'area');   
        }
		// switch($this->UserLevel) {
		// 	case AreaModel::XIANG : break;
		// 	case AreaModel::XIAN  : 
		// 		//县级条件：与自己area字段相同
		// 		$this->where['area'] = $this->UserArea;
		// 		break;
		// 	case AreaModel::SHI   : 
		// 		//市级条件：所在市级及所属县级
		// 		$this->where['area'] = D('Admin/Area')->getIDWhereCondition($this->UserArea,'area');
		// 		break;
		// 	case AreaModel::SHENG : break;
		// 	default:
		// 	break;
		// }
	}
    /**
     * 验证登录
     * @return boolean
     */
    private function competence() {
        //检查是否登录
        $uid = (int) User::getInstance()->isLogin();
        if (empty($uid)) {
            return false;
        }
        //获取当前登录用户信息
        $userInfo = User::getInstance()->getInfo();
        if (empty($userInfo)) {
            User::getInstance()->logout();
            return false;
        }
        //是否锁定
        if (!$userInfo['status']) {
            User::getInstance()->logout();
            $this->error('您的帐号已经被锁定！', U('Public/login'));
            return false;
        }
        return $userInfo;
    }

    /**
     * 操作错误跳转的快捷方法
     * @access protected
     * @param string $message 错误信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    final public function error($message = '', $jumpUrl = '', $ajax = false) {
        D('Admin/Operationlog')->record($message, 0);
        parent::error($message, $jumpUrl, $ajax);
    }

    /**
     * 操作成功跳转的快捷方法
     * @access protected
     * @param string $message 提示信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    final public function success($message = '', $jumpUrl = '', $ajax = false) {
        D('Admin/Operationlog')->record($message, 1);
        parent::success($message, $jumpUrl, $ajax);
    }

    /**
     * 分页输出
     * @param type $total 信息总数
     * @param type $size 每页数量
     * @param type $number 当前分页号（页码）
     * @param type $config 配置，会覆盖默认设置
     * @return type
     */
    protected function page($total, $size = 20, $number = 0, $config = array()) {
        $Page = parent::page($total, $size, $number, $config);
        $Page->SetPager('default', '<span class="all">共有{recordcount}条信息</span>{first}{prev}{liststart}{list}{listend}{next}{last}');
        return $Page;
    }


    /**
     * 废弃
     *
     * @return void
     */
    protected function getTpshopcategory(){
//         $con = mysql_connect("localhost","root","123456");
//         mysql_query("set character set 'utf8'");
//         if (!$con){
//              return null;
//          }
//          mysql_select_db("tpshop", $con);
//          $result = mysql_query("SELECT * FROM `tp_goods_category` WHERE `parent_id`=2 ");
//         while($rows = mysql_fetch_array($result)){
// //可以直接把读取到的数据赋值给数组或者通过字段名的形式赋值也可以
//            //var_dump($rows);exit;
//            $array[] = $rows;
         
//         }
//         return  $array;
           $config=C('TPSHOP');
         // var_dump($config);exit;
           $con = mysql_connect($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD']);
           mysql_query("set character set 'utf8'");
        if (!$con){
             return null;
         }
         mysql_select_db($config['DB_NAME'], $con);
         $result = mysql_query("SELECT * FROM `tp_goods_category` WHERE `parent_id`=2 ");
        while($rows = mysql_fetch_array($result)){
           $array[] = $rows;
         
        }
        return  $array;

    }
    /**
     * 通用导出Excel方法
     *
     * @param array  $data                  导出数据集合
     * @param array  $column_comment_array  标题名称
     * @param string $Excel_filename        导出文件名称
     * @return 待下载的Excel文件
     */
    protected function ExportToExcel($data,$column_comment_array,$Excel_filename){
        if(!$data){return null;}
        //加载AutoLoaderPHPExcel
        require_once(PROJECT_PATH.'Libs'.DIRECTORY_SEPARATOR.'Util'.DIRECTORY_SEPARATOR.'PHPExcel.php');
        //设置语言编码
        \PHPExcel_Settings::setLocale(C('DEFAULT_LANG'));
        //在内存中创建PHPExcel对象
        $objPHPExcel = new \PHPExcel();
       $row=count($data);
       $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($column_comment_array,null,'A1');
        $objPHPExcel->getActiveSheet()->fromArray($data,null,'A2');
        //设置Sheet名称
        $objPHPExcel->getActiveSheet()->setTitle('export');
        //设置第一个Sheet为活动标签
        $objPHPExcel->setActiveSheetIndex(0);
        //http header settings
        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$Excel_filename.'"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        //下载文件
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

}
