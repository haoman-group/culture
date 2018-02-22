<?php
namespace Admin\Model;

use Common\Model\Model;
use Admin\Model\AreaModel;
use Admin\Service\User;
class AuditModel extends Model {
       private $audit=NULL;
       protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('audit_id','getAdminID',1,'callback'),


    );
       protected function _initialize() {
        parent::_initialize();
        $this->audit=M('Audit');
        
    }
     protected function getAdminID(){
        return \Admin\Service\User::getInstance()->id;
    }
    //根据用户ID获取我的驳回数据统计结果
    public function getMyAduitDataCount(){
        $data = array();
        $where['audit_id'] = $this->getAdminID();
        $where['auditstatus'] = array("IN",array('10','20','30','40'));
        //文化艺术
        $where['category'] ='ReCulture';
        $data['ReCulture'] = $this->where($where)->count(); 
        //图书馆
        $where['category'] ='Library';
        $data['Library'] = $this->where($where)->count();
        //文化馆
        $where['category'] ='Comartcenter';
        $data['Comartcenter'] = $this->where($where)->count();
        //非遗
        $where['category'] ='Immaterial';
        $data['Immaterial'] = $this->where($where)->count();
        //文化产业
        $where['category'] ='Industry';
        $data['Industry'] = $this->where($where)->count();
        //文化政策
        $where['category'] ='Policy';
        $data['Policy'] = $this->where($where)->count();
        return $data;
    }
    //根据用户ID获取我的驳回数据
    public function getMyAduitData($type){
        $data = array();
        $where['cu_audit.audit_id'] = $this->getAdminID();
        $where['cu_audit.auditstatus'] = array("IN",array('10','20','30','40'));
        switch($type){
            case 'ReCulture':   $where['cu_audit.category']= 'ReCulture';$data = $this->field('*,cu_audit.auditstatus as ca_status,cu_audit.addtime as ca_addtime')->where($where)->join('cu_user on cu_user.id = cu_audit.audit_id')->join('cu_re_culture on cu_re_culture.id = cu_audit.cid','left')->order('cu_audit.id_au desc')->select();break;
            case 'Library':     $where['cu_audit.category']= 'Library';$data = $this->field('*,cu_audit.auditstatus as ca_status,cu_audit.addtime as ca_addtime')->where($where)->join('cu_user on cu_user.id = cu_audit.audit_id')->join('cu_library on cu_library.id = cu_audit.cid','left')->order('cu_audit.id_au desc')->select();break;
            case 'Comartcenter':$where['cu_audit.category']= 'Comartcenter';$data = $this->field('*,cu_audit.auditstatus as ca_status,cu_audit.addtime as ca_addtime')->where($where)->join('cu_user on cu_user.id = cu_audit.audit_id')->join('cu_comartcenter on cu_comartcenter.id = cu_audit.cid','left')->order('cu_audit.id_au desc')->select();break;$where['category']= '';
            case 'Immaterial':  $where['cu_audit.category']= 'Immaterial';$data = $this->field('*,cu_audit.auditstatus as ca_status,cu_audit.addtime as ca_addtime')->where($where)->join('cu_user on cu_user.id = cu_audit.audit_id')->join('cu_immaterial on cu_immaterial.id = cu_audit.cid','left')->order('cu_audit.id_au desc')->select();break;
            case 'Industry':    $where['cu_audit.category']= 'Industry';$data = $this->field('*,cu_audit.auditstatus as ca_status,cu_audit.addtime as ca_addtime')->where($where)->join('cu_user on cu_user.id = cu_audit.audit_id')->join('cu_industry on cu_industry.id = cu_audit.cid','left')->order('cu_audit.id_au desc')->select();break;
            case 'Policy':      $where['cu_audit.category']= 'Policy';$data = $this->field('*,cu_audit.auditstatus as ca_status,cu_audit.addtime as ca_addtime')->where($where)->join('cu_user on cu_user.id = cu_audit.audit_id')->join('cu_policy_culture on cu_policy_culture.id = cu_audit.cid','left')->order('cu_audit.id_au desc')->select();break;
        }
        // echo $this->getLastSql();
        return $data;
    }


    public function getAuditDataCount1(){
        
        //$audit_id=User::getInstance()->id;
        $data = array();
        $where['audit_id'] = $this->getAdminID();
        $where['auditstatus'] = array("IN",array('10','20','30','40'));
        //文化艺术
        $where['category'] ='ReCulture';
        $data['ReCulture'] = $this->where($where)->select(); 
        //图书馆
        //var_dump($data['ReCulture']);exit;
        $where['category'] ='Library';
        $data['Library'] = $this->where($where)->select();
        //文化馆
        $where['category'] ='Comartcenter';
        $data['Comartcenter'] = $this->where($where)->select();
        //非遗
        $where['category'] ='Immaterial';
        $data['Immaterial'] = $this->where($where)->select();
        //文化产业
        $where['category'] ='Industry';
        $data['Industry'] = $this->where($where)->select();
        //文化政策
        $where['category'] ='Policy';
        $data['Policy'] = $this->where($where)->select();
        foreach ( $data['ReCulture'] as $key => $value) {
            $ReCulture[$key]=D('Admin/ReCulture')->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
            if($ReCulture[$key] == ''){
              unset($data['ReCulture'][$key]);
            }

        }
        
         foreach ( $data['Library'] as $key => $value) {
            $Library[$key]=D('Admin/Library')->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
             if($Library[$key] == ''){
              unset($data['Library'][$key]);
            }
        }
         foreach ( $data['Immaterial'] as $key => $value) {
            $Immaterial[$key]=D('Admin/Immaterial')->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
            if($Immaterial[$key] == ''){
              unset($data['Immaterial'][$key]);
            }
        }
         foreach ( $data['Comartcenter'] as $key => $value) {
            $Comartcenter[$key]=D('Admin/Comartcenter')->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
            if($Comartcenter[$key] == ''){
              unset($data['Comartcenter'][$key]);
            }
        }
         foreach ( $data['Industry'] as $key => $value) {
            $Industry[$key]=D('Admin/Industry')->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
            if($Industry[$key] == ''){
              unset($data['Industry'][$key]);
            }
        }
         foreach ( $data['Policy'] as $key => $value) {
            $Policy[$key]=D('Admin/PolicyCulture')->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
            if($Policy[$key] == ''){
              unset($data['Policy'][$key]);
            }
        }
        
        $data['Immaterialcount']=0;
        $data['Policycount']=0;
        $data['Industrycount']=0;
        $data['Comartcentercount']=0;
        $data['Librarycount']=0;
        $data['ReCulturecount']=0;
        foreach ($ReCulture as $k => $v) {
            
            if(empty($v)){
                //echo 123;exit;
             $data['ReCulturecount']=$data['ReCulturecount']+0;
            }else{
                //echo 456;exit;
              $data['ReCulturecount']=$data['ReCulturecount']+1;  
            }
        }
       
        foreach ($Library as $k => $v) {
            
            if(empty($v)){    
             $data['Librarycount']=$data['Librarycount']+0;
            }else{
              $data['Librarycount']=$data['Librarycount']+1;  
            }
        }
        foreach ($Comartcenter as $k => $v) {
            
            if(empty($v)){
                //echo 123;exit;
             $data['Comartcentercount']=$data['Comartcentercount']+0;
            }else{
                //echo 456;exit;
              $data['Comartcentercount']=$data['Comartcentercount']+1;  
            }
        }
        foreach ($Industry as $k => $v) {
            
            if(empty($v)){
                //echo 123;exit;
             $data['Industrycount']=$data['Industrycount']+0;
            }else{
                //echo 456;exit;
              $data['Industrycount']=$data['Industrycount']+1;  
            }
        }
        foreach ($Policy as $k => $v) {
            
            if(empty($v)){
                
             $data['Policycount']=$data['Policycount']+0;
            }else{
                
              $data['Policycount']=$data['Policycount']+1;  
            }
        }
        foreach ($Immaterial as $k => $v) {
            
            if(empty($v)){
                
             $data['Immaterialcount']=$data['Immaterialcount']+0;
            }else{
                
              $data['Immaterialcount']=$data['Immaterialcount']+1;  
            }
        }
       
        return $data;
     }


     public function getAuditData1($type){
        $data = array();
        $where['cu_audit.audit_id'] = $this->getAdminID();
        $where['cu_audit.auditstatus'] = array("IN",array('10','20','30','40'));
         $area=User::getInstance()->area;
        switch ($type) {
            case 'ReCulture':
                $where['category'] ='ReCulture';
                $data = $this->where($where)->select();
                foreach ($data as $key => $value) {
                   $ReCulture[$key]=D("Admin/ReCulture")->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
                   $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['audit_id']))->getField('username');
                    $data[$key]['areaname']=D('Admin/Area')->where(array('id'=>$area))->getField('name');
                   
                   if($ReCulture[$key]== ''){
                       unset($data[$key]);
                }
                }
                break;
                 case 'Library':
                $where['category'] ='Library';
                $data = $this->where($where)->select();
                 foreach ($data as $key => $value) {
                   $Library[$key]=D("Admin/Library")->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
                   $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['audit_id']))->getField('username');
                   $data[$key]['areaname']=D('Admin/Area')->where(array('id'=>$area))->getField('name');
                   if($Library[$key] == ''){
                       unset($data[$key]);
                }
            }
                break;
                 case 'Comartcenter':
                $where['category'] ='Comartcenter';
                $data = $this->where($where)->select();
                foreach ($data as $key => $value) {
                   $Comartcenter[$key]=D("Admin/Comartcenter")->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
                   $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['audit_id']))->getField('username');
                   $data[$key]['areaname']=D('Admin/Area')->where(array('id'=>$area))->getField('name');
                   if($Comartcenter[$key] == ''){
                       unset($data[$key]);
                }
                }
                break;
                 case 'Immaterial':
                $where['category'] ='Immaterial';
                $data = $this->where($where)->select();
                foreach ($data as $key => $value) {
                   $Immaterial[$key]=D("Admin/Immaterial")->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
                   $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['audit_id']))->getField('username');
                   $data[$key]['areaname']=D('Admin/Area')->where(array('id'=>$area))->getField('name');
                   if($Immaterial[$key]== ''){
                       unset($data[$key]);
                }
                }
                break;
                 case 'Industry':
                $where['category'] ='Industry';
                $data = $this->where($where)->select();
                foreach ($data as $key => $value) {
                   $Industry[$key]=D("Admin/Industry")->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
                   $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['audit_id']))->getField('username');
                   $data[$key]['areaname']=D('Admin/Area')->where(array('id'=>$area))->getField('name');
                   if($Industry[$key] == ''){
                       unset($data[$key]);
                }
                }
                break;
                 case 'Policy':
                $where['category'] ='Policy';
                $data = $this->where($where)->select();
                foreach ($data as $key => $value) {
                   $Policy[$key]=D("Admin/PolicyCulture")->where(array('id'=>$value['cid'],'isdelete'=>0))->find();
                   $data[$key]['username']=D('Admin/User')->where(array('id'=>$value['audit_id']))->getField('username');
                   $data[$key]['areaname']=D('Admin/Area')->where(array('id'=>$area))->getField('name');
                   if($Policy[$key] == ''){
                       unset($data[$key]);
                }
                }
                break;
            
            default:
                # code...
                break;
        }
        //var_dump($data);
        return $data;
     }
     public function getReasonByCid($cid,$category){
        if(empty($cid) || empty($category)){return null;}
        return $this->where(['category'=>$category,'cid'=>$cid,'auditstatus'=>40])->order('id_au desc')->limit(1)->getField('reason');
     }
}
?>