<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员短信
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class MsgController extends MemberBase {

    //通知数据模型
    protected $msg = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->msg = D('Member/Msg');
    }

    //私信列表
    public function msg() {
        $msgText = M('MemberMsgText');
        $where = array('userid' => $this->userid, 'answerid' => 0);
        $count = $this->msg->where($where)->count();
        $page = $this->page($count, 10);
        $data = $this->msg->where($where)->order(array('datetime' => 'DESC', 'id' => 'DESC'))->limit($page->firstRow . ',' . $page->listRows)->select();
        //私信ID
        $ids = array();
        foreach ($data as $k => $r) {
            $find = $this->msg->where(array('userid' => $this->userid, 'answerid' => $r['id']))->order(array('datetime' => 'DESC', 'id' => 'DESC'))->find();
            if ($find) {
                $ids[] = $find['id'];
                unset($find['id']);
            } else {
                $find = array();
                $ids[] = $r['id'];
            }
            $msgid = $find['msgid'];
            if (!$msgid) {
                $msgid = $r['msgid'];
            }
            $text = $msgText->where(array('mid' => $msgid))->find();
            if (empty($text)) {
                $text = array();
            }
            $data[$k] = array_merge($data[$k], $find, $text);
            $data[$k]['answerid'] = D('Member')->getUserInfo((int) $r['suid'], 'userid,username');
        }
        //设置已读
        $this->msg->setRead($this->userid, $ids);

        $this->assign("Page", $page->show('Admin'));
        $this->assign('count', $count);
        $this->assign('msg', $data);
        $this->display();
    }

    //私信详情
    public function msginfo() {
        $id = I('get.id', 0, 'intval');
        if (empty($id)) {
            $this->error('参数不能为空！');
        }
        $where = array('userid' => $this->userid, 'id' => $id, 'answerid' => 0);
        $info = $this->msg->where($where)->find();
        if (empty($info)) {
            $this->error('该私信对话不存在！');
        }
        $msgText = M('MemberMsgText');
        $list = $this->msg->where(array('userid' => $this->userid, 'answerid' => $info['id']))->order(array('datetime' => 'ASC', 'id' => 'ASC'))->select();
        if (empty($list)) {
            $list = array();
        }
        array_unshift($list, $info);
        //私信ID
        $ids = array();
        foreach ($list as $k => $r) {
            $text = $msgText->where(array('mid' => $r['msgid']))->find();
            if (empty($text)) {
                $text = array();
            }
            $ids[] = $r['id'];
            $list[$k] = array_merge($list[$k], $text);
        }
        //查询出与我回话的另一用户
        $answerid = $info['suid'];
        $answerInfo = service("Passport")->getLocalUser((int) $answerid);
        //设置已读
        $this->msg->setRead($this->userid, $ids);

        $this->assign('list', $list);
        $this->assign('info', $info);
        $this->assign('answerid', $answerid);
        $this->assign('answerInfo', $answerInfo);
        $this->display();
    }

    //发送私信界面
    public function msgsenddialog() {
        //私信发送给谁
        $uid = I('post.uid', 0, 'intval');
        //用户信息
        $info = service("Passport")->getLocalUser((int) $uid);
        if (empty($info)) {
            $this->message(array(
                'info' => '用户不存在！',
                'error' => 10004
            ));
        }
        $this->assign('info', $info);
        if (IS_AJAX) {
            $this->ajaxReturn(array(
                'error' => 10000,
                'data' => $this->fetch(),
            ));
        } else {
            $this->display();
        }
    }

    //发送私信
    public function msgadd() {
        $post = I('post.');
        //私信发送给谁
        $uid = I('post.uid', 0, 'intval');
        if ($uid == $this->userid) {
            $this->message(array(
                'info' => '您不能给自己发私信！',
                'error' => 10013,
            ));
        }
        //私信内容
        $note = I('post.note');
        if (empty($note)) {
            $this->message(array(
                'info' => '请先写点什么吧！',
                'error' => 10007,
            ));
        }
        //权限检查
        if (false == $this->msg->msgCompetence($this->userid)) {
            $this->message(array(
                'info' => '对不起，你的用户等级不够，无法发送私信！',
                'error' => 20002,
            ));
        }
        //组装提交数据
        $post['recuid'] = $uid;
        $post['note'] = $note;
        unset($post['uid']);
        //提交
        $mid = $this->msg->msgAdd($this->userid, $post);
        if ($mid) {
            $this->message(10000, array(), true);
        } else {
            $this->error($this->msg->getError());
        }
    }

    //清空短信
    public function msgdelall() {
        if ($this->msg->msgDelAll($this->userid)) {
            $this->message(10000, array(), true);
        } else {
            $this->error('清空短信失败！');
        }
    }

    //删除短信
    public function msgdel() {
        //短信ID
        $msgid = I('post.msgid', 0, 'intval');
        if (empty($msgid)) {
            $this->error('请指定需要删除的短信ID');
        }
        //查询出短信信息
        $info = $this->msg->where(array('id' => $msgid))->find();
        if (empty($info)) {
            $this->error('该短信息不存在！');
        }
        if ($info['userid'] != $this->userid) {
            $this->message(array(
                'info' => '对不起，你无权删除！',
                'error' => 20002,
            ));
        }
        //执行删除短信
        if ($this->msg->msgDel($this->userid, $msgid)) {
            $this->message(10000, array(), true);
        } else {
            $this->error($this->msg->getError());
        }
    }

}
