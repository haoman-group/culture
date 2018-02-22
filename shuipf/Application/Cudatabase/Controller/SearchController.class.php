<?php
/**
 * Created by PhpStorm.
 * User: zsun
 * Date: 11/25/16
 * Time: 00:04
 */

namespace Cudatabase\Controller;
require 'vendor/autoload.php';
use Cudatabase\Controller\CuBaseController;
use Elasticsearch\ClientBuilder;
class SearchController extends CuBaseController {
    protected $Page_Size=20;
    protected function _initialize() {
        parent::_initialize();
        //登录类型,取值范围['admin','normal']
        $this->assign('login_type',$this->login_type=="admin"?1:0);
    }

    public function search(){
        $cid=I('get.cid');
        $area_display=I('get.area');
        $where=array();
        $where['isdelete']=0;
        $where['auditstatus']=35;
        $where['art_cid']=$cid;
        if(!empty($area_display)){
             $where['area_display']=array('LIKE','%'.$area_display.'%');
        }
        $this->_prepData($where);
        $this->display();
    }

    public function show(){
        $typename=I('typename');
        $id=I('id');
        $category=D('Admin/ArtCategory')->where(array('name'=>$typename))->find();
       if($category['cid'] == 43 || $category['cid'] ==44 ){
          $categoryinfo=$category;
       }else{

        $categoryinfo=$this->findparentcid($category);
       }
      //var_dump($categoryinfo);exit;
       switch ($categoryinfo['cid']) {
           case '1':
              $data=D('Admin/ReCulture')->where(array('id'=>$id))->find();
            
              //$this->assign('data',$data);
             $this->redirect('Cudatabase/Index/show',array('id'=>$data['id']));
               break;
             case '43':
              $data=D('Admin/Library')->where(array('id'=>$id))->find();
             $this->redirect('Cudatabase/ComArtCenter/libshow',array('id'=>$data['id'],'type'=>1));
               break; 
               case '44':
              $data=D('Admin/Comartcenter')->where(array('id'=>$id))->find();
              $this->redirect('Cudatabase/ComArtCenter/comshow',array('id'=>$data['id'],'type'=>1));
               break; 
               case '3':
              $data=D('Admin/Immaterial')->where(array('id'=>$id))->find();
              $this->redirect('Cudatabase/Immaterial/show',array('id'=>$data['id'],'cid'=>$data['art_cid']));
               break; 
              case '4':
              $data=D('Admin/Industry')->where(array('id'=>$id))->find();
              $this->redirect('Cudatabase/Industry/show',array('id'=>$data['id']));
               break;
               case '5':
              $data=D('Admin/PolicyCulture')->where(array('id'=>$id))->find();
              $this->redirect('Cudatabase/Policy/show',array('id'=>$data['id']));
               break;  
                    
           
           default:
               # code...
               break;
       }
    }


    public function findparentcid($data){
       
        $catid=D('Admin/ArtCategory')->where(array('cid'=>$data['parent_cid']))->find();
        //echo D('Admin/ArtCategory')->getLastsql();
        if($catid['parent_cid'] !=0 && $catid['is_parent'] == 1){
            $catid=$this->findparentcid($catid);

        }
        return $catid;
    }
}