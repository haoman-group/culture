<?php
//艺术档案馆
namespace Pubservice\Controller;
use Pubservice\Controller\PubBaseController;
use Admin\Service\User;
class ArchiveController extends PubBaseController
{
    protected $Page_Size=12;
    private $model = null;
    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Admin/Archive');
        $this->category = $this->model->getCateArray();
        $this->assign("category",$this->category);

        $userInfo = User::getInstance()->getInfo();
        $this->assign('userInfo', $userInfo);
        $this->assign('admin_url',"<a href='/admin'>[进入后台]</a>");
    }
    //主页
    public function index(){
        //标题推荐
        $id = I('get.id',null);
        if($id && is_numeric($id)){
            $position = $this->model->where(['id'=>$id])->find();
        }else{
            $position = $this->model->where(['if_position'=>'1'])->order('id desc')->find();
        }
        $position['images'] = unserialize($position['images']);
        //专题视频
        //精品鉴赏
        //编研成果
        //网上展厅
        //创新动态
        $category = $this->category;
        $data = array();
        foreach($category as $i=>$t){
            $tmp = $this->model->where(['category'=>$i])->order('id desc')->limit(8)->select();
            foreach($tmp as $ii=>$tt){
                $tmp[$ii]['images'] = unserialize($tt['images']);
            }
            $data[$i] = $tmp;
        }
        //var_dump($data);exit;
        $this->assign(compact('position','data'));
        $this->display();
    }

        public function lists(){
        $pagenum = I('get.page',1);
        $category=I('category');
        if(empty($category)){
           $category="video";
        }
        $this->assign('categoryname',$this->category[$category]);
        $count = $this->model->where(array('category'=>$category))->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = $this->model->where(array('category'=>$category))->page($pagenum . ',' . $this->Page_Size)->order("id desc")->select();
        foreach($data as $key =>$value){
          $data[$key]['image']=unserialize($value['images']);
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->assign('data',$data);
        $this->display();
    }


    public function show(){
        $id=I('id');
        $data = $this->model->where(array('id'=>$id))->find();
        $data['image']=unserialize($data['images']);
        $review=$this->model->where(array('category'=>$data['category']))->order('id desc')->limit(3)->select();
        foreach ($review as $key => $value) {
            $review[$key]['image']=unserialize($value['images']);
        } 
        $this->model->where(['id'=>$id])->setInc('hits',1);
         $this->assign('review',$review);
        $this->assign('data',$data);
        $this->display();
    }
    
}