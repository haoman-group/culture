<?php
// +----------------------------------------------------------------------
// | PUbserveice Base Public server 公共文化服务平台-基本服务项目公示
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Pubservice\Controller;
use Common\Controller\Base;
use Admin\Service\User;

class PubBaseController extends Base {
    protected function _initialize(){
        parent::_initialize();
        $this->_checkLogin();
        $this->_assignCate();
        
    }
    private function getClientIP(){
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if($_SERVER['HTTP_X_REAL_IP']){//nginx 代理模式下，获取客户端真实IP
            $ip=$_SERVER['HTTP_X_REAL_IP'];     
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {//客户端的ip
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {//浏览当前页面的用户计算机的网关
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];//浏览当前页面的用户计算机的ip地址
        }else{
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : false;
        return $ip[$type];
    }
    //根据客户端IP获取城市名
    private function getIpInfo($ip){
        $ip = $ip?$ip:$this->getClientIP();
        if(empty($ip)){
            return false;
        } 
        $url='http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
        $result = file_get_contents($url);
        $result = json_decode($result,true);
        if($result['code']!==0 || !is_array($result['data'])) return false;
        return $result['data'];
    }
   
    //推送分类信息
    public function _assignCate(){
        //获取本地市级信息 按照特定顺序
        $cateinfo['city']  = D('Admin/Area')->getLocalCity(false,true);                         
        //获取市级区县的信息
        foreach( $cateinfo['city'] as $key =>$value){
             $cateinfo['city'][$key]['county']=D('Admin/Area')->where(array('pid'=>$value['id']))->select();  
        }
        $cateinfo['county'] = D('Admin/Area')->getLocalCounty(I('get.city','太原'));
        //馆站信息
        $cateinfo['type'] = \Admin\Controller\BaseservicesController::$type;
        $this->assign('cateinfo',$cateinfo);
    }
    //根据url获取搜索条件
    public function _getWhere(){
        $where = array();
        if(I('get.city',null)){
            $where['city'] = I('get.city');
        }
        if(I('get.county',null)){
            if(!isset($where['city'])){//只选择了区县没有选择城市时，默认为太原市
                $where['city'] = '太原';
            }
            $where['county'] = I('get.county');
        }
        if(I('get.type',null)){
            $where['type'] = I('get.type');
        }
        return $where;
    }

    
    protected function _checkLogin(){
        $this->login_type = session('login_type');
        //var_dump(User::getInstance()->id);exit;
        //不检测的模块及方法
       //var_dump(MODULE_NAME);exit;
        // if (MODULE_NAME == 'Cudatabase' && in_array(CONTROLLER_NAME, array('Public')) && in_array(ACTION_NAME, array('doLogin', 'doLogout'))) {
        //     return true;
        // }
        // //判断是否为后台管理员登录
        // if (User::getInstance()->id) {
        //     //待办任务个数
        //    // 
        //     $this->assign('gtasks',R('Admin/Action/getGTasks'));
        //     //$this->assign('username',User::getInstance()->username);
        //      $this->assign('id',User::getInstance()->id);
        //     $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
        //     return true;
        // }
        // //判断是否为前台用户
        if((int) service("Passport")->userid){
            $this->assign('username',service("Passport")->username);
            $this->assign('id',service("Passport")->userid);

            $this->assign('admin_url',"");
            return true;
        }
        // //未登录则跳转至登录页面
        // $this->redirect('Cudatabase/Public/doLogin',array('type'=>'database-register'));
    }

    
    protected function getTpshopcategory(){

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
//可以直接把读取到的数据赋值给数组或者通过字段名的形式赋值也可以
           //var_dump($rows);exit;
           $array[] = $rows;
         
        }
        return  $array;
        

    }
}