<?php
/**
 * tpshop
 * ============================================================================
 * * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: IT宇宙人 2015-08-10 $
 */ 
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    public $broker = null;
    public $userBroker = null;
    public $session_id;
    public $cateTrre = array();
    /*
     * 初始化操作
     */
    public function _initialize() {  
    	$this->session_id = session_id(); // 当前的 session_id
        define('SESSION_ID',$this->session_id); //将当前的session_id保存为常量，供其它方法调用
        // 判断当前用户是否手机                
        if(isMobile())
            cookie('is_mobile','1',3600); 
        else 
            cookie('is_mobile','0',3600);

        $this->sync_login();                  
        $this->public_assign(); 
    }
    /**
     * 保存公告变量到 smarty中 比如 导航 
     */
    public function public_assign()
    {
        
       $tpshop_config = array();
       $tp_config = M('config')->cache(true,TPSHOP_CACHE_TIME)->select();       
       foreach($tp_config as $k => $v)
       {
       	  if($v['name'] == 'hot_keywords'){
       	  	 $tpshop_config['hot_keywords'] = explode('|', $v['value']);
       	  }       	  
          $tpshop_config[$v['inc_type'].'_'.$v['name']] = $v['value'];
       }                        
       
       $goods_category_tree = get_goods_category_tree();    
       $this->cateTrre = $goods_category_tree;
       $this->assign('goods_category_tree', $goods_category_tree);                     
       $brand_list = M('brand')->cache(true,TPSHOP_CACHE_TIME)->field('id,cat_id1,logo,is_hot')->where("cat_id1>0")->select();              
       $this->assign('brand_list', $brand_list);
       $this->assign('tpshop_config', $tpshop_config);          
    }  
    //判断
    public function sync_login(){
        require_once getcwd().'/../vendor/autoload.php';
        $sso_config = require(getcwd().'/../Ssoserver/config.php');
        if(!$sso_config['SSO_SERVER_OPEN']){return null;}
        $userLocal = $_SESSION['user'];
        $this->broker = new \Jasny\SSO\Broker($sso_config['SSO_SERVER_URL'],'tpshop','89435hjh47pypox2pc');
        $this->broker->attach(true);
        //获取Broker
        try{
            $this->userBroker = $this->broker->getUserInfo();
        } catch (NotAttachedException $e) {
        } catch (SsoException $e) {
        }
        //本地同步登陆
        if(!empty($this->userBroker) && empty($userLocal)){
            $username = $this->userBroker['username'];
            $userModel = M('users');
    	    $res = $userModel->where("mobile='{$username}' OR email='{$username}' OR username='{$username}'")->find();
            if(!$res || $res['is_lock'] == 1){
                return false;
            }
            setcookie('user_id',$res['user_id'],null,'/');
            setcookie('is_distribut',$res['is_distribut'],null,'/');
            setcookie('uname',urlencode($res['nickname']),null,'/');
            setcookie('cn',0,time()-3600,'/');
            session('user',$res);
        
        }//本地同步退出
        else if(empty($this->userBroker) && !empty($userLocal) && !strpos($_SERVER['HTTP_REFERER'],'login')){
            setcookie('uname','',time()-3600,'/');
            setcookie('cn','',time()-3600,'/');
            setcookie('user_id','',time()-3600,'/');
            session_unset();
            session_destroy();
        }//本地其他操作
        else{
            return null;
        }

    }
}