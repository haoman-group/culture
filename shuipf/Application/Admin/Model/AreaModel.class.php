<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 17/10/2016
 * Time: 10:51
 */

namespace Admin\Model;

use Common\Model\Model;

class AreaModel extends Model{
    const XIANG       = 1;
    const XIAN        = 100;
    const SHI         = 10000;
    const SHENG       = 1000000;
    //本省默认ID
    private static $province_ID = 25000000;
    //地级市行政排序
    private static $city_sort = [
        '太原' ,
        '大同' ,
        '朔州' ,
        '忻州' ,
        '吕梁' ,
        '晋中' ,
        '阳泉' ,
        '长治' ,
        '晋城' ,
        '临汾' ,
        '运城'];
    public function getIDSpan($area_id) {
        $span = $this->where(array('id' => strval($area_id)))->getField('span');
        return array($area_id, $area_id+$span-1);
    }

    public function getIDWhereConditionEx($area_id, $col_name) {
        $interval = $this->getIDSpan($area_id);
        return array($col_name => array('between', $interval));
    }

    public function getIDWhereCondition($area_id, $col_name) {
        $span = $this->where(array('id' => strval($area_id)))->getField('span');
        // return array($col_name => array('between', $interval));
        return array(array('EGT',$area_id),array('LT',$area_id+$span));
    }
    public function getFullAreaID($area_id) {
        if($area_id ==0 || empty($area_id)){
           return false;
        }
        $full_area = $area_id;
        while(True) {
            $pid = $this->where(array('id' => $area_id))->getField('pid');
            if ($pid == "1") {
                break;
            }
            $full_area = $pid.",".$full_area;
            $area_id = $pid;
        }
        return $full_area;
    }
    public function getFullAreaName($area_id) {
        $current_area = $this->where(array('id'=> $area_id))->getField('id, pid, name');
        $full_area = $current_area[$area_id]['name'];
        $area_id = $current_area[$area_id]['pid'];
        while(True) {
            if ($area_id == "1") {
                break;
            }
            $current_area = $this->where(array('id' => $area_id))->getField('id, pid, name');
            $full_area = $current_area[$area_id]['name']."-".$full_area;
            $area_id = $current_area[$area_id]['pid'];
        }
        return $full_area;
    }
    //获取管理员地区等级span
    public function getUserLevel($area_id){
        $span = $this->where(array('id'=>$area_id))->getField('span');
        return $span?(int)$span:false;
    }
    /**
     * 获取本省地级市数据
     *
     * @param boolean $shengshu  是否包含“省属” ，默认不包含
     * @param boolean $sort      是否按照行政顺序排序，默认按照数据库ID排序
     * @return void
     */
    public function getLocalCity($shengshu = false,$sort = false){
        $where['pid'] = self::$province_ID;
        if(!$shengshu){
            $where['id'] = ['NEQ',25120000];
        }
        if($sort){
            $result = [];
            foreach(self::$city_sort as $item){
                $where['name']=$item;
                $result[] = $this->where($where)->order('id desc')->cache(true)->find();
            }
            return $result;
        }else{
            return $this->where($where)->order('id desc')->cache(true)->select();
        }
    }
    //根据城市名称获取区县信息，默认为太原市
    public function getLocalCounty($city_name = '太原'){
        if(empty($city_name)){
            $city_name = '太原';
        }
        $city_id = $this->where(array('name'=>$city_name))->getField('id');
        return $this->where(array('pid'=>$city_id,'status'=>'0'))->order('id desc')->select();
    }
    //根据id获取所在市级城市名称
    public function getCityName($area_id){
        if($area_id ==0 || empty($area_id)){
           return '';
        }
        $city_id = floor($area_id/self::SHI)*self::SHI;
        return $this->where(array('id'=>$city_id,'status'=>'0'))->getField('name');
    }
    //根据id获取所在区县城市名称
    public function getCountyName($area_id){
        if($area_id ==0 || empty($area_id)){
           return '';
        }
        $county_id = floor($area_id/self::XIAN)*self::XIAN;
        return $this->where(array('id'=>$county_id,'status'=>'0'))->getField('name');
    }
    //根据area_id获取下级单位内容
    public function getCountyList($area_id){
        if($area_id ==0 || empty($area_id)){
           return '';
        }
        return $this->where(['pid'=>$area_id])->select();
    }
    //省级ID
    public function getProvinceID(){
        return self::$province_ID;
    }
    /**
     * 获取省级数据信息
     *
     * @return void
     */
    public function getProvince(){
        return $this->where(['id'=>self::$province_ID])->find();
    }
    public function XIANG(){
        return self::XIANG;
    }
    public function XIAN(){
        return self::XIAN;
    }
    public function SHI(){
        return self::SHI;
    }
    public function SHENG(){
        return self::SHENG;
    }
    

}