<?php
namespace Admin\Controller;

use Common\Controller\AdminBase;
class FinanceController extends AdminBase{
	protected $model;
	protected $agentmodel;
	public function _initialize(){
		parent::_initialize();
		$this->model = D("Content/FinanceCredit");
		$this->agentmodel = D("Content/IndustryAgent");
	}
	/*
	 *后台信用申请列表页
	 * */
 	public function index(){
 		$type = I("get.type",0,'intval');
 		switch($type){
 			case 0:
 				$where = array();
 				break;
 			case 1:
 				$where = array('audit'=>1);
 				break;
 			case 2:
 				$where = array('audit'=>2);
 				break;
 			case 3:
 				$where = array('audit'=>0);
 				break;
 			default:
 				$where = array();
 		}
 		
		$count = $this->model->where($where)->order('id DESC')->count();
		$page = $this->page($count,20);
		$data = $this->model->where($where)->limit($page->firstRow.','.$page->listRows)->order('id DESC')->select();
        // var_dump($data);
        // var_dump($this->model->_sql());die;
		$this->assign('Page',$page->show());
    	$this->assign("data",$data);
    	$this->display();
 	}
 	//后台信用申请详情
    public function show(){
    	$credit_id = I('get.creditid',0,'intval');
    	$arr = array(
    		'id' => $credit_id,
    	);
    	$data = D("Content/FinanceCredit")->where($arr)->find();
    	$this->assign('data',$data);
    	$this->display();
    }
    //后台信用申请审核
    public function audit(){
    	if(IS_AJAX){
    		$credit=D("Content/FinanceCredit");
    		if(!$credit->audit()){
    			$this->ajaxreturn(array('status'=>0,'message' => $credit->getError()));
    		}else{
    			$this->ajaxreturn(array('status'=>1,'message' => "完成！"));
    		}
    		
    	}
    }
 	/*
 	 *金融代理
 	 * */
 	 //后台展示
    public function agent(){
//  	$data = D("Content/IndustryAgent")->select();
		$type = I("get.type",0,'intval');
 		switch($type){
 			case 0:
 				$where = array('cu_industry_issue.status'=>1);
 				break;
 			case 1:
 				$where = array('cu_industry_issue.status'=>1,'cu_finance_agent.status'=>1);
 				break;
 			case 2:
 				$where = array('cu_industry_issue.status'=>1,'cu_finance_agent.status'=>2);
 				break;
 			case 3:
 				$where = array('cu_industry_issue.status'=>1,'cu_finance_agent.status'=>0);
 				break;
 			default:
 				$where = array('cu_industry_issue.status'=>1);
 		}
		
        // $data = $this->agentmodel->select();
        // var_dump($data);die;
		$count = $this->agentmodel->join('cu_industry_issue ON cu_finance_agent.objid = cu_industry_issue.id')->where($where)->order('cu_industry_issue.id DESC')->count();
		$page = $this->page($count,20);
		
		$data = $this->agentmodel->join('cu_industry_issue ON cu_finance_agent.objid = cu_industry_issue.id')->limit($page->firstRow.','.$page->listRows)->where($where)->getField('cu_industry_issue.id,objid,money,imethod,pname,cu_finance_agent.status,term,cu_finance_agent.inputtime,type');
 // $sql = $this->agentmodel->getLastSql();
 // var_dump($data);
// var_dump($sql);die;
		$this->assign('Page',$page->show());
    	$this->assign("data",$data);
    	$this->display();
    }
    
    //
    public function agent_show(){

    	//查数据
    	$id = I("get.id",0,'intval');
//  	var_dump($id);
//      
    	$data = $this->agentmodel->join('cu_industry_issue ON cu_finance_agent.objid = cu_industry_issue.id')->where(array('objid'=>$id))->find();
        $data['agent_status'] = $this->agentmodel->where(array('objid'=>$id))->getField('status');
        $data['categoryname'] = M('industry_category')->where(array('id'=>$data['pcategory']))->getField('categoryname');
        // var_dump( $data['categoryname']);
        $data['stagename'] = M('industry_stage')->where(array('sid'=>$data['pstage']))->getField('stagename');
 	// var_dump($data);
    	$this->assign('data',$data);
    	$this->display();
    }
    //后台金融代理审核
    public function agent_audit(){
    	if(IS_AJAX){
    		
    		if(!$this->agentmodel->audit()){
    			$this->ajaxreturn(array('status'=>0,'message' => $agent->getError()));
    		}else{
    			$this->ajaxreturn(array('status'=>1,'message' => "完成！"));
    		}
    		
    	}
    }

    //金融代理删除
    public function agent_delete(){
        $objid = I('get.id',0,'intval');
        $res = $this->agentmodel->where(array('objid'=>$objid))->delete();
        if($res){
            $this->success('删除成功！',U('Admin/Finance/agent'));
        }else{
            $this->error('操作失败！');
        }
    }
    
}