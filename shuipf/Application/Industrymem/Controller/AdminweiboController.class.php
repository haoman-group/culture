<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 微博后台管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

use Common\Controller\AdminBase;

class AdminweiboController extends AdminBase {

    //微博模型
    protected $weibo = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->weibo = D('Weibo');
    }

    //微博列表
    public function index() {
        $where = array();
        //是否搜索
        $search = I('get.search', 0, 'intval');
        if ($search) {
            //关键字
            $keyword = I('get.keyword', '', 'trim');
            if ($keyword) {
                //搜索类型
                $type = I('get.type', 0, 'intval');
                switch ($type) {
                    case 1:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 2:
                        $where['content'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    default:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                }
            }
            $this->assign('type', $type);
            $this->assign('keyword', $keyword);
        }

        $count = $this->weibo->where($where)->count();
        $page = $this->page($count, 10);
        $weibo = $this->weibo->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array('datetime' => 'DESC'))->select();
        foreach ($weibo as $k => $r) {
            if ($r['plsum']) {
                $weibo[$k]['replylist'] = D('WeiboComment')->where(array('wid' => $r['id']))->order(array('datetime' => 'DESC'))->select();
            } else {
                $weibo[$k]['replylist'] = array();
            }
        }

        $this->assign("Page", $page->show('Admin'));
        $this->assign('weibo', $weibo);
        $this->assign('count', $count);
        $this->display();
    }

    //删除微博
    public function delete() {
        if (IS_POST) {
            $ids = $_POST['ids'];
            if (empty($ids)) {
                $this->error('请指定需要删除的删除！');
            }
            foreach ($ids as $userid => $id) {
                $this->weibo->weiboDel($userid, $id);
            }
            $this->success('删除删除成功！');
        } else {
            //微博用户ID
            $userid = I('get.userid', 0, 'intval');
            //微博ID
            $id = I('get.id', 0, 'intval');
            if (empty($userid)) {
                $this->error('参数不正确！');
            }
            if (empty($id)) {
                $this->error('请指定需要删除的微博！');
            }
            if ($this->weibo->weiboDel($userid, $id)) {
                $this->success('微博删除成功！');
            } else {
                $this->error('微博删除失败！');
            }
        }
    }

    //删除评论
    public function deletecomment() {
        //微博ID
        $id = I('get.id', 0, 'intval');
        if (empty($id)) {
            $this->error('请指定需要删除的微博评论！');
        }
        if (D('WeiboComment')->commentDelById($id)) {
            $this->success('微博评论删除成功！');
        } else {
            $this->error('微博评论删除失败！');
        }
    }

}
