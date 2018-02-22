<?php
/**
 * 文化设施
 */
namespace Phone\Controller;
use Common\Controller\Base;
class FacilityController extends Base {
    protected $area = [];
    protected $Page_size =20;
    protected function _initialize(){
        parent::_initialize();
        $this->area['id'] = D('Admin/Area')->getProvinceID();
        $this->assign('title','文化设施');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(){
        $type = I('get.type','library');
        $data = null;
        switch($type){
            case 'cac':
                $data = D('Admin/Comartcenter')->where(['isdelete'=>'0','auditstatus'=>35])->select();
                break;
            case 'theatre':
                $data = D('Admin/Theatre')->where(['isdelete'=>'0'])->select();
                foreach($data as $i=>$t){
                    $data[$i]['picture'] = strstr($t['drama_picture_url'],",",true);
                }
                break;
            default:
                $data = D('Admin/Library')->where(['isdelete'=>'0'])->select();
                break;
        }
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