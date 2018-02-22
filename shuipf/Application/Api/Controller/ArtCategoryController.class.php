<?php

namespace Api\Controller;

use Common\Controller\ShuipFCMS;

class ArtCategoryController extends ShuipFCMS{
     

        protected $Category=NULL;
       
        protected function _initialize() {
        parent::_initialize();
        $this->Category=M('ArtCategory');
       
    }

	public function childlist(){
         $parent_cid=I('parent_cid');
         $data['parent_item']=$this->Category->where(array('cid' => $parent_cid,'isdelete'=>'0','status'=>'0'))->find();
         if($data['parent_item']['is_parent'] =='1' ){
            $data['list']=$this->Category->where(array('parent_cid' => $parent_cid,'isdelete'=>'0','status'=>'0'))->order('cid')->select();
         }
         
         $this->ajaxReturn(array('msg'=>$data, 'state'=>"success"));
    }


    public function getallchildlist(){
        $cid=I("cid");
        $data['parent_item']=M('Categorymore')->where(array('cid' => $cid,'ismenu'=>'1'))->find();
        foreach($data['parent_item'] as $key=>$value){
            $data['child_list']=M('Categorymore')->where(array('parentid' => $value['cid'],'ismenu'=>'1'))->find();
        }
        foreach( $data['child_list'] as $k=>$v){
            if($v['child']==1){
               $v['arrchildid']=$explode(",",$v['arrchildid']);
               $v['arrchildid']=array_shift($v['arrchildid']);
               foreach($v['arrchildid'] as $a=>$b){
                  $data['child_list'][$k]['grandson_list']=M('Categorymore')->where(array('cid' => $b,'ismenu'=>'1'))->find();

               }
            }

        }
       return $data;
       
    }
}

?>