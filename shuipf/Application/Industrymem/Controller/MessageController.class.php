<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员消息通知
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class MessageController extends MemberBase {

    //通知数据模型
    protected $message = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->message = D('Member/Message');
    }

    //显示通知
    public function notification() {
        //通知类型
        $type = I('get.type');
        //条件
        $where = array();
        $where['userid'] = $this->userid;
        if (!empty($type)) {
            $typeId = $this->message->getTypeId($type);
            if ($typeId) {
                $where['typeid'] = $typeId;
            }
        }
        $count = $this->message->where($where)->count();
        $page = $this->page($count, 20);
        $data = $this->message->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("datetime" => "DESC"))->select();
        //打开次页面表示已经阅读
        $nids = array();
        foreach ($data as $r) {
            if ($r['is_read']) {
                continue;
            }
            $nids[$r['nid']] = $r['nid'];
        }
        if (!empty($nids)) {
            $this->message->noticeRead($nids);
        }

        $this->assign('data', $data);
        $this->assign('count', $count);
        $this->assign("Page", $page->show('Admin'));
        $this->assign('type', $type);
        $this->display();
    }

    //删除单条通知
    public function noticeDel() {
        $nid = I('post.nid', 0, 'intval');
        if (empty($nid)) {
            $this->message(array(
                'info' => '通知不存在！',
                'error' => 10004
            ));
        }
        $noticeInfo = $this->message->where(array('userid' => $this->userid, 'nid' => $nid))->find();
        if (empty($noticeInfo)) {
            $this->message(array(
                'info' => '通知不存在！',
                'error' => 10004
            ));
        }
        if ($this->message->noticeDel($this->userid, $nid)) {
            $this->message(10000, array(), true);
        } else {
            $this->error($this->message->getError());
        }
    }

    //批量删除通知
    public function notificationAllDel() {
        //删除时间范围 month
        $month = I('post.month', 'all');
        //条件
        $where = array();
        $where['userid'] = $this->userid;
        //时间范围
        if ($month == 'month') {//删除一个月前的
            $time = time();
            $where['datetime'] = array('LT', $time - (30 * 86400));
        }
        if (false !== $this->message->where($where)->delete()) {
            $this->message(10000, array(), true);
        } else {
            $this->error('删除失败！');
        }
    }

}
