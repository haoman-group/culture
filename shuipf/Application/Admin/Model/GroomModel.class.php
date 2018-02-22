<?php
//最新推荐
namespace Admin\Model;

use Common\Model\Model;
use Admin\Service\User;
class GroomModel extends Model{
	 protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),  
        array('area','getAdminArea',1,'callback') 
        
    );

	  protected function getAdminArea(){
      return User::getInstance()->getInfo()['area'];
  }

}