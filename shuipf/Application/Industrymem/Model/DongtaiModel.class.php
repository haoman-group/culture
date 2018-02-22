<?php

// +----------------------------------------------------------------------
// | 动态
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Member\Model\MemberCommonModel;

class DongtaiModel extends MemberCommonModel {

    //数据表
    protected $tableName = 'member_dongtai';
    //自动验证
    protected $_validate = array(
        array('userid', 'require', '用户ID不能为空！', 1, 'regex', 1),
        array('username', 'require', '用户名不能为空！', 1, 'regex', 1),
        array('typeid', 'require', '动态类型不能为空！', 1, 'regex', 1),
            //array('relevance', 'require', '关联不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
        array('params', 'serialize', 1, 'function')
    );
    //用户动态数据
    protected $dongtaiData = array();
    //是否进行时间间隔判断
    protected $isWriteTimeInterval = false;

    protected function _initialize() {
        parent::_initialize();
        C('TOKEN_ON', false);
    }

    /**
     * 添加动态
     * @param type $type 动态类型
     * @param array $data 动态数据
     * @return boolean
     */
    public function addDongTai($type, $data) {
        if (empty($data)) {
            $this->error = '数据不能为空！';
            return false;
        }
        $data['typeid'] = $this->getTypeId($type);
        $this->dongtaiData = $this->create($data, 1);
        if ($this->dongtaiData) {
            $id = $this->add($this->dongtaiData);
            if ($id) {
                return $id;
            } else {
                $this->error = '入库失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     *  添加照片动态分享
     * @param array $data
     * @param type $action 动作
     * @return boolean
     */
    public function addAlbumDongTai($userid, $action = 'add') {
        if (empty($userid)) {
            $this->error = '用户ID不能为空';
            return false;
        }
        $typeid = $this->getTypeId('album');
        //条件
        $where = array('userid' => $userid);
        //读取最新的一次相册记录
        $info = $this->where(array('userid' => $userid, 'typeid' => $typeid))->order(array('id' => 'DESC'))->find();
        if (!empty($info)) {
            //$where['uploadtime'] = array('EGT', $info['datetime']);
        }
        //取得该用户最近的几次新上传的照片
        $album = D('Album')->where(array('userid' => $userid))
                ->field('id,userid,username,thumb,thumb_width,thumb_height,uploadtime')
                ->limit(4)
                ->order(array('uploadtime' => 'DESC', 'id' => 'DESC'))
                ->select();
        if (empty($album)) {
            //删除相册更新动态
            $this->where(array('userid' => $userid, 'typeid' => $typeid))->delete();
            return false;
        }
        $data = array(
            'userid' => $userid,
            'username' => $album[0]['username'],
            'typeid' => $typeid,
            'params' => $album,
        );
        if (empty($data)) {
            $this->error = '数据不能为空！';
            return false;
        }
        $this->dongtaiData = $this->create($data, 1);
        if ($this->dongtaiData) {
            //如果有记录，
            if (empty($info)) {
                $id = $this->add($this->dongtaiData);
                if ($id) {
                    return $id;
                } else {
                    $this->error = '入库失败！';
                    return false;
                }
            } else {
                $save = array(
                    'params' => $this->dongtaiData['params'],
                );
                if ($action == 'add') {
                    $save['datetime'] = time();
                }
                //如果有相册动态记录了，进行更新
                $status = $this->where(array('id' => $info['id'], 'userid' => $this->dongtaiData['userid'], 'typeid' => $this->dongtaiData['typeid']))->save($save);
                return (false !== $status) ? true : false;
            }
        } else {
            return false;
        }
    }

    /**
     * 根据动态类型和关联ID，删除对应动态
     * @param type $type 类型
     * @param type $userid 用户ID，为空不区分用户
     * @param type $relevance 关联ID
     * @return boolean
     */
    public function delDongtaiByType($type, $userid = 0, $relevance) {
        if (empty($type) || empty($relevance)) {
            return false;
        }
        $typeid = $this->getTypeId($type);
        if (empty($typeid)) {
            return false;
        }
        //是否多条
        if (is_array($relevance)) {
            $relevance = array('IN', $relevance);
        }
        $where = array('typeid' => $typeid, 'relevance' => $relevance);
        if ($userid > 0) {
            $where['userid'] = $userid;
        }
        return $this->where($where)->delete();
    }

    /**
     * 根据通常名称获取动态类型
     * @param type $typeName
     * @return int
     */
    public function getTypeId($typeName) {
        $types = $this->getTypeName();
        if (!is_array($types) || !isset($types[$typeName]))
            return 0;
        return $types[$typeName];
    }

    /**
     * 获取动态类型
     * @return type
     */
    private function getTypeName() {
        return array(
            'dance' => 1,
            'praise' => 2,
            'favorites' => 3,
            'miniblog' => 4,
            'album' => 5,
        );
    }

}
