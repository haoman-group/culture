<?php
namespace Admin\Model;

use Common\Model\Model;
use Admin\Model\AreaModel;
use Admin\Service\User;
class TheatreModel extends Model {
       private $audit=NULL;
       protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('author_id','getAdminID',1,'callback'),


    );
       protected function _initialize() {
        parent::_initialize();
    }
     protected function getAdminID(){
        return \Admin\Service\User::getInstance()->id;
    }
}