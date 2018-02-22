<?php
// +----------------------------------------------------------------------
// | 群众文艺 控制器
// +----------------------------------------------------------------------
// | 创建时间: 2017-07-28 11:37:01
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\Model;

class MassartModel extends Model{

    //静态分类变量
    static public $category_array = [];

    //自动完成
	 protected $_auto = array(
        array('addtime', 'time', 1, 'function'),
        array('updatetime', 'time', 3, 'function'),
        array('cover','images',3,'field'),
        array('cover','_getCover',3,'callback'),
        array('images','serialize',3,'function')

    );
    //查询预定义
    protected $_scope = array(
         // 命名范围normal
         'normal'=>array(
             'where'=>array('isdelete'=>0),
         )
     );
     private static $category_type = array(
            'star'=>"群星奖",
            'worker'=>"农民工歌手大赛",
            'dance'=>'广场舞大赛',
            'photography'=>'网络摄影大赛',
            'custom'=>'民俗',
            'culture'=>'文化惠民'
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
     protected function _getCover($value){
        return $value[0]?$value[0]:'';
        
    }
    public function getCategory(){
        return self::$category_type;
    }
    //根据类型名字获取内容
    public function getDataByCate($category_name,$limit=10){
        if(empty($category_name) || !array_key_exists($category_name,self::$category_type)){return false;}
        return  $this->where(['category'=>$category_name,'isdelete'=>0])->limit($limit)->order('id desc')->select();
    }
    //获取
    public function getSessionByCate($category_name){
        if(empty($category_name) || !array_key_exists($category_name,self::$category_type)){return false;}
        $result = $this->field('session')->where(['category'=>$category_name,'isdelete'=>0])->group('session')->order('session')->select();
        if(!empty($result)){
            $tmp = [];
            foreach($result as $index=>$item){
                $tmp[] = $item['session'];
            }
            return $tmp;
        }else{
            return null;
        }
    }
    //根据第几届，获取群星奖内容列表
    public function getStarList($limit = 10){
        $session_list = $this->field('session')->scope('normal')->where(['category'=>'star'])->group('session')->select();
        $result = [];
        foreach($session_list as $index=>$item){
            $session = $item['session'];
            $result[$session] = $this->scope('normal')->where(['category'=>'star','session'=>$session])->limit($limit)->select();
        }
        return $result;
    }
    //
    public function getOtherPosition($category_name,$limit = 10){
        if(empty($category_name) || !array_key_exists($category_name,self::$category_type)){return false;}
        return  $this->where(['category'=>array("neq",$category_name),'isdelete'=>0])->limit($limit)->order('id desc')->select();
    }
}