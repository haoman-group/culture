<?php
namespace Phone\Controller;
use Common\Controller\Base;
class ResourceController extends Base {
    protected $area = [];
    protected $Page_size =20;
    protected $CateTables = [
        '1'=>'ReCulture',
        '2'=>['43'=>'Library','44'=>'Comartcenter','346'=>'Theatre'],
        '3'=>'Immaterial',
        '4'=>'Industry',
        '5'=>'PolicyCulture'
    ];
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
    public function lists(){
        $cid = I('get.cid',7);
        if(!$cid){
            $this->error('错误的CID！');
        }
        $this->breadcrumb($cid);
        $cate = $this->categoryModel->getCurrentCategory($cid);
        $data = null;
        $child = null;
        $table = null;
        //判断是否有子集
        if($this->categoryModel->hasChild($cid)){
            //如果有子集则继续显示子集菜单
            $child = $this->categoryModel->where(array('parent_cid' => $cid))->where(array("isdelete" => 0))->select();
        }else{
            //如果没有子集，则根据根节点的类型去不同表获取数据
            $rootCate = $this->categoryModel->getRootCate($cid);
            //获取待显示数据
            $table = $this->CateTables[$rootCate];
            if(is_array($table)){
                $table=$this->CateTables[$rootCate][$cid];
                $data = D('Admin/'.$table)->select();
            }else{
                $data = D('Admin/'.$table)->where(['art_cid'=>$cid,"isdelete" => 0])->limit(100)->select();
            }
        }
        $this->assign('title',$cate['name']);
        $this->assign(compact('cate','child','data','table'));
        $this->display();
    }

    public function detail(){
        $id = I('get.id',null);
        $table = I('get.table',null);
        if($id && $table){
            $data = D('Admin/'.$table)->where(['id'=>$id])->find();
        }
        $this->assign(compact('data'));
        $this->display();
    }
    /**
     * 面包屑导航
     *
     * @return void
     */
    protected function breadcrumb($cid){
        if(!$cid)return false;
        $breadcrumb = [];
        for($i = 0 ;$i<=10 ;$i++){
            $cate = $this->categoryModel->where(['cid'=>$cid])->find();
            if($cate){
                $breadcrumb[$cid] = $cate;
            }else{
                break;
            }
            $cid = $cate['parent_cid'];
        }
        sort($breadcrumb);
        $this->assign('breadcrumb',$breadcrumb);
    }
}