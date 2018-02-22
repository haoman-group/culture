<?php
/**
 * 电子期刊
 */
namespace Phone\Controller;
use Common\Controller\Base;
class ElectronicsController extends Base {
    protected $area = [];
    protected $Page_size =20;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->model=M('Ejournals');
        $this->assign('title','电子期刊');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(){
        
        $where['status'] ="on";
        $pagenum = I('get.page', '1', '');
        $count =  $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Electronics/index/page/*'));
        $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['image']=unserialize($data[$key]['content'])[0];
        }
        //var_dump($data);exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign(compact('data','pageinfo'));
        $this->display();
       
    }
    /**
     * 
     */
    public function lists(){
        
    }
    /**
     * 
     */
    public function detail(){
        $id = I('get.id',0);
        $data=$this->model->where(array('id'=>$id))->find();
        $data['content']=unserialize($data['content']);
        $this->assign(compact('data'));
        $this->display();
    }
}