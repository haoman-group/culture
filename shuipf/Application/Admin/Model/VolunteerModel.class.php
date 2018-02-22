<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 后台用户模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;

class VolunteerModel extends Model {
    //政治面貌
    static private $political_status_array = ['1'=>'中共党员','2'=>'中共预备党员','3'=>'民主党派','4'=>'共青团员','5'=>'无党派人士','6'=>'群众'];
    //身份证件类型
    static private $idcard_type_array = ['1'=>'居民身份证','2'=>'士兵证','3'=>'军官证','4'=>'警官证','5'=>'护照','6'=>'其他'];
    //学历
    static private $education_array = ['1'=>'本科在读','2'=>'大学本科','3'=>'硕士研究生','4'=>'博士研究生','5'=>'其他'];
    //工作单位类型
    static private $unit_type_array = ['1'=>'政府机关、事业单位','2'=>'企业','3'=>'个体','4'=>'自由职业'];
    //所属组织
    static private $organization_array = [
        '山西省'=>['山西省文化馆','山西省图书馆','山西书法院'],
        '太原'=>['太原市图书馆','太原市文化馆','阳曲县图书馆','阳曲县文化馆'],
        '大同'=>['大同市图书馆','大同市城区图书馆','左云县图书馆'],
        '晋中'=>[''],
        '长治'=>[''],
        '运城'=>[''],
        '忻州'=>[''],
        '吕梁'=>[''],
        '临汾'=>[''],
        '晋城'=>[''],
        '阳泉'=>[''],
        '朔州'=>[''],
        ];
    //兴趣爱好
    static private $hobby_array = ['1'=>'文艺演出','2'=>'读书沙龙','3'=>'心理咨询','4'=>'法律援助','5'=>'策划宣传','6'=>'爱心公益','7'=>'引导接待','8'=>'翻译','9'=>'摄影摄像','10'=>'视频拍摄','11'=>'应急救护','12'=>'其他'];
    //服务时间
    static private $server_time_array = ['1'=>'周一至周五','2'=>'周六','3'=>'周日'];

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('name', 'require', '姓名不能为空！'),
        array('nationality', 'require', '国籍不能为空！'),
        array('nation', 'require', '民族不能为空！'),
        array('birthday', 'require', '出生年月不能为空！'),
        array('idcard_no', 'require', '证件号码不能为空！'),
        array('if_commitment','require','承诺书必须勾选')
    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
        array('update_time', 'time', 3, 'function'),
        array('hobby','serialize',3,'function'),
        array('status',1,3)
    );
    // 后置操作
    protected function _after_select(&$resultSet,$options) {
        foreach($resultSet as &$res){
        }
    }
    //查询范围
    protected $_scope = array(
        'normal'=>array()
    );
    public function getPoliticalStatusArray(){
        return self::$political_status_array;
    }
    public function getIdcardTypeArray(){
        return self::$idcard_type_array;
    }
    public function getEducationArray(){
        return self::$education_array;
    }
    public function getUnitTypeArray(){
        return self::$unit_type_array;
    }
    public function getOrganizationArray(){
        return self::$organization_array;
    }
    public function getHobbyArray(){
        return self::$hobby_array;
    }
    public function getServerTimeArray(){
        return self::$server_time_array;
    }
    public function getAllArray(){
        return ['political_status_array'=>self::$political_status_array,
                'idcard_type_array'=>self::$idcard_type_array,
                'education_array'=>self::$education_array,
                'unit_type_array'=>self::$unit_type_array,
                'organization_array'=>self::$organization_array,
                'hobby_array'=>self::$hobby_array,
                'server_time_array'=>self::$server_time_array,
        ];
    }
}
