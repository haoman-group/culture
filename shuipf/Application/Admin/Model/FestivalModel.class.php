<?php

// +----------------------------------------------------------------------
// | 基本服务项目公示-内容模型
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;
class FestivalModel extends Model {
    private static $category_type = array(
            '1'=>'媒体报道',
            '2'=>[//展览类活动
                '201'=>'时代华章——首届山西艺术节美术作品展',
                '202'=>'翰逸神飞——山西画院藏画精品展',
                '203'=>'塑说三晋——首届山西艺术节雕塑作品展',
                '204'=>'翰墨三晋--书法篆刻作品展',
                '205'=>'人说山西好风光——百位书法名家书法作品邀请展',
                '206'=>'壮美山西——首届山西艺术节网络摄影展',
                '207'=>'粉墨传神——首届山西艺术节舞台艺术摄影作品展',
                // '208'=>'中华灶君文化特展',
                '209'=>'古韵拾遗——首届山西艺术节非物质文化遗产展',
                '210'=>'梦从这里出发——山西省高校学生优秀美术作品展',
                // '211'=>'长风艺术展',
                '212'=>'千年丹青——山西古代壁画掇英展',
                '213'=>'艺术山西——艺术作品展',
                '214'=>'风情山西——首届山西艺术节民俗民居美术摄影展'
            ],
            '3'=>'主题性活动',//表演类活动
            '11'=>"优秀剧目汇演",
            '12'=>"音乐舞蹈曲艺杂技展演",
            '14'=>"韵味山西'梅花奖'",
            '13'=>"喝彩山西——音诗舞专题文艺晚会",
            '15'=>"文艺精品惠民演出",
            '21'=>"各市文化艺术周",//主题性活动
            '22'=>"校园文化周",
            '23'=>"第十八届‘群星奖’选拔赛",
            '24'=>"唱响山西——农民工歌手展演",
            '25'=>"舞动三晋——广场舞展演",
            '26'=>"鼓舞山西——锣鼓艺术展演",
            '27'=>"文化艺术高峰论坛",
            '28'=>'山西省历届“群星奖”获奖作品展演',
            '301'=>'通知公告',
            '401'=>'直播'
            // '16'=>"优秀舞台剧交流演出",
        );
    //自动填充
    protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback'),
        array('image','images',3,'field'),
        array('image','_getCover',3,'callback'),
        array('images','serialize',3,'function'),
        array('start_date','strtotime',3,'function'),
        array('end_date','strtotime',3,'function')
    );
    protected function _getCover($value){
        return $value[0]?$value[0]:'';
        
    }
    public function getCategory(){
        return self::$category_type;
    }
    //获取数据
    public function getData($categorytype ='' ,$limit = 10){
        $where['isdelete'] = 0;
        if(!empty($categorytype)){
            $where['categorytype'] = $categorytype;
        }
        return $this->where($where)->limit($limit)->order('updatetime desc')->select();
    }
    //后置操作
    protected function _after_select(&$resultSet,$options) {
        foreach($resultSet as &$res){
            $res['categoryname'] = self::$category_type[$res['categorytype']];
        }
    }
    //点击量自增
    public function hits($id = null){
        if(!$id)return false;
        return $this->where(['id'=>$id])->setInc('hits',1);
    }

    public function getExhibition($num){
         $where['isdelete'] = 0;
         $where['categorytype']=array(in,array(201,202,203,204,205,206,207,208,209,210,212,213,214));
         $where['title']=array('neq','');
         $data=D('Admin/Festival')->where($where)->order('id desc')->limit($num)->select();
         //echo D('Admin/Festival')->getLastsql();
         return $data;
    }
    //获取分类名称
    public function getCategoryNameByKey($key){
        $name = '';
        foreach(self::$category_type as $k=>$item){
            if($k == $key){
                $name = $item;
            }elseif(is_array($item)){
                foreach($item as $k2=>$item2){
                    if($k2 == $key){
                        $name = $item2;
                    }
                }
            }
        }
        return $name;
    }
    public function getLiveData($limit=3){
        return $this->where(['categorytype'=>401,'isdelete'=>0,'position'=>'yes'])->limit($limit)->order('updatetime desc')->select();
    }
}