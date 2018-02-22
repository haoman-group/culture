<?php
namespace Phone\Controller;
use Common\Controller\Base;
use Admin\Service\User;
class IndustryController extends Base {
    protected $area = [];
    protected $Page_size =10;
    protected $page_size=10;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->assign('title','文化产业服务平台');
    }
    public function index(){
        //产品数据
        $product_data = M('IndustryProduct')->order('id')->limit(4)->getField('id,title,image,url');
        //企业数据
        $data = D('Admin/Industry')->where(['art_cid'=>[['EGT','132'],['ELT','141']],'isdelete'=>'0'])->limit(12)->select();
        $this->assign('product_data',$product_data);
        $this->assign('data',$data);
        $this->display();
    }
    /**
     * 产业服务平台页面
     *
     * @return void
     */
    public function services(){
        $obj = D("Content/IndustryIssue");
        $data =$obj->where(array('status'=>1))->limit(16)->order('id desc')->select();
        foreach ($data as $key => $value) {
             $data[$key]['categoryname']=M('industry_category')->where(array('id'=>$value['pcategory']))->getField('categoryname');
        }
        $this->assign('data',$data);
        $this->display();
    }

    //项目展示

    public function lists(){
        $obj = D("Content/IndustryIssue");
        $where['status'] =1;
        $pagenum = I('get.page', '1', '');
        $count = $obj->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Industry/lists/page/*'));
        $data =  $obj->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign(compact('data','pageinfo'));
        $this->display(); 
    }

    //详情页

public function show(){
    $id=I('id');
     $obj = D("Content/IndustryIssue");
     $data = $obj->where(array('id'=>$id))->find();
     $data['categoryname']=M('IndustryCategory')->where(array('id'=>$data['pcategory']))->getField('categoryname');
     //var_dump($data);exit;
     $this->assign(compact('data'));
    $this->display();  

}
//供需展示
public function supply(){
    $type=I('type',null);
    if($type){
      $where['style']=$type;
    }else{
       $where['style']="supply";
    }
     $this->model = D('Admin/SupplyDemand');
     $pagenum = I('get.page', '1', '');
     $count =$this->model->where($where)->count();
     $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
     $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Industry/supply/page/*'));
     $data =  $this->model->where($where)->page($pagenum . ',' .$this->page_size)->order('id desc')->select();
     foreach ($data as $key => $value) {
        $data[$key]['categoryname']=M('ArtCategory')->where(array('cid'=>$value['category']))->getField('name');
     }
     $pageinfo["page"] = $page->show('sellercenter');
     $pageinfo['count'] = $count;
     $this->assign(compact('data','pageinfo'));
     $this->display();
}
//经融代理

public function financial(){
    // $getmethod = I('get.method');
    //     $getmoney = I('get.money');
    //     $gettype = I('get.type');
	// 	$method = ($getmethod!='不限')?$getmethod:'';
    //     $money = ($getmoney!='不限')?$getmoney:'';
    //     $type = ($gettype!='不限')?$gettype:'';
    //     $where = array();
    //     // $where['status'] = 1;
    //     if ($method) {
    //         # code...
    //         $where['method'] = $method;
    //     }
    //     $cid = $alltype = $this->categorymodel->where(array('categoryname'=>$type))->getField('id');
    //     if(isset($cid)){
    //         $where['zj_industry_issue.pcategory'] = $cid;
    //     }
    //     switch ($money) {
    //         case '10万以下':
    //             $where['money'] = array('LT',10);
    //             break;
    //         case '10万-50万':
    //             $where['money'] = array('between','10,50');
    //             # code..
    //             break;
    //         case '50万-100万':
    //             # code...
    //             $where['money'] = array('between','50,100');
    //             break;
    //         case '100万-1000万':
    //             # code...
    //             $where['money'] = array('between','100,1000');
    //             break;
    //         case '1000万以上':
    //             # code...
    //             $where['money'] = array('GT',1000);
    //             break;
    //         default:
    //             # code...
    //             break;
    //     }
	// 	// var_dump($where);
	// 	//查数据
	// 	// $data = D("Content/IndustryAgent")->join('zj_industry_issue ON zj_finance_agent.objid = zj_industry_issue.id')->where(array('status'=>1))->select();
    //     $data = $this->agentmodel->join('cu_industry_issue ON cu_finance_agent.objid = cu_industry_issue.id')->where($where)->where(array('cu_finance_agent.status'=>1))->select();
    //     // echo $this->agentmodel->getLastsql();exit;
    //     $category = M('industry_category')->getField('id,categoryname');
    //     $stagedata = M('industry_stage')->getField('sid,stagename');
    //     $region = M('area')->where(array('parent_id'=>4))->getField('id,name');
    //     foreach ($data as $key => $value) {
    //         $data[$key]['categoryname'] = $category[$value['pcategory']];
    //         $regionarr = explode(',', $value['area']);
    //         $data[$key]['region'] = $region[$regionarr[1]];
    //         // var_dump($regionarr);
    //         // $data[$key]['stagename'] = $stagedata[$value['pstage']];
    //     }
    //      //var_dump($data);
	//     $resdata = array();
    //     foreach ($data as $key => $value) {
    //         if($value['imethod']=='银行贷款'){
    //             $resdata['bank'][] = $value;
    //         }else if($value['imethod']=='融资'){
    //             $resdata['rz'][] = $value;
    //         }else if($value['imethod']=='物权转让'){
    //             $resdata['wq'][] = $value;
    //         } else{
    //            $resdata['other'][] = $value; 
    //         }
    //     }
       
	// 	$count = count($data);
    //     $this->assign('method',$method);
    //     $this->assign('money',$money);
    //     $this->assign('type',$type);
		$this->assign("data",$resdata);
		// $this->assign("count",$count);
		$this->display();
}
//经融专区

public function prefecture(){
    $cid=I('cid',null);
    if($cid){
     $where['catid']=$cid;
    }else{
        $where['catid']=36;
    }
    $where['status']=99;
    $data=M('News')->where($where)->select();
 //echo    M('News')->getLastsql();exit;
    // foreach ($data as $key => $value) {
    //     $data[$key]['content']=M('NewsData')->where(array('id'=>$value['id']))->find();
    // }
     $this->assign('data',$data);
    $this->display();
}

//产业服务项目发布


public function addindustry(){
    $userinfo = service("Passport")->getInfo();
  if($userinfo['userid']){
    $industry_category = M('industry_category')->select();
    $industry_stage = M('industry_stage')->select();
    $this->assign('industry_category',$industry_category);
    $this->assign('uid',$userinfo['userid']);
    $this->assign('industry_stage',$industry_stage); 
    $this->display();

  }else{
    redirect('/Phone/User/login');
  }
}


   public function add_obj_table(){
        if(IS_POST){
            $industry = D('Admin/IndustryIssue');
             //var_dump($industry);die;
            if(!$res = $industry->add_industry()){
               
                $this->error($industry->getError());
                // echo 2;die;
            }else if($res && $_POST['pfinancing'] ==1 ){
                // $this->ajaxreturn( array( 'status'=>1,'id'=>$res,'agent'=>$_POST['pfinancing']) );
                $this->success('添加成功，正在跳转到添加金融代理页面',U('Phone/Industry/addstage',array('oid'=>$res)),5);
            }else{
                // $this->success('添加成功',U('Industry/Industry/personal_project'));
                $this->success('添加成功',U('/Phone/Industry/addstage'));
            }
        }
    }

    public function addstage(){
              $userinfo = service("Passport")->getInfo();
             if($userinfo){
            if(IS_POST){
          
            $agent = D("Content/IndustryAgent");
            if(!$res = $agent->add_agent()){
                 $this->error('添加失败');
            }else{
                 $this->success('添加成功',U('/Industry/services'));
            }
        }else{
            $this->assign('uid',$userinfo['userid']);
            $this->display();
        }
        
      
        }else{
             $this->error("请你先登录",U('Industry/Public/login'));
        }
}


public function bank(){
    $this->display();
}


public function fund(){
    $this->display();
}

public function credit_apply(){
     $userinfo = service("Passport")->getInfo();
    if($userinfo['userid'] ){
        if(IS_POST){
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
                        $this -> error( "添加失败".$credit ->getError() );
                    }else{
                        $this -> success("添加成功" ,U('Industry/Index/') );
                    }
                }else{
                    $data['id']='';
                }
            }
            if( !($res = $credit -> add_credit_apply() ) ){
               $this -> error( "添加失败".$credit ->getError());
            }else{
                $level = $credit->where(array('id'=>$res))->getField('level');
                
               $this -> success("添加成功" ,U('Industry/Index/') );
            }
        }
         $this->assign('id',$userinfo['userid']);
        $this->display();
        }else{
            $this->error("请你先登录",U('Phone/User/login'));
        }
}

//文化经融
public function culture(){
    $this->display();

}

//我的创意

public function create(){
     $userinfo = service("Passport")->getInfo();
    $news=D('Admin/Creativity')->where(array('isdelete'=>0,'pass'=>1))->order('id desc')->limit(5)->select();
     $hot=D('Admin/Creativity')->where(array('isdelete'=>0,'pass'=>1))->order('click_num desc')->limit(5)->select();
    $this->assign('news',$news);
    $this->assign('userid',$userinfo['userid']);
     $this->assign('hot',$hot);
    $this->display();
}

public function addcreate(){
     $data=$_POST;
     $userinfo = service("Passport")->getInfo();
        if(empty($userinfo['userid'])){
           $this->error('请先登录',U('Industry/Public/Login'));
        }else{
            D('Admin/Creativity')->create($data);
            D('Admin/Creativity')->add();
            $this->success('添加成功',U('Industry/create'));
        }
}

public function createshow(){
      $id=I('id');
        $data=D('Admin/Creativity')->where(array('id'=>$id))->find();
        $data['username']=D('Admin/Member')->where(array('userid'=>$data['userid']))->getField('username');
        $message=D('Admin/Creativity')->where(array('isdelete'=>0,'pass'=>1))->select();
        D('Admin/Creativity')->where(array('id'=>$id))->setInc('click_num',1);
        //var_dump($data);exit;
        $this->assign('data',$data);
        $this->assign('message',$message);
        $this->display();
}

public function createlist(){
    $type=I('type');
    $pagenum = I('get.page', '1', '');
    $where['isdelete']=0;
    $where['pass']=1;
    if($type == 'new'){
      $count =D('Admin/Creativity')->where($where)->count();
     $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
     $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Industry/createlist/page/*'));
     $data =  D('Admin/Creativity')->where($where)->page($pagenum . ',' .$this->page_size)->order('id desc')->select();
    }else{
     $count =D('Admin/Creativity')->where($where)->count();
     $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
     $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Industry/createlist/page/*'));
     $data =  D('Admin/Creativity')->where($where)->page($pagenum . ',' .$this->page_size)->order('id desc')->select();

    }
     
    
     
     $pageinfo["page"] = $page->show('sellercenter');
     $pageinfo['count'] = $count;
     $this->assign(compact('data','pageinfo'));
     $this->display();
}


public function credit_result(){
    $this->display();
}

public function company_list(){

   $level = I('get.level',0,'intval');
        $where = array('level'=>$level);
         $count = D("Content/FinanceCredit")->where($where)->count();
     $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
     $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Industry/company_list/page/*'));
     $data =D("Content/FinanceCredit")->where($where)->page($pagenum . ',' .$this->page_size)->order('id desc')->select();
    $pageinfo["page"] = $page->show('sellercenter');
     $pageinfo['count'] = $count;
     $this->assign(compact('data','pageinfo'));
        $this->display();
}
}