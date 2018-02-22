<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 说说
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class MiniblogController extends MemberBase {

    protected $weibo = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->weibo = D('Member/Weibo');
    }

    //我的说说
    public function miniblog() {
        $where = array(
            'userid' => $this->userid,
        );
        $count = $this->weibo->where($where)->count();
        $page = $this->page($count, 5);
        $weibo = $this->weibo->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();

        $this->assign('count', $count);
        $this->assign('weibo', $weibo);
        $this->assign("Page", $page->show('Admin'));
        $this->display();
    }

    //好友的说说
    public function following() {
        $page = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $data = $this->weibo->selectFollowing($this->userid, $page, 10);
        foreach ($data['data'] as $k => $v) {
            //是否在线
            $data['data'][$k]['isonline'] = D('Online')->getLastActiveTime($v['userid']);
        }

        $this->assign('count', $data['count']);
        $this->assign('following', $data['data']);
        $this->assign("Page", $data['Page']);
        $this->display();
    }

    //发表说说
    public function miniblogadd() {
        $post = I('post.');
        $content = $post['content'];
        if (empty($content)) {
            $this->message(array(
                'info' => '请输入您的微博内容！',
                'error' => 10007
            ));
        }
        //检测长度
        if (false == isMax($content, 140)) {
            $this->message(array(
                'info' => '微博内容不能超过140个字！',
                'error' => 10006
            ));
        }
        //添加
        $post['userid'] = $this->userid;
        $post['username'] = $this->username;
        $id = $this->weibo->weiboAdd($post);
        if ($id) {
            $this->message(10000, array(), true);
        } else {
            $this->error($this->weibo->getError());
        }
    }

    //发表说说评论
    public function commentadd() {
        $post = I('post.');
        //说说id
        $wid = $post['wid'];
        //评论内容
        $content = $post['content'];
        //检测长度
        if (false == isMax($content, 140)) {
            $this->message(array(
                'info' => '回复内容不能超过140个字！',
                'error' => 10006
            ));
        }
        $post['userid'] = $this->userid;
        $post['username'] = $this->username;
        //添加回复
        $id = D('Member/WeiboComment')->commentAdd($this->userid, $post);
        if ($id) {
            $this->message(10000, array(
                'data' => array(
                    'id' => $id,
                    'content' => $content,
                    'userid' => $this->userid,
                    'username' => $this->username,
                ),
                    ), true);
        } else {
            $this->error(D('WeiboComment')->getError());
        }
    }

    //删除微博评论
    public function commentdel() {
        //评论ID
        $cid = I('post.cid', 0, 'intval');
        //微博ID
        $wid = I('post.wid', 0, 'intval');
        //取得微博信息
        $info = $this->weibo->where(array('id' => $wid))->find();
        if (empty($info)) {
            $this->error('所属微博不存在！');
        }
        if ($info['userid'] != $this->userid) {
            $this->message(array(
                'info' => '对不起，您没有操作权限！',
                'error' => 20002,
            ));
        }
        //取得微博评论信息
        $commInfo = D('Member/WeiboComment')->where(array('wid' => $wid, 'id' => $cid))->find();
        if (empty($commInfo)) {
            $this->message(array(
                'info' => '评论已被删除！',
                'error' => 10004,
            ));
        }
        //删除评论
        if (D('Member/WeiboComment')->commentDelById($cid)) {
            $this->message(10000, array(), true);
        } else {
            $this->error('评论删除失败！');
        }
    }

    //删除说说
    public function miniblogdel() {
        $id = I('post.id');
        if (empty($id)) {
            $this->error('请指定需要删除的信息！');
        }
        //微博信息
        $info = $this->weibo->where(array('id' => $id))->find();
        if (empty($info)) {
            $this->message(array(
                'info' => '该信息不存在或者已经被删除！',
                'error' => 10004,
            ));
        }
        if ($info['userid'] != $this->userid) {
            $this->message(array(
                'info' => '对不起，您没有操作权限！',
                'error' => 20002,
            ));
        }
        //执行删除
        if ($this->weibo->weiboDel($this->userid, $info['id'])) {
            $this->message(10000, array(), true);
        } else {
            $this->error($this->weibo->getError());
        }
    }

}
