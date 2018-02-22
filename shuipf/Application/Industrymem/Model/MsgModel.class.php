<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员短信模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Member\Model\MemberCommonModel;

class MsgModel extends MemberCommonModel {

    //数据表
    protected $tableName = 'member_msg';
    //自动验证
    protected $_validate = array(
        array('senduid', 'require', '发送者会员ID不能为空！', 1, 'regex', 1),
        array('sendname', 'require', '发送者用户名不能为空！', 1, 'regex', 1),
        array('recuid', 'require', '接收者用户ID不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
        array('is_read', 1),
    );
    //消息表自动验证
    protected $validate = array(
        array('title', 'require', '短信标题不能为空！', 1, 'regex', 1),
        array('note', 'require', '私信内容不能为空！', 1, 'regex', 1),
    );
    //消息表自动完成
    protected $auto = array(
        array('addtime', 'time', 1, 'function'),
        //在新增，编辑的时候对安全输出html
        array('note', 'Input::safeHtml', 3, 'function'),
    );
    //是否进行时间间隔判断
    protected $isWriteTimeInterval = false;

    /**
     * 输出安全的html，用于过滤危险代码
     * @param type $content
     * @return type
     */
    public function safeHtml($content) {
        return Input::safeHtml($content);
    }

    /**
     * 设置短信状态
     * @param type $id
     * @param type $status
     * @return boolean
     */
    public function setRead($userid, $ids, $status = 1) {
        if (empty($ids) || empty($userid)) {
            return false;
        }
        $msgid = $this->where(array('id' => array('IN', $ids)))->getField('id,msgid,senduid,recuid');
        foreach ($msgid as $r) {
            $this->where(array('senduid' => $r['senduid'], 'senduid' => array('NEQ', $userid), 'recuid' => $r['recuid'], 'msgid' => $r['msgid'], 'is_read' => 0))->save(array('is_read' => $status));
        }
        return true;
    }

    /**
     * 是否有权限发私信
     * @param type $userid
     * @return boolean
     */
    public function msgCompetence($userid = 0) {
        if (empty($userid)) {
            return false;
        }
        //取得用户配置信息
        $userConfig = D('Member')->getUserConfig((int) $userid);
        if (empty($userConfig)) {
            return false;
        }
        return $userConfig['expand']['ismsg'] ? true : false;
    }

    /**
     * 发送私信
     * @param type $userid 发送者UID
     * @param type $data 私信数据
     * @return boolean
     */
    public function msgAdd($userid, $data) {
        if (empty($userid)) {
            $this->error = '发送人ID不能为空！';
            return false;
        }
        if (empty($data)) {
            $this->error = '数据不能为空！';
            return false;
        }
        //获取发送者会员信息
        $userInfo = service("Passport")->getLocalUser((int) $userid);
        //获取接收者会员信息
        $recUserInfo = service("Passport")->getLocalUser((int) $data['recuid']);
        if (empty($userInfo) || empty($recUserInfo)) {
            $this->error = '该用户不存在！';
            return false;
        }
        //补充标题
        if (empty($data['title'])) {
            $data['title'] = $userInfo['username'] . '给你发送了一条短信息';
        }
        //msg关系表数据
        $msgData = array(
            'senduid' => $userInfo['userid'],
            'suid' => $userInfo['userid'],
            'sendname' => $userInfo['username'],
            'recuid' => $recUserInfo['userid'],
            'ruid' => $recUserInfo['userid'],
            'recuname' => $recUserInfo['username'],
            'userid' => $data['recuid'],
        );

        //检查发者和收着是否已经有同一个回话
        $isAnswer = $this->where(array(
                    'suid' => $msgData['suid'],
                    'ruid' => $msgData['ruid'],
                ))->order(array('id' => 'ASC'))->getField('id');
        if ($isAnswer) {
            $msgData['answerid'] = $isAnswer;
        } else {
            //如果是回复私信，则不用检查是否有私信发送权限
            if (false == $this->msgCompetence($userInfo['userid'])) {
                $this->error = '当前用户组没有发送短信息/私信的权限！';
                return false;
            }
        }

        //短信内容数据
        $msgText = M('MemberMsgText');
        $data = $msgText->validate($this->validate)->auto($this->auto)->create($data, 1);
        if (!$data) {
            $this->error = $msgText->getError();
            return false;
        }
        //短信主体关系
        $msgData = $this->create($msgData, 1);
        if ($msgData) {
            //添加短信主体关系
            $id = $this->add($msgData);
            if ($id) {
                //更新时间
                if ($isAnswer) {
                    $this->where(array('id' => $isAnswer))->save(array('datetime' => time()));
                }
                //添加短信内容
                $mid = $msgText->add($data);
                if ($mid) {
                    //进行短信主题和短信内容关联
                    if (false !== $this->where(array('id' => $id))->save(array('msgid' => $mid))) {
                        //添加一份到发送者自己的短信主体关系
                        $msgMyData = $msgData;
                        $msgMyData['userid'] = $userid;
                        $msgMyData['msgid'] = $mid;
                        $msgMyData['answerid'] = 0;
                        $msgMyData['suid'] = $msgData['recuid'];
                        $msgMyData['ruid'] = $msgData['senduid'];
                        $msgMyData['is_read'] = 0; //设置未读状态
                        //检查发者和收着是否已经有同一个回话
                        $isAnswer = $this->where(array(
                                    'suid' => $msgMyData['suid'],
                                    'ruid' => $msgMyData['ruid'],
                                ))->order(array('id' => 'ASC'))->getField('id');
                        if ($isAnswer) {
                            $msgMyData['answerid'] = $isAnswer;
                        }
                        if ($this->add($msgMyData)) {
                            //发送通知
                            $this->sendMsgNotice($userInfo['userid'], $userInfo['username'], $recUserInfo['userid'], $msgData['answerid'] ? $msgData['answerid'] : $id);
                            return $id;
                        }
                    }
                }
                //失败
                $this->where(array('id' => $id))->delete();
                $msgText->where(array('mid' => $mid))->delete();
                $this->error = '入库失败！';
                return false;
            } else {
                $this->error = '入库失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 删除用户的所有短信
     * @param type $userid
     * @return boolean
     */
    public function msgDelAll($userid) {
        if (empty($userid)) {
            $this->error = '请指定需要清空短信的会员ID';
            return false;
        }
        $msgids = $this->where(array('userid' => $userid))->field('msgid')->select();
        if ($this->where(array('userid' => $userid))->delete()) {
            foreach ($msgids as $r) {
                $this->msgDelById($r['msgid']);
            }
            return true;
        } else {
            $this->error = '清空失败！';
            return false;
        }
    }

    /**
     * 删除用户短信
     * @param type $userid 用户UID
     * @param type $id 短信ID
     * @return boolean
     */
    public function msgDel($userid, $id = 0) {
        if (empty($userid)) {
            $this->error = '请指定需要删除短信的会员ID';
            return false;
        }
        if (empty($id)) {
            return $this->msgDelAll($userid);
        }
        $msgid = $this->where(array('userid' => $userid, 'id' => $id))->getField('msgid');
        //执行删除
        if (false !== $this->where(array('userid' => $userid, 'id' => $id))->delete()) {
            //删除短信内容
            $this->msgDelById($msgid);
            //删除其他相关记录
            $msgids = $this->where(array('userid' => $userid, 'answerid' => $id))->field('msgid')->select();
            $this->where(array('userid' => $userid, 'answerid' => $id))->delete();
            foreach ($msgids as $r) {
                $this->msgDelById($r['msgid']);
            }
            return true;
        } else {
            $this->error = '删除失败！';
            return false;
        }
    }

    /**
     * 删除短信内容
     * @param type $msgid 短信ID
     * @return boolean
     */
    protected function msgDelById($msgid) {
        if (empty($msgid)) {
            return false;
        }
        $count = $this->where(array('msgid' => $msgid))->count();
        if ($count) {
            return false;
        }
        return M('MemberMsgText')->where(array('mid' => $msgid))->delete();
    }

    /**
     * 发送一条通知给接收私信的用户
     * @param type $uid 发送者uid
     * @param type $username 发送者用户名
     * @param type $byuid 接收私信的用户uid
     * @param type $msgid 私信ID
     * @return type
     */
    public function sendMsgNotice($uid, $username, $byuid, $msgid) {
        $extendParams = array(
            'userid' => $uid, //谁操作的
            'username' => $username,
            'title' => $username . '给您发了一个私信~',
            'msgid' => $msgid,
        );
        $sendUser = array(
            'userid' => $uid, //谁操作的
            'username' => $username,
        );
        return D('Message')->sendNotice($byuid, $sendUser, 'message', $extendParams);
    }

}
