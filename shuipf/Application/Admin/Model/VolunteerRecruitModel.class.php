<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 后台用户模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;

class VolunteerRecruitModel extends Model {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('title', 'require', '标题不能为空！'),
        array('pic[]','require','图片不能为空!')
    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
        array('update_time', 'time', 3, 'function'),
        array('pic','serialize',3,'function')
        // array('verify', 'genRandomString', 1, 'function', 6), //新增时自动生成验证码
    );
    // 后置操作
    protected function _after_select(&$resultSet,$options) {
        foreach($resultSet as &$res){
            $res['pic'] = unserialize($res['pic']);
        }
    }
    //查询范围
    protected $_scope = array(
        'normal'=>array()
    );
}
