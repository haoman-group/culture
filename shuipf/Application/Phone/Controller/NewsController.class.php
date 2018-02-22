<?php
namespace Phone\Controller;
use Common\Controller\Base;
class NewsController extends Base {
    protected $area = [];
    protected $Page_size =20;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->model = M('Newest');
        $category=D('Admin/ArtCategory')->cache(true)->where(array('parent_cid'=>328))->select();
        foreach($category as $index=>$item){
            $category[$index]['link']= U('/Phone/News/lists',['cid'=>$item['cid']]);
        }
        $this->assign('category',$category);
        $this->assign('title','最新资讯');
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
        $where['isdelete'] = '0';
        $cid = I('get.cid',null);
        if($cid){
            $where['news_id'] = $cid;
            $cate_name = D('Admin/ArtCategory')->cache(true)->where(array('cid'=>$cid))->getField('name');
            $this->assign('title',$cate_name.'--最新资讯');
        }
        $pagenum = I('get.page', '1', '');
        $count =  $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/news/lists/page/*'));
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
        $this->assign(compact('data'));
        $this->display();
    }

    public function search(){
        $keywords = I('get.keywords',null);
        if(!$keywords){
            $this->redirect('lists');
        }
        $where = [];
        $where['isdelete'] = '0';
        $where['title'] = ['like','%'.$keywords.'%'];
        $pagenum = I('get.page', '1', '');
        $count =  $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '{prev}{liststart}{list}{listend}{next}', array('link' => '/Phone/news/lists/page/*'));
        $data =  $this->model->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign(compact('data','pageinfo'));
        $this->assign('title','搜索结果');
        $this->display('lists');
    }
}