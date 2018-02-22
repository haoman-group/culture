<?php
/**
 * 艺术档案馆
 */
namespace Phone\Controller;
use Common\Controller\Base;
class ArchiveController extends Base {
    protected $area = [];
    protected $Page_size =20;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->model = D('Admin/Archive');
        $category = $this->model->getCateArray();
        foreach($category as $index=>$item){
            $category[$index]= ['name'=>$item,'cid'=>$index];
        }
        $this->assign('category',$category);
        $this->assign('title','艺术档案馆');
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
        $where = [];
        $category = I('get.cid',null);
        if($category){
            $where['category'] = $category;
            $cateArray = $this->model->getCateArray();
            $this->assign('title',$cateArray[$category].'--艺术档案馆');
        }
        $pagenum = I('get.page', '1', '');
        $count =  $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Archive/lists/page/*'));
        $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
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
        $data = $this->model->where(array('id'=>$id))->find();
        $this->model->where(['id'=>$id])->setInc('hits',1);
        $this->assign(compact('data'));
        $this->display();
    }
}