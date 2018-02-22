<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员相册喜欢模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Member\Model\MemberCommonModel;

class AlbumLoveModel extends MemberCommonModel {

    //数据表
    protected $tableName = 'member_album_love';
    //自动验证
    protected $_validate = array(
        array('aid', 'require', '所属照片ID不能为空！', 1, 'regex', 1),
        array('userid', 'require', '用户ID不能为空！', 1, 'regex', 1),
        array('username', 'require', '用户名不能为空！', 1, 'regex', 1),
        array('byuserid', 'require', '用户ID不能为空！', 1, 'regex', 1),
        array('byusername', 'require', '用户名不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
    );

    /**
     * 是否喜欢过
     * @param type $userid 用户ID
     * @param type $aid
     * @return boolean
     */
    public function isLove($userid, $aid) {
        if (empty($userid)) {
            return false;
        }
        if (empty($aid)) {
            return false;
        }
        $isLove = $this->where(array('userid' => $userid, 'aid' => $aid))->count();
        if ($isLove) {
            return true;
        }
        return false;
    }

    /**
     * 根据图片id删除所有喜欢这张图片的喜欢记录
     * @param type $aid 照片ID
     * @return type
     */
    public function loveDelByAid($aid) {
        if (empty($aid)) {
            $this->error = '请指定需要删除的图片喜欢！';
            return false;
        }
        if (false !== $this->where(array('aid' => $aid))->delete()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 根据会员ID，和照片ID，删除指定的喜欢记录
     * @param type $userid 用户ID
     * @param type $aid 照片ID
     * @param type $loveId 喜欢ID
     * @return boolean
     */
    public function loveDelByUserId($userid, $aid, $loveId = 0) {
        if (empty($userid)) {
            $this->error = '请指定用户ID！';
            return false;
        }
        if (empty($aid)) {
            $this->error = '请指定需要的图片ID！';
            return false;
        }
        //取得喜欢ID
        if (empty($loveId)) {
            $loveId = $this->where(array('userid' => $userid, 'aid' => $aid))->getField('id');
        }
        if ($loveId) {
            if (false !== $this->where(array('userid' => $userid, 'aid' => $aid))->delete()) {
                //喜欢数-1
                D('Album')->setAlbumLoveDec($aid);
                //删除动态
                D('Dongtai')->delDongtaiByType('praise', $userid, $loveId);
                return true;
            } else {
                $this->error = '取消喜欢失败！';
                return false;
            }
        } else {
            $this->error = '获取不到用户喜欢照片记录ID';
            return false;
        }
    }

    /**
     * 删除用户指定的喜欢记录
     * @param type $userid 用户ID
     * @param type $lidArr 喜欢记录ID，支持数组
     * @return boolean
     */
    public function loveDel($userid, $lidArr) {
        if (empty($userid) || empty($lidArr)) {
            $this->error = '参数不正确！';
            return false;
        }
        $where = array(
            'userid' => $userid,
        );
        if (is_array($lidArr)) {
            $where['id'] = array('IN', $lidArr);
        } else {
            $where['id'] = $lidArr;
        }
        $delList = $this->where($where)->field('id,aid')->select();
        if (empty($delList)) {
            $this->error = '没有删除权限！';
            return false;
        }
        //使用遍历的方式删除
        foreach ($delList as $k => $r) {
            $this->loveDelByUserId($userid, $r['aid']);
        }
        return true;
    }

    /**
     * 根据图片ID取得该图片的喜欢记录
     * @param type $aid 图片ID
     * @param type $limit 返回数量
     * @return boolean
     */
    public function getAlbumByaid($aid, $limit = 9) {
        if (empty($aid)) {
            $this->error = '请指定相片ID！';
            return false;
        }
        return $this->where(array('aid' => $aid))->order(array('id' => 'DESC'))->limit($limit)->select();
    }

    /**
     * 通过join方式返回我喜欢的照片信息
     * @param type $userid 用户ID
     * @param type $page 当前分页
     * @param type $limit 每次返回数量
     * @return boolean
     */
    public function getAlbumLoveListByUserid($userid, $page = 1, $limit = 10) {
        if (empty($userid)) {
            return false;
        }
        $count = $this->alias('as L')->where(array('L.userid' => $userid))->join(' INNER JOIN `' . C('DB_PREFIX') . 'member_album` as A ON L.aid = A.id')->count('A.id');
        $page = page($count, $limit, $page);
        $cache = $this->alias('as L')->where(array('L.userid' => $userid))
                ->join(' INNER JOIN `' . C('DB_PREFIX') . 'member_album` as A ON L.aid = A.id')
                ->Field('A.*,L.id as loveid')
                ->limit($page->firstRow . ',' . $page->listRows)
                ->order(array("L.datetime" => "DESC"))
                ->select();
        return array(
            'count' => $count,
            'data' => $cache,
            'Page' => $page->show('Admin'),
        );
    }

    /**
     * 加入我喜欢
     * @param type $userid 用户ID
     * @param type $id 照片ID
     * @return boolean
     */
    public function loveAdd($userid, $id) {
        if (empty($userid)) {
            $this->error = '请指定用户！';
            return false;
        }
        if (empty($id)) {
            $this->error = '请指定喜欢的照片！';
            return false;
        }
        //取得被喜欢的照片信息
        $picInfo = D('Album')->where(array('id' => $id))->find();
        if (empty($picInfo)) {
            $this->error = '喜欢的照片不存在！';
            return false;
        }
        $myUserInfo = service('Passport')->getLocalUser((int) $userid);
        $data = array(
            'aid' => $id,
            'userid' => $userid,
            'username' => $myUserInfo['username'],
            'byuserid' => $picInfo['userid'],
            'byusername' => $picInfo['username'],
        );
        //查询是否已经喜欢过
        if ($this->isLove($userid, $id)) {
            $this->error = '已经喜欢过该照片，不能重复喜欢！';
            return false;
        }
        $data = $this->create($data, 1);
        if ($data) {
            $loveId = $this->add($data);
            if ($loveId) {
                //照片喜欢数 +1
                D('Album')->setAlbumLoveSum($id);
                //进行通知
                $this->notiFication(array(
                    //喜欢人
                    'userid' => $userid,
                    'username' => $myUserInfo['username'],
                    //喜欢时间
                    'datetime' => $data['datetime'],
                    //喜欢的照片ID
                    'albumid' => $id,
                    'albumuserid' => $picInfo['userid'],
                    'albumusername' => $picInfo['username'],
                ));
                //加入动态
                D('Dongtai')->addDongTai('praise', array(
                    'userid' => $data['userid'],
                    'username' => $data['username'],
                    'relevance' => $loveId,
                    'params' => array(
                        'byuserid' => $data['byuserid'],
                        'byusername' => $data['byusername'],
                        'picid' => $picInfo['id'],
                        'thumb' => $picInfo['thumb'],
                        'thumb_width' => $picInfo['thumb_width'],
                        'thumb_height' => $picInfo['thumb_height'],
                        'filename' => $picInfo['filename'],
                    ),
                ));
                return $loveId;
            } else {
                $this->error = $this->error ? $this->error : '入库失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 进行通知
     * @param type $data 
     * @return boolean
     */
    public function notiFication($data) {
        if (empty($data) || !is_array($data)) {
            return false;
        }
        //通知发给谁
        $atUserId = $data['albumuserid'];
        //附带参数
        $extendParams = array(
            'title' => '您的照片被 ' . $data['username'] . ' 标记为喜欢~',
            //喜欢人
            'userid' => $data['userid'],
            'username' => $data['username'],
            //喜欢时间
            'datetime' => $data['datetime'],
            //喜欢的照片ID
            'albumid' => $data['albumid'],
            'albumuserid' => $data['albumuserid'],
            'albumusername' => $data['albumusername'],
            'type' => 'love',
        );
        //产生通知的用户信息
        $sendUser = array(
            'userid' => $data['userid'],
            'username' => $data['username'],
        );
        //进行通知
        return D('Message')->sendNotice($atUserId, $sendUser, 'album', $extendParams);
    }

}
