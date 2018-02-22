<?php

// +----------------------------------------------------------------------
// | 会员好友模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Member\Model\MemberCommonModel;

class FriendsModel extends MemberCommonModel {

    //正常关注
    const at_standard = 1;
    //相互关注
    const at_mutual = 2;

    //数据表
    protected $tableName = 'member_friends';
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
    );

    /**
     * 是否有关注用户权限
     * @param type $userid
     * @return boolean
     */
    public function isFansAdd($userid) {
        if (empty($userid)) {
            return false;
        }
        //取得用户配置信息
        $userConfig = D('Member')->getUserConfig((int) $userid);
        if (empty($userConfig)) {
            return false;
        }
        return $userConfig['expand']['isrelatio'] ? true : false;
    }

    /**
     * 根据用户ID，获取该用户粉丝的好友基本信息
     * @param type $userid 用户ID
     * @param type $limit 返回数量，支持分页
     * @return boolean
     */
    public function getFriendFansUserInfo($userid, $limit = 1) {
        if (empty($userid)) {
            return false;
        }
        $where = array(
            'F.fuserid' => $userid,
            'F.atquietly' => 0,
        );
        return $this->alias('as F')
                        ->where($where)
                        ->join(' INNER JOIN `' . C('DB_PREFIX') . 'member` as M ON F.userid = M.userid')
                        ->limit($limit)
                        ->Field('M.userid as userid,M.username as username,F.at as at,M.heat as heat,M.praise as praise,M.attention as attention,M.nickname as nickname,M.fans as fans')
                        ->order(array("F.fid" => "DESC"))
                        ->select();
    }

    /**
     * 根据用户ID，获取该用户关注的好友基本信息
     * @param type $userid 用户ID
     * @param type $limit 返回数量，支持分页
     * @return boolean
     */
    public function getFriendUserInfo($userid, $limit = 1) {
        if (empty($userid)) {
            return false;
        }
        $where = array(
            'F.userid' => $userid,
            'F.atquietly' => 0,
        );
        return $this->alias('as F')
                        ->where($where)
                        ->join(' INNER JOIN `' . C('DB_PREFIX') . 'member` as M ON F.fuserid = M.userid')
                        ->limit($limit)
                        ->Field('F.fuserid as fuserid,F.fusername as fusername,F.at as at,M.heat as fheat,M.praise as fpraise,M.attention as fattention,M.nickname as fnickname,M.fans as ffans')
                        ->order(array("F.fid" => "DESC"))
                        ->select();
    }

    /**
     * 发送一条关注通知给被关注的用户
     * @param type $uid 当前登陆用户uid
     * @param type $username 当前登陆用户名
     * @param type $byuid 被关注用户uid
     * @return type
     */
    public function sendFansNotice($uid, $username, $byuid) {
        $extendParams = array(
            'userid' => $uid, //谁操作的
            'username' => $username,
            'title' => '有新的用户关注了您',
        );
        $sendUser = array(
            'userid' => $uid, //谁操作的
            'username' => $username,
        );
        return D('Message')->sendNotice($byuid, $sendUser, 'fans', $extendParams);
    }

    /**
     * 是否已经关注
     * @param type $userid 当前登陆用户UID
     * @param type $friend_uid 需要关注的用户UID
     * @return boolean
     */
    public function isAchtung($userid, $friend_uid) {
        static $_isachtung = array();
        if (empty($userid)) {
            $this->error = '请登陆后操作！';
            return false;
        }
        if (isset($_isachtung[$userid . $friend_uid])) {
            return $_isachtung[$userid . $friend_uid];
        }
        $_isachtung[$userid . $friend_uid] = $this->where(array('userid' => $userid, 'fuserid' => $friend_uid))->count() ? true : false;
        return $_isachtung[$userid . $friend_uid];
    }

    /**
     * 查询关注类型
     * @staticvar array $_isachtungtype
     * @param type $userid
     * @param type $friend_uid
     * @return boolean
     */
    public function isAchtungType($userid, $friend_uid) {
        static $_isachtungtype = array();
        if (empty($userid)) {
            $this->error = '请登陆后操作！';
            return false;
        }
        if (isset($_isachtungtype[$userid . $friend_uid])) {
            return $_isachtungtype[$userid . $friend_uid];
        }
        $_isachtungtype[$userid . $friend_uid] = $this->where(array('userid' => $userid, 'fuserid' => $friend_uid))->getField('at');
        return $_isachtungtype[$userid . $friend_uid] ? $_isachtungtype[$userid . $friend_uid] : 0;
    }

    /**
     * 关注用户
     * @param type $userid 当前登陆用户UID
     * @param type $friend_uid 需要关注的用户UID
     * @param type $fgid 分组
     * @param type $is_quietly 是否悄悄关注
     * @return boolean
     */
    public function fansAdd($userid, $friend_uid, $fgid = 0, $is_quietly = 0) {
        if (empty($userid)) {
            $this->error = '请登陆后操作！';
            return false;
        }
        $userInfo = service('Passport')->getLocalUser((int) $userid);
        if (empty($userInfo)) {
            $this->error = '用户不存在！';
            return false;
        }
        $friendInfo = D('Member')->where(array('userid' => $friend_uid))->getField('userid,userid,username');
        if (empty($friendInfo)) {
            $this->error = '该用户不存在！';
            return false;
        }
        if ($fgid) {
            if (D('Friendsgroup')->where(array('userid' => $userid, 'gid' => $fgid))->count() == 0) {
                $this->error = '该分组不存在！';
                return false;
            }
        }
        //关注类型，如果被关注的用户也已经关注我，则表示相互关注
        if ($this->isAchtung($friend_uid, $userid)) {
            $at = self::at_mutual;
        } else {
            $at = self::at_standard;
        }
        $data = array(
            'userid' => $userid,
            'fuserid' => $friend_uid,
            'fusername' => $friendInfo[$friend_uid]['username'],
            'atquietly' => $is_quietly,
            'groupid' => $fgid,
            'at' => $at,
        );
        if (false == $this->isFansAdd($userid)) {
            $this->error = '当前用户组没有关注用户的权限！';
            return false;
        }
        $data = $this->create($data, 1);
        if ($data) {
            //添加用户
            $fid = $this->add($data);
            if ($fid) {
                //非悄悄关注
                if ($is_quietly == 0) {
                    //被关注用户粉丝数 -1
                    D('Member')->where(array('userid' => $friend_uid))->setInc('fans');
                    //自身关注数 +1
                    D('Member')->where(array('userid' => $userid))->setInc('attention');
                    //如果是相互关注，这更新被关注人，关注我的状态
                    if ($at == self::at_mutual) {
                        $this->where(array('userid' => $friend_uid, 'fuserid' => $userid))->save(array('at' => self::at_mutual));
                    }
                    //发送通知给对方
                    $this->sendFansNotice($userid, $userInfo['username'], $friend_uid);
                }
                return $fid;
            } else {
                $this->error = $this->error ? $this->error : '操作失败！';
                return false;
            }
        } else {
            return false;
        }
        return true;
    }

    /**
     * 解除粉丝关系
     * @param type $userid 当前登陆用户UID
     * @param type $friend_uid 需要解除的用户UID
     * @return boolean
     */
    public function followingDel($userid, $friend_uid) {
        if (empty($userid)) {
            $this->error = '请登陆后操作！';
            return false;
        }
        if (empty($friend_uid)) {
            $this->error = '请指定需要解除粉丝关系的用户ID！';
            return false;
        }
        //取得关注信息
        $friend = $this->where(array('userid' => $userid, 'fuserid' => $friend_uid))->find();
        if (empty($friend)) {
            $this->error = '你没有关注该用户，无需进行解除！';
            return false;
        }
        if ($this->where(array('userid' => $userid, 'fuserid' => $friend_uid))->delete()) {
            //取得对方关注我的信息
            $friendAtMy = $this->where(array('userid' => $friend_uid, 'fuserid' => $userid))->find();
            //如果是非悄悄关注，减少对方的粉丝总数
            if (empty($friend['atquietly']) && D('Member')->where(array('userid' => $friend_uid))->getField('fans')) {
                D('Member')->where(array('userid' => $friend_uid))->setDec('fans'); //粉丝数减少1
                //自身关注数-1
                D('Member')->where(array('userid' => $userid))->setDec('attention');
                //如果我原本关注状态是相互关注，则更新对方关注我的状态变成普通关注
                if ($friendAtMy['at'] == self::at_mutual) {
                    $this->where(array('userid' => $friend_uid, 'fuserid' => $userid))->save(array('at' => self::at_standard));
                }
            }
            return true;
        } else {
            $this->error = '数据库操作失败！';
            return false;
        }
    }

}
