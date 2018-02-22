<?php

//剧院

namespace Admin\Controller;
use Admin\Model\ArtCategoryModel;
use Common\Controller\AdminBase;
use Admin\Service\User;

class TheatreController extends AdminBase
{


protected $Page_Size = 20;
   protected function _initialize()
    {
        parent::_initialize();
        $this->assign('maxPicNum', 5);
    }
   public function index(){
       $pagenum = I('get.page', '1', '');
       
        $where['isdelete'] = 0;
        $count = D('Admin/Theatre')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Theatre')->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['author_name'] = D('Admin/User')->where(array('id'=>$value['author_id']))->getField('username');
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
   } 

   public function add(){
       if(IS_POST){
        $data=$_POST;
        $data['drama_picture_url']=implode(",",$data['drama_picture_url']);
        if (!D('Admin/Theatre')->create($data)) {
                
                $this->error(D('Admin/Theatre')->getError());
            } else {
                
               D('Admin/Theatre')->add();
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
          $data['drama_picture_url']=implode(",",$data['drama_picture_url']);
          D('Admin/Theatre')->create($data);
             D('Admin/Theatre')->where(array('id' =>$_POST['id']))->save();
            $this->success('修改成功!', U('index'));
      }else{
          $data=D('Admin/Theatre')->where(array('id'=>$id))->find();
          $this->assign('data',$data);
          $this->assign('picture_urls',explode(',',$data['drama_picture_url']));
          $this->display();
      }
   }

   public function delete(){
      $id=I('id');
      $result=D('Admin/Theatre')->where(array('id'=>$id))->setField('isdelete',1);
      $this->success('删除成功!', U('index'));
   }
}