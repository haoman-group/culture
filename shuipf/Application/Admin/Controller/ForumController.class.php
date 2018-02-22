<?php

//文化艺术档案馆
//Author :makeup1122

namespace Admin\Controller;
use Common\Controller\AdminBase;

class ForumController extends AdminBase
{

protected $Page_Size=20;
public function lists(){

        $pagenum = I('get.page','1','');
		$where['isdelete']=0;
        $count=D('Admin/Creativity')->where($where)->count();
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data=D('Admin/Creativity')->where($where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
         foreach($data as $key=>$value){
              $data[$key]['username']=D('Admin/Member')->where(array('userid'=>$value['userid']))->getField('username');
              switch ($value['pass']) {
                  case '0':
                     $data[$key]['passname']='未审核';
                      break;
                  case '1':
                     $data[$key]['passname']='审核通过';
                      break;
                  case '2':
                     $data[$key]['passname']='审核未通过';
                      break;        
                  
                  default:
                      # code...
                      break;
              }
              switch ($value['type']) {
                  case '0':
                     $data[$key]['typename']='一般';
                      break;
                  case '1':
                     $data[$key]['typename']='热帖';
                      break;
                  case '2':
                     $data[$key]['typename']='精华贴';
                      break;        
                  
                  default:
                      # code...
                      break;
              }
        }
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
		$this->assign('pageinfo',$pageinfo);
    $this->display();
}

public function show(){
    if(IS_POST){
       $data=$_POST;
       $result=D('Admin/Creativity')->where(array('id'=>$data['id']))->save($data);
       $this->success("设置成功",U('lists'));
    }else{
      $id=I('id');
      $data=D('Admin/Creativity')->where(array('id'=>$id))->find();
      $data['username']=D('Admin/Member')->where(array('userid'=>$data['userid']))->getField('username');
      $this->assign('data',$data);  
      $this->display();
    }
    
}

public function delete(){
    $id=I('id');
      $data=D('Admin/Creativity')->where(array('id'=>$id))->setField('isdelete',1);
       $this->success("删除成功",U('lists'));
}

}