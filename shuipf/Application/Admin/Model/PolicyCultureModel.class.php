<?php
//文化政策
namespace Admin\Model;
use Common\Model\Model;
class PolicyCultureModel extends Model {
	protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime', 'm_date', 3, 'callback'),
        array('author_id','getAdminID',1,'callback'),
        array('area_display','area',3,'field'),
        array('area_display','getAddrename',3,'callback'),
        array('auditstatus','-1',3)
    );
    protected $_validate = array(
        array('art_cid','require','请选择相应的子分类!')
    );
    protected $_scope = array(
         // 命名范围normal
         'normal'=>array(
             'where'=>array('isdelete'=>0,'auditstatus'=>35),
         )
     );
    protected function getAdminID(){
        return \Admin\Service\User::getInstance()->id;
    }
    //后置函数
    protected function _after_select(&$resultSet,$options) {
        foreach($resultSet as &$res){
            if(!empty($res['art_cid'])){
                $res['data-cid'] = D('Admin/ArtCategory')->getparent($res['art_cid']);
            }
            $res['author'] = D('User')->where(array('id'=>$res['author_id']))->getField('username');
        }
        // var_dump($resultSet);
    }
    public function getAddrename($area){
      return D("Admin/Area")->getFullAreaName($area);

    }
}
?>