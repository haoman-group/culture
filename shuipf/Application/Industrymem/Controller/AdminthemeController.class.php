<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 空间主题管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

use Common\Controller\AdminBase;

class AdminthemeController extends AdminBase {

    //主题模型
    protected $Theme = NULL;
    //主题存放目录
    protected $themePath = '/statics/extres/member/theme/';

    protected function _initialize() {
        parent::_initialize();
        $this->Theme = D('Theme');
        $this->themePath = SITE_PATH . $this->themePath;
    }

    //主题列表
    public function index() {
        $where = array();
        $count = $this->Theme->where($where)->count();
        $page = $this->page($count, 14);
        $data = $this->Theme->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();

        $this->assign('data', $data);
        $this->assign('count', $count);
        $this->assign("Page", $page->show('Admin'));
        $this->display();
    }

    //添加主题
    public function add() {
        $Dir = new \Dir($this->themePath);
        $toArray = $Dir->toArray();
        if (IS_POST) {
            $ids = I('post.ids');
            $theme = I('post.theme');
            $point = I('post.point');
            $remark = I('post.remark');
            if (empty($ids)) {
                $this->error('请选择需要启用的主题！');
            }
            //遍历检查是否已经存在
            foreach ($ids as $k => $id) {
                if ($toArray[$id]['filename']) {
                    //检查是否已经启用
                    if ($this->Theme->where(array('themedir' => $toArray[$k]['filename']))->getField('id')) {
                        unset($ids[$k], $theme[$k], $point[$k], $remark[$k]);
                    }
                    $data = array(
                        'theme' => $theme[$id],
                        'themedir' => $toArray[$id]['filename'],
                        'remark' => $remark[$id],
                        'point' => $point[$id],
                    );
                    if (false == $this->Theme->themeAdd($data)) {
                        $this->error($this->Theme->getError());
                    }
                } else {
                    unset($ids[$k], $theme[$k], $point[$k], $remark[$k]);
                }
            }
            $this->success('主题添加成功！', U('Admintheme/index'));
            return true;
        }
        //已经启用主题
        $qiyong = $this->Theme->getField('id,themedir');
        if (empty($qiyong)) {
            $qiyong = array('t0');
        } else {
            array_unshift($qiyong, 't0');
        }
        foreach ($toArray as $k => $file) {
            if (in_array($file['filename'], $qiyong)) {
                unset($toArray[$k]);
            }
        }
        $this->assign('data', $toArray);
        $this->assign('count', count($toArray));
        $this->display();
    }

    //删除主题
    public function delete() {
        if (IS_POST) {
            //主题ID
            $ids = I('post.ids');
            if (empty($ids)) {
                $this->error('请指定需要删除的主题！');
            }
            if ($this->Theme->themeDelete($ids)) {
                $this->success('主题删除成功！');
            } else {
                $this->error('主题删除失败！');
            }
        } else {
            //主题ID
            $id = I('get.id', 0, 'intval');
            if (empty($id)) {
                $this->error('请指定需要删除的主题！');
            }
            if ($this->Theme->themeDelete($id)) {
                $this->success('主题删除成功！');
            } else {
                $this->error('主题删除失败！');
            }
        }
    }

    //编辑主题
    public function edit() {
        if (IS_POST) {
            $post = I('post.');
            if (empty($post)) {
                $this->error('数据不能为空！');
            }
            if ($this->Theme->themeEdit($post)) {
                $this->success('更新成功！', U('Admintheme/index'));
            } else {
                $this->error($this->Theme->getError());
            }
        } else {
            $id = I('get.id', 0, 'intval');
            if (empty($id)) {
                $this->error('请指定需要编辑的主题！');
            }
            //取得主题信息
            $info = $this->Theme->where(array('id' => $id))->find();
            if (empty($info)) {
                $this->error('该主题不存在！');
            }
            $this->assign('data', $info);
            $this->display();
        }
    }

}
