<?php
// +----------------------------------------------------------------------
// | 电子期刊 控制器
// +----------------------------------------------------------------------
// | 创建时间: 2017-07-20 09:27:11
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\Model;

class EjournalsModel extends Model{

    //静态分类变量
    static public $category_array = [];
    //类型
    static public $type_array = ['image'=>'图片数据','text'=>'文本数据'];
    //状态
    static public $status_array = ['on'=>'展示中','off'=>'已下架'];
    //自动完成
	protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
        array('update_time','time',3,'function'),
        array('content','serialize',3,'function'),
        array('pagecount','_getMax',3,'callback')
    );
    //自动验证
    // self::MODEL_INSERT或者1新增数据时候验证
    // self::MODEL_UPDATE或者2编辑数据时候验证
    // self::MODEL_BOTH或者3全部情况下验证（默认）
    protected $_validate = array(

    );
    protected function _getMax($value){
        return (int)$value > 10 ?10:$value;
    }
    // 后置操作
    protected function _after_select(&$resultSet,$options) {
        foreach($resultSet as &$res){
            $res['content'] = unserialize($res['content']);
        }
    }
    //获取分类数组
    public function getCateArray(){
        return self::$category_array;
    }
    //获取分类数组
    public function getTypeArray(){
        return self::$type_array;
    }
    //
    public function getStatusArray(){
        return self::$status_array;
    }
}