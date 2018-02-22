<?php
namespace Industrymem\Controller;

use Common\Controller\Base;

class BuyerserviceController extends MemberBase{
   public function _initialize(){
      parent::_initialize();
      $this->addressmodel = M('member_address');
      $this->areamodel = M('area');
      $this->followmodel = M('product_follow');
      $this->productmodel = M('product');
      $this->goodsmodel = M('goods');
      $this->addrModel = D("Industrymem/BuyerAddr");
   } 

    //我的订单
   public function order(){

      $this->display();
   }

    //我的收藏
    public function collection(){
      $uid = $this->userid;

      $count = $this->followmodel->where(array('uid'=>$uid))->count();
      $page = $this->page($count,6);
      $data = $this->followmodel->where(array('uid'=>$uid))->limit($page->firstRow.','.$page->listRows)->select();
      $followdata =array();
      foreach ($data as $key => $value) {
        $followdata[]  = $this->productmodel->where(array('id'=>$value['pid']))->find();
      }
       //var_dump($followdata);die;
      $this->assign('page',$page->show());
      $this->assign('data',$followdata);
      $this->display();
    }


    //收货地址
    public function address(){
        $result = $this->addrModel->getAddr($this->userid);
        $num = $this->addrModel->where(array('uid'=>$this->userid))->count();
        $this->assign("num",$num);
        $this->assign("info",$result);
        $this->display();

    }

    //我的收货地址
//    public function address(){
//      $where = array('uid'=>$this->uid);
//      $data = $this->addressmodel->where($where)->order('id DESC')->select();
//      foreach ($data as $key => $value) {
//        $array  = explode(',', $value['area']);
//        foreach ($array as $k => $v){
//          $data[$key]['address'][] = $this->areamodel->where(array('id'=>$v))->find();
//        }
//      }
//      // var_dump($data[1]);die;
//      $this->assign('data',$data);
//      $this->display();
//
//
//
//    }
    public function add_address(){
      if(I_AJAX){
        // echo 1;die;
        $data = I('post.');
        // var_dump($data);die;
        if(empty($data['area'])){
          $this->ajaxreturn(array('status'=>0,"message" =>"请选择地区"));
        }
        if(empty($data['detailed'])){
          $this->ajaxreturn(array('status'=>0,"message" =>"请填写详细信息"));
        }
        if(empty($data['code'])){
          $this->ajaxreturn(array('status'=>0,"message" =>"请填写邮政编码"));
        }
        $str = $data['code'];
        if(!preg_match("/^[0-9]d{5}$/",$str)){
          
          $this->ajaxreturn(array('status'=>0,"message" =>"请填写正确的邮政编码"));
        }
        if(empty($data['name'])){
          $this->ajaxreturn(array('status'=>0,"message" =>"请填写姓名"));
        }
        if(empty($data['phone'])){
          $this->ajaxreturn(array('status'=>0,"message" =>"请填写联系电话"));
        }
        $data['inputtime'] = time();
        $res = $this->addressmodel->add($data);
        // echo $res;die;
        if($res){
          $this->ajaxreturn(array('status'=>1,"message" =>"添加成功！"));
        }else{
          $this->ajaxreturn(array('status'=>0,"message" =>"添加失败！"));
        }
      }
    }
    public function addAddr(){
      $this->display();
    }
    //我的评论
    public function discuss(){

      $this->display();
    }

    public function cancle_follow(){
      if(IS_AJAX){
        $data = I('post.');
        $uid = $this->uid;
        $status = $this->is_follow($uid,$data['good_id']);
        if($status){
          //重新获得收藏数据
          $newdata = $this->followmodel->where(array('uid'=>$uid))->select();
          $this->ajaxreturn( array( 'status'=>1, 'message'=>'已取消收藏！','info'=>$newdata) );
        }
      }
    }

     public function is_follow($uid,$good_id){
      $checkdata = $this->followmodel->where(array('uid'=>$uid,'good_id'=>$good_id))->find();
        // var_dump($checkdata);die;
        if($checkdata){
          $where = array('id' => $checkdata['id']);
          $cancle = $this->followmodel->where($where)->delete();
          if($cancle){
            return true;
          }else{
            return false;
          }
        }
    }
}
