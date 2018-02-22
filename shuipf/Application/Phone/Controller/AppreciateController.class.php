<?php
/**
 * 艺术品鉴赏
 */
namespace Phone\Controller;
use Common\Controller\Base;
class AppreciateController extends Base {
    protected $area = [];
    protected $Page_size =20;
    private $model = NULL;
       
    protected function _initialize() {
        
        parent::_initialize();
        $this->model = D('Admin/ReCulture');
        
        $this->assign('category',D('Admin/ArtCategory')->where(['parent_cid'=>6])->select());
         $this->assign('title','艺术品鉴赏');
        // $category = $this->model->getCategory();
        // $this->assign('category',$category);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function lists(){
       $cid = I('get.cid',null);
        $pagenum = I('get.page',1);
        $where['if_position'] = '1';
        if($cid){
            $cid_range = D('Admin/ArtCategory')->getCidRange($cid);
            $where['art_cid'] = ['in',$cid_range];
        }
        $count =  $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Appreciate/lists/page/*'));
        $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['image']=explode(",",$value['image'])[0];
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign(compact('data','pageinfo'));
        $this->display();
    }
    /**
     * 
     */
    // public function lists(){
    //     $where = [];
    //     $category = I('get.cid',null);
    //     if($category){
    //         $where['category'] = $category;
    //         $cateArray = $this->model->getCateArray();
    //         $this->assign('title',$cateArray[$category].'--艺术档案馆');
    //     }
    //     $pagenum = I('get.page', '1', '');
    //     $count =  $this->model->where($where)->count();
    //     $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
    //     $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Archive/lists/page/*'));
    //     $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
    //     $pageinfo["page"] = $page->show('sellercenter');
    //     $pageinfo['count'] = $count;
    //     $this->assign(compact('data','pageinfo'));
    //     $this->display();
    // }
    /**
     * 
     */
    public function detail(){
        $id = I('get.id',0);
        $data = $this->model->where(array('id'=>$id))->find();
        $data['image']=explode(",",$data['image']);
        //var_dump($data);exit;
        // $this->model->where(['id'=>$id])->setInc('hits',1);
        $this->assign(compact('data'));
        $this->display();
    }
}