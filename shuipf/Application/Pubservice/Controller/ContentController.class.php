<?php
//文化设施
namespace Pubservice\Controller;

use Admin\Service\User;

class ContentController extends PubBaseController
{
    protected $Page_size =10;
    protected function _initialize()
    {
        parent::_initialize();
        $userInfo = User::getInstance()->getInfo();
        //var_dump($userInfo);exit;
        $this->assign('userInfo', $userInfo);
        $this->assign('admin_url', "<a href='/admin'>[进入后台]</a>");
    }

    public  function lists(){
        $area=I('get.areaid',null);
        if($area){
           $where['area']=$area;
        }
        $now = date('Y-m-d H:i:s');
        $where['post_time'] = [['ELT',$now],['exp','is null'],'or'];
        $where['isdelete']=0;
        $pagenum = I('get.page', '1', '');
        $category=D('Admin/ArtCategory')->where(array('parent_cid'=>328))->select();
        $news_id=empty(I('news_id'))?329:I('news_id');
        $where['news_id']=$news_id;
        $news_name=D('Admin/ArtCategory')->where(array('cid'=>$news_id))->getField('name');
        $count = M('Newest')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = M('Newest')->where($where)->page($pagenum . ',' .$this->Page_size)->order('id desc')->select();
        //echo M('Newest')->getLastsql();exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('news_name', $news_name);
        $this->assign('category', $category);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();

        
        
    }

    public function show(){
        $id=I('id');
        $category=D('Admin/ArtCategory')->where(array('parent_cid'=>328))->select();
        $data = M('Newest')->where(array('id'=>$id))->find();
        $data['images'] =explode(',',$data['image']);
        $news_name=D('Admin/ArtCategory')->where(array('cid'=>$data['news_id']))->getField('name');
        $same=M('Newest')->where(array('isdelete'=>'0','news_id'=>$data['news_id'],'id'=>array('neq',$data['id'])))->limit(8)->select();
        $this->assign('category', $category);
        $this->assign('same', $same); 
        $this->assign('news_name',$news_name); 
        $this->assign('data', $data);
        $this->display();
    }

 
    //图片设计稿预览专用
    public function preview(){
        $this->display();
    }
    public function preview2(){
        $this->display();
    }
}


