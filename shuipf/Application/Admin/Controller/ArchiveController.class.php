<?php

//文化艺术档案馆
//Author :makeup1122

namespace Admin\Controller;
use Admin\Service\User;
use Common\Controller\AdminBase;

class ArchiveController extends AdminBase
{
    private $model = null;
    private $maxPicNum = 5;
    protected $Page_Size=20;
    protected function _initialize()
    {
        parent::_initialize();
        $this->model = D('Admin/Archive');
        $this->assign('maxPicNum',$this->maxPicNum);
        $this->assign("category",$this->model->getCateArray());
         $areaid=User::getInstance()->getInfo()['area'];
        $areaname=D('Admin/Area')->getFullAreaName($areaid);
          $this->assign('areaname', $areaname);
    }
    public function index()
    {
        $pagenum = I('get.page','1','');
		$where['isdelete']=0;
        // if(!User::getInstance()->isAdministrator()){
        //     $where['author_id'] = (int) User::getInstance()->isLogin();
        // }
		$count=$this->model->where($where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data=$this->model->where($where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
		$this->display();
    }
    public function add(){
        if(IS_POST){
            $data = I('post.',null);
            $data['video'] =$data['drama_video'][0];
            $data['content_json'] =$data['drama_video_title'][0];
            $data['area']=User::getInstance()->getInfo()['area'];
            // var_dump($data);
            if($this->model->create($data)){
                $id = $this->model->add();
                if($id){
                    $this->success('插入成功!',U('index'));
                }else{
                    $this->error('插入错误:'.$this->model->getError());
                }
            }else{
                $this->error('数据错误:'.$this->model->getError());
            }
        }else{
            $this->display();
        }
    }
    public function edit(){
        $id = I('request.id',null);
        if($id){
            if(IS_POST){
                $data = I('post.',null);
                $data['video'] =$data['drama_video'][0];
                $data['content_json'] =$data['drama_video_title'][0];
                if($this->model->create($data)){
                    $id = $this->model->save();
                    if($id){
                        $this->success('插入成功!',U('index'));
                    }else{
                        $this->error('插入错误:'.$this->model->getError());
                    }
                }else{
                    $this->error('数据错误:'.$this->model->getError());
                }
            }else{
                $data = $this->model->where(['id'=>$id])->find();
                $data['images'] = unserialize($data['images']);
                $this->assign('data',$data);
                $this->display();
            }
        }else{
            $this->error('为指定内容ID');
        }
    }
    public function delete(){
        $where['id'] = I('id');
        $this->model->where($where)->delete();
        $this->success('删除成功!', U('index'));
    }
}