<?php
/**
 * 文化设施
 */
namespace Phone\Controller;
use Common\Controller\Base;
class ServiceController extends Base {
    protected $area = [];
    protected $Page_size =20;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->assign('title','文化产业服务平台');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(){
        $obj = D("Content/IndustryIssue");
        $data =$obj->where(array('status'=>1))->limit(16)->order('id desc')->select();
        // foreach ($data as $key => $value) {
        // $data[$key]['categoryname']=M('industry_category')->where(array('id'=>$value['pcategory']))->getField('categoryname');
        // }
        //var_dump($data);exit;
        $this->assign(compact('data'));
        $this->display();
    }
    /**
     * 
     */
    public function lists(){
        
    }
    /**
     * 
     */
    public function detail(){
        $id = I('get.id',0);
        $type = I('get.type','library');
        switch($type){
            case 'cac':
                $data = D('Admin/Comartcenter')->where(array('id'=>$id))->find();
                break;
            case 'theatre':
                $data = D('Admin/Theatre')->where(array('id'=>$id))->find();
                break;
            default:
                $data = D('Admin/Library')->where(array('id'=>$id))->find();
                break;
        }
        $this->assign(compact('data'));
        $this->display();
    }
}