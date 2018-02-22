<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员主题模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Model;

use Common\Model\Model;

class ThemeModel extends Model {

    //数据表
    protected $tableName = 'member_theme';
    //自动验证
    protected $_validate = array(
        array('theme', 'require', '主题名称不能为空！', 1, 'regex', 1),
        array('themedir', 'require', '主题目录名称不能为空！', 1, 'regex', 1),
    );
    //自动完成
    protected $_auto = array(
        array('datetime', 'time', 1, 'function'),
    );

    /**
     * 根据主题目录名称更新用户主题
     * @param type $userid 用户ID
     * @param type $themedir 主题文件夹名称
     * @return boolean
     */
    public function userSetupTheme($userid, $themedir) {
        if (empty($userid) || empty($themedir)) {
            $this->error = '参数不完整！';
            return false;
        }
        //取得主题信息
        $info = $this->where(array('themedir' => $themedir))->find();
        if (empty($info)) {
            $this->error = '该主题不存在！';
            return false;
        }
        //获取用户信息
        $userInfo = service("Passport")->getLocalUser((int) $userid);
        if (empty($userInfo)) {
            $this->error = '该用户不存在！';
            return false;
        }
        //积分
        if ($info['point']) {
            if ((int) $userInfo['point'] < (int) $info['point']) {
                $this->error = '您的积分不够！';
                return false;
            }
            //扣除积分
            $user_integral = service("Passport")->user_integral((int) $userid, 0 - $info['point']);
            if ($user_integral < 1) {
                $this->error = '您的积分不够！';
                return false;
            }
        }
        //进行保存
        $status = D('Member')->where(array('userid' => $userInfo['userid']))->save(array('theme' => $themedir));
        if (false !== $status) {
            //使用人数+1
            $this->where(array('themedir' => $themedir))->setInc('adoption', 1);
            return true;
        } else {
            $this->error = '主题更新失败！';
            //进行积分返回
            if ($info['point']) {
                service("Passport")->user_integral((int) $userid, $info['point']);
            }
            return false;
        }
    }

    /**
     * 恢复默认主题
     * @param type $userid
     * @return boolean
     */
    public function userSetupThemeDefault($userid) {
        if (empty($userid)) {
            $this->error = '参数不完整！';
            return false;
        }
        if (false !== D('Member')->where(array('userid' => $userid))->save(array('theme' => ''))) {
            return true;
        } else {
            $this->error = '恢复失败！';
            return false;
        }
    }

    /**
     *  添加主题
     * @param type $data
     * @return boolean
     */
    public function themeAdd($data) {
        C('TOKEN_ON', false);
        $data = $this->create($data, 1);
        if ($data) {
            $id = $this->add($data);
            if ($id) {
                return $id;
            } else {
                $this->error = '添加失败！';
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 删除主题
     * @param type $id 主题ID，可以是数组
     * @return boolean
     */
    public function themeDelete($id) {
        if (empty($id)) {
            $this->error = '请指定需要删除的主题！';
            return false;
        }
        $where = array();
        if (is_array($id)) {
            $where['id'] = array('IN', $id);
        } else {
            $where['id'] = $id;
        }
        $themedir = $this->where($where)->getField('id,themedir');
        //删除
        if (false !== $this->where($where)->delete()) {
            //把使用该主题会员，主题设置为空
            D('Member')->where(array('theme' => array('IN', $themedir)))->save(array('theme' => ''));
            return true;
        } else {
            $this->error = '删除失败！';
            return false;
        }
    }

    /**
     * 编辑主题
     * @param type $data
     * @return boolean
     */
    public function themeEdit($data) {
        if (empty($data)) {
            $this->error = '数据不能为空！';
            return false;
        }
        $id = $data['id'];
        unset($data['id']);
        $data = $this->create($data, 2);
        if ($data) {
            if (false !== $this->where(array('id' => $id))->save($data)) {
                return true;
            } else {
                $this->error = '更新失败！';
                return false;
            }
        } else {
            return false;
        }
    }

}
