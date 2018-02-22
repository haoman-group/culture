<?php
/**
 * Created by PhpStorm.
 * User: wangc
 * Date: 2016/12/14
 * Time: 17:28
 */
namespace Content\Model;

use Common\Model\RelationModel;

class FinanceCreditModel extends RelationModel{
    //表名
    protected $tableName = "finance_credit";
    //自动验证
    protected  $_validate = array(
        array('company_name','require','请输入公司名称',1,3),
        array('representative_name','require','请输入法人代表',1,3),
        array('tel','require','请输入公司电话',1,3),
        array('licence','require','请上传营业执照',1,3),
        array('tax','require','请上传税务登记证',1,3),
    );

    //添加信用申请
    public function add_credit_apply(){
        $data = I("post.");
        $level_arr = array(
        	'2'=>"二星",
        	'3'=>'三星',
        	'4'=>'四星',
        	'5'=>'五星'
        );
        if( !$this -> create() ) return false;
        $data['level'] = $this ->level($data);
        $data['inputtime'] = time();
        if(!$id = $this->add($data)){
            $this->error = "添加失败，请重试！";
            return false;
        }else{
//         return $res = $this->level($data);
			// return $level_arr[$data['level']];
            return $id;
        }
    }

    //编辑
    public function edit_credit_apply(){
        $data = I("post.");
        $level_arr = array(
            '2'=>"二星",
            '3'=>'三星',
            '4'=>'四星',
            '5'=>'五星'
        );
        if( !$this -> create() ) return false;
        $data['level'] = $this ->level($data);
        $data['updatatime'] = time();
        if(!$id = $this->where(array("id"=>$data['id']))->save($data)){
            $this->error = "编辑失败，请重试！";
            return false;
        }else{
//         return $res = $this->level($data);
            return true;
        }
    }
    //评等级
    public function level($data){
            if(!($data['workers_num'] && $data['is_assurance'] && $data['prev_assurance_num'] && $data['prev_electric_fee'])){
               //二星
                return 2;
            }else if(!($data['prev_output_value'] && $data['prev_sales'] && $data['prev_tax'] && $data['prev_assets'])){
                //三星
                return 3;
            }else if(!($data['prev_mortgage'] && $data['prev_mortgage'])){
            	//四星
            	return 4;
            }else{
            	//五星
            	return 5;
            }
    }
    //后台审核
    public function audit(){
    	$id = I("post.id",0,'intval');
    	$status = I("post.val",0,"intval");
    	$res = $this->where(array('id'=>$id))->setField('audit',$status);
    	if(!$res){
    		return false;
    	}else{
    		return true;
    	}
    }
}