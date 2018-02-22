<?php


namespace Admin\Model;

use Common\Model\Model;

class  IndustryIssueModel extends  Model{
    protected $tableName = "industry_issue";

    //自动验证
    protected $_validate = array();
    //自动完成
    protected $_auto = array(
        // array('create_time', 'time', 1, 'function'),
        // array('update_time','time',3,'function')
    );


    public  function add_industry(){
        $data = I("post.");
        //var_dump($data);exit;

//        var_dump($data);die;
        if(!$this->create()) return false;
        $data['create_time'] = time();
        if(!$id = $this->add($data)){
            $this->error = "添加失败";
            return false;
        }else{

            return $id;
        }

    }
    //后台审核
    public function audit(){
        $id = I("post.id",0,'intval');
        $status = I("post.val",0,"intval");
//        var_dump($id);die;
        $res = $this->where(array('id'=>$id))->setField('status',$status);
        $this->where(array('id'=>$id))->setField('update_time',time());
//        var_dump(1);die;
        if(!$res){
            return false;
        }else{
            return true;
        }
    }

    // public function add_obj

}