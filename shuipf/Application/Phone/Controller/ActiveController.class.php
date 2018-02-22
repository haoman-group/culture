<?php
namespace Phone\Controller;
use Common\Controller\Base;
class ActiveController extends Base {
    protected $area = [];
    protected $Page_size =20;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->model = M('Active');
        $category=D('Admin/ArtCategory')->cache(true)->where(array('parent_cid'=>220))->select();
        $this->assign('category',$category);
        $this->assign('title','文化活动');
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
        if($cid){
          $where['art_cid']=$cid;
        }
        $where['isdelete'] =0;
        $pagenum = I('get.page', '1', '');
        $count =  $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Active/lists/page/*'));
        $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
       // var_dump($data);exit;
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
        $data = $this->model->where(array('id'=>$id))->find();
        //var_dump($data);exit;
        $this->assign(compact('data'));
        $this->display();
    }
}