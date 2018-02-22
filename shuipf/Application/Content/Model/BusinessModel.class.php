<?php
	namespace Content\Model;
	use Common\Model\RelationModel;
	class BusinessModel extends RelationModel{
		 //表名
    	protected $tableName = "business_alliance";
//		自动验证
   		protected  $_validate = array(
	        array('telephone','contactnum','请填写正确的联系方式',1,'callback'),
	    );
//		自动完成
		protected function contactnum(){
	        $preg = '/^((0\d{2,3}-\d{7,8})|(1[3584]\d{9}))$/';
	        if(!preg_match($preg,$_POST['telephone'])){
	            return false;
	        }else{
	            return true;
	        }
    	}	
		public function join(){
			$data = I("post.");
			if(!$this->create()) return false;
			if(!$id=$this->add()){
				$this->error = "添加失败，请重试！";
				return false;
			}else{
				$this->add();
				return true;
			}
		}	
		
	}
