<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员随便说说模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Member\Model\MemberCommonModel;

class WeiboModel extends MemberCommonModel {

    //数据表
    protected $tableName = 'member_weibo';
    //自动验证
    protected $_validate = array(
        array('userid', 'require', '用户ID不能为空！', 1, 'regex', 1),
        array('username', 'require', '用户名不能为空！', 1, 'regex', 1),
        array('content', 'require', '说说内容不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
        array('plsum', 0, 1),
        //在新增，编辑的时候对安全输出html
        array('content', '\Input::safeHtml', 3, 'function'),
    );

    /**
     * 检查是否有发送微博权限
     * @param type $userid
     * @return boolean
     */
    public function isWeiboAdd($userid) {
        if (empty($userid)) {
            return false;
        }
        //取得用户配置信息
        $userConfig = D('Member')->getUserConfig((int) $userid);
        if (empty($userConfig)) {
            return false;
        }
        return $userConfig['expand']['isweibo'] ? true : false;
    }

    /**
     * 微博评论数+1
     * @param type $id 微博id
     * @return boolean
     */
    public function setWeiboCommentSum($id) {
        if (empty($id)) {
            return false;
        }
        return $this->where(array('id' => $id))->setInc('plsum');
    }

    /**
     * 微博评论数-1
     * @param type $id 微博id
     * @return boolean
     */
    public function setWeiboCommentDec($id) {
        if (empty($id)) {
            return false;
        }
        return $this->where(array('id' => $id))->setDec('plsum');
    }

    /**
     * 获取好友微博
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
        $count = $Friends->alias('as F')->where(array('F.userid' => $where['userid']))->join(' INNER JOIN `' . C('DB_PREFIX') . 'member_weibo` as W ON F.fuserid = W.userid')->count('W.id');
        $page = page($count, $limit, $page);
        $cache = $Friends->alias('as F')
                ->where(array('F.userid' => $where['userid']))
                ->join(' INNER JOIN `' . C('DB_PREFIX') . 'member_weibo` as W ON F.fuserid = W.userid')
                ->Field('W.*')
                ->limit($page->firstRow . ',' . $page->listRows)
                ->order(array("W.id" => "DESC"))
                ->select();
        return array(
            'count' => $count,
            'data' => $cache,
            'Page' => $page->show('Admin'),
        );
    }

    /**
     * 发送一条说说
     * @param type $data 说说内容
     * @return boolean
     */
    public function weiboAdd($data) {
        $data = $this->create($data, 1);
        if ($data) {
            if (!$this->isWeiboAdd($data['userid'])) {
                $this->error = '当前用户组没有发表微博权限！';
                return false;
            }
            $id = $this->add($data);
            if ($id) {
                $data['id'] = $id;
                //添加一条动态
                D('Dongtai')->addDongTai('miniblog', array(
                    'userid' => $data['userid'],
                    'username' => $data['username'],
                    'relevance' => $id,
                    'params' => array(
                        'content' => $data['content'],
                    ),
                ));
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
     * 删除说说
     * @param type $userid 用户UID
     * @param type $ids 说说ID，可以是数组
     * @return boolean
     */
    public function weiboDel($userid, $ids) {
        if (empty($userid)) {
            $this->error = '请指定需要删除说说的用户！';
            return false;
        }
        if (empty($ids)) {
            $this->error = '请指定需要删除的内容！';
            return false;
        }
        $where = array(
            'userid' => $userid,
        );
        if (is_array($ids)) {
            $where['id'] = array('IN', $ids);
        } else {
            $where['id'] = $ids;
        }
        if (false !== $this->where($where)->delete()) {
            //删除回复
            D('WeiboComment')->commentDelByWid($where['id']);
            //删除动态
            D('Dongtai')->delDongtaiByType('miniblog', $userid, $ids);
            return true;
        } else {
            $this->error = '删除失败！';
            return false;
        }
    }

}
