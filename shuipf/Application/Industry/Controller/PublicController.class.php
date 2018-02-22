<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员中心
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industry\Controller;

class PublicController extends IndustryBaseController {
     //会员模型相关配置
    protected $memberConfig = array();
    //会员模型缓存
    protected $memberModel = array();
    //会有组缓存
    protected $memberGroup = array();
    //会员数据库对象
    protected $memberDb = NULL;
    //用户id
    protected $userid = 0;
    //用户名
    protected $username = NULL;
    //用户信息
    protected $userinfo = array();
    //是否connect登陆
    protected $isConnectLogin = false;
       protected function _initialize() {
           G('run');
        parent::_initialize();
        $this->memberConfig = cache("Member_Config");
        $this->memberGroup = cache("Member_group");
        $this->memberModel = cache("Model_Member");
        $this->memberDb = D('Member/Member');
   }
   //登录页面
    public function login() {
        $forward = $_REQUEST['forward'] ? $_REQUEST['forward'] : cookie("forward");
        cookie("forward", null);
        if (!empty($this->userid)) {
            // $this->success("您已经是登陆状态！", $forward ? $forward : U("Index/index"));
            $this->redirect($forward ? $forward :"Industry/Index/index");
        } else {
            $this->assign('forward', $forward);
            if(I('company')=='1'){
                $this->display('Public:login_company');
            }else{
                $this->display('Public:login_personal');
            }
        }
    }

    //注册页面
    public function register() {
        if (empty($this->memberConfig['allowregister'])) {
            $this->error("系统不允许新会员注册！");
        }
        $forward = $_REQUEST['forward'] ? : cookie("forward");
        cookie("forward", null);
        if ($this->userid) {
            $this->success("您已经是登陆状态，无需注册！", $forward ? $forward : U("Index/index"));
        } else {
            $count = $this->memberDb->where(array('checked' => 1))->count('userid');
            //取出人气高的8位会员
            $heat = $this->memberDb->where(array('checked' => 1))->order(array('heat' => 'DESC'))->field('userid,username,heat')->limit(8)->select();

            $this->assign('heat', $heat);
            $this->assign('count', $count);
            if(I('company')=='1'){
                $this->display('Public:register_company');
            }else{
                $this->display('Public:register_personal');
            }
        }
    }
      //验证注册
    public function doRegister() {
        if (empty($this->memberConfig['allowregister'])) {
            $this->error("系统不允许新会员注册！");
        }
        $post = I('post.');
        //用户名
        $post['username'] = I('post.username');
        //设置密码
        $post['password'] = I('post.password');
        if (empty($post['password'])) {
            $this->error('请输入您的密码！');
        }
        if (false == isMin($post['password'], 6)) {
            $this->error('密码不能小于6位！');
        }
        //确认密码
        $password2 = I('post.password2');
        if ($post['password'] != $password2) {
            $this->error('两次输入密码不相同！');
        }
        //昵称
        $post['nickname'] = I('post.nickname');
        //邮箱
        $post['email'] = I('post.email');
        $type = I('post.type');
        if($type == '2'){
            $post['nickname'] = $post['username'];
        }
        //昵称
        // $post['nickname'] = I('post.nickname');
        // if (empty($post['nickname'])) {
        //     $this->error('用户昵称不能为空！');
        // }
        // //邮箱
        $post['email'] = I('post.email');
        if (empty($post['email'])) {
            $this->error('用户邮箱不能为空！');
        }
        //验证码
        $vCode = I('post.vCode');
        if (false == $this->verify($vCode, 'userregister')) {
            $this->error('验证码错误，请重新输入！');
        }
        $info = $this->memberDb->token(false)->create($post);
        if ($info) {
            //模型选择,如果是关闭模型选择，直接赋值默认模型
            if ((int) $this->memberConfig['choosemodel']) {
                if (!isset($info['modelid']) || empty($info['modelid'])) {
                    $info['modelid'] = (int) $this->memberConfig['defaultmodelid'];
                } else {
                    //检查模型id是否合法
                    if (!isset($this->memberModel[$info['modelid']])) {
                        $info['modelid'] = (int) $this->memberConfig['defaultmodelid'];
                    }
                }
            } else {
                $info['modelid'] = (int) $this->memberConfig['defaultmodelid'];
            }
            //新会员注册需要邮件验证
            if ($this->memberConfig['enablemailcheck']) {
                $info['groupid'] = 7;
                $info['checked'] = 1;
            } else {
                //新会员注册需要管理员审核
                if ($this->memberConfig['registerverify']) {
                    $info['checked'] = 0;
                } else {
                    $info['checked'] = 1;
                }
            }
            // if (empty($info['modelid'])) {
            //     $this->error('请选择会员模型！');
            // }
            $userid = service("Passport")->userRegister($info['username'], $info['password'], $info['email']);
            if ($userid > 0) {
                //获取用户信息
                $memberinfo = service("Passport")->getLocalUser((int) $userid);
                $info['username'] = $memberinfo['username'];
                $info['password'] = $memberinfo['password'];
                $info['email'] = $memberinfo['email'];
                //新注册用户积分
                $info['point'] = $this->memberConfig['defualtpoint'] ? $this->memberConfig['defualtpoint'] : 0;
                //新会员注册默认赠送资金
                $info['amount'] = $this->memberConfig['defualtamount'] ? $this->memberConfig['defualtamount'] : 0;
                //如果是邮箱验证，设置会员为未审核状态
                if (!empty($this->memberConfig['enablemailcheck'])) {
                    $info['checked'] = 0;
                    $info['groupid'] = 7;
                } else {
                    //计算用户组
                    $info['groupid'] = $this->memberDb->get_usergroup_bypoint($info['point']);
                }
                if (false !== $this->memberDb->where(array('userid' => $memberinfo['userid']))->save($info)) {
                    if ($this->memberConfig['enablemailcheck']) {
                        //发送邮件
                        $URL_MODEL = C('URL_MODEL');
                        C("URL_MODEL", 0);
                        $verifyEmailUrl = U('Member/Index/verifyemail', array('key' => urlencode(\Libs\Util\Encrypt::authcode($userid . '|' . $memberinfo['username'] . '|' . $memberinfo['email'], '', '', 86400))));
                        C("URL_MODEL", $URL_MODEL);
                        $message = $this->memberConfig['registerverifymessage'];
                        if (empty($message)) {
                            $message = 'Hi，{$username}:

                                                    欢迎您注册成为 ShuipFCMS 用户，您的账号需要邮箱认证，点击下面链接进行认证：

                                                    <a href="{$url}" target="_blank">{$url}</a>

                                                    如果链接无法点击，请完整拷贝到浏览器地址栏里直接访问。

                                                    邮件服务器自动发送邮件请勿回信 {$date}';
                        }
                        $message = str_replace(array(
                            '{$username}',
                            '{$userid}',
                            '{$email}',
                            '{$url}',
                            '{$date}',
                                ), array(
                            $memberinfo['username'],
                            $userid,
                            $memberinfo['email'],
                            $verifyEmailUrl,
                            date('Y-m-d H:i:s'),
                                ), \Input::nl2Br($message));
                        SendMail($info['email'], "注册会员验证邮件", $message);
                        $this->success("邮件已经发送到你注册邮箱，根据邮件内容完成验证操作！", U('Member/Index/index'));
                        exit;
                    } else {
                        if (!$info['checked']) {
                            $this->success("会员注册成功，但需要管理员审核通过！", U('Member/Index/index'));
                            exit;
                        }
                    }
                    //注册登陆状态
                    service("Passport")->loginLocal($post['username'], $post['password']);
                    //tag 行为
                    tag('action_member_registerend', $memberinfo);
                    //注册成功后，添加模型的数据来源页
                    $this->addRosource($userid,I('post.source_page'));
                    $this->success('会员注册成功！',U('Industrymem/Index/index'));

                } else {
                    //删除
                    service("Passport")->userDelete($memberinfo['userid']);
                    $this->error("会员注册失败！");
                }
            } else {
                $this->error(service("Passport")->getError()? : '帐号注册失败！');
            }
        } else {
            $this->error($this->memberDb->getError()? : '帐号注册失败！');
        }
    }
    //退出
    public function logout() {
        service("Passport")->logoutLocal();
        session("connect_openid", NULL);
        session("connect_app", NULL);
        //注销在线状态
        D('Member/Online')->onlineDel();
        //tag 行为点
        tag('action_member_logout');

        // xn_user_token_clear();
        $_SESSION['uid'] = 0;

        $this->success("退出成功！", U("Industry/Index/index"));
    }
        //add by libing
    public function addRosource($userid,$source_page){
        $data = array();
        $data['userid'] =$userid;
        $data['source_page'] = $source_page;
        M('MemberCommon')->add($data);
    }
}