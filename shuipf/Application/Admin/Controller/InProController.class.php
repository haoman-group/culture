<?php

namespace Admin\Controller;
use Common\Controller\AdminBase;

class InProController extends AdminBase{
	public $where = [];
	public function _initialize(){
			parent::_initialize();
			$this->model=M('industry_issue');
			$this->where['area'] = ['like','%'.$this->UserArea.'%'];
	}
		//所有记录列表
    public function index(){
		
		$data = D("Content/IndustryIssue")->where($this->where)->select();
//        var_dump($data);die;
        $this->assign('data',$data);
        $this->display();
    }
	//未审核列表
	public function disaudit(){
		$this->where['status'] = 0;
		$data = D("Content/IndustryIssue")->where($this->where)->select();
//        var_dump($data);die;
        $this->assign('data',$data);
        $this->display();
	}
	//未通过审核列表
    public function declarey(){
		$this->where['status'] = 2;
        $data = D("Content/IndustryIssue")->where($this->where)->select();
       //var_dump($data);die;
        $this->assign('data',$data);
        $this->display();
    }
	//通过审核列表
	public function suc(){
		$this->where['status'] = 1;
		$data = D("Content/IndustryIssue")->where($this->where)->select();
//        var_dump($data);die;
        $this->assign('data',$data);
        $this->display();
	}
	//产业项目展示页面
    public function show(){
        $id = I('get.id',0,'intval');

        $data = D('Content/IndustryIssue')->where(array('id'=>$id))->find();
        $data['categoryname'] = M('industry_category')->where(array('id'=>$data['pcategory']))->getField('categoryname');
        // var_dump( $data['categoryname']);
        $data['stagename'] = M('industry_stage')->where(array('sid'=>$data['pstage']))->getField('stagename');
        $area = explode(',', $data['area']);
        $areaarr = array();
        foreach ($area as $k => $v) {
        	$areaarr[] = M('area')->where(array('id'=>$v))->getField('name');
        }
        $data['areaname'] = implode(' ', $areaarr);
        // var_dump($data);
        $this->assign('data',$data);
        $this->display();

    }
    //后台审核
    public function audit(){
        if(IS_AJAX){
            $obj=D("Content/IndustryIssue");
            $data = $obj->where(array('id'=>1))->find();

            if(!$obj->audit()){
                $this->ajaxreturn(array('status'=>0,'message' => $obj->getError()));
            }else{
                $this->ajaxreturn(array('status'=>1,'message' => "完成！"));
            }
        }

    }
	//审核通过
	public function pass(){
		$id=I('get.id');
		$where=array('id'=>$id);
		if(!$id){
			$this->error('请指定审核的项目');
		}
		$re=$this->model->find($id);
		if(!$re){
			$this->error('不存在');
		}
		$re=$this->model->where($where)->setfield('status',1);
		$this->model->where($where)->setfield('update_time',time());
		$re=$this->model->find($id);
//		var_dump($re);die;
		if(!$re['status']==1){
			$this->error('提交失败');
		}
		$this->success('审核成功',U("Admin/InPro/index"));
	}
	//审核不通过
	public function failed(){
		$id=I('get.id');
		$where=array('id'=>$id);
		if(!$id){
			$this->error('请指定审核的项目');
		}
		$re=$this->model->find($id);
		if(!$re){
			$this->error('不存在');
		}
		$re=$this->model->where($where)->setfield('status',2);
		$re=$this->model->find($id);
//		var_dump($re);die;
		if(!$re['status']==2){
			$this->error('提交失败');
		}
		$this->success('提交成功',U("Admin/InPro/declarey"));
	}
	


	public function delete(){
		$id = I('get.id',0,'intval');
		$info = $this->model->where(array('id'=>$id))->find();
		if(!empty($info)){
			if($info['pfinancing'] ==1){
				$this->error('该项目属于金融代理项目,暂不能删除！');
			}else{
				$status = $this->model->where(array('id'=>$id))->delete();
				if(!$status){
					$this->error('操作失败！');
				}else{
					$this->success('删除成功！',U('Admin/InPro/index'));
				}
			}
		}
	}

}
