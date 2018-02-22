<?php
/**
 * 群众文艺
 */
namespace Phone\Controller;
use Common\Controller\Base;
class MassController extends Base {
    protected $area = [];
    protected $Page_size =20;
    private $model = NULL;
       
    protected function _initialize() {
        
        parent::_initialize();
        $category = array(
            '0'=>array('cid'=>'start','name'=>'群星奖'),
            '1'=>array('cid'=>'worker','name'=>'农民工歌手大赛'),
            '2'=>array('cid'=>'dance','name'=>'广场舞大赛'),
            '3'=>array('cid'=>'photography','name'=>'网络摄影大赛'),
            '4'=>array('cid'=>'custom','name'=>'民俗'),
            '5'=>array('cid'=>'culture','name'=>'文化惠民')
        );
        $this->model = M('Massart');
        $this->assign('category',$category);
        $this->model = D('Admin/Massart');
         $this->assign('title','群众文艺');
        // $category = $this->model->getCategory();
        // $this->assign('category',$category);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function lists(){
        $cid=I('cid',null);
        if($cid){
          $where['category']=$cid;
        }
        $where['isdelete']=0;
        $pagenum = I('get.page', '1', '');
        $count =  $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/Mass/lists/page/*'));
        $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
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
        $data['images']=unserialize($data['images']);
        //var_dump($data);exit;
        $this->model->where(['id'=>$id])->setInc('hits',1);
        $this->assign(compact('data'));
        $this->display();
    }
}