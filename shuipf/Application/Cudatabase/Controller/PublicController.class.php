<?php

// +----------------------------------------------------------------------
// | Cudatabase 模块公共控制器
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Cudatabase\Controller;
use Common\Controller\Base;
use Admin\Service\User;
class PublicController extends Base {
    //登录页面
    public function doLogin(){
        if(IS_POST){
            // var_dump($_POST);
            //登录类型 
            $tabname=I('get.tablname'); 
            $type = I("post.type",'normal');
            //账户名称
            $username = I("post.username", null, "trim");
            //账户密码
            $password = I("post.password", null, "trim");
            //下次自动登陆
            $cookieTime = I('post.cookieTime', 0, 'intval');
            //普通用户
            if($type === 'normal'){
                $userid = service('Passport')->loginLocal($username, $password, $cookieTime ? 86400 * 180 : 86400);
                if($userid >0){
                    $checked=D('Admin/Member')->where(array('userid'=>$userid))->getField('checked');
                    if($checked == '0'){
                        $this->error('该用户审核还没有通过');
                        unset($userid);
                    }else{
                    //登录成功
                    session('login_type','normal');
                    // redirect($_SERVER['HTTP_REFERER']);
                    if($tabname == 'pubservice-register'){
                        //echo 123;exit;
                       redirect(U('Pubservice/Index/index'));
                    }else{
                    redirect(U('Cudatabase/Index/index'));
                }
            }
                }else{
                    //登录失败
                    $this->assign('error_msg','账号或密码错误！');
                }
            }else if($type === 'admin'){ //后台管理员
                if (User::getInstance()->login($username, $password)) {
                    //登录成功
                    session('login_type','admin');
                    redirect(U('Cudatabase/Index/index'));
                }else{
                    //登录失败
                    $this->assign('error_msg','账号或密码错误！');
                }
            }else{
                
            }
        }
        $this->display();
    }
    //退出方法
    public function doLogout(){
        //前台用户退出
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
        $this->success('退出成功！');
    }
}