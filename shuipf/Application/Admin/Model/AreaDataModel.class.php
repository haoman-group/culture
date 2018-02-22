<?php

// +----------------------------------------------------------------------
// | 基本服务项目公示 模型
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;
class AreaDataModel extends Model {
    //首页可选模块
    static private $modules = [
        'fastlink'      =>'快速导航',
        'activities'    =>'文化活动',
        'location'      =>'活动定位',
        'archive'       =>'艺术档案馆',
        'news'          =>'资讯',
        'product'       =>'产品推荐',
        'shanxiopera'   =>'山西戏曲',
        'cityculture'   =>'市县文化云',
        // 'video'         =>'广播影视',
        'publications'  =>'新闻出版和广播影视'
    ];
    //自动填充
    protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
        array('update_time', 'time', 3, 'function'),
      
        array('area_id','getAdminArea',1,'callback')
       
    );

    public function getModules(){
        return self::$modules;
    }
     protected function getAdminID(){
        return \Admin\Service\User::getInstance()->id;
    }
    
    
  //获取地址area

 
    
}