<?php

// +----------------------------------------------------------------------
// | 会员访问记录
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Member\Model\MemberCommonModel;

class VisitorsModel extends MemberCommonModel {

    //数据表
    protected $tableName = 'member_visitors';
    //自动验证
    protected $_validate = array(
        array('userid', 'require', '访问者用户ID不能为空！', 1, 'regex', 1),
        array('username', 'require', '访问者用户名不能为空！', 1, 'regex', 1),
        array('byuserid', 'require', '被访问者用户ID不能为空！', 1, 'regex', 1),
        array('byusername', 'require', '被访问者用户名不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
    );
    //是否进行时间间隔判断
    protected $isWriteTimeInterval = false;

    /**
     * 取得访客用户的访问时间
     * @param type $userid 被访问用户ID
     * @param type $byuserid 访客用户ID
     * @return boolean
     */
    public function getUserVisitorsTime($userid, $byuserid) {
        static $_getUserVisitorsTime = array();
        if (empty($userid) || empty($byuserid)) {
            return false;
        }
        if (isset($_getUserVisitorsTime[$userid . $byuserid])) {
            return $_getUserVisitorsTime[$userid . $byuserid];
        }
        $_getUserVisitorsTime[$userid . $byuserid] = $this->where(array('userid' => $userid, 'byuserid' => $byuserid))->getField('datetime');
        return $_getUserVisitorsTime[$userid . $byuserid];
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
        return $this->where(array('byuserid' => $byuserid))->limit($limit)->order(array('datetime' => 'DESC'))->select();
    }

    /**
     * 检查用户是否访问过该空间
     * @param type $userid 访客UID
     * @param type $byuserid 空间用户UID
     * @return type
     */
    public function isVisitors($userid, $byuserid) {
        $id = $this->where(array('userid' => $userid, 'byuserid' => $byuserid))->getField('id');
        return $id ? true : false;
    }

    /**
     * 添加访客记录
     * @param type $data
     * @return boolean
     */
    public function visitorsAdd($data) {
        if (empty($data)) {
            $this->error = '访问数据不能为空';
            return false;
        }
        $data = $this->create($data, 1);
        if ($data) {
            if ($this->isVisitors($data['userid'], $data['byuserid'])) {
                $id = $this->where(array('userid' => $data['userid'], 'byuserid' => $data['byuserid']))->save(array('datetime' => time()));
            } else {
                $id = $this->add($data);
            }
            if ($id) {
                return $id;
            } else {
                $this->error = '访客记录添加失败！';
                return false;
            }
        } else {
            return false;
        }
    }

}
