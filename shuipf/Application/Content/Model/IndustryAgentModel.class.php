<?php
namespace Content\Model;
use Common\Model\RelationModel;

class IndustryAgentModel extends RelationModel{
	protected $tableName = "finance_agent";
	
	
	
	protected $_validate =array();
	
	protected $_auto =array(
		array('inputtime','time',1,'function')
	);
	
//	//关联模型
//	protected $_link = array(
//		'IndustryIssue'=>array(
//			'mapping_type'=> self::BELONGS_TO,
//			'mapping_name'=>'IndustryIssue',
//			'class_name'=>'IndustryIssue',
//			'foreign_key'=>'IndustryIssue_id',
//		),
//	);
	
	public function add_agent(){

		$data = I("post.");
		
		if( !$this -> create() ) return false;
		if(!$res =$this->add()){
			$this->error = "添加失败";
			return false;
		}else{
			return $data['objid'];
		}
		
	}
	
	
	//后台审核
    public function audit(){
    	$id = I("post.id",0,'intval');
    	$status = I("post.val",0,"intval");
    	$res = $this->where(array('objid'=>$id))->setField('status',$status);
    	if(!$res){
    		return false;
    	}else{
    		return true;
    		
    	}
    }
}
?>