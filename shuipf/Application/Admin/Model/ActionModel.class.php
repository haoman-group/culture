<?php
/**
 * Author : libing
 * 代办事项的虚拟模型
 */

namespace Admin\Model;

use Common\Model\Model;
use Admin\Service\User;
class ActionModel extends Model{
    //虚拟模型类变量
    Protected $autoCheckFields = false;
    //文化艺术模型
    protected $artModel = null;
    //文化产业模型
	protected $indModel = null;
    //非遗模型
	protected $immModel = null;
    //文化政策模型
	protected $polModel = null;
    //公共文化-图书馆模型
	protected $pubLibModel = null;
    //公共文化-文化馆模型
    protected $pubCacModel = null;
    //查找范围
    protected $range = null;
    //查找条件
    protected $where = array();
    
    protected function _initialize(){
        parent::_initialize();
        $this->range = 1;
        $this->artModel = D('Admin/ReCulture');
		$this->indModel = D('Admin/Industry');
		$this->immModel = D('Admin/Immaterial');
		$this->polModel = D("Admin/PolicyCulture");
		$this->pubLibModel = D("Admin/Library");
        $this->pubCacModel = D("Admin/Comartcenter");
        $this->_getWhere();
    }
    private function _getWhere(){
        $this->where['a.isdelete'] = '0';
       
    }
    public function getAuditData($where_custom = array()){
        $where = array_merge($this->where,$where_custom);
        // var_dump($where);
        $data = array();
        $data['ReCulture'] = $this->artModel->alias('a')->field("a.*,cu_user.username as author,cu_art_category.name as name")->where($where)->join("cu_user on cu_user.id = a.author_id",'left')->join("cu_art_category on cu_art_category.cid = a.art_cid",'left')->select();
        // echo $this->artModel->getLastSql();
        $data['Industry'] = $this->indModel->alias('a')->field("a.*,cu_user.username as author,cu_art_category.name as name")->where($where)->join("cu_user on cu_user.id = a.author_id",'left')->join("cu_art_category on cu_art_category.cid = a.art_cid",'left')->select();
        // echo $this->indModel->getLastSql();
        $data['Immaterial'] = $this->immModel->alias('a')->field("a.*,cu_user.username as author,cu_art_category.name as name")->where($where)->join("cu_user on cu_user.id = a.author_id",'left')->join("cu_art_category on cu_art_category.cid = a.art_cid",'left')->select();
        $data['Policy'] = $this->polModel->alias('a')->field("a.*,cu_user.username as author,cu_art_category.name as name")->where($where)->join("cu_user on cu_user.id = a.author_id",'left')->join("cu_art_category on cu_art_category.cid = a.art_cid",'left')->select();
        $data['Library'] = $this->pubLibModel->alias('a')->field("a.*,cu_user.username as author")->where($where)->join("cu_user on cu_user.id = a.author_id",'left')->select();
        // echo $this->pubLibModel->getLastSql();
        $data['Comartcenter'] = $this->pubCacModel->alias('a')->field("a.*,cu_user.username as author")->where($where)->join("cu_user on cu_user.id = a.author_id",'left')->select();
        return $data;
     }
     public function getAuditDataCount($where_custom = array()){
        $data = $this->getAuditData($where_custom);
        return count($data['ReCulture'])+ count($data['Industry']) +count($data['Immaterial'])+count($data['Policy'])+count($data['Library'])+count($data['Comartcenter']);
     }


}