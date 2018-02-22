<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 照片管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class AlbumController extends MemberBase {

    protected $album = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->album = D("Member/Album");
    }

    //我的照片
    public function album() {
        //查询条件
        $where = array();
        $where['userid'] = $this->userid;
        $album = $this->album->where($where)->order(array("listorder" => "DESC", 'id' => "DESC"))->select();

        $this->assign('album', $album);
        $this->display();
    }

    //我喜欢的照片
    public function praise() {
        $page = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $AlbumLove = D('Member/AlbumLove');
        $data = $AlbumLove->getAlbumLoveListByUserid($this->userid, $page, 10);

        $this->assign('count', $data['count']);
        $this->assign('praise', $data['data']);
        $this->assign("Page", $data['Page']);
        $this->display();
    }

    //删除我喜欢的照片
    public function praisedel() {
        //需要删除的喜欢的照片ID
        $lidArr = I('post.lidArr');
        if (empty($lidArr)) {
            $this->message(array(
                'error' => 10005,
                'info' => '请指定需要上传的照片！',
            ));
        }
        $AlbumLove = D('AlbumLove');
        if ($AlbumLove->loveDel($this->userid, $lidArr)) {
            $this->message(10000, array(), true);
        } else {
            $this->error($AlbumLove->getError());
        }
    }

    //好友照片
    public function following() {
        $page = I('get.' . C('VAR_PAGE'), 1, 'intval');
        if (IS_AJAX) {
            $data = $this->album->selectFollowing($this->userid, $page, 10);
            $callback = I('request.callback', '');
            if (empty($callback)) {
                $type = 'JSON';
            } else {
                $type = 'JSONP';
                C('VAR_JSONP_HANDLER', 'callback');
            }
            //加url
            foreach ($data['data'] as $k => $v) {
                $data['data'][$k]['url'] = UM('Home/album', array('userid' => $v['userid'], 'id' => $v['id']));
                $data['data'][$k]['uploadtime'] = format_date($v['uploadtime']);
                $data['data'][$k]['home'] = UM('Home/index', array('userid' => $v['userid']));
            }
            $this->ajaxReturn(array('data' => $data['data'], 'totalpages' => ceil($data['count'] / 10)), $type);
        } else {
            $data = $this->album->selectFollowing($this->userid, $page, 10);
        }

        $this->assign('count', $data['count']);
        $this->assign('following', $data['data']);
        $this->assign("Page", $data['Page']);
        $this->assign('pages', $page);
        $this->display();
    }

    //首页显示
    public function homeshow() {
        if (IS_POST) {
            $idArr = I('post.idArr');
            if (empty($idArr)) {
                $this->error('更新失败！');
            }
            if ($this->album->albumHomeOrder($this->userid, $idArr)) {
                $this->message(10000, array(), true);
            } else {
                $this->error($this->album->getError());
            }
        } else {
            //查询条件
            $where = array();
            $where['userid'] = $this->userid;
            $where['ishome'] = 0;
            $album = $this->album->where($where)->order(array("listorder" => "ASC", 'id' => "DESC"))->select();
            //首页显示的
            $where['ishome'] = array('GT', 0);
            $homealbum = $this->album->where($where)->order(array("ishome" => "DESC", 'id' => "DESC"))->limit(7)->select();

            $this->assign('album', $album);
            $this->assign('homealbum', $homealbum);
            $this->display();
        }
    }

    //照片我喜欢
    public function addlove() {
        //照片ID
        $pid = I('post.pid', 0, 'intval');
        //取得照片信息
        $info = $this->album->where(array('id' => $pid))->find();
        if (empty($info)) {
            $this->message(array(
                'info' => '图片不存在或已删除！',
                'error' => 30000,
            ));
        }
        //检查是否喜欢自己的图片
        if ($info['userid'] == $this->userid) {
            $this->message(array(
                'info' => '您只能喜欢别人的图片，不能喜欢自己的图片！',
                'error' => 10013,
            ));
        }
        //加入我喜欢
        $id = D('AlbumLove')->loveAdd($this->userid, $pid);
        if ($id) {
            $this->message(10000, array(), true);
        } else {
            $this->error(D('AlbumLove')->getError());
        }
    }

    //取消照片我喜欢
    public function dellove() {
        //照片ID
        $pid = I('post.pid', 0, 'intval');
        //取得照片信息
        $info = $this->album->where(array('id' => $pid))->find();
        if (empty($info)) {
            $this->message(array(
                'info' => '图片不存在或已删除！',
                'error' => 30000,
            ));
        }
        if ($info['userid'] == $this->userid) {
            $this->message(array(
                'info' => '这是您自己的图片！',
                'error' => 10013,
            ));
        }
        //检查是否赞过
        if (false == D('AlbumLove')->isLove($this->userid, $pid)) {
            $this->message(array(
                'info' => '没有赞过这张图片！',
                'error' => 10003,
            ));
        }
        //取消我喜欢
        $id = D('AlbumLove')->loveDelByUserId($this->userid, $pid);
        if ($id) {
            $this->message(10000, array(), true);
        } else {
            $this->error(D('AlbumLove')->getError());
        }
    }

    //照片排序
    public function listorder() {
        if (IS_POST) {
            $idArr = I('post.idArr');
            if (empty($idArr)) {
                $this->error('更新失败！');
            }
            if ($this->album->albumOrder($this->userid, $idArr)) {
                $this->message(10000, array(), true);
            } else {
                $this->error($this->album->getError());
            }
        } else {
            //查询条件
            $where = array();
            $where['userid'] = $this->userid;
            $album = $this->album->where($where)->order(array("listorder" => "DESC", 'id' => "DESC"))->select();

            $this->assign('album', $album);
            $this->display();
        }
    }

    //添加照片
    public function imageadd() {
        $upphotomax = $this->album->getAlbumMax($this->userid);
        if ($upphotomax < 1) {
            $this->error('您没有上传照片的权限！');
        }
        $this->assign('photosum', $this->album->getUploadSize($this->userid));
        $this->assign('upphotomax', $upphotomax);
        $this->assign('key',  cookie(\Libs\Service\Passport::userUidKey));
        $this->display();
    }

    //删除图片
    public function imagedel() {
        $pid = I('post.pid');
        if (empty($pid)) {
            $this->error('图片不存在或已删除！');
        }
        //需要删除的图片id
        $delPid = array();
        if (is_array($pid)) {
            $delPid = $pid;
        } else {
            $delPid[] = $pid;
        }
        if ($this->album->albumDel($this->userid, $delPid)) {
            $this->message(10000, array(), true);
        } else {
            $this->error($this->album->getError());
        }
    }

    //更新照片说明
    public function imageremark() {
        //照片ID
        $pid = I('post.pid', 0, 'intval');
        //照片说明
        $remark = I('post.remark');
        if (empty($remark)) {
            $this->error('照片说明不能为空！');
        }
        //照片信息
        $info = $this->album->where(array('id' => $pid))->find();
        if (empty($info)) {
            $this->message(array(
                'info' => '图片不存在或已删除！',
                'error' => 30000,
            ));
        }
        if ($info['userid'] != $this->userid) {
            $this->message(array(
                'info' => '您没有权限！',
                'error' => 20002,
            ));
        }
        if (false !== $this->album->where(array('id' => $pid, 'userid' => $this->userid))->save(array('remark' => $remark))) {
            $this->message(10000, array(
                'remark' => $remark
                    ), true);
        } else {
            $this->error(array(
                'info' => '本次操作失败了，请稍后再试！',
                'error' => 10005,
            ));
        }
    }

    //添加照片评论
    public function commentadd() {
        $post = I('post.');
        //照片ID
        $aid = $post['aid'];
        //回复
        $replayUser = $pid['replayUser'];
        //评论内容
        $content = $post['content'];
        if (empty($content)) {
            $this->message(array(
                'info' => '评论内容不能为空！',
                'error' => 10007
            ));
        }
        //检测长度
        if (false == isMax($content, 100)) {
            $this->message(array(
                'info' => '您填写的内容太多了！',
                'error' => 10006
            ));
        }
        $post['userid'] = $this->userid;
        $post['username'] = $this->username;
        //添加评论
        $id = D('Member/AlbumComment')->commentAdd($post);
        if ($id) {
            $this->message(10000, array(), true);
        } else {
            $this->error(D('Member/AlbumComment')->getError());
        }
    }

    //删除照片评论
    public function commentdel() {
        //评论id
        $cid = I('post.cid', 0, 'intval');
        //查询出评论信息
        $albumId = D('Member/AlbumComment')->where(array('id' => $cid))->getField('aid');
        if (empty($albumId)) {
            $this->message(array(
                'error' => 30001,
                'info' => '评论不存在或已删除！',
            ));
        }
        //查询出照片信息
        $albumInfo = $this->album->where(array('id' => $albumId))->find();
        if (empty($albumInfo)) {
            $this->message(array(
                'error' => 30000,
                'info' => '图片不存在或已删除！',
            ));
        }
        if ($albumInfo['userid'] != $this->userid) {
            $this->message(array(
                'error' => 20002,
                'info' => '您没有权限删除！',
            ));
        }
        //执行删除
        if (false !== D('Member/AlbumComment')->commentDelByid($cid)) {
            $this->message(10000, array(), true);
        } else {
            $this->error(D('Member/AlbumComment')->getError());
        }
    }

}
