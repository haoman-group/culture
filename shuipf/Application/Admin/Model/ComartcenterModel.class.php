<?php
//文化馆

namespace Admin\Model;

use Common\Model\RelationModel;

class ComartcenterModel extends RelationModel {
   

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
    //字段映射  
    protected $_map = array(
        // 'cac_name' =>'name', 
        // 'cac_addr'  =>'addr', 
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
    //获取后台用户登录的信息
    protected function getAdminID(){
        return \Admin\Service\User::getInstance()->id;
    }
   //关联模型(需要修改)

    protected $_link = array(
        'Cac_Fund'=>array(
            'mapping_type'=>self::HAS_MANY,
            'class_name'=>'CacFund',   //关联模型类名
            'foreign_key' =>'id_cac',
            'parent_key' =>'id_cac',
            'mapping_name'=>'CacFund',
            'condition'=>'is_delete = 0',
        ),
        'Cac_Talent'=>array(
          'mapping_type'=>self::HAS_MANY,
          'class_name'=>'CacTalent',
          'foreign_key'=>'id_cac',
          'parent_key'=>'id_cac',
          'mapping_name'=>'CacTalent',
          'condition'=>'is_delete = 0',

            ),
        'Cac_Act'=>array(
          'mapping_type'=>self::HAS_MANY,
          'class_name'=>'CacAct',
          'foreign_key'=>'id_cac',
          'parent_key'=>'id_cac',
          'mapping_name'=>'CacAct',
           'condition'=>'is_delete = 0',

            ),

        'Cac_Officeact'=>array(
          'mapping_type'=>self::HAS_MANY,
          'class_name'=>'CacOfficeact',
          'foreign_key'=>'id_cac',
          'parent_key'=>'id_cac',
          'mapping_name'=>'CacOfficeact',
           'condition'=>'is_delete = 0',
            ),
         'Cac_Volunteer'=>array(
          'mapping_type'=>self::HAS_MANY,
          'class_name'=>'CacVolunteer',
          'foreign_key'=>'id_cac',
          'parent_key'=>'id_cac',
          'mapping_name'=>'CacVolunteer',
           'condition'=>'is_delete = 0',
            ),
         'Cac_Volact'=>array(
           'mapping_type'=>self::HAS_MANY,
          'class_name'=>'CacVolact',
          'foreign_key'=>'id_cac',
          'parent_key'=>'id_cac',
          'mapping_name'=>'CacVolact',
           'condition'=>'is_delete = 0',
            ),
         'Cac_Trainbase'=>array(
          'mapping_type'=>self::HAS_MANY,
          'class_name'=>'CacTrainbase',
          'foreign_key'=>'id_cac',
          'parent_key'=>'id_cac',
          'mapping_name'=>'CacTrainbase',
           'condition'=>'is_delete = 0',
 
            ),
         'Cac_Trainact'=>array(
          'mapping_type'=>self::HAS_MANY,
          'class_name'=>'CacTrainact',
          'foreign_key'=>'id_cac',
          'parent_key'=>'id_cac',
          'mapping_name'=>'CacTrainact',
           'condition'=>'is_delete = 0',

            ),
         'Cac_Comculter'=>array(
          'mapping_type'=>self::HAS_MANY,
          'class_name'=>'CacComculter',
          'foreign_key'=>'id_cac',
          'parent_key'=>'id_cac',
          'mapping_name'=>'CacComculter',
           'condition'=>'is_delete = 0',
            )
    );
}
?>