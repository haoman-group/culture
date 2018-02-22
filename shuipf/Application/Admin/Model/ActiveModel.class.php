<?php
//文化活动的后台页面
namespace Admin\Model;

use Common\Model\Model;
use Admin\Service\User;
class ActiveModel extends Model{
	 protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('author_id','getAdminID',1,'callback'),
        array('updatetime','m_date',3,'callback'),
        array('area','getAdminArea',1,'callback'),
        array('isdelete','0',3)
        
    );

	 protected function getAdminID(){
        return \Admin\Service\User::getInstance()->id;
    }
    //获取推荐
    public function getPosition($num = 4){
        return $this->order('id desc')->limit($num)->select();
    }
  //获取地址area

  protected function getAdminArea(){
      return User::getInstance()->getInfo()['area'];
  }
}