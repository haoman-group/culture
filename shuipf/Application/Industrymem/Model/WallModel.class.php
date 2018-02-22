<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 留言模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Member\Model\MemberCommonModel;

class WallModel extends MemberCommonModel {

    //数据表
    protected $tableName = 'member_wall';
    //自动验证
    protected $_validate = array(
        array('userid', 'require', '用户ID不能为空！', 1, 'regex', 1),
        array('username', 'require', '用户名不能为空！', 1, 'regex', 1),
        array('authoruid', 'require', '留言者会员ID不能为空！', 1, 'regex', 1),
        array('author', 'require', '留言者用户名不能为空！', 1, 'regex', 1),
        array('content', 'require', '留言内容不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
        array('hfsum', 0),
        //在新增，编辑的时候对安全输出html
        array('content', 'Input::safeHtml', 3, 'function'),
    );
    //留言数据
    protected $wallInfo = NULL;

    /**
     * 检查是否有留言权限
     * @param type $userid
     * @return boolean
     */
    public function userWallCompetence($userid) {
        if (empty($userid)) {
            return false;
        }
        //取得用户配置信息
        $userConfig = D('Member')->getUserConfig((int) $userid);
        if (empty($userConfig)) {
            return false;
        }
        return $userConfig['expand']['iswall'] ? true : false;
    }

    /**
     * 添加留言
     * @param type $userid 用户ID
     * @param type $data 留言数据 数组
     * @return boolean
     */
    public function wallAdd($data) {
        if (empty($data)) {
            $this->error = '留言信息不能为空！';
            return false;
        }
        //回复用户 格式：回复@Tina[2]
        $replayUser = matchAtUser($data['replayUser']);
        tag('member_wall_add_begin', $data);
        $this->wallInfo = $this->create($data, 1);
        if ($this->wallInfo) {
            if (false == $this->userWallCompetence($this->wallInfo['userid'])) {
                $this->error = '当前用户组没有留言权限！';
                return false;
            }
            //如果存在回复，检查被回复的留言是否存在
            if ($this->wallInfo['parentid']) {
                if (!$this->where(array('userid' => $this->wallInfo['userid'], 'wid' => $this->wallInfo['parentid']))->getField('wid')) {
                    $this->error = '回复的留言不存在！';
                    return false;
                }
            }
            //加上回复人信息
            if ($replayUser && is_array($replayUser)) {
                foreach ($replayUser as $reolay) {
                    $this->wallInfo['content'] = '回复 <a href="' . UM('Home/index', array('userid' => $reolay['userid'])) . '" target="_blank" class="user_card" style="float:none;" uid="' . $reolay['userid'] . '">@' . $reolay['username'] . '</a>'
                            . $this->wallInfo['content'];
                }
            }
            $wid = $this->add($this->wallInfo);
            if ($wid) {
                if ($this->wallInfo['parentid']) {
                    //回复数+1
                    $this->where(array('userid' => $this->wallInfo['userid'], 'wid' => $this->wallInfo['parentid']))->setInc('hfsum');
                }
                $this->wallInfo['wid'] = $wid;
                //进行通知
                $this->notiFication($replayUser);
                tag('member_wall_add_end', $this->wallInfo);
                return $wid;
            } else {
                $this->error = $this->error ? $this->error : '入库失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 删除留言
     * @param type $userid 用户ID
     * @param type $wid 留言ID
     * @return boolean
     */
    public function wallDel($userid, $wid) {
        if (empty($userid)) {
            $this->error = '用户ID不能为空！';
            return false;
        }
        if (empty($wid)) {
            $this->error = '请指定需要删除的留言！';
            return false;
        }
        //判断是否数组，数组支持一次多条删除
        if (is_array($wid)) {
            $wid = array('IN', $wid);
        }
        tag('member_wall_delete_begin', $wid);
        //删除留言
        if (false !== $this->where(array('userid' => $userid, 'wid' => $wid))->delete()) {
            //删除回复
            $this->where(array('userid' => $userid, 'parentid' => $wid))->delete();
            tag('member_wall_delete_end', $wid);
            return true;
        } else {
            $this->error = '留言删除失败！';
            return false;
        }
    }

    /**
     * 通知
     * @param type $replayUser at用户数组
     * @return boolean
     */
    protected function notiFication($replayUser = false) {
        if (empty($this->wallInfo)) {
            return false;
        }
        //空间主人
        $homeHost = $this->wallInfo['userid'];
        //此条记录的直接产生人
        $triggerUser = $this->wallInfo['authoruid'];
        //产生通知的用户信息
        $sendUser = array(
            'userid' => $triggerUser,
            'username' => $this->wallInfo['author'],
        );
        //附带参数
        $extendParams = array();
        //at到关联的人
        $atUser = $replayUser;
        //需要通知的用户列表
        $notUserList = array();
        //产生此条通知的用户，不能是当前留言空间的主人，且也不是回复其他用户。
        if ($triggerUser == $homeHost) {
            if (false == $atUser && empty($this->wallInfo['parentid'])) {
                return true;
            }
        }

        //如果是回复留言
        if (!empty($this->wallInfo['parentid'])) {
            //留言楼主信息
            $landlordUser = $this->where(array('userid' => $this->wallInfo['userid'], 'wid' => $this->wallInfo['parentid']))->field('authoruid,author')->find();

            //通知空间主人的情况
            if ($landlordUser['authoruid'] == $triggerUser || !in_array($this->wallInfo['authoruid'], array($homeHost, $landlordUser['authoruid']))) {
                //通知这条留言所处空间的主人
                $notUserList[$homeHost] = $this->wallInfo['username'];
                //空间主人接收到通知的相关信息
                //通知标题
                $extendParams[$homeHost]['title'] = $sendUser['username'] . '回复了 您 留言板上的留言';
                //通知类型
                $extendParams[$homeHost]['type'] = 2;
            }

            //通知楼主
            if ($landlordUser['authoruid'] != $triggerUser) {
                //检查是否第三个插入留言对话
                if (in_array($this->wallInfo['authoruid'], array($homeHost, $landlordUser['authoruid']))) {
                    $notUserList[$landlordUser['authoruid']] = $landlordUser['author'];
                    //被AT到的用户接收到被回复信息
                    //通知标题
                    $extendParams[$landlordUser['authoruid']]['title'] = $sendUser['username'] . '评论了 您 给 ' . $this->wallInfo['username'] . ' 的留言';
                    //通知类型
                    $extendParams[$landlordUser['authoruid']]['type'] = 3;
                } else if (empty($atUser)) {//如果没有有at的情况下第三方插入
                    $notUserList[$landlordUser['authoruid']] = $landlordUser['author'];
                    //通知标题
                    $extendParams[$landlordUser['authoruid']]['title'] = $sendUser['username'] . '评论了 您 给 ' . $this->wallInfo['username'] . ' 的留言';
                    //通知类型
                    $extendParams[$landlordUser['authoruid']]['type'] = 4;
                } else {
                    $notUserList[$landlordUser['authoruid']] = $landlordUser['author'];
                    //通知标题
                    $extendParams[$landlordUser['authoruid']]['title'] = $sendUser['username'] . '评论了 您 给 ' . $this->wallInfo['username'] . ' 的留言中的回复';
                    //通知类型
                    $extendParams[$landlordUser['authoruid']]['type'] = 5;
                }
            }

            //有at情况
            if (!empty($atUser)) {
                foreach ($atUser as $k => $r) {
                    if ($r['userid'] == $triggerUser) {
                        continue;
                    }
                    $notUserList[$r['userid']] = $r['username'];
                    //被AT到的用户接收到被回复信息
                    //如果AT的是空间主人
                    if ($homeHost == $r['userid']) {
                        $extendParams[$r['userid']]['title'] = $sendUser['username'] . '评论了 ' . $this->wallInfo['username'] . ' 的回复';
                        //通知类型
                        $extendParams[$r['userid']]['type'] = 6;
                    } else {
                        $extendParams[$r['userid']]['title'] = $sendUser['username'] . '评论了 您 给 ' . $this->wallInfo['username'] . ' 的留言';
                        //通知类型
                        $extendParams[$r['userid']]['type'] = 7;
                    }
                }
            }
        } else {
            //通知这条留言所处空间的主人
            $notUserList[$homeHost] = $this->wallInfo['username'];
            //空间主人接收到通知的相关信息
            //通知标题
            $extendParams[$homeHost]['title'] = $sendUser['username'] . '给 您 留言拉';
            //通知类型
            $extendParams[$homeHost]['type'] = 1;
        }

        //进行通知
        foreach ($notUserList as $userid => $username) {
            //用户ID
            $extendParams[$userid]['userid'] = $this->wallInfo['userid'];
            //用户名
            $extendParams[$userid]['username'] = $this->wallInfo['username'];
            //留言用户ID
            $extendParams[$userid]['authoruid'] = $triggerUser;
            //留言用户名
            $extendParams[$userid]['author'] = $this->wallInfo['author'];
            //留言ID
            $extendParams[$userid]['wid'] = $this->wallInfo['parentid'] ? $this->wallInfo['parentid'] : $this->wallInfo['wid'];

            D('Message')->sendNotice($userid, $sendUser, 'wall', $extendParams[$userid]);
        }
        return true;
    }

}
