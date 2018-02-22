<?php
//文化活动的后台页面
namespace Admin\Model;

use Common\Model\Model;
use Admin\Service\User;
class ArchiveModel extends Model{
    static public $category_array = ['video'=>'专题视频','quality'=>'精品鉴赏','result'=>'编研成果','online'=>'网上展览','news'=>'创新动态'];
	protected $_auto = array(
        array('addtime', 'time', 1, 'function'),
        array('updatetime','time',3,'function'),
        array('images','serialize',3,'function')
    );
    public function getCateArray(){
        return self::$category_array;
    }
}