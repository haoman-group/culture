<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 说说评论模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Member\Model\MemberCommonModel;

class WeiboCommentModel extends MemberCommonModel {

    //数据表
    protected $tableName = 'member_weibo_comment';
    //微博评论数据
    protected $weiboInfo = NULL;
    //评论数据
    protected $commentInfo = NULL;
    //自动验证
    protected $_validate = array(
        array('wid', 'require', '所属微博ID不能为空！', 1, 'regex', 1),
        array('userid', 'require', '会员ID不能为空！', 1, 'regex', 1),
        array('username', 'require', '会员用户名不能为空！', 1, 'regex', 1),
        array('content', 'require', '微博评论内容不能为空！', 1, 'regex', 1),
        array('content', 'isMax', '回复内容不能超过140个字！', 1, 'callback', 1),
    );
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
        //在新增，编辑的时候对安全输出html
        array('content', 'Input::safeHtml', 3, 'function'),
    );

    /**
     * 评论内容长度验证
     * @param type $content
     */
    public function isMax($content) {
        return isMax($content, 140);
    }

    /**
     * 根据微博ID删除评论
     * @param type $wid 所属微博ID
     * @return boolean
     */
    public function commentDelByWid($wid) {
        if (empty($wid)) {
            return false;
        }
        return false !== $this->where(array('wid' => $wid))->delete() ? true : false;
    }

    /**
     * 根据评论ID删除评论
     * @param type $id 评论ID
     * @return boolean
     */
    public function commentDelById($id) {
        if (empty($id)) {
            return false;
        }
        //取得微博id
        $wid = $this->where(array('id' => $id))->getField('wid');
        if (empty($wid)) {
            $this->error = '评论不存在！';
            return false;
        }
        if (false !== $this->where(array('id' => $id))->delete()) {
            //评论数-1
            D('Weibo')->setWeiboCommentDec($wid);
            return true;
        } else {
            $this->error = '评论删除失败！';
            return false;
        }
    }

    /**
     * 添加微博回复
     * @param type $userid 用户ID
     * @param type $data 提交数据
     * @return boolean
     */
    public function commentAdd($userid, $data) {
        if (empty($userid)) {
            $this->error = '用户名不能为空！';
            return false;
        }
        if (empty($data)) {
            $this->error = '数据不能为空！';
            return false;
        }
        //回复用户 格式：回复@Tina[2]
        $replayUser = matchAtUser($data['replayUser']);
        //获取微博数据
        $this->weiboInfo = D('Weibo')->where(array('id' => $data['wid']))->find();
        if (empty($this->weiboInfo)) {
            $this->error = '该微博不存在，无法进行回复！';
            return false;
        }
        //创建提交数据
        $this->commentInfo = $this->create($data, 1);
        if ($this->commentInfo) {
            //检查微博发表
            if (!D('Weibo')->isWeiboAdd($data['userid'])) {
                $this->error = '当前用户组没有回复微博权限！';
                return false;
            }
            //加上回复人信息
            if ($replayUser && is_array($replayUser)) {
                foreach ($replayUser as $reolay) {
                    $this->commentInfo['content'] = '回复 <a href="' . UM('Home/index', array('userid' => $reolay['userid'])) . '" target="_blank" class="user_card" style="float:none;" uid="' . $reolay['userid'] . '">@' . $reolay['username'] . '</a>'
                            . $this->commentInfo['content'];
                }
            }
            $id = $this->add($this->commentInfo);
            if ($id) {
                $this->commentInfo['id'] = $id;
                //微博数+1
                D('Weibo')->setWeiboCommentSum($this->commentInfo['wid']);
                //进行通知
                $this->notiFication($replayUser);
                return $id;
            } else {
                $this->error = $this->error ? $this->error : '操作失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 进行通知
     * @param type $replayUser 回复用户
     * @return boolean
     */
    protected function notiFication($replayUser = false) {
        if (empty($this->commentInfo)) {
            return false;
        }
        //查询出微博评论信息
        if (empty($this->weiboInfo)) {
            $this->weiboInfo = D('Weibo')->where(array('id' => $this->commentInfo['wid']))->find();
        }
        if (empty($this->weiboInfo) || empty($this->weiboInfo['userid'])) {
            $this->error = '获取微博数据错误，无法进行通知！';
            return false;
        }
        //空间主人
        $homeHost = $this->weiboInfo['userid'];
        //此条记录的直接产生人
        $triggerUser = $this->commentInfo['userid'];
        //附带参数
        $extendParams = array();
        //at到关联的人
        $atUser = $replayUser;
        //需要通知的用户列表
        $notUserList = array();
        //产生通知的用户信息
        $sendUser = array(
            'userid' => $this->commentInfo['userid'],
            'username' => $this->commentInfo['username'],
        );
        //产生此条通知的用户，不能是当前空间的主人，且也不是回复其他用户。
        if ($triggerUser == $homeHost) {
            if (false == $atUser) {
                return true;
            }
        }

        //有at情况
        if (!empty($atUser)) {
            foreach ($atUser as $k => $r) {
                if ($r['userid'] == $triggerUser) {
                    continue;
                }
                //通知空间主人
                if ($homeHost != $r['userid'] && $homeHost != $triggerUser) {
                    $notUserList[$homeHost] = $this->weiboInfo['username'];
                    $extendParams[$homeHost]['title'] = $this->commentInfo['username'] . '评论了 ' . $r['username'] . ' 在 您 说说的回复';
                    $extendParams[$homeHost]['type'] = 4;
                    $extendParams[$homeHost]['atusername'] = $r['username'];
                    $extendParams[$homeHost]['atuserid'] = $r['userid'];
                }

                $notUserList[$r['userid']] = $r['username'];
                //如果AT的是空间主人
                if ($homeHost == $r['userid']) {
                    $extendParams[$r['userid']]['title'] = $this->commentInfo['username'] . '评论了 您 在说说中的回复';
                    $extendParams[$r['userid']]['type'] = 2;
                } else {
                    $extendParams[$r['userid']]['title'] = $this->commentInfo['username'] . '评论了您在 ' . $this->weiboInfo['username'] . ' 说说中的回复';
                    $extendParams[$r['userid']]['type'] = 3;
                }
            }
        } else {
            //通知空间主人
            $notUserList[$homeHost] = $this->weiboInfo['username'];
            $extendParams[$homeHost]['title'] = $this->commentInfo['username'] . '评论了 您 的说说';
            $extendParams[$homeHost]['type'] = 1;
        }

        //进行通知
        foreach ($notUserList as $userid => $username) {
            //用户ID
            $extendParams[$userid]['userid'] = $this->weiboInfo['userid'];
            //用户名
            $extendParams[$userid]['username'] = $this->weiboInfo['username'];
            //评论用户
            $extendParams[$userid]['author'] = $this->commentInfo['username'];
            //评论用户ID
            $extendParams[$userid]['authoruid'] = $this->commentInfo['userid'];
            //说说ID
            $extendParams[$userid]['id'] = $this->weiboInfo['id'];

            D('Message')->sendNotice($userid, $sendUser, 'miniblog', $extendParams[$userid]);
        }
    }

}
