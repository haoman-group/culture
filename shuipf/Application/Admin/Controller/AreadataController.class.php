<?php

//文化艺术

namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;
class AreadataController extends AdminBase
{
    private $model = null;
    private $areaModel = null;
    private $maxSlidePic = 3;
    protected function _initialize()
    {
        parent::_initialize();
        $this->model = D('Admin/AreaData');
        $this->areaModel = D('Admin/Area');
        $this->assign('maxSlidePic',$this->maxSlidePic);
    }
    public function index()
    {
        $area_id = I('area_id',null);
        if(empty($area_id)){
            //当前用户所在地区
            $admin_area = User::getInstance()->getInfo()['area'];
            $admin_level = $this->areaModel->getUserLevel($admin_area);
            //省管理员
            if($this->areaModel->SHENG() === $admin_level){    
                $areaList = $this->areaModel->getLocalCity();
                array_unshift($areaList,$this->areaModel->getProvince());
            }else if($this->areaModel->SHI() === $admin_level){
                $areaList = $this->areaModel->where(['id'=>$admin_area])->select();
            }else if($this->areaModel->XIAN() === $admin_level){
                $areaList = $this->areaModel->where(['id'=>$admin_area])->select();
            }else{

            }
        }else{
            $areaList = $this->areaModel->getCountyList($area_id);
        }
        // foreach($areaList as $index=>$item){
        //     $areaList[$index]['slide'] = $this->model->field("id",true)->where(['area_id'=>$item['id']])->find();
        // }
        $this->assign('areaList',$areaList);
		$this->display();
    }
    public function edit(){
        if(IS_POST){
            $data=$_POST;
            $data['modules'] = serialize($data['modules']);
            if($this->model->where(['area_id'=>$data['area_id']])->save($data)) {    
                // echo $this->model->getLastsql();
                $this->success('修改成功', U('index'));
            } else {   
                $this->error($this->model->getError());
            }
        }else{
            $area_id = I('area_id',null);
            $modules_list = $this->model->getModules();
            $area = $this->areaModel->where(['id'=>$area_id])->find();
            $data = $this->model->where(['area_id'=>$area_id])->find();
            if(!$data){
                $this->model->add(['area_id'=>$area_id]);
            }else{
                $data['modules'] = unserialize($data['modules']);
            }
            $this->assign(compact('data','area','modules_list'));
            $this->display();
        }
    }
}

?>
