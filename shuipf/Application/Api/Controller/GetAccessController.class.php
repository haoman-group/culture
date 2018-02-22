<?php
namespace Api\Controller;
use Common\Controller\Base;
use Common\Controller\ShuipFCMS;
class GetAccessController extends Base {
public function index(){
    $data=M('Config')->where(array('varname'=>'access_token'))->find();
    $data['value'] = json_decode($data['value'],true);
   if((time() - $data['value']['expires_in']) >5){
       $post_data = array ("client_id" =>"85f998e7451b8cd9","grant_type" => "refresh_token","refresh_token"=>"b8501a424327124ce46b2c880f78333e");
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
       curl_setopt($ch, CURLOPT_URL, "https://api.youku.com/oauth2/token.json");
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, FALSE);
       curl_setopt($ch, CURLOPT_POST, FALSE);
       curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
       $output = curl_exec($ch);
       //var_dump($output);exit;
       curl_close($ch);
       

   }
    
}

}