<?php

//文化产业
namespace Admin\Controller;

use Common\Controller\AdminBase;
use Admin\Service\User;
use Admin\Model\ArtCategoryModel;

class IndustryController extends AdminBase
{
    protected $Page_Size = 15;
    protected $industry = null;
    private $Category = NULL;

//  private $CategoryService = NULL;
    protected function _initialize()
    {
        parent::_initialize();
        $this->industry = D('Admin/Industry');
        $this->Category = D('Admin/ArtCategory');
        $result = D('Admin/ArtCategory')->getCategory(ArtCategoryModel::TYPE_INDUSTRY);
        $this->assign('result', $result);
         $this->assign('maxPicNum', 5);
        $this->assign('AuditStatus',\Admin\Controller\AuditController::$auditStatus);
    }

    //资源采集->文化产业
    public function index()
    {
         $art_cid = I('get.art_cid',null);
         $parent_cid=I('get.parent_cid',null);
         $auditstatus=I('auditstatus',null);
         if($auditstatus){
           $this->where['auditstatus']=$auditstatus;
         }
       if($parent_cid && $art_cid == 0){
           $art_cid=D('Admin/ArtCategory')->where(array('parent_cid'=>I('parent_cid')))->getField('cid',true);
                $art_cid=implode(',',$art_cid);
                $this->where['art_cid'] = array('in', $art_cid);
       }elseif($art_cid){
            $this->where['art_cid'] = array('in', $art_cid);
       }
        empty(I('com_name')) ? NULL : $this->where['com_name'] = array("like", '%' . I('com_name') . '%');
        $pagenum = I('get.page', '1', '');
        $this->where['isdelete'] = 0;
        $count = $this->industry->where($this->where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = $this->industry->where($this->where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
       // $data=$this->Immaterial->where($this->where)->page($pagenum.','.$this->Page_Size)->select();
        foreach ($data as $key => $value) {
            $parent_cate = M("ArtCategory")->where(array('cid'=>$value['art_cid']))->find();
            $data[$key]['categoryname'] =$parent_cate['name'];
            $data[$key]['parentcategoryname']=M("ArtCategory")->where(array('cid'=>$parent_cate['parent_cid']))->getField('name');
            if($value['auditstatus'] == '40'){
                $data[$key]['reason'] = D('Admin/Audit')->where(['category'=>'Industry','cid'=>$value['id'],'auditstatus'=>40])->order('id_au desc')->limit(1)->getField('reason');
            }
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }

    //添加方法
    public function add()
    {
        if (IS_POST) {
            $data=I('post.');
        //    var_dump($data);exit;
        if($data['acrobatics_picture_url'] !=''){
            $data['acrobatics_picture_url'] = implode(',', $data['acrobatics_picture_url']);
        }else if($data['music_picture_url'] !=''){
            $data['acrobatics_picture_url'] = implode(',', $data['music_picture_url']);
        }else if($data['acrobatics_picture_119_url'] !=''){
            $data['acrobatics_picture_url'] = implode(',', $data['acrobatics_picture_119_url']);
        }else if($data['acrobatics_picture_120_url'] !=''){
            $data['acrobatics_picture_url'] = implode(',', $data['acrobatics_picture_120_url']);
        }
            
        // if(empty($data['acrobatics_picture_url'])){
        //     $this->error("请上传照片");
        // }else{
             
            if (!$this->industry->create($data)) {
                $this->error($this->industry->getError());
            } else {
                $this->industry->add();
                $this->success('添加成功!', U('index'));
            }
        // }
        } else {
            $category = D('Admin/ArtCategory')->getCategory(ArtCategoryModel::TYPE_INDUSTRY);
            $data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $this->assign('category', $category);
            $this->assign('data',$data);
            $this->display();
        }
    }

    //编辑方法
    public function edit()
    {
        $id = I('id');
        
        if (IS_POST) {
             $data=I('post.');
             //var_dump($data);
              if(empty($data['if_resources'])){
                $data['if_resources']=0;
            }else{
                $data['if_resources']=1;
            }
         if($data['acrobatics_picture_url'] !=''){
            $data['acrobatics_picture_url'] = implode(',', $data['acrobatics_picture_url']);
        }else if($data['music_picture_url'] !=''){
            $data['acrobatics_picture_url'] = implode(',', $data['music_picture_url']);
        }else if($data['acrobatics_picture_119_url'] !=''){
            $data['acrobatics_picture_url'] = implode(',', $data['acrobatics_picture_119_url']);
        }else if($data['acrobatics_picture_120_url'] !=''){
            $data['acrobatics_picture_url'] = implode(',', $data['acrobatics_picture_120_url']);
        }
        //var_dump($data);exit;
        // if(empty($data['acrobatics_picture_url'])){
        //     $this->error("请上传照片");
        // }
            if(!D('Admin/Industry')->create($data)){
                $this->error('修改失败!'.D('Admin/Industry')->getError());
            }
            $info = D('Admin/Industry')->where(array('id' => $id))->save();
            

            if ($info) {
                $this->success('修改成功!', U('index'));
            } else {
                $this->error('修改失败!', U('index'));
            }

        } else {
            $data = $this->industry->where(array('id' => $id))->find();
            $data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
            $this->assign('acrobatics_picture_urls', explode(",", $data['acrobatics_picture_url']));
           //var_dump( explode(",", $data['acrobatics_picture_url']));exit;
            // $this->assign('music_picture_url', explode(",", $data['acrobatics_picture_url']));
            // $this->assign('acrobatics_picture_119_url', explode(",", $data['acrobatics_picture_url']));
            //  $this->assign('acrobatics_picture_120_url', explode(",", $data['acrobatics_picture_url']));
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $data['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['art_cid']);
            if($data['auditstatus'] =='40'){
                $data['reason'] = D('Admin/Audit')->where(['category'=>'Industry','cid'=>$id,'auditstatus'=>40])->order('id_au desc')->limit(1)->getField('reason');
            }
            $this->assign('data', $data);
            $this->display();
        }
    }

    //删除方法
    public function del()
    {
        $id = I('get.id', '');
        $this->industry->where(array('id' => $id))->setField('isdelete', '1');
        $this->success('删除成功!');
    }

    //资源检索->文化产业
    public function search()
    {
        $search = I('get.search', '');
        if ($search == "1") {
            $pagenum = I('get.page', '1', '');
            if(!empty(I('start_time')) or !empty(I('end_time'))) {
                $where_start_time = !empty(I('start_time')) ? I('start_time')." 00:00:00": '1900-01-01 00:00:00';
                $where_end_time = !empty(I('end_time')) ? I('end_time')." 23:59:59" : date('Y-m-d 23:59:59', time());
                $this->where['join_date'] = array('between', array($where_start_time, $where_end_time));
            }
            $this->where['isdelete'] = 0;
            $cid = I('art_cid');
            $childCidList = D('Admin/ArtCategory')->getRecursiveChildCidList($cid);
            empty(I('art_cid')) ? NULL : $this->where['art_cid'] = array('in', array_merge(array($cid), $childCidList));
            empty(I('title')) ? NULL : $this->where['title'] = array("like", '%' . I('title') . '%');
             empty(I('level')) ? NULL : $this->where['level'] = array("like", '%' . I('level') . '%');
            empty(I('area')) ? NULL : $this->where['area'] = array('between', D('Admin/Area')->getIDSpan(I('area')));
            empty(I('com_phone')) ? NULL : $this->where['com_phone'] = array("like", '%' . I('com_phone') . '%');
            empty(I('com_name')) ? NULL : $this->where['com_name'] = array("like", '%' . I('com_name') . '%');
           
            if(!empty(I('scale'))){
                if(I('scale') !='all'){
                  $this->where['scale'] = I('scale');
                }

            }
             if(!empty(I('inv_totlemoney'))){
                if(I('inv_totlemoney') !='all'){
                  $this->where['inv_totlemoney'] = I('scale');
                }

            }
            
            $count = $this->industry->where($this->where)->count();
            $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
            $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
            $data['list'] = $this->industry->where($this->where)->page($pagenum . ',' . $this->Page_Size)->order('id')->select();
             foreach ($data['list'] as $key => $value) {
            $parent_cate = M("ArtCategory")->where(array('cid'=>$value['art_cid']))->find();
            $data['list'][$key]['categoryname'] =$parent_cate['name'];
            $data['list'][$key]['parentcategoryname']=M("ArtCategory")->where(array('cid'=>$parent_cate['parent_cid']))->getField('name');
            if($value['auditstatus'] == '40'){
                $data['list'][$key]['reason'] = D('Admin/Audit')->where(['category'=>'Industry','cid'=>$value['id'],'auditstatus'=>40])->order('id_au desc')->limit(1)->getField('reason');
            }
        }
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $pageinfo["page"] = $page->show('sellercenter');
            $pageinfo['count'] = $count;
            $this->assign('data', $data);
            $this->assign('lists',$lists);
            $this->assign('pageinfo', $pageinfo);
            $this->display();
            
        } else {
             $pagenum = I('get.page', '1', '');
        $this->where['isdelete'] = 0;
        $count = $this->industry->where($this->where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data['list'] = $this->industry->where($this->where)->page($pagenum . ',' . $this->Page_Size)->order('id desc')->select();
       // $data=$this->Immaterial->where($this->where)->page($pagenum.','.$this->Page_Size)->select();
        foreach ($data['list'] as $key => $value) {
            $parent_cate = M("ArtCategory")->where(array('cid'=>$value['art_cid']))->find();
            $data['list'][$key]['categoryname'] =$parent_cate['name'];
            $data['list'][$key]['parentcategoryname']=M("ArtCategory")->where(array('cid'=>$parent_cate['parent_cid']))->getField('name');
            if($value['auditstatus'] == '40'){
                $data['list'][$key]['reason'] = D('Admin/Audit')->where(['category'=>'Industry','cid'=>$value['id'],'auditstatus'=>40])->order('id_au desc')->limit(1)->getField('reason');
            }
        }
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $pageinfo["page"] = $page->show('sellercenter');
            $pageinfo['count'] = $count;
            $this->assign('data', $data);
            $this->assign('lists',$lists);
            $this->assign('pageinfo', $pageinfo);
            $this->display();
        }
    }

    public function show()
    {
        $id = I('get.id', '');
        $data = $this->industry->where(array('id' => $id))->find();
        //var_dump($data);exit;
        $data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
        $data['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['art_cid']);
        $this->assign('acrobatics_picture_url', explode(",", $data['acrobatics_picture_url']));
        $this->assign('music_picture_urls', explode(",", $data['acrobatics_picture_url']));
        $this->assign('data', $data);
        $this->display();
    }
}
