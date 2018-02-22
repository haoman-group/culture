<?php

// +----------------------------------------------------------------------
// | 群众文艺 控制器
// +----------------------------------------------------------------------
// | 创建时间: 2017-07-28 11:37:01
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;

class MassartController extends AdminBase {
    private $model = NULL;
    protected $Page_Size = 20;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Admin/Massart');
        $this->assign('maxPicNum', 20);
        $this->assign('maxVideoNum', 1);
        $category = $this->model->getCategory();
        $this->assign('category',$category);
    }
    //首页列表
    public function index(){
        $pagenum = I('get.page','1','');
		$count = $this->model->where($where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data = $this->model->where($where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['author_id']))->getField('username');
            $data[$key]['address']=D('Admin/Area')->where(array('id'=>$value['areaid']))->getField('name');
        }
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
		$this->display();
    }
    //新增
    public function add(){
         if(IS_POST){
           $data=$_POST;
          // var_dump($data);
           $data['author_id']=User::getInstance()->getInfo()['id'];
          $data['images']=$data['drama_picture_url'];
           if(empty($data['images'])){
              $this->error("请上传一张封面图片！");
           }
          $data['video']=$data['music_video'][0];
          $data['video_title']=$data['music_video_title'][0];
          //var_dump($data);exit;
           if(empty($data['category'])){
              $this->error("请选择类目");
           }
            if (!D('Admin/Massart')->create($data)) {
                
                $this->error(D('Admin/Massart')->getError());
            } else {
                D('Admin/Massart')->create($data);
               D('Admin/Massart')->add();
                $this->success('添加成功', U('index'));
            }
           

        }else{
           $this->display();
        }
    }
    //修改
    public function edit(){
       $id=I('id');
        if(IS_POST){
           $data=$_POST;
          $data['video']=$data['music_video'][0];
          $data['video_title']=$data['music_video_title'][0];
           $data['images']=$data['drama_picture_url'];
            if(empty($data['category'])){
              $this->error("请选择类目");
           }
            if (!D('Admin/Massart')->create($data)) {
               // echo 123;exit;
                $this->error(D('Admin/Massart')->getError());
            } else {
                D('Admin/Massart')->create($data);
                D('Admin/Massart')->where(array('id'=>$data['id']))->save();
                $this->success('修改成功', U('index'));
            }
           
        }else{

         $data=D('Admin/Massart')->where(array('id'=>$id))->find();
         $data['default_area']=$data['areaid'];
          $this->assign('drama_picture_url',unserialize($data['images']));
         $this->assign('data', $data);
         $this->display();
        }
    }
    //删除
    public function delete(){
        $where['id'] = I('id');
        $this->model->where($where)->delete();
        $this->success('删除成功!', U('index'));
    }

    public function export(){
        $result = $this->model->where(array('isdelete'=>0))->order('id desc')->select();
        foreach ($result as $kr => $vr) {
            $result[$kr]['username']=D('Admin/User')->where(array('id'=>$vr['author_id']))->getField('username');
            switch ($vr['category']) {
                case 'star':
                   $result[$kr]['categoryname']="群星奖";
                    break;
                 case 'worker':
                   $result[$kr]['categoryname']="农民工歌手大赛";
                    break;
                     case 'dance':
                   $result[$kr]['categoryname']="广场舞大赛";
                    break;
                     case 'photography':
                   $result[$kr]['categoryname']="网络摄影大赛";
                    break;
                      case 'custom':
                   $result[$kr]['categoryname']="民俗";
                    break;
                      case 'culture':
                   $result[$kr]['categoryname']="文化惠民";
                    break;
                default:
                    # code...
                    break;
            }
        }
        $column_comment_array = array('标题','副标题','关键词','分类','第几届','点击量','作者');
       
        foreach($result as $k =>$v){
            $data[$k][]=$v['title'];
            $data[$k][]=$v['deputy_title'];
            $data[$k][]=$v['keywords'];
            $data[$k][]=$v['categoryname'];
            $data[$k][]=$v['session'];
            $data[$k][]=$v['hits'];
            $data[$k][]=$v['username'];

        }
        
      
        $Excel_filename=date("Y-m-d H:s:i").'群众文艺'.'.xls';
        $this->ExportToExcel($data,$column_comment_array,$Excel_filename);
    }
}