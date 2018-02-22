<?php
/**
 * 艺术档案馆
 */
namespace Phone\Controller;
use Common\Controller\Base;
class ConsumeController extends Base {
    protected $area = [];
    protected $Page_size =20;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->model = M('News');
      
        $this->assign('title','消费服务');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(){
        $where['catid']=17;
        $where['status']=99;
        $custom=$this->model->where(array('status'=>99,'catid'=>17))->limit(4)->order('id desc')->select();
        $discount=$this->model->where(array('status'=>99,'catid'=>18))->limit(8)->order('id desc')->select();
        //var_dump($custom);exit;
        $this->assign(compact('custom','discount'));
        $this->display();
    }
    /**
     * 
     */
    public function lists(){
       
        $catid= I('get.cid',null);
        $where['catid']=$catid;
        $where['status']=99;
        $pagenum = I('get.page', '1', '');
        $count =  $this->model->where($where)->count();
         $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
         $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Consume/lists/page/*'));
        $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
       $pageinfo["page"] = $page->show('sellercenter');
       $pageinfo['count'] = $count;
        $this->assign(compact('data','pageinfo'));
        $this->display();
    }
    /**
     * 
     */
    public function show(){
        $id = I('get.id',0);
        $data = $this->model->where(array('id'=>$id))->find();
        $data['content']=M('NewsData')->where(array('id'=>$data['id']))->getField('content');
        $this->assign(compact('data'));
        $this->display();
    }
}