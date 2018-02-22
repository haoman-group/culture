<?php
namespace Phone\Controller;
use Common\Controller\Base;
class SubjectController extends Base {
    protected $area = [];
    protected $Page_size =15;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
         $this->model = M('News');
       
        $this->assign('title','热点专题');
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
      $catid= I('get.cid',null);
        $where['catid']=$catid;
        $where['status']=99;
        $pagenum = I('get.page', '1', '');
        $count =  $this->model->where($where)->count();
         $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
         $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Subject/lists/cid/6/page/*'));
        $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
       // echo $this->model->getLastsql();exit;
       $pageinfo["page"] = $page->show('sellercenter');
       $pageinfo['count'] = $count;
        $this->assign(compact('data','pageinfo'));
        $this->display();
    }
    /**
     * 
     */
    public function detaile(){
        $id = I('get.id',0);
       // var_dump($id);exit;
        $data = $this->model->where(array('id'=>$id))->find();
        $data['content']=M('NewsData')->where(array('id'=>$id))->getField('content');
        $this->assign(compact('data'));
        $this->display();
    }
}