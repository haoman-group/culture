<?php

// +----------------------------------------------------------------------
// | product_category表映射类
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;

class ArtCategoryModel extends Model
{
    //定义根类目
    const TYPE_ALL = 0;
    const TYPE_ART = 1;   //文化艺术
    const TYPE_COMMON = 2;   //公共文化
    const TYPE_IMMATERIAL = 3; //非物质文化遗产
    const TYPE_INDUSTRY = 4;   //文化产业
    const TYPE_POLICY = 5; 
    const POLICY = 266;   //政策法规
    // const TYPE_ACCESSORY=21;  //辅材
    // const TYPE_YANSHOU=23;  //验收
    //根类目数组
    // public $parent = array(
    //     self::TYPE_DESIGN=>'101,102,124886054',
    //     self::TYPE_WORKER=>'103,104,105,106,107,108,112,113,124886054',
    //     self::TYPE_MATERIAL=>'27,50020332,50020485,124050001,50008163,50008164,50022703,124886054',
    //     self::TYPE_FURNITURE=>'50008164,50008163,122852001,50020808,124050001,124886054',
    //     self::TYPE_APPLIANCE=>'27,50022703,50011972,50012100,50012082,21,124242008,1101,1512,14,124886051,124886054',
    //     self::TYPE_ACCESSORY=>'124886017,124886054',
    //     self::TYPE_YANSHOU=>'114',
    //   );
    protected $_scope = array(
         // 命名范围normal
         'normal'=>array(
             'where'=>array('isdelete'=>0),
         )
     );
    //寻找父类cid
    public function childlist($pid = 0)
    {
        return $this->where(array('parent_cid' => $pid, 'isdelete' => '0'))->order('cid')->select();
    }

    public function hasChild($id = 0)
    {
        $result = $this->where(array('parent_cid' => $id,'isdelete'=>'0'))->select();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkcate($cateid, $cate_type)
    {
        $cateidArray = explode(",", $this->parent[$cate_type]);
        return in_array($cateid, $cateidArray);
    }

    public function getPpid($pid)
    {
        $Parent = $this->where(array('cid' => $pid))->select();
        if (empty($Parent)) {
            return false;
        } else {
            $grandParent = $this->where(array('parent_cid' => $current['parent_cid']))->select();
            if (empty($grandParent)) {
                return false;
            } else {
                return $grandParent['id'];
            }
        }
    }

    //获取add的cid
    public function getCID()
    {
        return $this->max('cid') + 1;
    }

    //获取根类目
    public function getRootCate($cid)
    {
        $parent = $this->where(array('cid' => $cid))->select();
        //var_dump($parent);
        if (empty($parent)) {
            return false;
        } else if ($parent[0]['parent_cid'] == 0) {
            return $parent[0]['cid'];
        } else {
            return $this->getRootCate($parent[0]['parent_cid']);
        }
    }

    /**
     * @name 根据店铺类别 ，获取产品宝贝分类列表
     * */
    public function getCateType($catpid)
    {
        $cate = $this->where(array('cid' => array('in', $this->parent[$catpid])))->select();
        $category = array();
        foreach ($cate as $k => $v) {
            $category[$v['cid']] = $v['name'];
        }
        return $category;
    }

    /**
     * @name 根据产品分类 ，获取产品类目
     * */
    public function getCate($type)
    {
        return $this->parent[$type];
    }

    /**
     * @name 获取宝贝的大分类对应的名称
     */
    // public function getType() {
    //     return array(self::TYPE_DESIGN=>"设计",
    //         self::TYPE_WORKER=>"工人",
    //         self::TYPE_FURNITURE => "家具",
    //         self::TYPE_APPLIANCE => "家电",
    //         self::TYPE_MATERIAL => "主材");
    // }


    public function getCategory($cid)
    {
        $where['status'] = 0;
        $where['isdelete'] = 0;
        $where['parent_cid'] = $cid;
        $Artdata = M('ArtCategory')->where($where)->select();
        //echo M('ArtCategory')->getLastsql();exit;
        return $Artdata;
    }

    public function getCurrentCategory($cid)
    {
        $where['status'] = 0;
        $where['isdelete'] = 0;
        $where['cid'] = $cid;
        $Artdata = M('ArtCategory')->where($where)->find();
        return $Artdata;
    }

    //判断调用form的方法
    public function getparent($cid)
    {
        $info = $this->where(array('cid' => $cid))->find();

        if (empty($info)) {
            return false;
        } elseif ($info['relation'] == 1) {
            return $info['cid'];
        } else {
            return $this->getparent($info['parent_cid']);
        }

    }

    protected function getChildCidList($cid)
    {
        $results = $this->field('cid')->where(array('parent_cid' => $cid))->where(array("isdelete" => 0))->select();
        if (!empty($results)) {
            $tmp = array();
            foreach ($results as $r) {
                $tmp[] = $r['cid'];
            }
            return $tmp;
        }
        return array();
    }

    public function getRecursiveChildCidList($cid)
    {
        $results = array();
        $tmp = $this->getChildCidList($cid);
        $results = array_merge($results, $tmp);
        while (!empty($tmp)) {
            $childOfTmp = array();
            foreach ($tmp as $c) {
                $childOfTmp = array_merge($childOfTmp, $this->getChildCidList($c));
            }
            $tmp = $childOfTmp;
            if (!empty($tmp)) {
                $results = array_merge($results, $childOfTmp);
            }
        }
        return $results;
    }

    //获取菜单目录
    public function getMenu($cid = 0, $is_parent = '1')
    {
        $where = array();
        $where['isdelete'] = '0';
        $where['parent_cid'] = $cid;
        if ($is_parent != 'ALL') {
            $where['is_parent'] = $is_parent;
        }
        $root = $this->where($where)->select();
        foreach ($root as $key => $item) {
            if ($item['isdelete'] == '1' || $item['is_parent'] == '0') {
                continue;
            } else {
                $root[$key]['child'] = $this->where(array('parent_cid' => $item['cid'],'isdelete'=>'0'))->select();
            }
        }
        return $root;
    }
        //查询范围
    public function getCidRange($cid,$range = []){
        $cate = $this->where(['cid'=>$cid])->find();
        $range[] = $cate['cid'];
        if($cate['is_parent'] == '1' || $cate['is_leaf'] == '0'){
            $child = $this->where(['parent_cid'=>$cid])->select();
            foreach($child as $item){
                $range[] = $item['cid'];
                if($item['is_parent'] == '1' || $item['is_leaf'] == '0'){
                    $tmp = $this->getCidRange($item['cid'],$range);
                    $range  = array_merge($range,$tmp);
                }
            }
        }
        return array_unique($range);
    }
}