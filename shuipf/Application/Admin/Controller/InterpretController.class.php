<?php
	//演出论坛
namespace Admin\Controller;
use Common\Controller\AdminBase;

class InterpretController extends AdminBase{
	


        protected $Page_Size = 20;
        protected function _initialize()
    {
        parent::_initialize();
       
        
        
    }
    public function index(){
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
        $title=I('get.title',null);
        if($title){
        $where['title']=array('like','%'.$title.'%');    
        }
        //var_dump($where);exit;
        $count = D('Admin/Interpret')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Interpret')->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }

     public function add(){
         if(IS_POST){
           $a=$_POST;
           $data =$a;
        if(!D('Admin/Interpret')->create($data)) {    
                $this->error(D('Admin/Interpret')->getError());
            } else {   
                D('Admin/Interpret')->add();
                //echo D('Admin/Interpret')->getLastsql();exit;
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
           if(!D('Admin/Interpret')->create($data)) {    
                $this->error(D('Admin/Interpret')->getError());
            } else {   
                D('Admin/Interpret')->save();
               // echo $this->ReCulture->getLastsql();
                $this->success('修改成功', U('index'));
            }

        }else{
            $data=D('Admin/Interpret')->where(array('id'=>$id))->find();
            $this->assign('data', $data);
            $this->display();
        }
        
    }

    public function delete(){
         $id=I('id');
        $data=D('Admin/Interpret')->where(array('id'=>$id))->setField('isdelete',1);;
        $this->success('删除成功', U('index'));
    }

}
