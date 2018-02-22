<?php

/**
 * 被赞模型
 * Some rights reserved：abc3210.com
 * Contact email:admin@abc3210.com
 */
class PraiseModel extends MemberCommonModel {

    //数据表
    protected $tableName = 'member_praiselog';
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
    );

    /**
     * 检查用户是否被赞过
     * @param type $userid
     * @param type $byuserid
     * @return boolean
     */
    public function isPraise($userid, $byuserid) {
        if (empty($userid)) {
            $this->error = '用户ID不能为空！';
            return false;
        }
        if (empty($byuserid)) {
            $this->error = '被赞用户ID不能为空！';
            return false;
        }
        $count = $this->where(array('userid' => $userid, 'byuserid' => $byuserid))->count();
        return $count ? true : false;
    }

    /**
     * 用户赞+1
     * @param type $userinfo 用户资料
     * @param type $byuserid 被赞用户ID
     * @return boolean
     */
    public function praiseAdd($userinfo, $byuserid) {
        $userid = $userinfo['userid'];
        if (empty($userid)) {
            $this->error = '用户ID不能为空！';
            return false;
        }
        if (empty($byuserid)) {
            $this->error = '被赞用户ID不能为空！';
            return false;
        }
        //取得被赞用户资料
        $userInfo = service('Passport')->getLocalUser((int) $byuserid);
        if (empty($userInfo)) {
            $this->error = '该用户不存在！';
            return false;
        }
        if ($this->isPraise($userid, $byuserid)) {
            $this->error = '该用户您已经赞过！';
            return false;
        }
        $data = array(
            'userid' => $userid,
            'byuserid' => $byuserid,
            'byusername' => $userInfo['username'],
        );
        $data = $this->create($data, 1);
        if ($data) {
            $pid = $this->add($data);
            if ($pid) {
                //会员更新
                M('Member')->where(array('userid' => $byuserid))->setInc('praise');
                //通知
                $this->notiFication($userinfo, $byuserid);
                return $userInfo['praise'] + 1;
            } else {
                $this->error = $this->error ? $this->error : '操作失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    public function notiFication($userinfo, $byuserid) {
        //产生通知的用户信息
        $sendUser = array(
            'userid' => $userinfo['userid'],
            'username' => $userinfo['username'],
        );
        $extendParams = array(
        'title' => $userinfo['username'].'赞了你一下~',
        'userid' => $userinfo['userid'],
        'username' => $userinfo['username'],
        );
        return D('Message')->sendNotice($byuserid, $sendUser, 'praise', $extendParams);
    }

}