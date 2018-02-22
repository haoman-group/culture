<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 后台用户权限模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;

class ImmaterialModel extends Model {
    protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback'),
        array('author_id','getAdminID',1,'callback'),
        array('area_display','area',3,'field'),
        array('area_display','getAddrename',3,'callback'),
        array('image','serialize',3,'function'),
        array('attachment','serialize',3,'function'),
        array('auditstatus','-1',3)
    );
    protected $_validate = array(
        array('art_cid','require','请选择相应的子分类!'),
        array('re_projectname','require','请填写项目标题!'),
        array('content','require','请填写内容!')
    );
    protected $_scope = array(
         // 命名范围normal
         'normal'=>array(
             'where'=>array('auditstatus'=>35),
         )
     );
     protected function getAdminID(){
        return \Admin\Service\User::getInstance()->id;
    }

    protected function _after_select(&$resultSet,$options) {
        foreach($resultSet as &$res){
            if(!empty($res['art_cid'])){
                $res['data-cid'] = D('Admin/ArtCategory')->getparent($res['art_cid']);
                $res['author'] = D('User')->where(array('id'=>$res['author_id']))->getField('username');
            }
        }
    }

    public function getAddrename($area){
      return D("Admin/Area")->getFullAreaName($area);

    }
    public function getCategoryStatistics($cid){
		if(!$cid){return false;}
		//查询cid范围
		$cid_range = D('Admin/ArtCategory')->getCidRange($cid);
		//返回记录
        $where['art_cid'] = ['in',$cid_range];
        $where['isdelete'] = 0;
        $where['auditstatus'] =35;
		$count = $this->where($where)->count();
        return $count;
	}
}
?>