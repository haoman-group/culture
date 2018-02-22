<?php
//Access
namespace Admin\Controller;

use Common\Controller\AdminBase;
use Admin\Service\User;
use Admin\Model\AreaModel;
class AccessController extends AdminBase
{

    public function  access(){
          $data=M('Config')->where(array('varname'=>'access_token'))->find();
         $refresh_token=json_decode($data['value'],true)['refresh_token']; 
         $post_data = array ("client_id" =>"85f998e7451b8cd9","grant_type" => "refresh_token","refresh_token"=>$refresh_token);
         $ch = curl_init();
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
          curl_setopt($ch, CURLOPT_URL, "https://api.youku.com/oauth2/token.json");
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, FALSE);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
          $output = curl_exec($ch);
          //var_dump($output);exit;
          $out=json_decode($output,true);
         
         if($data){
        $data['value'] = json_decode($data['value'],true);
        if($out['access_token'] !=  $data['value']['access_token']){
        $result['value']=$output;
        $resu=M('Config')->where(array('varname'=>'access_token'))->save($result); 
           
        }
        }else{
        $data['varname']='access_token';
        $data['groupid']=1;
          $data['value']=$output;
          $resu=M('Config')->add($data); 
           }
           
            curl_close($ch);
          if($output){
             $this->success('操作成功');
          }

  
    
    }
}