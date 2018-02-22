<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 后台用户权限模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;
class BespeakModel extends Model {

 protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback'),
        array('auditstatus','0',3)
    );

  protected $_validate = array(
        array('permanent_name', 'require', '姓名不能为空!'),
        array('permanent_address', 'require', '户籍不能为空!'),
        array('credential_no', 'require', '证件号不能为空!'),
        array('tel', 'require', '联系电话不能为空!'),
        array('email', 'require', '电子邮箱不能为空!'),
        array('attendance_num', 'require', '预约参观人数不能为空!'),
        array('appointment_time', 'require', '预约参观日期不能为空!')
       
    );
}