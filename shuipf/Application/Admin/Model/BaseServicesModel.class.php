<?php

// +----------------------------------------------------------------------
// | 基本服务项目公示 模型
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Admin\Model;

// use Common\Model\Model;
use Common\Model\RelationModel;//关联模型父类
class BaseServicesModel extends RelationModel {
    //自动填充
    protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback'),
        array('city', 'area', 3, 'field'),
        array('city', '_getCity', 3, 'callback'),
        array('county', 'area', 3, 'field'),
        array('county', '_getCounty', 3, 'callback'),
    );
    //自动验证
    protected $_validate = array(
        array('project_title', 'require', '项目标题不能为空!')
    );
    //关联模型(外键)
    protected $_link = array(
        'Content'=>array(
            'mapping_type'=>self::HAS_MANY,
            'class_name'=>'BaseContent',   
            'foreign_key' =>'id_project',
            'parent_key' =>'id',
            'mapping_name'=>'Content',
            'condition'=>'isdelete = 0',
        )
    );
    //查询范围
    protected $_scope = array(
        'normal'=>array('where'=>array('isdelete'=>0,'status'=>0))
    );
    //根据地区编码 返回所在城市的汉字
    protected function _getCity($area){
        return D('Admin/Area')->getCityName($area);
    }
    //根据地区编码 返回所在区县的汉字
    protected function _getCounty($area){
        return D('Admin/Area')->getCountyName($area);
    }
}