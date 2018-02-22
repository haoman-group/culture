<?php

namespace Industry\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;

class ConsumeController extends IndustryBaseController {
	public function _initialize(){
		parent::_initialize();
		$this->model = M('goods');
		$this->addrModel = D("Member/BuyerAddr");
		$this->consume = M('business_alliance');
		$this->price=M('price');
		$this->followmodel = M('goods_follow');
		$this->goodsfollowmodel = M('goods_follow');	
	}
	
	public function loading(){
		$this->display();
	}
	
	
	public function goods(){
		$where=array();
		$count=$this->model->where($where)->order('id desc')->count();
		$page=$this->page($count,8);
		$data=$this->model->where($where)->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
		$uid = ($this->uid) ? $this->uid : 0;
		if($uid){
			foreach ($data as $key => $value) {
				// $b = $this->followmodel->where(array('uid'=>$uid,'good_id'=>$value['id']))->find();
				// var_dump($this->followmodel->_sql());
				if($this->followmodel->where(array('uid'=>$uid,'good_id'=>$value['id']))->find()){
					$data[$key]['follow'] = 1;
				}
				
			}
		}
		// var_dump($data);die;
		$a=$this->model->where($where)->limit(2)->order('id asc')->select();
		$this->assign('a',$a);
		$this->assign('data',$data);
		$this->assign('page',$page->show());
		$this->display();
		
	}
	public function shopping(){
		$id=I('get.id');
//		var_dump($id);die;
		$where['id']=$id;
		$data=$this->model->where($where)->order('id desc')->find();
		$d=$this->model->where($where)->find();
		$d=explode("/", $d['price']);
		$person =explode("/", $data['person']);
//		var_dump($person);die;
		$guess=$this->model->order('rand()')->limit(3)->select();
		$content=explode(",", $data['photo']);
		$time=explode("/", $data['time']);
//		var_dump(explode(",", $data['photo']));die;
//		var_dump($d);
		$this->assign('person',$person);
		$this->assign('time',$time);
		$this->assign('content',$content);
		$this->assign('guess',$guess);
		$this->assign('d',$d);
		$this->assign('data',$data);
		$this->display();
	}

	public function orderbuy(){

		$addrlist = $this->addrModel->getAddr($this->userid);
		$this->assign("addrlist",$addrlist);
		$this->display();
	}

	public function orderpay(){

		$addrlist = $this->addrModel->getAddr($this->userid);
		$this->assign("addrlist",$addrlist);
		$this->display();
	}

	//新增收货地址
	public function addAddr(){
		if(IS_POST){
			$data = I('post.');
			$data['uid'] = $this->userid;
			$this->addrModel->addAddr($data);
			$this->success("添加成功!",U("Buyer/User/shipAddr"));
		}else{
			$id = I("id");
			$fnparent = I("fnparent");
			$result = null;
			if(!empty($id)){
				$result= $this->addrModel->where(array('id'=>$id))->find();
			}else{
				$result['area'] = "4,84,";
			}
			$this->assign('addr',$result);
			$this->assign('fnparent',$fnparent);
			$this->display();
		}
	}

	public function index(){
		$where=array('pass'=>1);
		$count=$this->consume->where($where)->order('id desc')->count();
		
		$page=$this->page($count,6);
		
		$data=$this->consume->where($where)->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
//		var_dump($data);die;
		$this->assign('data',$data);
		$this->assign('page',$page->show());
		$this->display();
	}
	public function consume(){
    	$getmethod = I('get.method');
        $getmoney = I('get.money');
		$method = ($getmethod!='不限')?$getmethod:'';
        $money = ($getmoney!='不限')?$getmoney:'';
		$where=array();
		if($method&&$money){
			$where=array('pass'=>0,'adress'=>array('like', $method.'%'),'industry'=>$money);
		}elseif($method&&$money==''){
			$where=array('pass'=>0,'adress'=>array('like', $method.'%'));
		}elseif($method==''&&$money){
			$where=array('pass'=>0,'industry'=>$money);
		}elseif($method==''&&$money==''){
			$where=array('pass'=>0);
		}
		$count=$this->consume->where($where)->order('id desc')->count();
		$page=$this->page($count,6);
//		var_dump($count);
//		var_dump($page);die;
		$data=$this->consume->where($where)->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
		
//		echo $this->consume->_sql();die;
//		var_dump($data);
//		$count = count($data);
        $this->assign('method',$method);
        $this->assign('money',$money);
        $this->assign('page',$page->show());
		$this->assign("data",$data);
//		$this->assign("count",$count);
		$this->display();
    }

    /*
     *商品收藏
     */
    public function goods_follow(){
    	
    	if(IS_AJAX){

    		$good_id = I('post.good_id',0,'intval');

            $data['good_id'] = $good_id;
    		$data['uid'] = $this->uid;
    		if(!$data['uid']){
    			$this->ajaxreturn( array( 'status'=>3, 'message'=>'请先登录！' ) );
    		}
    		$data['inputtime'] = time();
    		//若已收藏  则取消收藏
    		$status = $this->is_follow($data['uid'],$data['good_id']);
    		if($status){
    				$this->ajaxreturn( array( 'status'=>2, 'message'=>'取消成功！' ) );
    			}
//            var_dump($data);die;
    		$info = $this->goodsfollowmodel->add($data);
    		if($info){
    			$this->ajaxreturn( array( 'status'=>1, 'message'=>'收藏成功！' ) );
    		}else{
    			$this->ajaxreturn( array( 'status'=>0, 'message'=>'操作失败！' ) );
    		}
    	}
    }

    /*
     *判断是否已收藏
     * @param  int $uid 用户id
     * @param  int $good_id 商品id
     */
    public function is_follow($uid,$good_id){
    	$checkdata = $this->goodsfollowmodel->where(array('uid'=>$uid,'good_id'=>$good_id))->find();
    		// var_dump($checkdata);die;
    		if($checkdata){
    			$where = array('id' => $checkdata['id']);
    			$cancle = $this->goodsfollowmodel->where($where)->delete();
    			if($cancle){
    				return true;
    			}else{
    				return false;
    			}
    		}
    }

    // /*
    //  *取消收藏
    //  */
    public function cancle_follow(){
    	if(IS_AJAX){
    		$data = I('post.');
    		$uid = $this->uid;
    		$status = $this->is_follow($uid,$data['good_id']);
    		if($status){
    			//重新获得收藏数据
    			$newdata = $this->goodsfollowmodel->where(array('uid'=>$uid))->select();
    			$this->ajaxreturn( array( 'status'=>1, 'message'=>'已取消收藏！','info'=>$newdata) );
    		}
    	}
    }

}
    