<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 留言管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class WallController extends MemberBase {

    //留言模型
    protected $wall = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->wall = D('Member/Wall');
    }

    //留言管理
    public function index() {
        $where = array('userid' => $this->userid, 'parentid' => 0);
        $count = $this->wall->where($where)->count();
        $page = $this->page($count, 10);
        //查询留言
        $wall = $this->wall->where($where)->order(array('datetime' => 'DESC'))->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach ($wall as $k => $r) {
            if ($r['hfsum']) {
                $wall[$k]['replylist'] = $this->wall->where(array('userid' => $this->userid, 'parentid' => $r['wid']))->order(array('datetime' => 'ASC'))->select();
            } else {
                $wall[$k]['replylist'] = array();
            }
        }

        $this->assign("Page", $page->show('Admin'));
        $this->assign('wall', $wall);
        $this->display();
    }

    //留言添加
    public function walladd() {
        $data = I('post.');
        //留言内容
        $content = I('post.content');
        //留言给谁
        $uid = I('post.uid', 0, 'intval');
        //取得用户信息
        $userInfo = service('Passport')->getLocalUser((int) $uid);
        if (empty($userInfo)) {
            $this->error('该用户不存在！');
        }
        if (empty($content)) {
            $this->message(array(
                'info' => '请输入您的留言内容！',
                'error' => 10007,
            ));
        }
        //检测长度
        if (false == isMax($content, 300)) {
            $this->message(array(
                'info' => '微博内容不能超过300个字！',
                'error' => 10006
            ));
        }
        //留言权限
        if (false == $this->wall->userWallCompetence($this->userid)) {
            $this->message(array(
                'info' => '你没有留言权限！',
                'error' => 10005,
            ));
        }
        $data['content'] = $content;
        $data['authoruid'] = $this->userid;
        $data['author'] = $this->username;
        $data['userid'] = $userInfo['userid'];
        $data['username'] = $userInfo['username'];
        if ($this->wall->wallAdd($data)) {
            $this->message(10000, array(), true);
        } else {
            $this->error($this->wall->getError());
        }
    }

    //留言删除
    public function walldel() {
        //留言ID
        $wid = I('post.wid', 0, 'intval');
        if (empty($wid)) {
            $this->error('请指定需要删除的留言！');
        }
        //查询留言
        $info = $this->wall->where(array('wid' => $wid))->find();
        if ($info) {
            if ((int) $info['userid'] != $this->userid) {
                $this->message(array(
                    'info' => '您没有权限删除！',
                    'error' => 20002
                ));
            }
            if ($this->wall->wallDel($this->userid, $wid)) {
                $this->message(10000, array(), true);
            } else {
                $this->error($this->wall->getError());
            }
        } else {
            $this->error('该留言不存在！');
        }
    }

}
