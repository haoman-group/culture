<?php

namespace Industry\Controller;
use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
class SupplyController extends IndustryBaseController {
    /**
     * 初始化
     *
     * @return void
     */
    protected function _initialize() {
        parent::_initialize();
        $this->Page_Size = 10;
        $this->model = D('Admin/SupplyDemand');
        //分类
        $this->category = D('Admin/ArtCategory')->scope('normal')->where(['parent_cid'=>120])->getField("cid,name");
        $this->assign('category_array',$this->category);
        //地区
        $this->areaData = D('Admin/Area')->getLocalCity();
        $this->assign('area_array',$this->areaData);
    }
    public function index(){
        $this->redirect('supply');
    }
    //供应商
    public function supply(){  
        if($this->userid){
            $pagenum = I('get.page','1','');
        $where['role']= 'supply';
        $where['style']="supply";

        $name = I('get.name',null);
        if(!empty($name)){
            $where['name'] = ['like',"%".$name."%"];
        }
        $category = I('get.category',null);
        if(!empty($category)){
            $where['category'] = $category;
        }
        $area_id = I('get.area_id',null);
        if(!empty($area_id)){
            $where['area_id'] = $area_id;
        }
		$count = $this->model->where($where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data = $this->model->where($where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
        $this->display();
        }else{
            $this->error("请你先登录",U('Industry/Public/login'));
        }
       
    }
    //需求方
    public function demand(){    
        $pagenum = I('get.page','1','');
        $where['role']= 'demand';
        $where['style']="demand";
        $name = I('get.name',null);
        if(!empty($name)){
            $where['name'] = ['like',"%".$name."%"];
        }
        $category = I('get.category',null);
        if(!empty($category)){
            $where['category'] = $category;
        }
        $area_id = I('get.area_id',null);
        if(!empty($area_id)){
            $where['area_id'] = $area_id;
        }
		$count = $this->model->where($where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data = $this->model->where($where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
        $this->display();
    }
    //添加
    public function add(){
        if(IS_POST){
            $data = I('post.',null);
           //var_dump($config_siteurl);exit;
           
            if($this->model->create($data)){
                $id = $this->model->add();
                if($id){
                    $this->success('添加成功!',U($data['role']));
                }else{
                    $this->error('添加错误:'.$this->model->getError());
                }
            }else{
                $this->error('添加数据错误:'.$this->model->getError());
            }
        }else{
            $this->display();
        }
    }
    public function edit(){
        $id = I('request.id',null);
        if($id){
            if(IS_POST){
                $data = $_POST;
                if($this->model->create($data)){
                    $id = $this->model->save();
                    if($id){
                        $this->success('更新成功!',U('index'));
                    }else{
                        $this->error('更新错误:'.$this->model->getError());
                    }
                }else{
                    $this->error('更新数据错误:'.$this->model->getError());
                }
            }else{
                $data = $this->model->where(['id'=>$id])->find();
                $this->assign('data',$data);
                $this->display();
            }
        }else{
            $this->error('为指定内容ID');
        }
    }
    //下载
    

    public function file(){
    if(IS_GET){
      $this->display();
    }else{
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('doc', 'txt', 'pdf','rtf');// 设置附件上传类型
    $upload->rootPath  = './d/Uploads/'; // 设置附件上传根目录
    $upload->saveName ='time';
    
    $upload->savePath  =     ''; // 设置附件上传（子）目录
    // 上传文件 
    $info=$upload->upload(); 
     $info["filename"]['root']=$upload->rootPath.$info["filename"]["savepath"].$info["filename"]["savename"];
    // var_dump($info);exit;
    $this->ajaxReturn(array('status'=>1,'data'=>$info));  
    }      
    }
   public function down(){
      
      $id=I('id',null);
      if($id){
        $data=M('SupplyDemand')->where(array('id'=>$id))->find();
        $file_url =$data['savepath'];
        $out_filename =$data['filename'];
        //var_dump($file_url);
        //var_dump($out_filename);exit;
        if(!file_exists($file_url)) {
            echo "不存在";
           }else{
           header('Accept-Ranges: bytes');
           header('Accept-Length: ' . filesize( $file_url ));
           header('Content-Transfer-Encoding: binary');
           header('Content-type: application/octet-stream');
           header('Content-Disposition: attachment; filename=' . $out_filename);
           header('Content-Type: application/octet-stream; name=' . $out_filename);
           if(is_file($file_url) && is_readable($file_url)){
                $file = fopen($file_url, "r");
                 echo fread($file, filesize($file_url));
                 fclose($file);
                M('SupplyDemand')->where(array('id'=>$id))->setInc('download',1);
              
      }else{
          $this->error('未指定ID');
      }
         
   
 
    
  }

}
   }
}