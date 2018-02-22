<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员空间主题
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class SkinController extends MemberBase {

    //主题模型
    protected $memberTheme = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->memberTheme = D('Theme');
    }

    //主题更新
    public function setup() {
        //主题文件夹名称
        $skinPath = I('post.skinPath', '', 'trim');
        //用户原来的皮肤主题编号
        $BskinPath = I('post.BskinPath', '', 'trim');
        //操作类型
        $showType = I('post.showType', 0, 'intval');
        //保存当前设置主题
        if ($showType == 1) {
            if (empty($skinPath)) {
                $this->error('请选择主题！');
            }
            if ($this->memberTheme->userSetupTheme($this->userid, $skinPath)) {
                $this->message(array(
                    'info' => '主题更新成功！',
                    'error' => 10000,
                        ), array(), true);
                return true;
            } else {
                $this->error($this->memberTheme->getError());
            }
        } else {
            //恢复默认主题
            if ($this->memberTheme->userSetupThemeDefault($this->userid)) {
                $this->message(array(
                    'info' => '恢复默认主题成功！',
                    'error' => 10000,
                        ), array(), true);
                return true;
            } else {
                $this->error($this->memberTheme->getError());
            }
        }
    }

}
