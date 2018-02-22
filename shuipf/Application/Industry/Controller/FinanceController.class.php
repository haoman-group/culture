<?php
namespace Industry\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
use Content\Model\ContentModel;
use Content\Model\IndustryAgentModel;
class FinanceController extends IndustryBaseController {


   protected $model;
	protected $agentmodel;
	public function _initialize(){
		parent::_initialize();
		$this->model = D("Content/FinanceCredit");
		$this->agentmodel = D("Content/IndustryAgent");
        $this->categorymodel = M('industry_category');
        $this->agentmodel = M('finance_agent');
	}

	public function index(){

        $getmethod = I('get.method');
        $getmoney = I('get.money');
        $gettype = I('get.type');
		$method = ($getmethod!='不限')?$getmethod:'';
        $money = ($getmoney!='不限')?$getmoney:'';
        $type = ($gettype!='不限')?$gettype:'';
        $where = array();
        // $where['status'] = 1;
        if ($method) {
            # code...
            $where['method'] = $method;
        }
        $cid = $alltype = $this->categorymodel->where(array('categoryname'=>$type))->getField('id');
        if(isset($cid)){
            $where['zj_industry_issue.pcategory'] = $cid;
        }
        switch ($money) {
            case '10万以下':
                $where['money'] = array('LT',10);
                break;
            case '10万-50万':
                $where['money'] = array('between','10,50');
                # code..
                break;
            case '50万-100万':
                # code...
                $where['money'] = array('between','50,100');
                break;
            case '100万-1000万':
                # code...
                $where['money'] = array('between','100,1000');
                break;
            case '1000万以上':
                # code...
                $where['money'] = array('GT',1000);
                break;
            default:
                # code...
                break;
        }
		// var_dump($where);
		//查数据
		// $data = D("Content/IndustryAgent")->join('zj_industry_issue ON zj_finance_agent.objid = zj_industry_issue.id')->where(array('status'=>1))->select();
        $data = $this->agentmodel->join('cu_industry_issue ON cu_finance_agent.objid = cu_industry_issue.id')->where($where)->where(array('cu_finance_agent.status'=>1))->select();
        // echo $this->agentmodel->getLastsql();exit;
        $category = M('industry_category')->getField('id,categoryname');
        $stagedata = M('industry_stage')->getField('sid,stagename');
        $region = M('area')->where(array('parent_id'=>4))->getField('id,name');
        foreach ($data as $key => $value) {
            $data[$key]['categoryname'] = $category[$value['pcategory']];
            $regionarr = explode(',', $value['area']);
            $data[$key]['region'] = $region[$regionarr[1]];
            // var_dump($regionarr);
            // $data[$key]['stagename'] = $stagedata[$value['pstage']];
        }
         //var_dump($data);
	    $resdata = array();
        foreach ($data as $key => $value) {
            if($value['imethod']=='银行贷款'){
                $resdata['bank'][] = $value;
            }else if($value['imethod']=='融资'){
                $resdata['rz'][] = $value;
            }else if($value['imethod']=='物权转让'){
                $resdata['wq'][] = $value;
            } else{
               $resdata['other'][] = $value; 
            }
        }
       
		$count = count($data);
        $this->assign('method',$method);
        $this->assign('money',$money);
        $this->assign('type',$type);
		$this->assign("data",$resdata);
		$this->assign("count",$count);
		$this->display();
	}
    public function agent_content(){
        $id = I('get.id',0,'intval');
        $data = D("Content/IndustryAgent")
                ->join('zj_industry_issue ON zj_finance_agent.objid = zj_industry_issue.id')
                ->where(array('zj_industry_issue.id'=>$id))
                ->find();
        $this->assign('data',$data);
        $this->display();
    }
    
    //处理信用申请表单
    public function credit_apply(){
        if($this->userid){
        if(IS_AJAX){
            $level_arr = array(
                    '2'=>"二星",
                    '3'=>'三星',
                    '4'=>'四星',
                    '5'=>'五星'
                );
            $data= I("post.");
            $credit=D("Content/FinanceCredit");
            //ID存在 只编辑不添加  前台添加后继续修改
            if($data['id']){
                $uid = $this->uid;
                $info = $credit->where(array('uid'=>$uid,'id'=>$data['id']))->find();
                if($info){
                    $res = $credit -> edit_credit_apply();
                    if(!$res){
                        $this -> ajaxReturn( array( "status" => 0 ,"message" => $credit -> getError() ) );
                    }else{
                        $this -> ajaxReturn( array( "status" => 1 ,"message" => $level_arr[$info['level']] ,'id'=>$info['id']) );
                    }
                }else{
                    $data['id']='';
                }
            }
            if( !($res = $credit -> add_credit_apply() ) ){
                $this -> ajaxReturn( array( "status" => 0 ,"message" => $credit -> getError() ) );
            }else{
                $level = $credit->where(array('id'=>$res))->getField('level');
                
                $this -> ajaxReturn( array( "status" => 1 ,"message" => $level_arr[$level] ,'id'=>$res) );
            }
        }
        $this->display();
        }else{
            $this->error("请你先登录",U('Industry/Public/login'));
        }
    }
    //修改信用申请表单
    public function credit_edit(){
        if(IS_AJAX){
            $data = I('post.');
            $credit=D("Content/FinanceCredit");
            if( !($res = $credit -> edit_credit_apply() ) ){
                $this -> ajaxReturn( array( "status" => 0 ,"message" => $credit -> getError() ) );
            }else{
                $this -> ajaxReturn( array( "status" => 1 ,"message" => "编辑成功！！！" ) );
            }
        }
    }

    
    //信用申请评级结果页面
    public function credit_result(){
        $this->display();
    }
    
    //
    public function company_list(){
        $level = I('get.level',0,'intval');
        $where = array('level'=>$level);
        $count = $this->model->where($where)->order('id DESC')->count();
        $page = $this->page($count,10);
        $data = $this->model->where($where)->limit($page->firstRow.','.$page->listRows)->order('id DESC')->select();
        $this->assign('Page',$page);
        $this->assign('data',$data);
        $this->display();
    }
    //
    public function company_profile(){
        $this->display();

    }
    /*
     * 
     *金融代理模块
     * 
     * */
   
    //前台展示添加代理（融资）的表单
    public function industry_agent(){
        if($this->userid){
            if(IS_AJAX){
            // var_dump($_POST);die;
            $agent = D("Content/IndustryAgent");
//          var_dump($agent);die;
            if(!$res = $agent->add_agent()){
                $this->ajaxreturn(array("status"=>0,"message" => $agent->getError()));
            }else{
                $this->ajaxreturn(array("status"=>1,"message" => "添加成功" ,'id'=>$res));
            }
        }
        //展示页面
        $this->display("List/list_industry_agent");
        }else{
             $this->error("请你先登录",U('Industry/Public/login'));
        }
        //处理表单
       
    }

    //文化银行
    public function bank(){
        $this->display();
    }
    //企业基金
    public function fund(){
        $this->display();
    }
}