<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员相册模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Common\Model\Model;

class AlbumModel extends Model {

    //数据表
    protected $tableName = 'member_album';
    //自动验证
    protected $_validate = array(
        array('userid', 'require', '用户ID不能为空！', 1, 'regex', 1),
        array('username', 'require', '用户名不能为空！', 1, 'regex', 1),
        array('aid', 'require', '附件ID不能为空！', 1, 'regex', 1),
        array('src', 'require', '相册地址不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        array('uploadtime', 'time', 1, 'function'),
        array('ishome', '0'),
    );

    /**
     * 取得用户已上传数量
     * @return int
     */
    public function getUploadSize($userid = 0) {
        if (empty($userid)) {
            $userid = service('Passport')->userid;
        }
        return $this->where(array('userid' => $userid))->count('id');
    }

    /**
     * 照片喜欢数+1
     * @param type $id 照片id
     * @return boolean
     */
    public function setAlbumLoveSum($id) {
        if (empty($id)) {
            return false;
        }
        return $this->where(array('id' => $id))->setInc('love');
    }

    /**
     * 照片评论数+1
     * @param type $id 照片id
     * @return boolean
     */
    public function setAlbumCommentSum($id) {
        if (empty($id)) {
            return false;
        }
        return $this->where(array('id' => $id))->setInc('plsum');
    }

    /**
     * 照片喜欢数-1
     * @param type $id 照片id
     * @return boolean
     */
    public function setAlbumLoveDec($id) {
        if (empty($id)) {
            return false;
        }
        return $this->where(array('id' => $id))->setDec('love');
    }

    /**
     * 照片评论数-1
     * @param type $id 照片id
     * @return boolean
     */
    public function setAlbumCommentDec($id) {
        if (empty($id)) {
            return false;
        }
        return $this->where(array('id' => $id))->setDec('plsum');
    }

    /**
     * 取得用户是否还可以继续上传相册
     * @param type $userid
     * @return boolean
     */
    public function getAlbumMax($userid) {
        if (empty($userid)) {
            return false;
        }
        if (empty($userid)) {
            $userid = service('Passport')->userid;
        }
        //取得用户配置信息
        $userConfig = D('Member')->getUserConfig((int) $userid);
        if (empty($userConfig)) {
            return 0;
        }
        return (int) $userConfig['expand']['upphotomax'];
    }

    /**
     * 获取好友照片
     * @param type $userid 用户UID
     * @param type $page 当前分页号
     * @param type $limit 每页显示多少
     * @return boolean
     */
    public function selectFollowing($userid, $page = 1, $limit = 10) {
        if (empty($userid)) {
            return false;
        }
        $Friends = D('Friends');
        $where = array('userid' => $userid);
        $count = $Friends->alias('as F')->where(array('F.userid' => $where['userid']))->join(' INNER JOIN `' . C('DB_PREFIX') . 'member_album` as A ON F.fuserid = A.userid')->count('A.id');
        $page = page($count, $limit, $page);
        $cache = $Friends->alias('as F')
                ->where(array('F.userid' => $where['userid']))
                ->join(' INNER JOIN `' . C('DB_PREFIX') . 'member_album` as A ON F.fuserid = A.userid')
                ->Field('A.*')
                ->limit($page->firstRow . ',' . $page->listRows)
                ->order(array("id" => "DESC"))
                ->select();
        return array(
            'count' => $count,
            'data' => $cache,
            'Page' => $page->show('Admin'),
        );
    }

    /**
     * 添加相册
     * @param type $data 相册相关数据
     * @return boolean
     */
    public function albumAdd($data) {
        if (empty($data)) {
            $this->error = '相册信息不能为空！';
            return false;
        }
        //取得排序ID
        $listorder = $this->where(array('userid' => $data['userid']))->order(array('listorder' => 'DESC'))->getField('listorder');
        if ($listorder) {
            $listorder++;
        } else {
            $listorder = 1;
        }
        $data['listorder'] = $listorder;
        $data = $this->create($data, 1);
        if ($data) {
            //检查上传数量
            if ((int) $this->getAlbumMax($data['userid']) < (int) $this->getUploadSize($data['userid'])) {
                $this->error = '您相册已满，无法继续上传！';
                return false;
            }
            $id = $this->add($data);
            if ($id) {
                //更新相册动态
                D('Dongtai')->addAlbumDongTai($data['userid']);
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
     * 删除照片
     * @param type $userid 用户UID
     * @param type $pid 需要删除的图片ID，可以是数组
     * @return boolean
     */
    public function albumDel($userid, $pid) {
        if (empty($userid)) {
            $this->error = '请指定用户！';
            return false;
        }
        if (empty($pid)) {
            $this->error = '请指定需要删除的图片！';
            return false;
        }
        $delPid = array();
        if (!is_array($pid)) {
            $delPid[] = $pid;
        } else {
            $delPid = $pid;
        }
        //获取附件服务
        $Attachment = service("Attachment", array(
            'module' => 'Album',
            'isadmin' => 0,
            'userid' => $userid,
        ));
        foreach ($delPid as $pid) {
            $info = $this->where(array('id' => $pid))->find();
            if ($info) {
                //根据附件id删除附件
                if ($Attachment->delFile((int) $info['aid'])) {
                    $Attachment->delFile($info['thumb']);
                    if (false !== $this->where(array('id' => $pid))->delete()) {
                        D('AlbumLove')->loveDelByAid($pid);
                        D('AlbumComment')->commentDelByAid($pid);
                    }
                } else {
                    $this->error = '删除附件失败！';
                    return false;
                }
            }
        }
        //更新相册动态
        D('Dongtai')->addAlbumDongTai($userid, 'delete');
        return true;
    }

    /**
     * 对照片进行首页显示排序
     * 此处排序，看是否有优化空间。。。
     * @param type $userid 用户UID
     * @param type $idArr 排序结果
     * @return boolean
     */
    public function albumHomeOrder($userid, $idArr) {
        if (empty($userid)) {
            $this->error = '请指定用户！';
            return false;
        }
        if (empty($idArr)) {
            $this->error = '首页显示排序失败！';
            return false;
        }
        $cacheKey = "usercache_{$userid}_album_homeshow";
        S($cacheKey, NULL);
        $i = 0;
        //首页显示排序字段，全部初始化为0
        $this->where(array('userid' => $userid))->save(array('ishome' => 0));
        foreach ($idArr as $order => $id) {
            if ($i < 8) {
                $this->where(array('userid' => $userid, 'id' => $id))->save(array('ishome' => 7 - $order));
            }
            $i++;
        }
        return true;
    }

    /**
     * 对照片进行排序
     * 此处排序，看是否有优化空间。。。
     * @param type $userid 用户UID
     * @param type $idArr 排序结果
     * @return boolean
     */
    public function albumOrder($userid, $idArr) {
        if (empty($userid)) {
            $this->error = '请指定用户！';
            return false;
        }
        if (empty($idArr)) {
            $this->error = '排序失败！';
            return false;
        }
        $count = count($idArr);
        foreach ($idArr as $order => $id) {
            $this->where(array('userid' => $userid, 'id' => $id))->save(array('listorder' => $count - $order));
        }
        return true;
    }

}
