<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 相册后台管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

use Common\Controller\AdminBase;

class AdminalbumController extends AdminBase {

    //相册模型
    protected $album = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->album = D("Album");
    }

    //显示全部相册列表
    public function index() {
        $where = array();
        //是否搜索
        $search = I('get.search', 0, 'intval');
        if ($search) {
            //上传时间
            $start_time = I('get.start_time'); //开始时间
            $end_time = I('get.end_time'); //结束时间
            //开始时间
            $where_start_time = strtotime($start_time) ? strtotime($start_time) : 0;
            //结束时间
            $where_end_time = strtotime($end_time) ? (strtotime($end_time) + 86400) : 0;
            //开始时间大于结束时间，置换变量
            if ($where_start_time > $where_end_time) {
                $tmp = $where_start_time;
                $where_start_time = $where_end_time;
                $where_end_time = $tmp;
                $tmptime = $start_time;

                $start_time = $end_time;
                $end_time = $tmptime;
                unset($tmp, $tmptime);
            }
            //时间范围
            if ($where_start_time) {
                $where['uploadtime'] = array('between', array($where_start_time, $where_end_time));
            }
            //关键字
            $keyword = I('get.keyword', '', 'trim');
            if ($keyword) {
                //搜索类型
                $type = I('get.type', 0, 'intval');
                switch ($type) {
                    case 1:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 2:
                        $where['userid'] = array("EQ", $keyword);
                        break;
                    case 3:
                        $where['id'] = array("EQ", (int) $keyword);
                        break;
                    default:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                }
            }
            $this->assign('type', $type);
            $this->assign('start_time', $start_time);
            $this->assign('end_time', $end_time);
            $this->assign('keyword', $keyword);
        }

        $count = $this->album->where($where)->count();
        $page = $this->page($count, 20);
        $data = $this->album->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();

        $this->assign("Page", $page->show('Admin'));
        $this->assign('data', $data);
        $this->assign('count', $count);
        $this->display();
    }

    //删除照片
    public function delphoto() {
        if (IS_POST) {
            //批量删除
            $ids = $_POST['ids'];
            if (empty($ids)) {
                $this->error('请选择需要删除的照片！');
            }
            foreach ($ids as $userid => $delids) {
                $this->album->albumDel($userid, $delids);
            }
            $this->success('照片删除成功！');
        } else {
            $id = I('get.id', 0, 'intval');
            $userid = I('get.userid', 0, 'intval');
            if (empty($id)) {
                $this->error('请指定需要删除的照片！');
            }
            if (empty($userid)) {
                $this->error('参数错误！');
            }
            if ($this->album->albumDel($userid, $id)) {
                $this->success('照片删除成功！');
            } else {
                $this->error('照片删除失败！');
            }
        }
    }

    //评论管理
    public function comment() {
        $AlbumComment = D('AlbumComment');
        $where = $whereJoin = array();
        //是否搜索
        $search = I('get.search', 0, 'intval');
        if ($search) {
            //关键字
            $keyword = I('get.keyword', '', 'trim');
            if ($keyword) {
                //搜索类型
                $type = I('get.type', 0, 'intval');
                switch ($type) {
                    case 1:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        $whereJoin['C.username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 2:
                        $where['aid'] = array("EQ", (int) $keyword);
                        $whereJoin['C.aid'] = array("EQ", (int) $keyword);
                        break;
                    case 3:
                        $where['content'] = array("LIKE", '%' . $keyword . '%');
                        $whereJoin['C.content'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    default:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        $whereJoin['C.username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                }
            }
            $this->assign('type', $type);
            $this->assign('keyword', $keyword);
        }
        $count = $AlbumComment->where($where)->count();
        $page = $this->page($count, 20);
        $data = $AlbumComment->alias('as C')
                ->where($whereJoin)
                ->join(' INNER JOIN `' . C('DB_PREFIX') . 'member_album` as A ON C.aid = A.id')
                ->limit($page->firstRow . ',' . $page->listRows)
                ->Field('C.*,A.userid as a_userid,A.username as a_username,A.thumb as thumb,A.thumb_width as thumb_width,A.thumb_height as thumb_height,A.filename as filename')
                ->order(array("C.id" => "DESC"))
                ->select();

        $this->assign("Page", $page->show('Admin'));
        $this->assign('data', $data);
        $this->assign('count', $count);
        $this->display();
    }

    //删除评论
    public function delcomment() {
        $AlbumComment = D('AlbumComment');
        if (IS_POST) {
            $ids = $_POST['ids'];
            if (empty($ids)) {
                $this->error('请指定需要删除评论ID！');
            }
            if (is_array($ids)) {
                $ids = array('IN', $ids);
            }
            if ($AlbumComment->commentDelByid($ids)) {
                $this->success('评论删除成功！');
            } else {
                $this->error('评论上传失败！');
            }
        } else {
            $id = I('get.id', 0, 'intval');
            if (empty($id)) {
                $this->error('请指定需要删除评论ID！');
            }

            if ($AlbumComment->commentDelByid($id)) {
                $this->success('评论删除成功！');
            } else {
                $this->error('评论上传失败！');
            }
        }
    }

}
