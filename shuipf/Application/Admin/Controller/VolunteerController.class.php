<?php

// +----------------------------------------------------------------------
// | 公共文化服务平台   文化地标后台页
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Common\Controller\AdminBase;

class VolunteerController extends AdminBase {
    protected $recruit = null;
    protected $train = null;
    protected $volunteer = null;
    protected $Page_Size=20;
    protected function _initialize(){
        parent::_initialize();
        $this->recruit = D('Admin/VolunteerRecruit');
        $this->train = D('Admin/VolunteerTrain');
        $this->volunteer = D('Admin/Volunteer');
        $this->assign('maxPicNum','5');
    }
    public function index(){
        $pagenum = I('get.page','1','');
		$count=$this->volunteer->where($this->where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data=$this->volunteer->where($this->where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
        $this->assign($this->volunteer->getAllArray());
        $this->display();
    }
    public function delete(){
        $this->display();
    }
    public function show(){
        $this->display();
    }
    //招募
    public function recruit(){
        $pagenum = I('get.page','1','');
		$this->where['isdelete']=0;
		$count=$this->recruit->where($this->where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		foreach ($data as $key => $value) {
				$data[$key]['categoryname']=M("ArtCategory")->where(array('cid'=>$value['art_cid']))->getField("name");
			}
		$data=$this->recruit->where($this->where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
		$this->display();
    }
    //添加招募信息
    public function recruit_add(){
        if(IS_POST){
            if($this->recruit->create($_POST)){
                if($this->recruit->add()){
                    $this->success('添加成功',U('recruit'));
                }else{
                    $this->error('添加失败:'.$this->recruit->getError());
                }
            }else{
                $this->error('数据检查失败:'.$this->recruit->getError());
            }
        }
        $this->display();
    }
    //修改招募信息
    public function recruit_edit(){
        if(IS_POST){
            if($this->recruit->create($_POST)){
                if($this->recruit->save()){
                    $this->success('更新成功',U('recruit'));
                }else{
                    $this->error('更新失败:'.$this->recruit->getError());
                }
            }else{
                $this->error('数据检查失败:'.$this->recruit->getError());
            }
        }
        $id = I('get.id',null);
        $data = $this->recruit->where(['id'=>$id])->select();
        $this->assign('data',$data[0]);
        $this->display();
    }
     //删除招募信息
    public function recruit_delete(){
        $id = I('request.id','','');
        if (!$id) {
            $this->error("请指定需要删除的项目！");
        }
        $re = $this->recruit->find($id);
        if(!$re) $this->error("不存在待删除数据");
         if (false == $this->recruit->where(array('id'=>$id))->delete()){
             $this->error('删除失败！');
         }
        $this->success('删除成功！');
    }
    //培训
    public function train(){
        $pagenum = I('get.page','1','');
		$this->where['isdelete']=0;
		$count=$this->train->where($this->where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		foreach ($data as $key => $value) {
			$data[$key]['categoryname']=M("ArtCategory")->where(array('cid'=>$value['art_cid']))->getField("name");
		}
		$data=$this->train->where($this->where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
        $this->assign('type_array', $this->train->getTypeArray());
		$this->display();
    }
    //培训编辑
    public function train_add(){
        if(IS_POST){
            if($this->train->create($_POST)){
                if($this->train->add()){
                    $this->success('添加成功',U('train'));
                }else{
                    $this->error('添加失败:'.$this->train->getError());
                }
            }else{
                $this->error('数据检查失败:'.$this->train->getError());
            }
        }
        $this->assign('type_array', $this->train->getTypeArray());
        $this->display();
    }
    //培训修改
    public function train_edit(){
        if(IS_POST){
            if($this->train->create($_POST)){
                if($this->train->save()){
                    $this->success('更新成功',U('train'));
                }else{
                    $this->error('更新失败:'.$this->train->getError());
                }
            }else{
                $this->error('数据检查失败:'.$this->train->getError());
            }
        }
        $id = I('get.id',null);
        $data = $this->train->where(['id'=>$id])->select();
        $this->assign('data',$data[0]);
        $this->assign('type_array', $this->train->getTypeArray());
        $this->display();
    }
    //培训删除
    public function train_delete(){
        $id = I('request.id','','');
        if (!$id) {
            $this->error("请指定需要删除的项目！");
        }
        $re = $this->train->find($id);
        if(!$re) $this->error("不存在待删除数据");
         if (false == $this->train->where(array('id'=>$id))->delete()){
             $this->error('删除失败！');
         }
        $this->success('删除成功！');
    }
}