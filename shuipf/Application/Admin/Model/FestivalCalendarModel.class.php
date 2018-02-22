<?php
// +----------------------------------------------------------------------
// | 艺术节日常安排 控制器
// +----------------------------------------------------------------------
// | 创建时间: 2017-08-01 17:34:52
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\Model;

class FestivalCalendarModel extends Model{

    //静态分类变量
    static public $site_array = [
        '山西大剧院','青年宫演艺中心','星光剧场','太原工人文化宫','山西大剧院小剧场'
    ];
    static public $class_array = [
        'event-important'=>'红色',
        'event-success'=>'绿色',
        'event-warning'=>'黄色',
        'event-info'=>'蓝色',
        'event-inverse'=>'黑色',
        'event-special'=>'紫色',
    ];
    //自动完成
	protected $_auto = array(
        array('addtime', 'time', 1, 'function'),
        array('updatetime','time',3,'function'),
        array('start','strtotime',3,'function'),
        array('end','strtotime',3,'function'),
    );
    //自动验证
    // self::MODEL_INSERT或者1新增数据时候验证
    // self::MODEL_UPDATE或者2编辑数据时候验证
    // self::MODEL_BOTH或者3全部情况下验证（默认）
    protected $_validate = array(

    );
    //获取分类数组
    public function getSiteArray(){
        return self::$site_array;
    }
    //获取分类数组
    public function getClassArray(){
        return self::$class_array;
    }
    //查询预定义
    protected $_scope = array(
         // 命名范围normal
         'normal'=>array(
            //  'where'=>array('isdelete'=>0),
         )
     );

    public function getCalendar(){
        $start_date = $this->distinct(true)->field('start')->order('start')->select();
        $end_date = $this->distinct(true)->field('end')->order('end')->select();
        $calendar = [];
        foreach($start_date as $i=>$t){
            $calendar[$t['start']] = $this->where(['start'=>$t['start']])->select();
        }
        foreach($end_date as $i=>$t){
            $end_data = $this->where(['end'=>$t['end'],'start'=>['neq',$t['end']]])->select();
            // var_dump($end_data);
            $date_key = $t['end'];
            if(array_key_exists($date_key,$calendar)){
                foreach($end_data as $item){
                    array_push($calendar[$date_key],$item);
                }
            }else{
                $calendar[$date_key] = $end_data;
            }
        }
        ksort($calendar,SORT_NUMERIC);
        // var_dump($calendar);
        return $calendar;
    }
}