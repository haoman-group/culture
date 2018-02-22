<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员设置管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class UserController extends MemberBase {

    //在线用户
    public function online() {
        $Online = D('Member/Online');
        $page = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $data = $Online->getOnlineUserList($page, 30);

        $this->assign('count', $data['count']);
        $this->assign('online', $data['data']);
        $this->assign("Page", $data['Page']);
        $this->display();
    }

    //赞+1
    public function praiseup() {
        //被赞用户
        $uid = I('get.uid', 0, 'intval');
        if (empty($uid)) {
            $this->message(array(
                'info' => '该用户不存在！',
                'error' => 10004,
            ));
        }
        if ($uid == $this->userid) {
            $this->message(array(
                'info' => '您只能赞别人，不能赞自己哦！',
                'error' => 10013,
            ));
        }
        //检查是否已经赞过
        if (D('Member/Praise')->isPraise($this->userid, $uid)) {
            $this->message(array(
                'info' => '您最近刚刚赞过！',
                'error' => 10002,
            ));
        }
        //取得用户资料
        $userInfo = service("Passport")->getLocalUser((int) $uid);
        if (empty($userInfo)) {
            $this->message(array(
                'info' => '该用户不存在！',
                'error' => 10004,
            ));
        }
        //+1
        $Praise = D('Member/Praise')->praiseAdd($this->userinfo, $uid);
        if ($Praise) {
            $this->message(array(
                'info' => '赞成功！',
                'error' => 10000,
                    ), array(
                'praise' => $Praise
            ));
        } else {
            $this->error('操作失败！');
        }
    }

    //会员设置界面
    public function profile() {
        //====基本资料表单======
        $modelid = $this->userinfo['modelid'];
        //会员模型数据表名
        $tablename = $this->memberModel[$modelid]['tablename'];
        //相应会员模型数据
        $modeldata = M(ucwords($tablename))->where(array("userid" => $this->userid))->find();
        if (!is_array($modeldata)) {
            $modeldata = array();
        }
        $data = array_merge($this->userinfo, $modeldata);
        $content_form = new \content_form($modelid);
        $data['modelid'] = $modelid;
        //字段内容
        $forminfos = $content_form->get($data);

        //====头像======
        $user_avatar = service("Passport")->getUploadPhotosHtml($this->userid);
        $this->assign('user_avatar', $user_avatar);
        $this->assign("forminfos", $forminfos);
        $this->assign('type', I('get.type', 'profile'));
        $this->assign("userinfo", $data);
        $this->display();
    }

    //保存基本信息
    public function doprofile() {
        if (IS_POST) {
            $post = $_POST;
            $info = $post['info'];
            //获取用户信息
            $userinfo = service("Passport")->getLocalUser($this->userid);
            if (empty($userinfo)) {
                $this->error('该会员不存在！');
            }
            //基本信息
            $data = $this->memberDb->create($post, 2);
            if (!$data) {
                $this->error($this->memberDb->getError());
            }
            //详细信息验证
            if (!empty($info)) {
                require_cache(RUNTIME_PATH . 'content_input.class.php');
                $ContentModel = ContentModel::getInstance($this->userinfo['modelid'])->relation(false);
                $content_input = new content_input($this->userinfo['modelid']);
                $info['userid'] = $this->userid;
                $inputinfo = $content_input->get($info, 3);
                if ($inputinfo) {
                    //数据验证
                    $inputinfo = $ContentModel->token(false)->create($inputinfo, 2);
                    if (false == $inputinfo) {
                        $ContentModel->tokenRecovery($post);
                        $this->error($ContentModel->getError());
                    }
                    //检查详细信息是否已经添加过
                    if ($ContentModel->where(array("userid" => $this->userid))->find()) {
                        $status = $ContentModel->where(array("userid" => $this->userid))->save($inputinfo);
                    } else {
                        $inputinfo['userid'] = $this->userid;
                        $status = $ContentModel->add($inputinfo);
                    }
                } else {
                    $ContentModel->tokenRecovery($post);
                    $this->error($content_input->getError());
                }
            }
            //修改基本资料
            if ($userinfo['username'] != $data['username'] || !empty($data['password']) || $userinfo['email'] != $data['email']) {
                $edit = service("Passport")->user_edit($userinfo['username'], '', '', $data['email'], 1);
                if ($edit < 0) {
                    $this->error($this->memberDb->getErrorMesg($edit));
                }
            }
            unset($data['username'], $data['password'], $data['email']);
            if (!empty($data)) {
                $this->memberDb->where(array("userid" => $this->userid))->save($data);
            }
            if (false !== $status) {
                $this->success("基本信息修改成功！");
            } else {
                $this->error('基本信息修改失败！');
            }
        } else {
            $this->error('基本信息修改失败！');
        }
    }

    //修改密码
    public function dopassword() {
        if (IS_POST) {
            $post = I('post.');
            //旧密码
            $oldPassword = $post['oldPassword'];
            //根据当前密码取得用户资料
            $userInfo = service("Passport")->getLocalUser($this->userid, $oldPassword);
            if (false == $userInfo) {
                $this->message(20022);
            }
            //设置密码
            $password = $post['password'];
            if (empty($password)) {
                $this->message(20024);
            }
            if (false == isMin($password, 6)) {
                $this->message(20025);
            }
            //再次密码确认
            $password2 = $post['password2'];
            if ($password != $password2) {
                $this->message(20021);
            }
            $edit = service("Passport")->user_edit($this->username, '', $password, '', 1);
            if ($edit < 0) {
                $this->error($this->memberDb->getErrorMesg($edit));
            }
            //注销当前登陆
            service("Passport")->logoutLocal();
            $this->message(10000, array(), 'success');
        } else {
            $this->error('修改失败！');
        }
    }

}
