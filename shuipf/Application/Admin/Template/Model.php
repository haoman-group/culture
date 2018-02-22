<?php
// +----------------------------------------------------------------------
// | {{tableName}} 控制器
// +----------------------------------------------------------------------
// | 创建时间: {{datetime}}
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\Model;

class {{controllerName}}Model extends Model{

    //静态分类变量
    static public $category_array = [];

    //自动完成
	protected $_auto = array(
        array('addtime', 'time', 1, 'function'),
        array('updatetime','time',3,'function')
    );
    //自动验证
    // self::MODEL_INSERT或者1新增数据时候验证
    // self::MODEL_UPDATE或者2编辑数据时候验证
    // self::MODEL_BOTH或者3全部情况下验证（默认）
    protected $_validate = array(

    );
    //获取分类数组
    public function getCateArray(){
        return self::$category_array;
    }
    //查询预定义
    protected $_scope = array(
        // 命名范围normal
        'normal'=>array(
            'where'=>array('isdelete'=>0),
        )
    );

    protected function _getCover($value){
        return $value[0]?$value[0]:'';    
    }
}