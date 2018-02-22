<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 前台Controller
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Common\Controller;
use Admin\Service\User;
use Libs\Util\MyBroker;

class Base extends ShuipFCMS {
    
    protected $area = [];
    //初始化
    protected function _initialize() {
        parent::_initialize();
        $this->area =  $this->_getCityName();
        // var_dump($this->area);
        //静态资源路径
        $this->assign('model_extresdir', self::$Cache['Config']['siteurl'] . MODULE_EXTRESDIR);
        $this->sync_login();
    }

    /**
     * 模板显示 调用内置的模板引擎显示方法，
     * @access protected
     * @param string $templateFile 指定要调用的模板文件
     * 默认为空 由系统自动定位模板文件
     * @param string $charset 输出编码
     * @param string $contentType 输出类型
     * @param string $content 输出内容
     * @param string $prefix 模板缓存前缀
     * @return void
     */
    protected function display($templateFile = '', $charset = '', $contentType = '', $content = '', $prefix = '') {

       $this->view->display(parseTemplateFile($templateFile), $charset, $contentType, $content, $prefix);
       
    }

  protected  function getCategory($catid, $field = '', $newCache = false) {
    if (empty($catid)) {
        return false;
    }
    $key = 'getCategory_' . $catid;
  
    //强制刷新缓存
    if ($newCache) {
        S($key, NULL);
    }
    $cache = S($key);
    if ($cache === 'false') {
        return false;
    }
    if (empty($cache)) {
        //读取数据
        $cache = M('Category')->where(array('catid' => $catid))->find();

        if (empty($cache)) {
            S($key, 'false', 60);
            return false;
        } else {
            //扩展配置
            $cache['setting'] = unserialize($cache['setting']);
            //栏目扩展字段
            $cache['extend'] = $cache['setting']['extend'];
            S($key, $cache, 3600);
        }
    }
    if ($field) {
        //支持var.property，不过只支持一维数组
        if (false !== strpos($field, '.')) {
            $vars = explode('.', $field);
            return $cache[$vars[0]][$vars[1]];
        } else {

            return $cache[$field];
        }
    } else {
        
        return $cache;
    }
    
}
    /**
     * SSO 单点登陆
     *
     * @return void
     */
    public function sync_login(){
        if(!IS_GET){return true;}
        require_once 'vendor/autoload.php';
        $sso_config = require(getcwd().'/Ssoserver/config.php');
        if(!$sso_config['SSO_SERVER_OPEN']){return null;}
        //获取Broker
        try{
            $userBroker = MyBroker::getUserInfo();
        } catch (NotAttachedException $e) {
        } catch (SsoException $e) {
        }
        if(!empty($userBroker) && !service('Passport')->isLogged()){
            // 本地同步登陆
            // var_dump($userBroker);
              //注册用户登陆状态
            if (service('Passport')->registerLogin($userBroker, $cookieTime ? 86400 * 180 : 86400)) {
                $map['userid'] = $userBroker['userid'];
                $map['username'] = $userBroker['username'];
                //修改登陆时间，和登陆IP
                D("Member/Member")->where($map)->save(array(
                    "lastdate" => time(),
                    "lastip" => get_client_ip(),
                    "loginnum" => $userinfo['loginnum'] + 1,
                ));
            }
        }else if(empty($userBroker) && service('Passport')->isLogged() && !strpos($_SERVER['HTTP_REFERER'],'doLogin')){
            //本地同步退出
            service("Passport")->logoutLocal();
            session("connect_openid", NULL);
            session("connect_app", NULL);
            //注销在线状态
            D('Member/Online')->onlineDel();
            //tag 行为点
            tag('action_member_logout');
            //后台用户退出
            User::getInstance()->logout();
            //手动登出时，清空forward
            cookie("forward", NULL);
            session('login_type',null);
            
        }else{
            // nothing to do
        }
    }
     //解析域名和子域名，转换为地区编码
     protected function _getAreaByDomain(){
        $host_name = I('server.HTTP_HOST',null);
        $areaModel = D('Admin/Area');
        //默认为全省
        $result = $areaModel->getProvinceID();
        if($host_name){    
            //去空格、转小写
            $host_name = strtolower(trim($host_name));
            //获取子域名
            $sub_domain = strstr($host_name,'.',true);
            //获取地区ID
            if($sub_domain && ($sub_domain != 'www')){
                $area_id = D('Admin/AreaData')->where(['sub_domain'=>$sub_domain])->getField('area_id');
                if($area_id){
                    $result=$area_id;
                }
            }
        }
        return (int)$result;
    }
    protected function _getCityName(){
        $area_id = $this->_getAreaByDomain();
        //用户自定义地区
        if($area_id){
            if(is_numeric($area_id) && $area_id !=25000000){
                $city=D('Admin/Area')->where(array('id'=>$area_id))->find();
                $cityname = $city['name'];
                $area_span = $city['span'];
            }else{
                $cityname='全省';
                $area_span = D('Admin/Area')->SHENG();
            }
        }else{//根据ip确定地点
            $cityInfo = $this->getIpInfo();
            if($cityInfo){
                $shownum = strpos($cityInfo['city'],"市");
                $cityer  = substr($cityInfo['city'],0,$shownum);
                $city = D('Admin/Area')->where(array('name'=>array("like","%".$cityer."%")))->find();
                cookie('culture_area_id',$city['id']);
                $cityname = $city['name'];
                $area_id  =$city['id'];
                $area_span = $city['span'];
            }else{
                $cityname='全省';
            }
        }
        
        $area_data =  D('Admin/AreaData')->where(['area_id'=>$area_id])->find();
        if($area_data){
            $modules = unserialize($area_data['modules']);
        }
        $this->assign('cityname',$cityname);
        return ['id'=>$area_id,'cityname'=>$cityname,'modules'=>$modules,'slide_style'=>$area_data['slide_style'],'area_span'=>$area_span];
    }
}