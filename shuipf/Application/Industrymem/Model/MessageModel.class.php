<?php

// +----------------------------------------------------------------------
// | 系统通知模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Common\Model\Model;

class MessageModel extends Model {

    //同一用户，同一类型通知，多少秒内，忽略！避免造成太多的无用通知
    protected $sendTimeIgnore = 600;
    //数据表
    protected $tableName = 'member_message';
    //自动验证
    protected $_validate = array(
        array('userid', 'require', '接收者用户ID不能为空！', 1, 'regex', 1),
        array('typeid', 'require', '通知类型不能为空！', 1, 'regex', 1),
        array('title', 'require', '通知标题不能为空！', 1, 'regex', 1),
        array('senduid', 'require', '通知产生者UID不能为空！', 1, 'regex', 1),
        array('sendname', 'require', '通知产生者用户名不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
        array('is_read', 0),
    );
    //本次通知对话KEY
    protected $sendKey = 'sendKey';
    //是否进行时间间隔判断
    protected $isWriteTimeInterval = false;

    /**
     *  设置本次通知KEY
     * @param type $key
     * @return boolean
     */
    public function setSendKey($key) {
        if (empty($key)) {
            return false;
        }
        $this->sendKey = $key;
        return true;
    }

    /**
     * 本次通知，是否忽略
     * @return boolean
     */
    private function isSendIgnore() {
        //获取cookie
        $cookie = cookie($this->sendKey);
        if (!empty($cookie)) {
            return true;
        }
        cookie($this->sendKey, 1, $this->sendTimeIgnore);
        return false;
    }

    /**
     * 发送通知
     * @param type $uid 接收用户UID
     * @param type $sendUser 产生通知的用户信息，包含 userid,username
     * @param type $type 通知类型
     * @param type $extendParams 通知参数
     * @return boolean
     */
    public function sendNotice($uid, $sendUser, $type, $extendParams = array()) {
        if (empty($uid)) {
            return false;
        }
        //获取通知类型id
        $typeId = $this->getTypeId($type);
        if (empty($typeId)) {
            return false;
        }
        $post = array(
            'userid' => $uid,
            'typeid' => $typeId,
            'title' => $extendParams['title'] ? $extendParams['title'] : '您有一条新的通知！',
            'senduid' => $sendUser['userid'],
            'sendname' => $sendUser['username'],
            'extend_params' => serialize($extendParams),
        );

        $data = $this->create($post, 1);
        if ($data) {
            //检查接收通知的用户最新一条是不是同一个用户产生的，如果是，不添加新的，直接进行更新
            $isNewNotice = $this->where(array('userid' => $post['userid'], 'senduid' => $post['senduid'], 'typeid' => $post['typeid']))->order(array('nid' => 'DESC'))->getField('nid');
            if ($isNewNotice) {
                unset($post['userid']);
                $post['datetime'] = time();
                $post['is_read'] = 0;
                return false !== $this->where(array('nid' => $isNewNotice))->save($post) ? true : false;
            } else {
                return $this->add($data);
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * 发送一般通知(无类型)
     * @param int $uid
     * @param string $content
     * @param string $title
     */
    public function sendDefaultNotice($uid, $content, $title = '') {
        $extendParams = array('content' => $content, 'title' => $title);
        return $this->sendNotice($uid, 'default', $extendParams);
    }

    /**
     * 获取用户未读取通知数
     * @param type $userid
     * @return int
     */
    public function getNoticeNoReadCount($userid) {
        if (empty($userid)) {
            return 0;
        }
        return $this->where(array('userid' => $userid, 'is_read' => 0))->count();
    }

    /**
     * 删除用户指定的通知
     * @param type $userid 用户UID
     * @param type $nid 通知ID
     * @return boolean
     */
    public function noticeDel($userid, $nid) {
        if (empty($userid)) {
            $this->error = '请指定需要删除通知的用户UID';
            return false;
        }
        if (empty($nid)) {
            $this->error = '请指定需要删除通知';
            return false;
        }
        return $this->where(array('userid' => $userid, 'nid' => $nid))->delete();
    }

    /**
     * 设置通知状态为已读
     * @param type $nid 可以是数组，可以是单条通知id
     * @return boolean
     */
    public function noticeRead($nid) {
        if (empty($nid)) {
            return false;
        }
        $where = array();
        if (is_array($nid)) {
            $where['nid'] = array('IN', $nid);
        } else {
            $where['nid'] = $nid;
        }
        return $this->where($where)->save(array('is_read' => 1));
    }

    /**
     * 
     * 根据类型ID获取类型名
     * @param int $typeid
     * @return string
     */
    public function getTypenameByTypeid($typeid) {
        $typeIds = array_flip($this->getNoteType());
        return $typeIds[$typeid];
    }

    /**
     * 根据用户UID删除通知内容
     * @param type $uid 用户UID
     */
    public function deleteNoticeByUid($uid) {
        
    }

    /**
     * 根据类型批量删除通知
     * @param type $uid 用户uid
     * @param type $type 通知类型
     * @param type $params 参数
     */
    public function deleteNoticeByType($uid, $type, $params) {
        
    }

    /**
     * 根据通常名称获取通知类型
     * @param type $typeName
     * @return int
     */
    public function getTypeId($typeName) {
        $types = $this->getNoteType();
        if (!is_array($types) || !isset($types[$typeName]))
            return 0;
        return $types[$typeName];
    }

    /**
     * 获取通知类型
     * @return type
     */
    private function getNoteType() {
        return array(
            'fans' => 1,
            'account' => 2,
            'praise' => 3,
            'wall' => 4,
            'favorites' => 5,
            'miniblog' => 6,
            'dance' => 7,
            'album' => 8,
            'default' => 9,
            'message' => 10,
        );
    }

    /**
     * 获取通知类型名称
     * @return type
     */
    private function getNoteTypeName() {
        return array(
            'default' => '通知',
            'fans' => '关注',
            'account' => '帐户',
            'praise' => '赞扬',
            'wall' => '留言',
            'favorites' => '推荐',
            'miniblog' => '说说',
            'dance' => '资讯',
            'album' => '图片',
            'message' => '私信',
        );
    }

}
