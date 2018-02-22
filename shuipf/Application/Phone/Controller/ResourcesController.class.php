<?php
namespace Phone\Controller;
use Common\Controller\Base;
class ResourcesController extends Base {
    
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->categoryModel = D('Admin/ArtCategory');
        $category = [];
        //艺术门类
        $category[6] = $this->categoryModel->cache(true)->where(array('isdelete'=>'0','parent_cid'=>6))->select();
        //公共文化
        $category[2] = $this->categoryModel->cache(true)->where(array('isdelete'=>'0','parent_cid'=>2))->select();
        //非遗
        $category[3] = $this->categoryModel->cache(true)->where(array('isdelete'=>'0','parent_cid'=>3))->select();
        //文化产业
        $category[4] = $this->categoryModel->cache(true)->where(array('isdelete'=>'0','parent_cid'=>4))->select();
        //文化政策
        $category[5] = $this->categoryModel->cache(true)->where(array('isdelete'=>'0','parent_cid'=>5))->select();
        $this->assign('artcategory',$category);
        $this->assign('title','资源展馆');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(){
        $this->display();
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    

  public function industryshow(){
        $id = I('get.id');
        $data = D('Admin/Industry')->scope('normal')->where(['id'=>$id])->find();
       if($data['acrobatics_picture_url']){
         $data['acrobatics_picture_url'] =explode(',',$data['acrobatics_picture_url']);
       }  
        $this->assign("breadcrumb",$this->_Get_breadcrumb($data['art_cid']));
        $this->assign("data",$data);
        $this->display();
  }
}