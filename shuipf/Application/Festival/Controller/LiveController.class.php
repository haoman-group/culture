<?php
namespace Festival\Controller;

class LiveController extends BaseController {
    protected $page_Size =15;
    protected function _initialize(){
        parent::_initialize();
        $this->model=D('Admin/Festival');
    }
    public function index(){
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
        $where['categorytype']="401";
        $count =$this->model->where($where)->order('id desc')->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = $this->model->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }
    public function detail(){
        $id = I('get.id',null);
        $data = $this->model->where(['id'=>$id])->find();
        if($data){
            $this->model->hits($id);
        }
        if(!empty($data['url'])){
            header('Location: ' . $data['url']);
        }else if(!empty($data['voide'])){
            $this->assign('data',$data);
            $this->display();
        }else{
            $this->error('错误！未找到直播链接或者视频内容！');
        }
    }
}