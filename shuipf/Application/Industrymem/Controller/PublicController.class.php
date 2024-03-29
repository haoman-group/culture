<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员中心
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class PublicController extends MemberBase {

    //jsonp获取用户名片
    public function fetchusercard() {
        $uid = I('get.uid', 0, 'intval');
        $userInfo = service('Passport')->getLocalUser((int) $uid);
        if (empty($userInfo)) {
            $data = array(
                'status' => false,
            );
        } else {
            $data = array(
                //用户ID
                'uid' => $uid,
                //昵称
                'nickname' => $userInfo['nickname'],
                //性别
                'sex' => $userInfo['sex'],
                //个人介绍
                'about' => $userInfo['about'],
                //状态
                'status' => true,
                //头像地址
                'avatar' => service("Passport")->getUserAvatar((int) $uid, 45),
                //关注总数
                'following_num' => $userInfo['attention'],
                //粉丝总数
                'fans_num' => $userInfo['fans'],
                //分享总数
                'dance_num' => $userInfo['share'],
                //会员介绍
                'describes' => '',
                //勋章
                'medal' => array(
                ),
                //是否关注
                'follow' => array(
                    $uid => $this->userid ? D('Member/Friends')->isAchtungType($this->userid, $uid) : 0
                ),
            );
        }

        $callback = I('request.callback', '');
        if (empty($callback)) {
            $type = 'JSON';
        } else {
            $type = 'JSONP';
            C('VAR_JSONP_HANDLER', 'callback');
        }
        $this->ajaxReturn($data, $type);
    }

    //QQ空间登录框
    public function logindialog() {
        $forward = $_REQUEST['forward'] ? $_REQUEST['forward'] : cookie("forward");
        cookie("forward", null);
        $this->assign('forward', U('Index/index'));
        $this->display();
    }

    //相册图片上传
    public function uploadalbum() {
        $key = I('post.key');
        $key_userid = \Libs\Util\Encrypt::authcode($key, 'DECODE');
        if (empty($key_userid)) {
            $this->ajaxReturn(array(
                'info' => '请先登陆！',
                'error' => 20001,
            ));
        }
        //取得用户资料
        $userInfo = service("Passport")->getLocalUser((int) $key_userid);
        if (empty($userInfo)) {
            $this->ajaxReturn(array(
                'info' => '请先登陆！',
                'error' => 20001,
            ));
        }
        $Album = D('Member/Album');
        //上传图片数量已满
        if (false === $Album->getAlbumMax($key_userid)) {
            $this->ajaxReturn(array(
                'info' => '您的照片墙已满',
                'error' => 10005,
            ));
        }
        //获取附件服务
        $Attachment = service('Attachment', array(
            'type' => 'Local', //使用本地存储
            'module' => 'Album',
            'isadmin' => 0,
            'userid' => $key_userid,
            'uploadallowext' => array("jpg", "png", "gif", "jpeg"),
        ));
        $Attachment->thumb = true;
        $Attachment->thumbRemoveOrigin = false;
        //设置缩略图最大宽度
        $Attachment->thumbMaxWidth = 200;
        //设置缩略图最大高度
        $Attachment->thumbMaxHeight = 260;
        //回调函数
        $Callback = false;
        $info = $Attachment->upload($Callback);
        if ($info) {
            //访问地址
            $url = $info[0]['url'];
            //附件aid
            $aid = $info[0]['aid'];
            //大小
            $size = $info[0]['size'];
            //后缀
            $extension = $info[0]['extension'];
            //缩图路径
            $thumbPath = $info[0]['savepath'] . 'thumb_' . $info[0]['savename'];
            //获取缩图。长宽
            try {
                $thumbInfo = getimagesize($thumbPath);
            } catch (Exception $exc) {
                log::record('相册上传，获取图像尺寸信息时失败！');
                $thumbInfo = array();
            }
            //组装数据
            $data['userid'] = $key_userid;
            $data['username'] = $userInfo['username'];
            $data['aid'] = $aid;
            $data['src'] = $url;
            $data['thumb'] = str_replace($info[0]['savename'], 'thumb_' . $info[0]['savename'], $url);
            $data['thumb_width'] = (int) $thumbInfo[0];
            $data['thumb_height'] = (int) $thumbInfo[1];
            $data['size'] = $size;
            $data['extension'] = $extension;
            $data['filename'] = $info[0]['name'];
            $id = $Album->albumAdd($data);
            if ($id) {
                // 设置附件关联
                $Attachment->api_update($url, 'album_' . $key_userid . '_' . $id, 1);
                service("Attachment")->movingFiles($info[0]['savepath'] . $info[0]['savename'], $info[0]['savepath'] . $info[0]['savename']);
                service("Attachment")->movingFiles($info[0]['savepath'] . 'thumb_' . $info[0]['savename'], $info[0]['savepath'] . 'thumb_' . $info[0]['savename']);
                $this->ajaxReturn(array(
                    'info' => '操作成功！',
                    'error' => 10000,
                ));
            } else {
                $Attachment->delFile($aid);
                $Attachment->delFile($thumbPath);
                $this->ajaxReturn(array(
                    'info' => $Album->getError(),
                    'status' => false,
                ));
            }
        } else {
            $this->ajaxReturn(array(
                'info' => $Attachment->getErrorMsg(),
                'error' => 0,
            ));
        }
    }

    //检查是否有新的消息通知 jsonp
    public function checkNewNotification() {
        //检查是否登陆
        if (empty($this->userid)) {
            //注销在线状态
            D('Member/Online')->onlineDel();
            return false;
        }
        $callback = I('request.callback', '');
        if (empty($callback)) {
            $type = 'JSON';
        } else {
            $type = 'JSONP';
            C('VAR_JSONP_HANDLER', 'callback');
        }
        $data = array(
            'sound' => 1, //是否播放消息提示声音
            'mnew' => D('Member/Message')->getNoticeNoReadCount($this->userid), //消息条数
            'fnew' => 0, //好友新动态
            'error' => 0,
        );
        //维护在线状态
        D('Member/Online')->maintainOnlineStatus($this->userid);
        $this->ajaxReturn($data, $type);
    }

    //验证登陆
    public function doLogin() {
        //是否需要 进行 js escape 解码
        $escape = I('request.escape', 0, 'intval');
        
        //用户名
        $loginName = I('request.loginName', null, 'trim');
        //密码
        $password = I('request.password');
        //下次自动登陆
        $cookieTime = I('request.cookieTime', 0, 'intval');
        //验证码
        $vCode = I('request.vCode');
        if ($escape) {
            $loginName = unescape($loginName);
            $password = unescape($password);
            $cookieTime = unescape($cookieTime);
            $vCode = unescape($vCode);
        }
        // echo $password;die;
        if (empty($loginName)) {
            $this->message(10005, array(), 'error');
        }
        if (empty($password)) {
            $this->message(20023, array(), 'error');
        }
        if (empty($vCode) && $this->memberConfig['openverification']) {
//            $this->message(20031, array(), 'error');
        }
        if ($this->memberConfig['openverification'] && !$this->verify($vCode, "userlogin")) {
            $this->message(20031, array(), 'error');
        }
        $userid = service("Passport")->loginLocal($loginName, $password, $cookieTime ? 86400 * 180 : 86400);

        if ($userid > 0) {
            $userInfo = service("Passport")->getLocalUser((int) $userid);
            //待审核
            if ($userInfo['checked'] == 0) {
                service("Passport")->logoutLocal();
                $this->message(20014, array(), 'error');
            }
            //注册在线状态
            D('Member/Online')->registerOnlineStatus($userid);
            //tag 行为点
            tag('action_member_loginend', $userInfo);


            //ｂｂｓ登录
            // $user = M()->table('bbs_user')->where(array('mobile'=>$userInfo['mobile']))->find();
            // if($user){
            //     xn_login($user['uid']);
            // }

            $this->message("登陆成功！", array(
                'error' => 10000,
                'uid' => $userid,
                'vip' => $userInfo['vip'],
                'avatar' => service("Passport")->getUserAvatar((int) $userid),
            ));
        } else {
            //登陆失败
            $this->message(20023, array(), 'error');
        }
    }

    //验证注册
    public function doRegister() {
        if (empty($this->memberConfig['allowregister'])) {
            $this->error("系统不允许新会员注册！");
        }
        $post = I('post.');
        $post['username'] = I('post.username');
        $post['password'] = I('post.password');
        $post['mobile'] = I('post.mobile');
        $repassword = I('post.repassword');
        if (empty($post['username'])) {
            $this->error('用户名不能为空！');
        }
        if (empty($post['mobile'])) {
            $this->error('手机号不能为空！');
        }
        if(!checkMobile($post['mobile'])){
            $this->error('手机号不正确');
        }
        if (empty($post['password'])) {
            $this->error('请输入您的密码！');
        }
        if (false == isMin($post['password'], 6)) {
            $this->error('密码不能小于6位！');
        }
        if ($post['password'] != $repassword) {
            $this->error('两次输入密码不相同！');
        }

        //验证码
        $vCode = I('post.vCode');
        if (false == $this->verify($vCode, 'userregister')) {
//            $this->error('验证码错误，请重新输入！');
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
            if (empty($info['modelid'])) {
                $this->error('请选择会员模型！');
            }
            $userid = service("Passport")->userRegister($info['username'], $info['password'], $info['mobile']);
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
                    //注册登陆状态
                    service("Passport")->loginLocal($post['username'], $post['password']);
                    //tag 行为
                    tag('action_member_registerend', $memberinfo);

                    //同步注册ｂｂｓ
                    xn_register($post);





                    $this->success('会员注册成功！');
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

    //ajax验证邮箱
    public function checkEmail() {
        $email = I('request.email');
        $status = service("Passport")->userCheckeMail($email);
        if ($status) {
            $this->success('该邮箱可以使用！');
        } else {
            $this->error(service('Passport')->getError()? : '邮箱地址验证有误！');
        }
    }

    //ajax验证用户名是否可用
    public function checkUsername() {
        $username = I('request.username');
        if (empty($username)) {
            $this->error('用户名不能为空！');
        }
        $status = service("Passport")->userCheckUsername($username);
        if ($status) {
            $this->success('用户名可以使用！');
        } else {
            $this->error(service('Passport')->getError()? : '用户名验证有误！');
        }
    }

    //检查昵称
    public function checkNickname() {
        $nickname = I('request.nickname');
        if (false == isMax($nickname, 12)) {
            $this->error('不能超过12个字母或6个汉字！');
        }
        if ($this->memberDb->where(array('nickname' => $nickname))->getField('nickname')) {
            $this->error('该昵称已经存在！');
        }
        $this->success('该昵称可以使用！');
    }

    //执行密码重置
    public function resetPassword() {
        $postKey = I('post.key');
        $key = \Libs\Util\Encrypt::authcode($postKey);
        if (empty($key)) {
            $this->message(array(
                'error' => 1100,
                'info' => '本次请求已经失效，请从新提交密码找回申请。',
            ));
        }
        $userinfo = explode('|', $key);
        //密码
        $password = I('post.password', '', 'trim');
        $password2 = I('post.password2', '', 'trim');
        if (empty($password)) {
            $this->error('请输入新密码！');
        }
        //密码确认
        if ($password != $password2) {
            $this->message(array(
                'error' => 1014,
                'info' => '两次输入密码不相同，请从新输入！',
            ));
        }
        $status = service("Passport")->userEdit($userinfo[1], '', $password, '', 1);
        if ($status > 0) {
            $this->message(10000, array(), true);
        } else {
            $this->error(service("Passport")->getError()? : '密码重置失败！');
        }
    }

    //connect登陆注册
    public function connectregister() {
        //获取应用类型
        $connect_app = session('connect_app');
        //授权过期时间
        $connect_expires = session('connect_expires');
        //oppid
        $connect_openid = session('connect_openid');
        //授权码
        $access_token = session('access_token');

        $curl = new \Curl();

        //授权的相关信息
        $connect = array();
        switch ($connect_app) {
            case "qq":
                $this->qq_akey = $this->memberConfig['qq_akey'];
                $this->qq_skey = $this->memberConfig['qq_skey'];
                $connect['name'] = "QQ授权登陆";
                //取得授权用户基本信息
                $sUrl = "https://graph.qq.com/user/get_user_info?";
                $aGetParam = array(
                    "access_token" => $access_token,
                    "oauth_consumer_key" => $this->qq_akey,
                    "openid" => $connect_openid,
                    "format" => "json"
                );
                $user_info = $curl->get($sUrl . http_build_query($aGetParam));
                //把json数据转换为数组
                $user_info = json_decode($user_info, true);
                $connect['userinfo'] = $user_info;
                $connect['userinfo']['name'] = $user_info['nickname'];
                break;
            case "sina_weibo":
                $connect['name'] = "新浪微博授权登陆";
                //取得授权用户基本信息
                $sUrl = "https://api.weibo.com/2/users/show.json?";
                $aGetParam = array(
                    "access_token" => $access_token,
                    "uid" => $connect_openid,
                );
                $user_info = $curl->get($sUrl . http_build_query($aGetParam));
                //把json数据转换为数组
                $user_info = json_decode($user_info, true);
                $connect['userinfo'] = $user_info;
                break;
            default:
                $this->error('授权类型不存在！');
                break;
        }
        //提交注册
        if (IS_POST) {
            $post = I('post.');
            //用户名
            $post['username'] = I('post.username');
            //设置密码
            $post['password'] = I('post.password');
            if (empty($post['password'])) {
                $this->message(20024, array(), 'error');
            }
            if (false == isMin($post['password'], 6)) {
                $this->message(20025, array(), 'error');
            }
            //确认密码
            $password2 = I('post.password2');
            if ($post['password'] != $password2) {
                $this->message(20021, array(), 'error');
            }
            //昵称
            $post['nickname'] = I('post.nickname');
            //邮箱
            $post['email'] = I('post.email');
            $info = $this->memberDb->token(false)->create($post);
            if ($info) {
                //默认模型
                $info['modelid'] = (int) $this->memberConfig['defaultmodelid'];
                //新会员注册需要管理员审核
                $info['checked'] = 1;
                if (empty($info['modelid'])) {
                    $this->error('请选择会员模型！');
                }
                $userid = service("Passport")->userRegister($info['username'], $info['password'], $info['mobile']);
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
                    //计算用户组
                    $info['groupid'] = $this->memberDb->get_usergroup_bypoint($info['point']);
                    if (false !== $this->memberDb->where(array('userid' => $memberinfo['userid']))->save($info)) {
                        //进行帐号绑定
                        $data = array(
                            'openid' => $connect_openid,
                            'uid' => $memberinfo['userid'],
                            'app' => $connect_app,
                            'accesstoken' => $access_token,
                            'expires' => $connect_expires,
                        );
                        $Connect = D('Member/Connect');
                        if ($Connect->isUserAuthorize($access_token, $connect_app)) {
                            //绑定过，无需绑定
                        } else {
                            //绑定
                            $Connect->connectAdd($data);
                        }
                        //注册登陆状态
                        service("Passport")->loginLocal($post['username'], $post['password'], 86400);
                        $this->message(array(
                            'info' => '会员注册成功！',
                            'error' => 10000,
                        ));
                    } else {
                        //删除
                        service("Passport")->userDelete($memberinfo['userid']);
                        $this->error("会员注册失败！");
                    }
                } else {
                    switch ($userid) {
                        case -1:
                            $this->message(array(
                                'info' => '用户名不合法',
                                'error' => -1,
                                    ), array(), 'error');
                            break;
                        case -2:
                            $this->message(array(
                                'info' => '包含不允许注册的词语',
                                'error' => -2,
                                    ), array(), 'error');
                            break;
                        case -3:
                            $this->message(1011, array(), 'error');
                            break;
                        case -4:
                            $this->message(4, array(), 'error');
                            break;
                        case -5:
                            $this->message(array(
                                'info' => 'Email 不允许注册',
                                'error' => -5,
                                    ), array(), 'error');
                            break;
                        case -6:
                            $this->message(20011, array(), 'error');
                            break;
                        default:
                            break;
                    }
                }
            } else {
                $this->error($this->memberDb->getError());
            }
        } else {
            $count = $this->memberDb->where(array('checked' => 1))->count('userid');
            //取出人气高的8位会员
            $heat = $this->memberDb->where(array('checked' => 1))->order(array('heat' => 'DESC'))->field('userid,username,heat')->limit(12)->select();

            $this->assign('heat', $heat);
            $this->assign('count', $count);
            $this->assign("connect", $connect);
            $this->display("Connect:" . $connect_app);
        }
    }

    //帐号绑定
    public function connectbinding() {
        //获取应用类型
        $connect_app = session('connect_app');
        //授权过期时间
        $connect_expires = session('connect_expires');
        //oppid
        $connect_openid = session('connect_openid');
        //授权码
        $access_token = session('access_token');
        //登陆用户名
        $loginName = I('post.loginName', '', 'trim');
        //登陆密码
        $password = I('post.password', '', 'trim');
        if (empty($connect_app) || empty($access_token) || empty($connect_openid)) {
            $this->error("请先授权！");
        }
        if (empty($loginName) || empty($password)) {
            $this->error('请输入需要绑定的帐号密码！');
        }
        //获取需要帮的用户信息，同时验证密码
        $userInfo = service("Passport")->getLocalUser($loginName, $password);
        if (false == $userInfo || empty($userInfo)) {
            $this->error('帐号不存在或者帐号密码错误！');
        }
        //检查帐号状态
        if (!$userInfo['checked']) {
            $this->error('该帐号还未通过审核，无法进行绑定！');
        }
        $Connect = D('Member/Connect');
        if ($Connect->isUserAuthorize($access_token, $connect_app)) {
            $this->error("该帐号已经绑定过，无法重新绑定！");
        }
        //进行绑定
        $data = array(
            'openid' => $connect_openid,
            'uid' => $userInfo['userid'],
            'app' => $connect_app,
            'accesstoken' => $access_token,
            'expires' => $connect_expires,
        );
        if ($Connect->connectAdd($data)) {
            service("Passport")->loginLocal($loginName, $password, 86400);
            session('connect_app', NULL);
            $this->success('帐号绑定成功！', U("Member/Index/index"));
        } else {
            $this->error($Connect->getError());
        }
    }

    //执行找回密码生成对应邮件发送KEY
    public function doLostPassword() {
        //登陆用户名
        $loginName = I('post.loginName', '', 'trim');
        if (empty($loginName)) {
            $this->error('登陆用户名不能为空！');
        }
        //验证码
        $vCode = I('post.vCode', '', 'trim');
        if (false == $this->verify($vCode, 'lostpassword')) {
            $this->message(20031);
        }
        //取得用户资料
        $userInfo = $this->memberDb->getUserInfo($loginName, 'userid,username,email');
        if (empty($userInfo)) {
            $this->message(array(
                'error' => 1012,
                'info' => '该用户不存在！',
            ));
        }
        //验证KEY
        $email1key = \Libs\Util\Encrypt::authcode(implode('|', $userInfo), '', '', 3600);
        $userInfo['email1key'] = $email1key;
        //邮件地址处理
        $n = strpos($userInfo['email'], '@');
        if ($n < 3) {
            $userInfo['email'] = substr_replace($userInfo['email'], "****", $n, 0);
        } elseif ($n < 6) {
            $userInfo['email'] = substr_replace($userInfo['email'], "****", 2, $n - 2);
        } else {
            $userInfo['email'] = substr_replace($userInfo['email'], "****", 2, 4);
        }
        $this->message(1000, $userInfo, true);
    }

    //执行找回密码发送电子邮件
    public function doLostPassEmail() {
        //key
        $key = I('post.key', '', '');
        $userInfo = \Libs\Util\Encrypt::authcode($key);
        if (empty($userInfo)) {
            $this->message(array(
                'error' => 1100,
                'info' => '本次请求已经失效，请从新提交密码找回申请！',
            ));
        }
        $userInfo = explode('|', $userInfo);
        $forgetpassword = $this->memberConfig['forgetpassword'];
        if (empty($forgetpassword)) {
            $forgetpassword = 'Hi，{$username}:

你申请了重设密码，请在24小时内点击下面的链接，然后根据页面提示完成密码重设：

<a href="{$url}" target="_blank">{$url}</a>

如果链接无法点击，请完整拷贝到浏览器地址栏里直接访问。

邮件服务器自动发送邮件请勿回信 {$date}';
        }
        C("URL_MODEL", 0);
        $LostPassUrl = U('Industrymem/Index/resetpassword', array('key' => urlencode(\Libs\Util\Encrypt::authcode(implode('|', $userInfo), '', '', 86400))));

        $forgetpassword = str_replace(array(
            '{$username}',
            '{$userid}',
            '{$email}',
            '{$url}',
            '{$date}',
                ), array(
            $userInfo[1],
            $userInfo[0],
            $userInfo[2],
            $LostPassUrl,
            date('Y-m-d H:i:s'),
                ), \Input::nl2Br($forgetpassword));

        if (SendMail($userInfo[2], '找回“' . $userInfo[1] . '”在 ' . self::$Cache['Config']['sitename'] . ' 的密码', $forgetpassword)) {
            $this->message(10000);
        } else {
            $this->error('邮件发送失败！');
        }
    }

    /*
   * @name 发送短信验证码
   * @param string mobile
   * @param string vcode
   */
    function sendsms(){
        ($mobile = I('post.mobile','')) or $this->error('手机号码不能为空');
//        ($vcode = I('vcode','')) or $this->error('验证码不能为空');
        if(!checkMobile($mobile)) $this->error('手机号码不正确');
        if (false == $this->verify($vcode, 'sendsms')) {
            // $this->error('验证码不正确');
        }
        $code = rand(100000,999999);
        $re = D('Member/Member')->reg_send_sms($code,$mobile);
        if($re<1) $this->error("短信发送失败");
        $this->success('','短信发送成功');
    }

}
