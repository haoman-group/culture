<?php
namespace Phone\Controller;
use Common\Controller\Base;
class PolicyController extends Base {
    protected $area = [];
    protected $Page_size =20;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->model = D("Admin/PolicyCulture");
       
        $this->assign('title','政策法规');
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
        $cid=I('cid',null);
        if($cid&& $cid !=176){
          $where['art_cid']=$cid;
        }elseif($cid==176) {
            $cat=array(347,348,349,350,351);
           $where['art_cid']=array('in',$cat);
        }
        $where['auditstatus']=35;
        $where['isdelete'] =0;
        $pagenum = I('get.page', '1', '');
        $count =  $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Policy/lists/page/*'));
        $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
        //echo $this->model->getLastsql();exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
         $category=D('Admin/ArtCategory')->where(array('parent_cid'=>5))->select();
        foreach ($category as $key => $value) {
         if($value['is_parent'] == 1){
            $category[$key]['grandson_list']=D('Admin/ArtCategory')->where(array('parent_cid'=>$value['cid']))->select();
         }
        }
        $this->assign(compact('data','pageinfo','category'));
        $this->display();
    }
    /**
     * 
     */
    public function detail(){
        $id = I('get.id',0);
       // var_dump($id);exit;
        $data = $this->model->where(array('id'=>$id))->find();
        //var_dump($data);exit;
        $this->assign(compact('data'));
        $this->display();
    }
}