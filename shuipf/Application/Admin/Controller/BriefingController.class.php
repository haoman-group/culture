<?php
//briefing

namespace Admin\Controller;
use Admin\Model\ArtCategoryModel;
use Common\Controller\AdminBase;
use Admin\Service\User;

class BriefingController extends AdminBase
{
       protected $Page_Size = 20;
        protected function _initialize()
    {
        parent::_initialize();
       
        $briefing = D('Admin/Briefing');
        
    }
    public function index(){
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
         $title=I('get.title',null);
        if($title){
        $where['title']=array('like','%'.$title.'%');    
        }
        //var_dump($where);exit;
        $count = D('Admin/Briefing')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Briefing')->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['author'] =M('User')->where(array('id'=>$value['author_id']))->getField('username');  
        }
        //echo M('User')->getLastsql();
        //var_dump($data);exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }

     public function add(){
         $model = D('Admin/Briefing');
         if(IS_POST){
            $data = $_POST;
            if(!$model->create($data)) {    
                $this->error($model->getError());
            }else {   
                $model->add();
                $this->success('添加成功', U('index'));
            }
         }else{
            $this->display();
         }
         
       
        
    }

    public function edit(){
        $id=I('id');
        if(IS_POST){
          $data=$_POST;
           if(!D('Admin/Briefing')->create($data)) {    
                $this->error(D('Admin/Briefing')->getError());
            } else {   
                D('Admin/Briefing')->save();
               // echo $this->ReCulture->getLastsql();
                $this->success('修改成功', U('index'));
            }

        }else{
            $data=D('Admin/Briefing')->where(array('id'=>$id))->find();
            $this->assign('data', $data);
            $this->display();
        }
        
    }

    public function delete(){
         $id=I('id');
        $data=D('Admin/Briefing')->where(array('id'=>$id))->setField('isdelete',1);;
        $this->success('删除成功', U('index'));
    }

    public function position(){
        $data=$_POST;
        foreach($data['id'] as $key=>$value){
            $result=D('Admin/Briefing')->where(array('id'=>$value))->setField('position',$data['position'][$key]);
        }
        $this->success('排序成功',U('index'));

    }
}