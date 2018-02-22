<?php
namespace Festival\Controller;
//展览类活动
class ExhactController extends BaseController {
    protected function _initialize(){
        parent::_initialize();
    }
    public function index(){
        $category=D('Admin/Festival')->getCategory();
        foreach($category[2] as $key =>$value){
          $data[$key][category]=$value;
        }
       foreach ($data as $k => $v) {
           $data[$k]['son']=D('Admin/Festival')->where(array('categorytype'=>$k,'isdelete'=>0))->limit(7)->order('id desc')->select();
          
       }
        //var_dump($data);exit;
        $this->assign('data',$data);
         $this->assign('info',$info);
        $this->display();
    }

}
