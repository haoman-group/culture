<?php

// +----------------------------------------------------------------------
// | 前台会员个人空间虚拟模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Common\Model\Model;

class HomeRunModel extends Model {

    // protected $autoCheckFields = false;
    public function __construct($name='',$tablePrefix='',$connection='') {
        $this->autoCheckFields = false;
        parent::__construct($name,$tablePrefix,$connection);
    }
    /**
     * 检查用户是否在线
     * @param type $userid
     * @return boolean
     */
    public function isOnline($userid) {
        if (empty($userid)) {
            return false;
        }
        return D('Online')->getLastActiveTime($userid);
    }

    /**
     * 检查用户是否已经关注
     * @param type $userid 用户ID
     * @param type $friend_uid 关注用户ID
     * @return boolean
     */
    public function isAtYou($userid, $friend_uid) {
        if (empty($userid)) {
            return false;
        }
        return D('Friends')->isAchtung($userid, $friend_uid);
    }

    /**
     * 增加访客记录
     * @param type $userinfo 访客信息
     * @param type $currentUserinfo 当前空间用户信息
     * @return boolean
     */
    public function visitorsAdd($userinfo, $currentUserinfo) {
        if (empty($userinfo) || empty($currentUserinfo)) {
            return false;
        }
        $data = array(
            'userid' => $currentUserinfo['userid'],
            'username' => $currentUserinfo['username'],
            'byuserid' => $userinfo['userid'],
            'byusername' => $userinfo['username'],
        );
        return D('Member/Visitors')->visitorsAdd($data);
    }

    /**
     * 取得用户首页显示图片
     * @param type $userid 用户UID
     * @return boolean
     */
    public function getHomeShow($userid, $limit = 7) {
        if (empty($userid)) {
            return false;
        }
        $Album = D('Album');
        //查询条件
        $where = array();
        $where['userid'] = $userid;
        //首页显示的
        //$where['ishome'] = array('GT', 0);
        $data = $Album->where($where)->order(array("ishome" => "DESC", 'id' => "DESC"))->limit($limit)->select();
        foreach ($data as $r) {
            $homealbum[$r['id']] = $r;
        }
        return $homealbum;
    }

    /**
     * 取得用户分享信息
     * @param type $userid 用户UID
     * @param type $limit 条数
     * @return boolean
     */
    public function getShare($userid, $limit = 10) {
        if (empty($userid)) {
            return false;
        }
        $shareData = D('Share')->where(array('userid' => $userid, 'status' => 1))->order(array('time' => 'DESC'))->limit($limit)->select();
        $share = array();
        if ($shareData) {
            foreach ($shareData as $r) {
                $modelid = getCategory($r['catid'], 'modelid');
                $tablename = ucwords(getModel($modelid, 'tablename'));
                $info = M($tablename)->where(array("id" => $r['content_id'], "sysadd" => 0))->find();
                $share[$info['id']] = $info;
            }
        }
        return $share;
    }

    /**
     * 取得用户留言
     * @param type $userid 用户UID
     * @param type $limit 条数
     * @return boolean
     */
    public function getWall($userid, $limit = 10) {
        if (empty($userid)) {
            return false;
        }
        $Wall = D('Wall');
        $wall = $Wall->where(array('userid' => $userid, 'parentid' => 0))->order(array('datetime' => 'DESC'))->limit($limit)->select();
        foreach ($wall as $k => $r) {
            if ($r['hfsum']) {
                $wall[$k]['replylist'] = $Wall->where(array('userid' => $userid, 'parentid' => $r['wid']))->order(array('datetime' => 'ASC'))->select();
            } else {
                $wall[$k]['replylist'] = array();
            }
        }
        return $wall;
    }

    /**
     * 取得用户某条留言
     * @param type $userid 用户UID
     * @param type $wid 留言ID
     * @return boolean
     */
    public function getWallById($userid, $wid) {
        if (empty($userid) || empty($wid)) {
            return false;
        }
        $Wall = D('Wall');
        $wall = $Wall->where(array('userid' => $userid, 'parentid' => 0, 'wid' => $wid))->order(array('datetime' => 'DESC'))->select();
        if (empty($wall)) {
            return false;
        }
        foreach ($wall as $k => $r) {
            if ($r['hfsum']) {
                $wall[$k]['replylist'] = $Wall->where(array('userid' => $userid, 'parentid' => $r['wid']))->order(array('datetime' => 'ASC'))->select();
            } else {
                $wall[$k]['replylist'] = array();
            }
        }
        return $wall;
    }

    /**
     * 取得用户关注总数
     * @param type $userid 用户UID
     * @return int
     */
    public function friendsCount($userid) {
        if (empty($userid)) {
            return 0;
        }
        $Friends = D('Friends');
        $where = array(
            'userid' => $userid,
        );
        $count = $Friends->where($where)->count();
        return $count;
    }

    /**
     * 取得我关注的用户列表
     * @param type $userid 用户UID
     * @param type $limit 显示条数
     */
    public function getFriendUserInfo($userid, $limit = 8) {
        if (empty($userid)) {
            return false;
        }
        $data = D('Friends')->getFriendUserInfo($userid, $limit);
        //检查是否在线
        foreach ($data as $k => $r) {
            $data[$k]['isonline'] = $this->isOnline($r['fuserid']);
        }
        return $data;
    }

    /**
     * 取得当前用户的访问记录
     * @param type $byuserid 用户
     * @param type $limit 记录数
     * @return type
     */
    public function getUserVisitorsList($byuserid, $limit = 10) {
        if (empty($byuserid)) {
            return false;
        }
        $data = D('Visitors')->getUserVisitorsList($byuserid, $limit);
        //检查是否在线
        foreach ($data as $k => $r) {
            $data[$k]['isonline'] = $this->isOnline($r['userid']);
        }
        return $data;
    }

    /**
     * 会员空间热度+1
     * @param type $userid 会员UID
     * @return int
     */
    public function homeHeatSet($userid = 0) {
        if (empty($userid)) {
            $userid = service("Passport")->getCookieUid();
        }
        if ($userid < 1) {
            return false;
        }
        $viewUids = cookie('viewUids');
        if (!empty($viewUids)) {
            $viewUids = explode('|', $viewUids);
        }
        //检查是否访问j+1过
        if (in_array($userid, $viewUids)) {
            return false;
        }
        //执行+1
        $heat = D('Member')->where(array('userid' => $userid))->setInc('heat');
        if ($heat) {
            $viewUids[] = $userid;
            $cookie = implode('|', $viewUids);
            cookie('viewUids', $cookie, 86400);
            return $heat;
        }
    }

}
