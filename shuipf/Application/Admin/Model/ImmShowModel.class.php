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

class ImmShowModel extends Model {
    protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback'),
        array('author_id','getAdminID',1,'callback')
    );
    protected $_validate = array(
        
    );

     protected function getAdminID(){
        return \Admin\Service\User::getInstance()->id;
    }
}