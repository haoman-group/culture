<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 留言后台管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

use Common\Controller\AdminBase;

class AdminwallController extends AdminBase {

    //留言模型
    protected $wall = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->wall = D('Wall');
    }

    //留言列表
    public function index() {
        $where = array('parentid' => 0);
        //是否搜索
        $search = I('get.search', 0, 'intval');
        if ($search) {
            //关键字
            $keyword = I('get.keyword', '', 'trim');
            if ($keyword) {
                unset($where['parentid']);
                //搜索类型
                $type = I('get.type', 0, 'intval');
                switch ($type) {
                    case 1:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 2:
                        $where['author'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 3:
                        $where['wid'] = array("EQ", (int) $keyword);
                        break;
                    case 4:
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

        $count = $this->wall->where($where)->count();
        $page = $this->page($count, 10);
        $wall = $this->wall->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array('datetime' => 'DESC'))->select();
        foreach ($wall as $k => $r) {
            if ($r['hfsum']) {
                $wall[$k]['replylist'] = $this->wall->where(array('parentid' => $r['wid']))->order(array('datetime' => 'ASC'))->select();
            } else {
                $wall[$k]['replylist'] = array();
            }
        }

        $this->assign("Page", $page->show('Admin'));
        $this->assign('wall', $wall);
        $this->assign('count', $count);
        $this->display();
    }

    //删除留言
    public function delete() {
        if (IS_POST) {
            $wids = $_POST['wids'];
            if (empty($wids)) {
                $this->error('请指定需要删除的留言！');
            }
            foreach ($wids as $userid => $wid) {
                $this->wall->wallDel($userid, $wid);
            }
            $this->success('留言删除成功！');
        } else {
            //留言用户ID
            $userid = I('get.userid', 0, 'intval');
            //留言ID
            $wid = I('get.wid', 0, 'intval');
            if (empty($userid)) {
                $this->error('参数不正确！');
            }
            if (empty($wid)) {
                $this->error('请指定需要删除的留言！');
            }
            if ($this->wall->wallDel($userid, $wid)) {
                $this->success('留言删除成功！');
            } else {
                $this->error('留言删除失败！');
            }
        }
    }

}
