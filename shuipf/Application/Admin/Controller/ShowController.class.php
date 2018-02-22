<?php
namespace Admin\Controller;
use Admin\Model\ArtCategoryModel;
use Common\Controller\AdminBase;
use Admin\Service\User;
class ShowController extends AdminBase{



	public function showlist(){
		
	
			$Lib=D('Admin/Library')->where(array('status'=>1,'isdelete'=>0))->select();
			foreach ($Lib as $key => $value) {
				$Lib[$key]['tabname']=1;
			}
		    $Com=D('Admin/Comartcenter')->where(array('status'=>1,'isdelete'=>0))->select();
		    foreach ($Com as $key => $value) {
				$Com[$key]['tabname']=2;
			}
		    if($Lib == NULL && $Com != NULL){
              $data=$Com;
		    }elseif($Lib != NULL && $Com == NULL){
               $data=$Lib;
		    }else{
		    	$data=array_merge($Lib,$Com);
		    }
		   
		    //var_dump($data);exit;
            $this->assign('data',$data);
            $this->display();

}

//点击图书馆和文化馆的数据
public function getselect(){
	$tabname=I('tabname');
	switch ($tabname) {
		case '1':
			$data=D('Admin/Library')->where(array('isdelete'=>0))->select();
			break;

		case '2':
			$data=D('Admin/Comartcenter')->where(array('isdelete'=>0))->select();
			foreach ($data as $key => $value) {
				$data[$key]['name']=$data[$key]['cac_name'];
			}
			break;
		default:
			# code...
			break;
	}
	
	$this->ajaxReturn(array('status'=>0,'msg'=>$data));
}
//点击二级下拉框的接口


public function getimg(){
	$tabname=I('tabname');
	$id=I('id');
	switch ($tabname) {
		case '1':
		    $result=D('Admin/Library')->where(array('id'=>$id))->setField('status',1);
		    //echo D('Admin/Library')->getLastsql();
			$data=D('Admin/Library')->where(array('id'=>$id,'isdelete'=>0,'status'=>1))->find();
			break;

		case '2':
		    $result=D('Admin/Comartcenter')->where(array('id'=>$id))->setField('status',1);
			$data=D('Admin/Comartcenter')->where(array('id'=>$id,'isdelete'=>0,'status'=>1))->find();
			$data['name']=$data['cac_name'];
			
			break;
		default:
			# code...
			break;
	}
      $this->ajaxReturn(array('status'=>0,'msg'=>$data));
}
//点击图片取消显示接口
public function deleteimg(){
	$tabname=I('tabname');
	$id=I('id');
	
	switch ($tabname) {
		case '1':
		    $result=D('Admin/Library')->where(array('id'=>$id))->setField('status',0);
			//$data=D('Admin/Library')->where(array('id'=>$id,'isdelete'=>0,'status'=>1))->find();
			break;

		case '2':
		    $result=D('Admin/Comartcenter')->where(array('id'=>$id))->setField('status',0);
			//$data=D('Admin/Comartcenter')->where(array('id'=>$id,'isdelete'=>0,'status'=>1))->find();
			//$data['name']=$data['cac_name'];
			
			break;
		default:
			# code...
			break;
	}
      $this->ajaxReturn(array('status'=>0,'msg'=>$result));
}


}