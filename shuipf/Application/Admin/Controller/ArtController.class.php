<?php

//文化艺术

namespace Admin\Controller;
use Admin\Model\ArtCategoryModel;
use Common\Controller\AdminBase;
use Admin\Service\User;

class ArtController extends AdminBase
{
    // private $Category = NULL;
    protected $Page_Size = 20;
    protected $page_size = 20;
    private $Category = NULL;
    private $ReCulture = NULL;

    protected function _initialize()
    {
        parent::_initialize();
        $this->Category = D('Admin/ArtCategory');
        $this->ReCulture = D('Admin/ReCulture');
        $result = D('Admin/ArtCategory')->getCategory(ArtCategoryModel::TYPE_ART);
        $this->assign('result', $result);
        $this->assign('maxPicNum', 5);
        $this->assign('maxVideoNum', 1);
        $this->assign('maxAudioNum', 1);
        $this->assign('AuditStatus', \Admin\Controller\AuditController::$auditStatus);
    }
    //
    private function getCategoryPath($art_cid,$path=null){
        if(!$art_cid){return '';}
        $res = M("ArtCategory")->where(array('cid' => $art_cid))->find();
        $path = empty($path)?$res['name']:($res['name'].'-'.$path);
        if($res['parent_cid'] =='6'){return $path;}
        else{
            return $this->getCategoryPath($res['parent_cid'],$path);
        }
    }
    //资源采集的文化艺术
    public function index()
    {
       // var_dump($_GET);exit;
        $pagenum = I('get.page', '1', '');
        $message=$_GET;
        
        // $where=$this->getwhere($message);
        //var_dump($where);
        $art_cid = I('get.art_cid',null);
        if($art_cid){
            $art_cid_array = D('Admin/ArtCategory')->where(array('parent_cid' => $art_cid))->getField('cid', true);
            $art_cid_array = implode(",", $art_cid_array);
            $this->where['art_cid'] = array('in', $art_cid);
        }
         $auditstatus=I('auditstatus',null);
         if($auditstatus){
           $this->where['auditstatus']=$auditstatus;
         }
         
         $title=I('title',null);
         if($title){
          $where['title']=array("like", '%' .$title . '%');
         }
        $where['isdelete'] = 0;
        //var_dump($where);exit;
        $count = $this->ReCulture->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = $this->ReCulture->where($where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['categoryname'] = $this->getCategoryPath($value['art_cid']);
            if($value['auditstatus'] =='40'){
                $data[$key]['reason'] = D('Admin/Audit')->getReasonByCid($value['id'],'ReCulture');
            }
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('userinfo', $userinfo);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }


    private function _procData()
    {
        $data = I('post.');
        //var_dump($data);exit;
        if ($data['form_cid'] == "7" && $data['drama_picture_url'] != "") {
            $data['image'] = implode(',', $data['drama_picture_url']);
        } else if ($data['form_cid'] == "8" ) {
            if($data['music_picture_url'] != ""){
                $data['image'] = implode(',', $data['music_picture_url']);
            }
        } else if ($data['form_cid'] == "9") {
            if($data['dance_picture_url'] != ""){
                $data['image'] = implode(',', $data['dance_picture_url']);
            }
        } else if ($data['form_cid'] == "10" && $data['art_picture_url'] != "") {
            $data['image'] = implode(',', $data['art_picture_url']);
        } else if ($data['form_cid'] == "11") {
            if($data['folk_picture_url'] != ""){
                $data['image'] = implode(',', $data['folk_picture_url']);
            }
        } else if ($data['form_cid'] == "12" && $data['acrobatics_picture_url'] != "") {
            $data['image'] = implode(',', $data['acrobatics_picture_url']);
        } else if ($data['form_cid'] == "13" && $data['handwriting_picture_url'] != "") {
            $data['image'] = implode(',', $data['handwriting_picture_url']);
        } else {
            $this->error("请选择图片进行上传！");
        }
        if ($data['form_cid'] == "7" && $data['drama_video'] != "") {
            $data['video'] = implode(',', $data['drama_video']);
            $data['video_title'] = implode('|', $data['drama_video_title']);
        } else if ($data['form_cid'] == "8" && $data['music_video'] != "") {
            $data['video'] = implode(',', $data['music_video']);
            $data['video_title'] = implode('|', $data['music_video_title']);
        } else if ($data['form_cid'] == "9" && $data['dance_video'] != "") {
            $data['video'] = implode(',', $data['dance_video']);
            $data['video_title'] = implode('|', $data['dance_video_title']);
        } else if ($data['form_cid'] == "11" && $data['folk_video'] != "") {
            $data['video'] = implode(',', $data['folk_video']);
            $data['video_title'] = implode('|', $data['folk_video_title']);
        } else if ($data['form_cid'] == "7" && $data['acrobatics_video'] != "") {
            $data['video'] = implode(',', $data['acrobatics_video']);
            $data['video_title'] = implode('|', $data['acrobatics_video_title']);
        }
        if ($data['form_cid'] == "9" && $data['dance_audio'] != "") {
            $data['audio'] = implode(',', $data['dance_audio']);
            $data['audio_title'] = implode('|', $data['dance_audio_title']);
        }elseif($data['form_cid'] == "11" && $data['folk_audio'] != ""){
            $data['audio'] = implode(',', $data['folk_audio']);
            $data['audio_title'] = implode('|', $data['folk_audio_title']);
        }elseif($data['form_cid'] == "8" && $data['folk_audio'] != ""){
            $data['audio'] = implode(',', $data['folk_audio']);
            $data['audio_title'] = implode('|', $data['folk_audio_title']);
        }

        return $data;
    }

    //资源采集的文化艺术的添加

    public function add()
    {
        
        if (IS_POST) {
            $a=$_POST;
           
            
            
            $data = $this->_procData($a);
             if(!array_key_exists('drama',$a)){
                $data['drama']="-1";
            }
            
            if (!$this->ReCulture->create($data)) {
                
                $this->error($this->ReCulture->getError());
            } else {
                
                $this->ReCulture->add();
               // echo $this->ReCulture->getLastsql();
                $this->success('添加成功', U('index'));
            }
        } else {
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function delete()
    {
        $where['id'] = I('id');
        $this->ReCulture->where($where)->setField('isdelete', 1);
        $this->success('删除成功!', U('index'));
    }

    public function edit()
    {
        $id = I('id');

        if (IS_POST) {
            $a=$_POST;
           
            $data = $this->_procData($a);
           
            $data['if_position'] = isset($data['if_position'])?$data['if_position']:'0';
            if(empty($a['if_resources'])){
                $data['if_resources']=0;
            }else{
                $data['if_resources']=1;
            }

            $this->ReCulture->create($data);
              //var_dump($data);
            $this->ReCulture->where(array('id' =>$_POST['id']))->save();
             //echo $this->ReCulture->getLastsql();exit;
            $this->success('修改成功!', U('index'));
        } else {
            $data = $this->ReCulture->where(array('id' => $id))->find();
            $data['parent_cid'] = D('Admin/ArtCategory')->where(array('cid' => $data['drama']))->getField('parent_cid');
            $data['categoryname'] = D('Admin/ArtCategory')->where(array('parent_cid' => $data['parent_cid'],'isdelete'=>0))->select();
            $data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
            if($data['auditstatus'] =='40'){
                $data['reason'] = D('Admin/Audit')->getReasonByCid($id,'ReCulture');
            }
            //var_dump($data);exit;
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $drama = D('Admin/ArtCategory')->where(array('parent_cid' => $data['art_cid'],'isdelete'=>0))->select();
            $this->assign('drama', $drama);
            $this->assign('picture_urls', explode(",", $data['image']));
            $this->assign('video_ids', explode(",", $data['video']));
            $this->assign('video_titles', explode("|", $data['video_title']));
            $this->assign('audio_ids', explode(",", $data['audio']));
            $this->assign('audio_titles', explode("|", $data['audio_title']));
            $data['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['art_cid']);
            $this->assign('data', $data);
            $this->display();
        }
    }

    //资源检索的文化艺术
    public function search()
    {
        $search = I('get.search','');
        if ($search ==1) {
            //var_dump(I('get.'));exit;

            $pagenum = I('get.page', '1', '');
            if (!empty(I('start_time')) or !empty(I('end_time'))) {
                $where_start_time = !empty(I('start_time')) ? I('start_time') . " 00:00:00" : '1900-01-01 00:00:00';
                $where_end_time = !empty(I('end_time')) ? I('end_time') . " 23:59:59" : date('Y-m-d 23:59:59', time());
                $this->where['addtime'] = array('between', array($where_start_time, $where_end_time));
            }
            $this->where['isdelete'] = 0;
            $cid = I('art_cid');
            if (empty(I('art_cid'))) {
                $art_cid = D('Admin/ArtCategory')->where(array('parent_cid' => I('parent_cid')))->getField('cid', true);
                $art_cid = implode(",", $art_cid);
                $this->where['art_cid'] = array('in', $art_cid);
            } else {
                $this->where['art_cid'] = I('art_cid');
            }

            I('drama') == -1 ? NULL : $this->where['drama'] = I('drama');
            empty(I('unit')) ? NULL : $this->where['unit'] = array("like", '%' . I('unit') . '%');
            empty(I('artist')) ? NULL : $this->where['artist'] = array("like", '%' . I('artist') . '%');
            empty(I('agency')) ? NULL : $this->where['agency'] = array("like", '%' . I('agency') . '%');
            empty(I('area')) ? NULL : $this->where['area'] = array('between', D('Admin/Area')->getIDSpan(I('area')));
            empty(I('troupe')) ? NULL : $this->where['troupe'] = array("like", '%' . I('troupe') . '%');
            empty(I('awards')) ? NULL : $this->where['awards'] = array("like", '%' . I('awards') . '%');
            empty(I('example')) ? NULL : $this->where['example'] = array("like", '%' . I('example') . '%');
            empty(I('band')) ? NULL : $this->where['band'] = array("like", '%' . I('band') . '%');
            empty(I('figures')) ? NULL : $this->where['figures'] = array("like", '%' . I('figures') . '%');
            empty(I('performer')) ? NULL : $this->where['performer'] = array("like", '%' . I('performer') . '%');
            //var_dump($this->where);
            $count = $this->ReCulture->where($this->where)->count();
            $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
            $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));

            $data['list'] = $this->ReCulture->where($this->where)->page($pagenum . ',' . $this->page_size)->order('updatetime desc')->select();
            //echo $this->ReCulture->getLastsql();exit;
            foreach ($data['list'] as $key => $value) {
                $data['list'][$key]['categoryname'] = M("ArtCategory")->where(array('cid' => $value['art_cid']))->getField('name');
                $data['list'][$key]['parent_artcid'] = D('Admin/ArtCategory')->getparent($value['art_cid']);
                 $data['list'][$key]['dramaname'] = M("ArtCategory")->where(array('cid' => $value['drama']))->getField("name");
            }
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $pageinfo["page"] = $page->show('sellercenter');
            $pageinfo['count'] = $count;
            $data['pageinfo'] = $pageinfo;
            //var_dump($data['list']);exit;
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $pageinfo["page"] = $page->show('sellercenter');
            $pageinfo['count'] = $count;
            $this->assign('data', $data);
            //$this->assign('list', $list);
            $this->assign('pageinfo', $pageinfo);
            $this->display();
        } else {
            $pagenum = I('get.page', '1', '');
            $this->where['isdelete'] = 0;
            $this->where['area'] = array('between', D('Admin/Area')->getIDSpan(User::getInstance()->getInfo()['area']));
            //$this->where['art_cid'] = 14;
            $count = $this->ReCulture->where($this->where)->count();
           // echo $count;
            $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
            $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
            $data=array();
            $data['list'] = $this->ReCulture->where($this->where)->page($pagenum . ',' . $this->page_size)->order('updatetime desc')->select();
            //echo $this->ReCulture->getLastsql();exit;
            foreach ($data['list'] as $key => $value) {
                $data['list'][$key]['categoryname'] = M("ArtCategory")->where(array('cid' => $value['art_cid']))->getField("name");
                $data['list'][$key]['dramaname'] = M("ArtCategory")->where(array('cid' => $value['drama']))->getField("name");
                $data['list'][$key]['parent_artcid'] = D('Admin/ArtCategory')->getparent($value['art_cid']);
            }
            //var_dump($data);exit;
            //$list = $data;
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $pageinfo["page"] = $page->show('sellercenter');
            $pageinfo['count'] = $count;
            $this->assign('data', $data);
            //$this->assign('list', $list);
            $this->assign('pageinfo', $pageinfo);
            $this->display();
        }
    }

    public function show()
    {
        $id = I('id', '');
        $data = $this->ReCulture->where(array('id' => $id))->select();
        $data[0]['categoryname'] = D('Admin/ArtCategory')->where(array('cid' => $data['0']['drama']))->find();
        $this->assign('picture_urls', explode(",", $data[0]['image']));
        $this->assign('data', $data[0]);
        $this->display();
    }

    public function audioUpload()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 20 * 1024 * 1024;// 设置附件上传大小
        $upload->exts = array('mp3', 'wma', 'ova');// 设置附件上传类型
        $upload->rootPath = '.'; // 设置附件上传根目录
        $upload->savePath = '/d/file/audio/'; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->ajaxReturn(array('status'=>0,'msg'=>'上传失败！','data'=>$upload->getError()));
        } else {// 上传成功
            $this->ajaxReturn(array('status'=>1,'msg'=>'上传成功！','data'=>$info));
        }
    }

    public function import(){
        

        $this->display();
    }

    public function importapi(){
        $this->display();
    }

    public function tel(){
        $this->display();
    }
    public function voice(){
        $this->display();
    }
    public function web(){
        $this->display();
    }

    public function multi(){
        $id_array = I('request.if_position');
        $this->ReCulture->where(['id'=>['in',implode(",", $id_array)]])->setField('if_position','1');
        $this->redirect('index');
    }
     public function  getwhere($where){
        
         unset($where['g']);
         $message=$where;;
         $data=array();
          foreach($message as $key =>$value){
               
              if($value){
                  $data[$key]=$value;

              }
             

          } 
          // var_dump($data);exit;
              return $data;

       } 
}
      
?>
