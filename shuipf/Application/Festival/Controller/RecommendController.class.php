<?php
namespace Festival\Controller;
//精品推荐
class RecommendController extends BaseController {
    protected $Page_Size =10;
    protected function _initialize(){
        parent::_initialize();
    }
    public function index(){
         $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
        $where['categorytype']=I('cid');
        $count =D('Admin/Festival')->where($where)->order('id desc')->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Festival')->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        $category=D('Admin/Festival')->getCategory();
        foreach ($category[2] as $key => $value) {
           if(I('cid') == $key){
              $name=$value;
           }
        }
       
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
         $this->assign('name', $name);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }
    public function show(){
        $id=I('id');
        D('Admin/Festival')->hits($id);
        $data=D('Admin/Festival')->where(array('id'=>$id))->find();
        $data['images']=unserialize( $data['images']);
        //var_dump($data);exit;
        $this->assign('data',$data);
        $this->display();
    }

}
