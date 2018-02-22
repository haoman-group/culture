<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员好友分组模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Member\Model\MemberCommonModel;

class FriendsgroupModel extends MemberCommonModel {

    //数据表
    protected $tableName = 'member_friendsgroup';
    protected $_auto = array(
        array('datetime', 'time', 1, 'function')
    );
    //是否进行时间间隔判断
    protected $isWriteTimeInterval = false;

    /**
     * 获取用户好用分组总数
     * @param type $userid
     * @return int
     */
    public function getUserGroupCount($userid = 0) {
        if (empty($userid)) {
            return false;
        }
        return $this->where(array('userid' => $userid))->count();
    }

}
