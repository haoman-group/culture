<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员相册评论模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Member\Model\MemberCommonModel;

class AlbumCommentModel extends MemberCommonModel {

    //数据表
    protected $tableName = 'member_album_comment';
    //评论数据
    protected $commentInfo = NULL;
    //照片评论数据
    protected $albumInfo = NULL;
    //自动验证
    protected $_validate = array(
        array('aid', 'require', '照片ID不能为空！', 1, 'regex', 1),
        array('userid', 'require', '用户ID不能为空！', 1, 'regex', 1),
        array('username', 'require', '用户名不能为空！', 1, 'regex', 1),
        array('content', 'require', '评论内容不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
        //在新增，编辑的时候对安全输出html
        array('content', 'Input::safeHtml', 3, 'function'),
    );

    /**
     * 根据图片ID获取评论总数
     * @param type $aid
     * @param type $limit
     * @return boolean
     */
    public function getCommentCountByaid($aid) {
        if (empty($aid)) {
            $this->error = '请指定相片ID！';
            return false;
        }
        return $this->where(array('aid' => $aid))->count();
    }

    /**
     * 根据图片ID获取评论
     * @param type $aid
     * @param type $limit
     * @return boolean
     */
    public function getCommentByaid($aid, $limit = 9) {
        if (empty($aid)) {
            $this->error = '请指定相片ID！';
            return false;
        }
        return $this->where(array('aid' => $aid))->order(array('id' => 'DESC'))->limit($limit)->select();
    }

    /**
     * 根据照片ID，删除对应的评论数据
     * @param type $aid 照片ID
     * @return boolean
     */
    public function commentDelByAid($aid) {
        if (empty($aid)) {
            $this->error = '请指定相片ID！';
            return false;
        }
        if (false !== $this->where(array('aid' => $aid))->delete()) {
            return true;
        }
        $this->error = '删除失败！';
        return false;
    }

    /**
     * 根据评论ID，删除对应的评论数据
     * @param type $aid 照片ID
     * @return boolean
     */
    public function commentDelByid($id) {
        if (empty($id)) {
            $this->error = '请指定需要删除的评论ID！';
            return false;
        }
        if (false !== $this->where(array('id' => $id))->delete()) {
            return true;
        }
        $this->error = '删除失败！';
        return false;
    }

    /**
     * 添加评论
     * @param type $userid 用户ID
     * @param type $data 提交数据
     * @return boolean
     */
    public function commentAdd($data) {
        if (empty($data)) {
            $this->error = '数据不能为空！';
            return false;
        }
        //回复用户 格式：回复@Tina[2]
        $replayUser = matchAtUser($data['replayUser']);
        //取得图片信息
        $this->albumInfo = D("Album")->where(array('id' => $data['aid']))->find();
        if (empty($this->albumInfo)) {
            $this->error = '该照片不存在，无法进行回复！';
            return false;
        }
        //创建提交数据
        $this->commentInfo = $this->create($data, 1);
        if ($this->commentInfo) {
            //加上回复人信息
            if ($replayUser && is_array($replayUser)) {
                foreach ($replayUser as $reolay) {
                    $this->commentInfo['content'] = '回复 <a href="' . UM('Home/index', array('userid' => $reolay['userid'])) . '" target="_blank" class="user_card" uid="' . $reolay['userid'] . '">@' . $reolay['username'] . '</a>'
                            . $this->commentInfo['content'];
                }
            }
            $id = $this->add($this->commentInfo);
            if ($id) {
                $this->commentInfo['id'] = $id;
                //评论数+1
                D('Album')->setAlbumCommentSum($this->commentInfo['aid']);
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
        if (empty($this->albumInfo)) {
            $this->albumInfo = D('Album')->where(array('id' => $this->commentInfo['aid']))->find();
        }
        if (empty($this->albumInfo) || empty($this->albumInfo['userid'])) {
            $this->error = '获取照片数据错误，无法进行通知！';
            return false;
        }
        //空间主人
        $homeHost = $this->albumInfo['userid'];
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
                if ($homeHost != $r['userid'] && $triggerUser != $homeHost) {
                    $notUserList[$homeHost] = $this->albumInfo['username'];
                    $extendParams[$homeHost]['title'] = $this->commentInfo['username'] . '评论了 ' . $r['username'] . ' 在 您 照片的回复';
                    $extendParams[$homeHost]['type'] = 4;
                    $extendParams[$homeHost]['atusername'] = $r['username'];
                    $extendParams[$homeHost]['atuserid'] = $r['userid'];
                }

                $notUserList[$r['userid']] = $r['username'];
                //如果AT的是空间主人
                if ($homeHost == $r['userid']) {
                    $extendParams[$r['userid']]['title'] = $this->commentInfo['username'] . '评论了 您 在照片中的回复';
                    $extendParams[$r['userid']]['type'] = 2;
                } else {
                    $extendParams[$r['userid']]['title'] = $this->commentInfo['username'] . '评论了您在 ' . $this->weiboInfo['username'] . ' 照片中的回复';
                    $extendParams[$r['userid']]['type'] = 3;
                }
            }
        } else {
            //通知空间主人
            $notUserList[$homeHost] = $this->albumInfo['username'];
            $extendParams[$homeHost]['title'] = $this->commentInfo['username'] . '评论了 您 的照片';
            $extendParams[$homeHost]['type'] = 1;
        }

        //进行通知
        foreach ($notUserList as $userid => $username) {
            //用户ID
            $extendParams[$userid]['userid'] = $this->albumInfo['userid'];
            //用户名
            $extendParams[$userid]['username'] = $this->albumInfo['username'];
            //评论用户
            $extendParams[$userid]['author'] = $this->commentInfo['username'];
            //评论用户ID
            $extendParams[$userid]['authoruid'] = $this->commentInfo['userid'];
            //照片ID
            $extendParams[$userid]['id'] = $this->albumInfo['id'];

            D('Message')->sendNotice($userid, $sendUser, 'album', $extendParams[$userid]);
        }
    }

}
