<?php

namespace Admin\Model;

use Common\Model\Model;

class BriefingModel extends Model {
    protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback'),
        array('author_id','getAdminID',1,'callback'),
        array('isdelete','0',1)
        
    );
   
    protected function getAdminID(){
        return \Admin\Service\User::getInstance()->id;
    }
    //后置函数
   
}
?>