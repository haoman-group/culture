<?php
//文化活动的后台页面
namespace Admin\Model;

use Common\Model\Model;
use Admin\Service\User;
class NewsModel extends Model{
	 protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        
        array('updatetime','m_date',3,'callback'),
       
        
    );

	 

}