<?php
//直播的接口

namespace Libs\Util;
class Channel {
//APP KEY 

private  $AppKey="2ace0d9af0ebc872297645a620ee4c3d";
private $AppSecret="31a7f73bf867";
private $url="https://vcloud.163.com";
private $RequestType='curl';
//   public function __construct($AppKey,$AppSecret,$RequestType='curl'){
//         $this->AppKey    = $AppKey;
//         $this->AppSecret = $AppSecret;
//         $this->RequestType = $RequestType;
//     }
protected  function random($length=128, $type='string', $convert=0){
    $config = array(
        'number'=>'1234567890',
        'letter'=>'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'string'=>'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789',
        'all'=>'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'
    );
    
    if(!isset($config[$type])) $type = 'string';
    $string = $config[$type];
    
    $code = '';
    $strlen = strlen($string) -1;
    for($i = 0; $i < $length; $i++){
        $code .= $string{mt_rand(0, $strlen)};
    }
    if(!empty($convert)){
        $code = ($convert > 0)? strtoupper($code) : strtolower($code);
    }
    return $code;
   }

   protected function curTime(){
        $time=time();
        return $time;

   }
   protected function  checksum(){
       $time=$this->curtime();
       $AppKey=$this->AppSecret;
       $nonce=$this->random();
       $checksum=hash("SHA1",$AppSecret.$nonce.$time);
       return $checksum;
   }


   protected function request($url,$data){
      $CheckSum= $this->checksum();
        $http_header = array(
            'AppKey:'.$this->AppKey,
            'Nonce:'.$this->Nonce,
            'CurTime:'.$this->CurTime,
            'CheckSum:'.$CheckSum,
            'Content-Type:application/json;charset=utf-8'
        );
      
         $postdata = json_encode($data);    
          
        $ch = curl_init();  
        var_dump($ch);exit;  
        curl_setopt ($ch, CURLOPT_URL, $url);     
        curl_setopt ($ch, CURLOPT_POST, 1);      
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);       
        curl_setopt ($ch, CURLOPT_HEADER, false );      
        curl_setopt ($ch, CURLOPT_HTTPHEADER,$http_header); 
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER,false); //处理http证书问题
        $result = curl_exec($ch);
       
        if (false === $result) {
            $result =  curl_errno($ch);
        }
        curl_close($ch);
        return $this->json_to_array($result) ;
    }
    //创建频道
     public function createUserId($name='',$type="0"){
        $channelurl = 'https://vcloud.163.com/app/channel/create';
        $data= array(
            
            'name'  => $name,
            'type' => $type
           
        );
       
        if($this->RequestType=='curl'){
           
            $result = $this->request($channelurl,$data);
            
        }else{
            
            $result = $this->request($url,$data);
        }
        return $result;
    }

//修改
    public function updateUserID($name,$cid,$type="0"){
         $channelurl = ' https://vcloud.163.com/app/channel/update HTTP/1.1';
         $data= array(
            
            'name'  => $name,
            'type' => $type,
            'cid'=>$cid
           
        );
        if($this->RequestType=='curl'){
            $result = $this->request($url,$data);
        }else{
            $result = $this->request($url,$data);
        }
        return $result;

    }

//删除
    public function deleteUserID($cid){
         $channelurl = ' https://vcloud.163.com/app/channel/update HTTP/1.1';
         $data= array(
            
            'cid'  => $cid
           
           
        );
        if($this->RequestType=='curl'){
            $result = $this->request($url,$data);
        }else{
            $result = $this->request($url,$data);
        }
        return $result;

    }


     public function json_to_array($json_str){
        // version 1.6 code ...
        // if(is_null(json_decode($json_str))){
        //     $json_str = $json_str;
        // }else{
        //     $json_str = json_decode($json_str);
        // }
        // $json_arr=array();
        // //print_r($json_str);
        // foreach($json_str as $k=>$w){
        //     if(is_object($w)){
        //         $json_arr[$k]= $this->json_to_array($w); //判断类型是不是object
        //     }else if(is_array($w)){
        //         $json_arr[$k]= $this->json_to_array($w);
        //     }else{
        //         $json_arr[$k]= $w;
        //     }
        // }
        // return $json_arr;

        if(is_array($json_str) || is_object($json_str)){
            $json_str = $json_str;
        }else if(is_null(json_decode($json_str))){
            $json_str = $json_str;
        }else{
            $json_str =  strval($json_str);
            $json_str = json_decode($json_str,true);
        }
        $json_arr=array();
        foreach($json_str as $k=>$w){
            if(is_object($w)){
                $json_arr[$k]= $this->json_to_array($w); //判断类型是不是object
            }else if(is_array($w)){
                $json_arr[$k]= $this->json_to_array($w);
            }else{
                $json_arr[$k]= $w;
            }
        }
        return $json_arr;
    }
    }
      
   


