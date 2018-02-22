<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员动态
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class FeedController extends MemberBase {

    //获取当前用户动态
    public function fetchfeed() {
        $Dongtai = D('Member/Dongtai');
        //动态分类
        $cid = I('request.cid', 0, 'intval');
        //类型
        $type = I('post.type', 0, 'intval');
        switch ($type) {
            //资讯分享
            case 1:
                $typeId = $Dongtai->getTypeId('dance');
                break;
            //发表说说
            case 2:
                $typeId = $Dongtai->getTypeId('miniblog');
                break;
            //上传照片
            case 3:
                $typeId = $Dongtai->getTypeId('album');
                break;
        }
        switch ($cid) {
            //好友动态
            case 0:
                $Friends = D('Member/Friends');
                $where = array('F.userid' => $this->userid);
                if ($type) {
                    $where['D.typeid'] = $typeId;
                }
                $data = $Friends->alias('as F')
                        ->where($where)
                        ->join(' INNER JOIN `' . C('DB_PREFIX') . 'member_dongtai` as D ON F.fuserid = D.userid')
                        ->Field('D.*')
                        ->limit(40)
                        ->order(array('D.datetime' => 'DESC'))
                        ->select();
                $this->assign('dongtai', $data);
                $this->display();
                break;
            //全站动态
            case 2:
                $where = array();
                if ($type) {
                    $where['typeid'] = $typeId;
                }
                $data = $Dongtai->where($where)->order(array('datetime' => 'DESC', 'id' => 'DESC'))->limit(40)->select();
                $this->assign('dongtai', $data);
                $this->display();
                break;
            //我的动态
            case 3:
                $where = array('userid' => $this->userid);
                if ($type) {
                    $where['typeid'] = $typeId;
                }
                $data = $Dongtai->where($where)->order(array('datetime' => 'DESC', 'id' => 'DESC'))->limit(40)->select();
                $this->assign('dongtai', $data);
                $this->display('myfeed');
                break;
        }
    }

}
