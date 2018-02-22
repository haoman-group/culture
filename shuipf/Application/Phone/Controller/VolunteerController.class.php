<?php
namespace Phone\Controller;
use Common\Controller\Base;
class VolunteerController extends Base {
    protected $area = [];
    protected $Page_size =20;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->Recruit = M('VolunteerRecruit');
        $this->Train = M('VolunteerTrain');
        $category=array(0=>array('cid'=>'Recruit','name'=>'志愿者招募'),'1'=>array('cid'=>'Train','name'=>'志愿者培训'));
        $this->assign('category',$category);
        $this->assign('title','文化志愿');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(){
        $this->display();
    }
    /**
     * 
     */
    public function lists(){
    $where['isdelete'] =0;
    $pagenum = I('get.page', '1', '');
        $type=I('cid',null);
        
        if(!$type){
          $type='Recruit';
        }

        //var_dump($type);exit;
        switch ($type) {
            case 'Recruit':
                $count =$this->Recruit->where($where)->count();
                $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
                $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Volunteer/lists/page/*'));
                $data =  $this->Recruit->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
                foreach ($data as $key => $value) {
                    $data[$key]['image']=unserialize($data[$key]['pic'])[0];
                }
                break;
            case 'Train':
                $count =$this->Train->where($where)->count();
                $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
                $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Volunteer/lists/page/*'));
                $data =$this->Train->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
                 foreach ($data as $key => $value) {
                    $data[$key]['image']=unserialize($data[$key]['pic'])[0];
                }
                break;
            
            default:
                # code...
                break;
        }
    //     $where['isdelete'] =0;
    //     $pagenum = I('get.page', '1', '');
    //     $count =$this->model->where($where)->count();
    //     $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
    //     $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Active/lists/page/*'));
    //     $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
    //    // var_dump($data);exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign(compact('data','pageinfo'));
        $this->display();
    }
    /**
     * 
     */
    public function detail(){
        $id = I('get.id',0);
       // var_dump($id);exit;
       $type=I('get.type');
       if($type == '' || $type=="Recruit"){
           //echo 123;exit;
          $data=$this->Recruit->where(array('id'=>$id))->find();
       }else{
           //echo 342;exit;
         $data=$this->Train->where(array('id'=>$id))->find();
       }
       
        //var_dump($data);exit;
        $this->assign(compact('data'));
        $this->display();
    }
}