<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 后台用户权限模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\RelationModel;

class LibraryModel extends RelationModel {
    protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback'),
        array('author_id','getAdminID',1,'callback'),
        array('area_display','area',3,'field'),
        array('area_display','getAddrename',3,'callback'),
        array('auditstatus','-1',3)
    );
    protected $_validate = array(
        
    );
    //预定义查询范围
    protected $_scope = array(
        'have_point'=>array(//记得添加审核数据条件
            'where'=>array('point_lng'=>array('NEQ','0'),'point_lat'=>array('NEQ','0'),'isdelete'=>'0')
        )
    );
    //获取当前地址全称
    protected function getAddrename($area){
      return D("Admin/Area")->getFullAreaName($area);
    }
    //获取当前
    protected function getAdminID(){
        return \Admin\Service\User::getInstance()->id;
    }
    //关联模型
    protected $_link = array(
        'Lib_Fund'=>array(
            'mapping_type'=>self::HAS_MANY,
            'class_name'=>'LibFund',   
            'foreign_key' =>'library_id_lib',
            'parent_key' =>'id_lib',
            'mapping_name'=>'Lib_Fund',
            'condition'=>'isdelete = 0',
        ),
        'Lib_Talent'=>array(
            'mapping_type'=>self::HAS_MANY,
            'class_name'=>'LibTalent',   
            'foreign_key' =>'library_id_lib',
            'parent_key' =>'id_lib',
            'mapping_name'=>'Lib_Talent',
            'condition'=>'isdelete = 0',
        ),
        'Lib_Server'=>array(
            'mapping_type'=>self::HAS_MANY,
            'class_name'=>'LibServer',   
            'foreign_key' =>'library_id_lib',
            'parent_key' =>'id_lib',
            'mapping_name'=>'Lib_Server',
            'condition'=>'isdelete = 0',
        ),
        'Lib_Volunteer'=>array(
            'mapping_type'=>self::HAS_MANY,
            'class_name'=>'LibVolunteer',   
            'foreign_key' =>'library_id_lib',
            'parent_key' =>'id_lib',
            'mapping_name'=>'Lib_Volunteer',
            'condition'=>'isdelete = 0',
        ),
        'Lib_VolunteerAct'=>array(
            'mapping_type'=>self::HAS_MANY,
            'class_name'=>'LibVolAct',   
            'foreign_key' =>'library_id_lib',
            'parent_key' =>'id_lib',
            'mapping_name'=>'Lib_VolunteerAct',
            'condition'=>'isdelete = 0',
        ),
        'Lib_EducationAct'=>array(
            'mapping_type'=>self::HAS_MANY,
            'class_name'=>'LibEduAct',   
            'foreign_key' =>'library_id_lib',
            'parent_key' =>'id_lib',
            'mapping_name'=>'Lib_EducationAct',
            'condition'=>'isdelete = 0',
        ),
        'Lib_Commend'=>array(
            'mapping_type'=>self::HAS_MANY,
            'class_name'=>'LibCommend',   
            'foreign_key' =>'library_id_lib',
            'parent_key' =>'id_lib',
            'mapping_name'=>'Lib_Commend',
            'condition'=>'isdelete = 0',
        )
    );
}
