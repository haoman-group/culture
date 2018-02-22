<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 20/10/2016
 * Time: 17:20
 */

namespace Api\Controller;
use Admin\Service\User;
use Common\Controller\Base;

class AppController extends Base {
    protected $collection_Size = 20;
    protected $comment_Size = 20;
    protected $getInfo_Size = 20;
    protected $art_Size = 20;
    protected $instry_Size = 20;
    protected $Policy_Size = 20;  
    protected $immlists_Size=20;
    protected $ServicesInfo_Size=20; 
       protected function _initialize() {
        parent::_initialize();
        $this->memberDb = D('Member/Member');
         $this->memberConfig = cache("Member_Config");
        $this->memberGroup = cache("Member_group");
        $this->memberModel = cache("Model_Member");

    }

 public function doRegister(){
     $username=I('username');
     $password=I('password');
     //$rvCode=trim(I('post.rvCode'));
     $post=$_POST;
     //var_dump($this->verify($rvCode, 'userregister'));exit;
     //var_dump($post);exit;
          $check=$this->memberDb->checkName($username);
         if(!$check){
            
            $this->ajaxReturn(array('status'=>0,'msg'=>'用户名已经存在'));
         }else{
             $info = $this->memberDb->token(false)->create($post);
             if ($info) {
            //模型选择,如果是关闭模型选择，直接赋值默认模型
            if ((int) $this->memberConfig['choosemodel']) {
                if (!isset($info['modelid']) || empty($info['modelid'])) {
                    $info['modelid'] = (int) $this->memberConfig['defaultmodelid'];
                } else {
                    //检查模型id是否合法
                    if (!isset($this->memberModel[$info['modelid']])) {
                        $info['modelid'] = (int) $this->memberConfig['defaultmodelid'];
                    }
                }
            } else {
                $info['modelid'] = (int) $this->memberConfig['defaultmodelid'];
            }
            //新会员注册需要邮件验证
            if ($this->memberConfig['enablemailcheck']) {
                $info['groupid'] = 7;
                $info['checked'] = 1;
            } else {
                //新会员注册需要管理员审核
                if ($this->memberConfig['registerverify']) {
                    $info['checked'] = 0;
                } else {
                    $info['checked'] = 1;
                }
            }
            // if (empty($info['modelid'])) {
            //     $this->error('请选择会员模型！');
            // }
            $userid = service("Passport")->userRegister($info['username'], $info['password'], $info['email']);
            
            if ($userid > 0) {
                //获取用户信息
                $memberinfo = service("Passport")->getLocalUser((int) $userid);
                $info['username'] = $memberinfo['username'];
                $info['password'] = $memberinfo['password'];
                $info['email'] = $memberinfo['email'];
                //新注册用户积分
                $info['point'] = $this->memberConfig['defualtpoint'] ? $this->memberConfig['defualtpoint'] : 0;
                //新会员注册默认赠送资金
                $info['amount'] = $this->memberConfig['defualtamount'] ? $this->memberConfig['defualtamount'] : 0;
                //如果是邮箱验证，设置会员为未审核状态
                if (!empty($this->memberConfig['enablemailcheck'])) {
                    $info['checked'] = 0;
                    $info['groupid'] = 7;
                } else {
                    //计算用户组
                    $info['groupid'] = $this->memberDb->get_usergroup_bypoint($info['point']);
                }
                if (false !== $this->memberDb->where(array('userid' => $memberinfo['userid']))->save($info)) {
                    if ($this->memberConfig['enablemailcheck']) {
                        //发送邮件
                        $URL_MODEL = C('URL_MODEL');
                        C("URL_MODEL", 0);
                        $verifyEmailUrl = U('Member/Index/verifyemail', array('key' => urlencode(\Libs\Util\Encrypt::authcode($userid . '|' . $memberinfo['username'] . '|' . $memberinfo['email'], '', '', 86400))));
                        C("URL_MODEL", $URL_MODEL);
                        $message = $this->memberConfig['registerverifymessage'];
                        if (empty($message)) {
                            $message = 'Hi，{$username}:

                                                    欢迎您注册成为 ShuipFCMS 用户，您的账号需要邮箱认证，点击下面链接进行认证：

                                                    <a href="{$url}" target="_blank">{$url}</a>

                                                    如果链接无法点击，请完整拷贝到浏览器地址栏里直接访问。

                                                    邮件服务器自动发送邮件请勿回信 {$date}';
                        }
                        $message = str_replace(array(
                            '{$username}',
                            '{$userid}',
                            '{$email}',
                            '{$url}',
                            '{$date}',
                                ), array(
                            $memberinfo['username'],
                            $userid,
                            $memberinfo['email'],
                            $verifyEmailUrl,
                            date('Y-m-d H:i:s'),
                                ), \Input::nl2Br($message));
                        SendMail($info['email'], "注册会员验证邮件", $message);
                        //$this->success("邮件已经发送到你注册邮箱，根据邮件内容完成验证操作！", U('Member/Index/index'));
                        exit;
                    } else {
                        if (!$info['checked']) {
                            //$this->success("会员注册成功，但需要管理员审核通过！", U('Member/Index/index'));
                             $this->ajaxReturn(array('status'=>1,'msg'=>'会员注册成功！'));
                            exit;
                        }
                    }
                    //注册登陆状态
                    service("Passport")->loginLocal($post['username'], $post['password']);
                    //tag 行为
                    tag('action_member_registerend', $memberinfo);
                    //注册成功后，添加模型的数据来源页
                    //$this->addRosource($userid,I('post.source_page'));
                    //$this->success('会员注册成功！',U('Pubservice/index'));
                    $this->ajaxReturn(array('status'=>1,'msg'=>'会员注册成功！','data'=>$info['username']));

                } else {
                    //删除
                    service("Passport")->userDelete($memberinfo['userid']);
                    $this->ajaxReturn(array('status'=>0,'msg'=>'帐号注册失败！'));
                }
            } else {
                //$this->error(service("Passport")->getError()? : '帐号注册失败！');
                 $this->ajaxReturn(array('status'=>0,'msg'=>'帐号注册失败！'));
            }
        } else {
            $this->ajaxReturn(array('status'=>0,'msg'=>'帐号注册失败！'));
        }
             
             
         }
        
     
 }   
    
 public  function checkLogin(){
       
       
        //用户名
        $loginName = I('request.username', null, 'trim');
        //密码
        $password = I('request.password');
        //下次自动登陆
        $cookieTime = I('request.cookieTime', 0, 'intval');
        //验证码
       
        $userid = service('Passport')->loginLocal($loginName, $password, $cookieTime ? 86400 * 180 : 86400);
        if ($userid > 0) {
            $userInfo = service("Passport")->getLocalUser((int) $userid);
            $this->ajaxReturn(array('status'=>1,'msg'=>'登陆成功！','data'=>$userInfo));
        } else {
            //登陆失败
           $this->ajaxReturn(array('status'=>0,'msg'=>'登录失败！'));
        }
        
    
      
       
    } 
    //评论


    public function comment($show_id,$tablename,$publish_content){
        
        
        $data=I('post.');
        //var_dump($data);
        $data['username']=service("Passport")->username;
        $data['userid']=service("Passport")->userid;
        $data['author_id'] = D('Admin/Active')->where(array('id' =>$data['show_id']))->getField('author_id');
          
       
       if(D("Admin/Comment")->create($data)){
         D("Admin/Comment")->add();
    //    $message=D('Admin/Comment')->where(array('show_id'=>$data['show_id'],'isdelete'=>0))->order('id desc')->select();
       
       
          $this->ajaxReturn(array('status'=>0,'msg'=>'成功'));
      
        
       }else{
         $this->ajaxReturn(array('status'=>1,'msg'=>'评论失败！'));
       }
       

    }

    public function commentlists($type){
      
    $userid=service("Passport")->userid;
    $type=I('type');
    $message['comment']=M('Comment')->where(array('userid'=>$userid,'isdelete'=>0))->order('id desc')->select();
   
     foreach ($message['comment'] as $key => $value) {
           switch ($type) {
            case '1'://活动
            if($value['tablename'] == 'active'){
              $data['active'][$key]=$message['comment'][$key];
              $data['active'][$key]['resource']=M('Active')->where(array('id'=>$value['show_id']))->find();
              $data['active'][$key]['resource']['title']=$data['active'][$key]['resource']['content_titile'];
              if(empty($data['active'][$key]['resource']['image'])){
                  $data['active'][$key]['resource']['image']='';
              }
               if(empty($data['active'][$key]['resource']['title'])){
                  $data['active'][$key]['resource']['title']='';
              }
               if(empty($data['active'][$key]['resource']['abstract'])){
                  $data['active'][$key]['resource']['abstract']='';
              }
              }
            
                break;
             case '2'://资源
             if($value['tablename'] == "re_culture"){
              $data['re_culture'][$key]=$message['comment'][$key];
              $data['re_culture'][$key]['resource']=M('ReCulture')->where(array('id'=>$value['show_id']))->find();
              $data['re_culture'][$key]['resource']['image']=explode(",", $data['re_culture'][$key]['image'])[0];
              $data['re_culture'][$key]['resource']['abstract']= $data['re_culture'][$key]['resource']['introduction'];
               if(empty($data['re_culture'][$key]['resource']['image'])){
                  $data['re_culture'][$key]['resource']['image']='';
              }
               if(empty($data['re_culture'][$key]['resource']['title'])){
                  $data['re_culture'][$key]['resource']['title']='';
              }
               if(empty($data['re_culture'][$key]['resource']['abstract'])){
                  $data['re_culture'][$key]['resource']['abstract']='';
              }
             }
             if($value['tablename'] == "library"){
             $data['library'][$key]=$message['comment'][$key];
             $data['library'][$key]['resource']=M('Library')->where(array('id'=>$value['show_id']))->find();
             $data['library'][$key][$key]['resource']['image']= $data['library'][$key]['image'];
             $data['library'][$key][$key]['resource']['title']= $data['library'][$key]['name'];
              if(empty($data['library'][$key]['resource']['image'])){
                  $data['library'][$key]['resource']['image']='';
              }
               if(empty($data['library'][$key]['resource']['title'])){
                  $data['library'][$key]['resource']['title']='';
              }
               if(empty($data['library'][$key]['resource']['abstract'])){
                  $data['library'][$key]['resource']['abstract']='';
              }
             }
              if($value['tablename'] == "comartcenter"){
              $data['comartcenter'][$key]=$message['comment'][$key];
              $data['comartcenter'][$key]['resource']=M('Comartcenter')->where(array('id'=>$value['show_id']))->find();
              $data['comartcenter'][$key]['resource']['title']=$data['comartcenter'][$key]['resource']['cac_name'];
                if(empty($data['comartcenter'][$key]['resource']['image'])){
                  $data['comartcenter'][$key]['resource']['image']='';
              }
               if(empty($data['comartcenter'][$key]['resource']['title'])){
                  $data['comartcenter'][$key]['resource']['title']='';
              }
               if(empty($data['comartcenter'][$key]['resource']['abstract'])){
                  $data['comartcenter'][$key]['resource']['abstract']='';
              }
              }
               if($value['tablename']=="theatre"){
              $data['theatre'][$key]=$message['comment'][$key];   
              $data['theatre'][$key]['resource']=M('Theatre')->where(array('id'=>$value['show_id']))->find();
              $data['theatre'][$key]['resource']['image']=explode(",",  $data['theatre'][$key]['resource']['drama_picture_url'])[0];
              $data['theatre'][$key]['resource']['abstract']=$data['theatre'][$key]['resource']['publish_content'];
               $data['theatre'][$key]=$message['comment'][$key];
                 if(empty($data['theatre'][$key]['resource']['image'])){
                  $data['theatre'][$key]['resource']['image']='';
              }
               if(empty($data['theatre'][$key]['resource']['title'])){
                  $data['theatre'][$key]['resource']['title']='';
              }
               if(empty($data['theatre'][$key]['resource']['abstract'])){
                  $data['theatre'][$key]['resource']['abstract']='';
              }
               }
                 
          
              if($value['tablename']="immaterial"){
                $data['immaterial'][$key]=$message['comment'][$key]; 
             $data['immaterial'][$key]['resource']=M('Immaterial')->where(array('id'=>$value['show_id']))->find();
             $data['immaterial'][$key]['resource']['image']='';
             $data['immaterial'][$key]['resource']['abstract']=$data['immaterial'][$key]['resource']['content'];
              $data['immaterial'][$key]['resource']['title']=$data['immaterial'][$key]['resource']['re_projectname'];
                  if(empty($data['immaterial'][$key]['resource']['image'])){
                  $data['immaterial'][$key]['resource']['image']='';
              }
               if(empty($data['immaterial'][$key]['resource']['title'])){
                  $data['immaterial'][$key]['resource']['title']='';
              }
               if(empty($data['immaterial'][$key]['resource']['abstract'])){
                  $data['immaterial'][$key]['resource']['abstract']='';
              }
              }
             if($value['tablename']=="industry"){
                  $data['industry'][$key]=$message['comment'][$key];    
              $data['industry'][$key]['resource']=M('Industry')->where(array('id'=>$value['show_id']))->find();
              $data['industry'][$key]['resource']['image']=explode(",", $data['industry'][$key]['resource']['acrobatics_picture_url'])[0];
              $data['industry'][$key]['resource']['abstract']=$data['industry'][$key]['resource']['intro'];
                  if(empty($data['industry'][$key]['resource']['image'])){
                  $data['industry'][$key]['resource']['image']='';
              }
               if(empty($data['industry'][$key]['resource']['title'])){
                  $data['industry'][$key]['resource']['title']='';
              }
               if(empty($data['industry'][$key]['resource']['abstract'])){
                  $data['industry'][$key]['resource']['abstract']='';
              }
             }
              if($value['tablename']=="policy_culture"){
            $data['policy_culture'][$key]=$message['comment'][$key];   
            $data['policy_culture'][$key]['resource']=M('PolicyCulture')->where(array('id'=>$value['show_id']))->find();
            $data['policy_culture'][$key]['resource']['image']='';
            $data['policy_culture'][$key]['resource']['abstract']=$data['policy_culture'][$key]['resource']['publish_content'];
            $data['policy_culture'][$key]['resource']['title']=$data['policy_culture'][$key]['resource']['publish_name']; 
                  if(empty($data['policy_culture'][$key]['resource']['image'])){
                  $data['policy_culture'][$key]['resource']['image']='';
              }
               if(empty($data['policy_culture'][$key]['resource']['title'])){
                  $data['policy_culture'][$key]['resource']['title']='';
              }
               if(empty($data['policy_culture'][$key]['resource']['abstract'])){
                  $data['policy_culture'][$key]['resource']['abstract']='';
              }
              }
              
                 case '3'://志愿者招募
                 if($value['tablename']=="volunteer_recruit"){
                     $data['volunteer_recruit'][$key]=$message['comment'][$key];   
               $data['volunteer_recruit'][$key]['resource']=M('VolunteerRecruit')->where(array('id'=>$value['show_id']))->find();
                $data['volunteer_recruit'][$key]['resource']['image']=unserialize($data['volunteer_recruit'][$key]['resource']['pic'])[0];
              $data['volunteer_recruit'][$key]['resource']['abstract']=$data['volunteer_recruit'][$key]['resource']['intro'];
                 if(empty($data['volunteer_recruit'][$key]['resource']['image'])){
                  $data['volunteer_recruit'][$key]['resource']['image']='';
              }
               if(empty($data['volunteer_recruit'][$key]['resource']['title'])){
                  $data['volunteer_recruit'][$key]['resource']['title']='';
              }
               if(empty($data['volunteer_recruit'][$key]['resource']['abstract'])){
                  $data['volunteer_recruit'][$key]['resource']['abstract']='';
              }
                 }
                 if($value['tablename']=="volunteer_train"){
                  $data['volunteer_train'][$key]=$message['comment'][$key]; 
                  $data['volunteer_train'][$key]['resource']=M('VolunteerTrain')->where(array('id'=>$value['show_id']))->find();
                   $data['volunteer_train'][$key]['resource']['image']=unserialize($data['volunteer_train'][$key]['resource']['pic'])[0];
                  $data['volunteer_train'][$key]['resource']['abstract']=$data['volunteer_train'][$key]['resource']['content']; 
                   if(empty($data['volunteer_train'][$key]['resource']['image'])){
                  $data['volunteer_train'][$key]['resource']['image']='';
              }
               if(empty($data['volunteer_train'][$key]['resource']['title'])){
                  $data['volunteer_train'][$key]['resource']['title']='';
              }
               if(empty($data['volunteer_train'][$key]['resource']['abstract'])){
                  $data['volunteer_train'][$key]['resource']['abstract']='';
              }
                 }
               
                break; 
                 case '4'://公共文化设施
                 if($value['tablename']=="base_services"){
              $data['base_services'][$key]=$message['comment'][$key];    
              $data['base_services'][$key]['resource']=M('BaseServices')->where(array('id'=>$value['show_id']))->find();
               $data['base_services'][$key]['resource']['image']= $data['base_services'][$key]['resource']['cover'];
              $data['base_services'][$key]['resource']['abstract']='';
              $data['base_services'][$key]['resource']['title']=$data['base_services'][$key]['resource']['project_title']; 
                 if(empty($data['base_services'][$key]['resource']['image'])){
                  $data['base_services'][$key]['resource']['image']='';
              }
               if(empty($data['base_services'][$key]['resource']['title'])){
                  $data['base_services'][$key]['resource']['title']='';
              }
               if(empty($data['base_services'][$key]['resource']['abstract'])){
                  $data['base_services'][$key]['resource']['abstract']='';
              }
                 }
              
                break;         
            default:
                # code...
                break;
        }
     }
    
         $this->ajaxReturn(array('status'=>0,'msg'=>'成功！','data'=>$data));

    }

//我的收藏

public function collection($show_id,$tablename){
    $data=I('post.');
    $data['username']=service("Passport")->username;
    $data['userid']=service("Passport")->userid;
    $data['addtime']=time();
    $result=M('Collection')->add($data);
    if($result){
     $this->ajaxReturn(array('status'=>0,'msg'=>'收藏成功！'));
    }else{
        $this->ajaxReturn(array('status'=>1,'msg'=>'收藏失败！')); 
    }

}
public function collectionlists($type){
      $userid=service("Passport")->userid;;
    $type=I('type');
    $message['collection']=M('Collection')->where(array('userid'=>$userid,'isdelete'=>0))->order('id desc')->select();
    foreach ($message['collection'] as $key => $value) {
     switch ($type) {
    case '1'://活动
     if($value['tablename'] == 'active'){
     $data['active'][$key]=$message['comment'][$key];
     $data['active'][$key]['resource']=M('Active')->where(array('id'=>$value['show_id']))->find();
              $data['active'][$key]['resource']['title']=$data['active'][$key]['resource']['content_titile'];
              if(empty($data['active'][$key]['resource']['image'])){
                  $data['active'][$key]['resource']['image']='';
              }
               if(empty($data['active'][$key]['resource']['title'])){
                  $data['active'][$key]['resource']['title']='';
              }
               if(empty($data['active'][$key]['resource']['abstract'])){
                  $data['active'][$key]['resource']['abstract']='';
              }
              }
            
                break;
             case '2'://资源
             if($value['tablename'] == "re_culture"){
              $data['re_culture'][$key]=$message['comment'][$key];
              $data['re_culture'][$key]['resource']=M('ReCulture')->where(array('id'=>$value['show_id']))->find();
              $data['re_culture'][$key]['resource']['image']=explode(",", $data['re_culture'][$key]['image'])[0];
              $data['re_culture'][$key]['resource']['abstract']= $data['re_culture'][$key]['resource']['introduction'];
               if(empty($data['re_culture'][$key]['resource']['image'])){
                  $data['re_culture'][$key]['resource']['image']='';
              }
               if(empty($data['re_culture'][$key]['resource']['title'])){
                  $data['re_culture'][$key]['resource']['title']='';
              }
               if(empty($data['re_culture'][$key]['resource']['abstract'])){
                  $data['re_culture'][$key]['resource']['abstract']='';
              }
             }
             if($value['tablename'] == "library"){
             $data['library'][$key]=$message['comment'][$key];
             $data['library'][$key]['resource']=M('Library')->where(array('id'=>$value['show_id']))->find();
             $data['library'][$key][$key]['resource']['image']= $data['library'][$key]['image'];
             $data['library'][$key][$key]['resource']['title']= $data['library'][$key]['name'];
              if(empty($data['library'][$key]['resource']['image'])){
                  $data['library'][$key]['resource']['image']='';
              }
               if(empty($data['library'][$key]['resource']['title'])){
                  $data['library'][$key]['resource']['title']='';
              }
               if(empty($data['library'][$key]['resource']['abstract'])){
                  $data['library'][$key]['resource']['abstract']='';
              }
             }
              if($value['tablename'] == "comartcenter"){
              $data['comartcenter'][$key]=$message['comment'][$key];
              $data['comartcenter'][$key]['resource']=M('Comartcenter')->where(array('id'=>$value['show_id']))->find();
              $data['comartcenter'][$key]['resource']['title']=$data['comartcenter'][$key]['resource']['cac_name'];
                if(empty($data['comartcenter'][$key]['resource']['image'])){
                  $data['comartcenter'][$key]['resource']['image']='';
              }
               if(empty($data['comartcenter'][$key]['resource']['title'])){
                  $data['comartcenter'][$key]['resource']['title']='';
              }
               if(empty($data['comartcenter'][$key]['resource']['abstract'])){
                  $data['comartcenter'][$key]['resource']['abstract']='';
              }
              }
               if($value['tablename']=="theatre"){
              $data['theatre'][$key]=$message['comment'][$key];   
              $data['theatre'][$key]['resource']=M('Theatre')->where(array('id'=>$value['show_id']))->find();
              $data['theatre'][$key]['resource']['image']=explode(",",  $data['theatre'][$key]['resource']['drama_picture_url'])[0];
              $data['theatre'][$key]['resource']['abstract']=$data['theatre'][$key]['resource']['publish_content'];
               $data['theatre'][$key]=$message['comment'][$key];
                 if(empty($data['theatre'][$key]['resource']['image'])){
                  $data['theatre'][$key]['resource']['image']='';
              }
               if(empty($data['theatre'][$key]['resource']['title'])){
                  $data['theatre'][$key]['resource']['title']='';
              }
               if(empty($data['theatre'][$key]['resource']['abstract'])){
                  $data['theatre'][$key]['resource']['abstract']='';
              }
               }
                 
          
              if($value['tablename']="immaterial"){
                $data['immaterial'][$key]=$message['comment'][$key]; 
             $data['immaterial'][$key]['resource']=M('Immaterial')->where(array('id'=>$value['show_id']))->find();
             $data['immaterial'][$key]['resource']['image']='';
             $data['immaterial'][$key]['resource']['abstract']=$data['immaterial'][$key]['resource']['content'];
              $data['immaterial'][$key]['resource']['title']=$data['immaterial'][$key]['resource']['re_projectname'];
                  if(empty($data['immaterial'][$key]['resource']['image'])){
                  $data['immaterial'][$key]['resource']['image']='';
              }
               if(empty($data['immaterial'][$key]['resource']['title'])){
                  $data['immaterial'][$key]['resource']['title']='';
              }
               if(empty($data['immaterial'][$key]['resource']['abstract'])){
                  $data['immaterial'][$key]['resource']['abstract']='';
              }
              }
             if($value['tablename']=="industry"){
                  $data['industry'][$key]=$message['comment'][$key];    
              $data['industry'][$key]['resource']=M('Industry')->where(array('id'=>$value['show_id']))->find();
              $data['industry'][$key]['resource']['image']=explode(",", $data['industry'][$key]['resource']['acrobatics_picture_url'])[0];
              $data['industry'][$key]['resource']['abstract']=$data['industry'][$key]['resource']['intro'];
                  if(empty($data['industry'][$key]['resource']['image'])){
                  $data['industry'][$key]['resource']['image']='';
              }
               if(empty($data['industry'][$key]['resource']['title'])){
                  $data['industry'][$key]['resource']['title']='';
              }
               if(empty($data['industry'][$key]['resource']['abstract'])){
                  $data['industry'][$key]['resource']['abstract']='';
              }
             }
              if($value['tablename']=="policy_culture"){
            $data['policy_culture'][$key]=$message['comment'][$key];   
            $data['policy_culture'][$key]['resource']=M('PolicyCulture')->where(array('id'=>$value['show_id']))->find();
            $data['policy_culture'][$key]['resource']['image']='';
            $data['policy_culture'][$key]['resource']['abstract']=$data['policy_culture'][$key]['resource']['publish_content'];
            $data['policy_culture'][$key]['resource']['title']=$data['policy_culture'][$key]['resource']['publish_name']; 
                  if(empty($data['policy_culture'][$key]['resource']['image'])){
                  $data['policy_culture'][$key]['resource']['image']='';
              }
               if(empty($data['policy_culture'][$key]['resource']['title'])){
                  $data['policy_culture'][$key]['resource']['title']='';
              }
               if(empty($data['policy_culture'][$key]['resource']['abstract'])){
                  $data['policy_culture'][$key]['resource']['abstract']='';
              }
              }
              
                 case '3'://志愿者招募
                 if($value['tablename']=="volunteer_recruit"){
                     $data['volunteer_recruit'][$key]=$message['comment'][$key];   
               $data['volunteer_recruit'][$key]['resource']=M('VolunteerRecruit')->where(array('id'=>$value['show_id']))->find();
                $data['volunteer_recruit'][$key]['resource']['image']=unserialize($data['volunteer_recruit'][$key]['resource']['pic'])[0];
              $data['volunteer_recruit'][$key]['resource']['abstract']=$data['volunteer_recruit'][$key]['resource']['intro'];
                 if(empty($data['volunteer_recruit'][$key]['resource']['image'])){
                  $data['volunteer_recruit'][$key]['resource']['image']='';
              }
               if(empty($data['volunteer_recruit'][$key]['resource']['title'])){
                  $data['volunteer_recruit'][$key]['resource']['title']='';
              }
               if(empty($data['volunteer_recruit'][$key]['resource']['abstract'])){
                  $data['volunteer_recruit'][$key]['resource']['abstract']='';
              }
                 }
                 if($value['tablename']=="volunteer_train"){
                  $data['volunteer_train'][$key]=$message['comment'][$key]; 
                  $data['volunteer_train'][$key]['resource']=M('VolunteerTrain')->where(array('id'=>$value['show_id']))->find();
                   $data['volunteer_train'][$key]['resource']['image']=unserialize($data['volunteer_train'][$key]['resource']['pic'])[0];
                  $data['volunteer_train'][$key]['resource']['abstract']=$data['volunteer_train'][$key]['resource']['content']; 
                   if(empty($data['volunteer_train'][$key]['resource']['image'])){
                  $data['volunteer_train'][$key]['resource']['image']='';
              }
               if(empty($data['volunteer_train'][$key]['resource']['title'])){
                  $data['volunteer_train'][$key]['resource']['title']='';
              }
               if(empty($data['volunteer_train'][$key]['resource']['abstract'])){
                  $data['volunteer_train'][$key]['resource']['abstract']='';
              }
                 }
               
                break; 
                 case '4'://公共文化设施
                 if($value['tablename']=="base_services"){
              $data['base_services'][$key]=$message['comment'][$key];    
              $data['base_services'][$key]['resource']=M('BaseServices')->where(array('id'=>$value['show_id']))->find();
               $data['base_services'][$key]['resource']['image']= $data['base_services'][$key]['resource']['cover'];
              $data['base_services'][$key]['resource']['abstract']='';
              $data['base_services'][$key]['resource']['title']=$data['base_services'][$key]['resource']['project_title']; 
                 if(empty($data['base_services'][$key]['resource']['image'])){
                  $data['base_services'][$key]['resource']['image']='';
              }
               if(empty($data['base_services'][$key]['resource']['title'])){
                  $data['base_services'][$key]['resource']['title']='';
              }
               if(empty($data['base_services'][$key]['resource']['abstract'])){
                  $data['base_services'][$key]['resource']['abstract']='';
              }
                 }
              
                break;         
            default:
                # code...
                break;
        }
    }
    // $page['activecount']=count($data['active']);

    // var_dump($page);exit;
    $this->ajaxReturn(array('status'=>0,'msg'=>'成功！','data'=>$data));
}

//意见反馈

 public function feedback(){
     $data=I('post.');
     $data['addtime']=time();
     $data['userid']=service("Passport")->userid;
     $data['image']=implode(",",$data['image']);
     $result=M('Feedback')->add();
     if($result){
          $this->ajaxReturn(array('status'=>0,'msg'=>'反馈成功！'));

     }else{
        $this->ajaxReturn(array('status'=>1,'msg'=>'反馈失败！'));  
     }
 }

 //修改用户名
 public function editname($username){
      $userid=service("Passport")->userid;
      $data['username']=I('request.username', null, 'trim');
      $check=$this->memberDb->where(array('username'=>$data['username']))->count();
      if($check == 0){
          $re=$this->memberDb->where(array('userid'=>$userid))->save($data);
          $this->ajaxReturn(array('status'=>1,'msg'=>'修改成功'));

      }else{
          $this->ajaxReturn(array('status'=>0,'msg'=>'用户名已存在')); 
      }
      
 }
 //修改手机号和地址

 public function editmessage($mobile,$areaid){
     $data=I('post.');
      $userid=service("Passport")->userid;
      $result=D('Admin/Member')->where(array('userid'=>$userid))->save($data);
      if($result){
           $this->ajaxReturn(array('status'=>0,'msg'=>'修改成功')); 
      }else{
          $this->ajaxReturn(array('status'=>1,'msg'=>'修改失败'));
      }
 }


//设置
 public function setting(){
      $userid=service("Passport")->userid;
      $userInfo=D('Admin/Member')->where(array('userid'=>$userid))->find();
      $area=D('Admin/Area')->where(array('span'=>1000000))->select();
      foreach ($area as $key => $value) {
          $area[$key]['city']=D('Admin/Area')->where(array('pid'=>$value['id']))->select();
      }
     $this->ajaxReturn(array('status'=>0,'msg'=>'获取成功','usermessage'=>$userInfo,'area'=>$area)); 
   //var_dump($area[10]);
 }

 public function editimage($userpic){
      $userid=service("Passport")->userid;
      $userpic=I('post.userpic');
      $result=$this->memberDb->where(array('userid'=>$userid))->setField('userpic',$userpic);
      $this->ajaxReturn(array('status'=>1,'msg'=>'修改成功'));


 }

//图片上传
public function uploadimage($userpic)
{
   $userpic=I('post.userpic');
  $img = base64_decode($userpic);
  $path='./d/file/content/'.date("Y",time()).'/'.date("m",time()).'/';
  if(file_exists($path)){
     $a = file_put_contents($path.time().'.jpg', $img);
     $this->ajaxReturn(array('status'=>1,'msg'=>substr($path,1).time().'.jpg'));
  }else{
     mkdir($path, 0777, true);
     $a = file_put_contents($path.time().'.jpg', $img);
     $this->ajaxReturn(array('status'=>1,'msg'=>substr($path,1).time().'.jpg'));
  }
    
    //$this->ajaxReturn(array('status'=>1,'msg'=>$userpic));
  

}

//修改密码

public function editpassword($oldPassword,$password,$password2){
             $username=service("Passport")->username;
             $post = I('post.');
            //旧密码
            $oldPassword = $post['oldPassword'];
            //根据当前密码取得用户资料
            $userInfo = service("Passport")->getLocalUser($this->userid, $oldPassword);
            if (false == $userInfo) {
                 $this->ajaxReturn(array('status'=>1,'msg'=>"旧密码有误"));
            }
            //设置密码
            $password = $post['password'];
            //再次密码确认
            $password2 = $post['password2'];
            if ($password != $password2) {
                 $this->ajaxReturn(array('status'=>1,'msg'=>"两次密码输入不一致！"));
            }
            $edit = service("Passport")->userEdit($username, '', $password, '', 1);
            if ($edit) {
                //注销当前登陆
                //service("Passport")->logoutLocal();
               $this->ajaxReturn(array('status'=>0,'msg'=>"修改成功！"));
            } else {
                 $this->ajaxReturn(array('status'=>0,'msg'=>service("Passport")->getError()? : '密码修改失败！'));
               
            }
        
}

public  function index(){
    $data=array();
    $data['lunbo']=M('AreaData')->where(array('area_id'=>25000000))->getField('pub_slide');//轮播
    $data['lunbo']=array_values(unserialize($data['lunbo']));
    $data['active']=D('Admin/Active')->where(array('art_cid'=>227,'isdelete'=>0))->order('id desc')->limit(3)->select();//文化活动 ->活动
    foreach($data['active'] as $key=>$value){
        $data['active'][$key]['abstract']=strip_tags(str_replace('&nbsp;','',$value['abstract']));

    }
   

    $data['lecture']=D('Admin/Active')->where(array('art_cid'=>223,'isdelete'=>0))->order('id desc')->limit(3)->select();//文化活动 -讲座
    foreach($data['lecture'] as $k =>$v){
       $data['lecture'][$k]['abstract']=strip_tags(str_replace('&nbsp;','',$v['abstract']));; 
    }
    $data['show']=D('Admin/Active')->where(array('art_cid'=>224,'isdelete'=>0))->order('id desc')->limit(3)->select();//文化活动 ->展览
    foreach($data['show'] as $k1 =>$v1){
       $data['show'][$k1]['abstract']=strip_tags(str_replace('&nbsp;','',$v1['abstract'])); 
    }
    $data['art']=D('admin/Archive')->where(array('if_position'=>1))->order('id desc')->limit(4)->select();//艺术档案馆
    foreach($data['art'] as $artk =>$artv){
     $data['art'][$artk]['images']=unserialize($artv['images'])['0'];
     $data['art'][$artk]['addtime']=date("Y-m-d H:i:s",$artv['addtime']);
    }
    //var_dump($data['art']);
    $data['new']=M('Newest')->where(array('isdelete'=>0))->order('id desc')->limit(3)->select();//最新咨询
    foreach($data['new'] as $newk =>$newv){
     $data['new'][$newk]['image']=explode(",",$newv['image'])['0'];
     $data['new'][$newk]['categoryname']=D('Admin/ArtCategory')->where(array('cid'=>$newv['news_id']))->getField('name');
    }
    //var_dump($data['new']);exit;
    $data['recommend']=M('Groom')->order('id desc')->limit(3)->select();//最新推荐
    $data['winchance']=M('Winchance')->where(array('isdelete'=>0,'is_show'=>1))->order('id desc')->limit(3)->select();//产品推荐
     $data['artcategory'] = D('Admin/ArtCategory')->where(['parent_cid'=>'14','isdelete'=>'0','cid'=>['gt',264]])->limit(4)->select();//山西戏曲
    //var_dump($data);exit; 
     $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
   

}
//图片上传接口






//表演类活东的详情页
  public function festivalshow($id){
       $id=I('id');
       $data=M('Festival')->where(array('id'=>$id))->find();
       $data['images']=unserialize($data['images']);
      
      //echo M('Active')->getLastsql();exit;
        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
  }

//   //最新咨询
//     public function newest(){
       
//        $data=M('Newest')->where(array('isdelete'=>0))->limit(3)->select();
//        foreach($data as $key=>$value){
//            $data[$key]['category']=D('Admin/ArtCategory')->where(array('cid'=>$value['news_id']))->getField('name');

//        }
//         $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
//   }


  //文化活动的分类

  public function getCategory(){
      $data=D('Admin/ArtCategory')->where(array('parent_cid'=>220))->select();
       $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
  }


 //获取地址

 public function getArea(){
     $data=D('Admin/Area')->where(array('pid'=>25000000))->select();
     foreach($data as $key =>$value){
         $data[$key]['country']=D('Admin/Area')->where(array('pid'=>$value['id']))->select();

     }
     $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
 } 

 //获取数据

 public function getInfo($pagenum){
    $pagenum = I('get.pagenum', '1', '');
     $art_cid=!empty(I('art_cid'))?I('art_cid'):221;
    $count =M('Active')->where(array('art_cid'=>$art_cid,'isdelete'=>0,'abstract'=>array('neq','')))->count();
    $page = new \Libs\Util\Page($count, $this->getInfo_Size, $pagenum);
    $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
    
     $data=M('Active')->where(array('art_cid'=>$art_cid,'isdelete'=>0,'abstract'=>array('neq','')))->page($pagenum . ',' . $this->getInfo_Size)->select();
      $pageinfo["page"] = $page->show('sellercenter');
    $pageinfo['count'] = $count;
     $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'pageinfo'=>$pageinfo,'pagenum'=>$pagenum));

 }
 //数字文化资源

 public function ResourcesCategory(){
     $data=D('Admin/ArtCategory')->where(array('cid'=>array('in',array(2,3,4,5,6))))->select();
     
     foreach($data as $key=>$value){
         $data[$key]['son']=D('Admin/ArtCategory')->where(array('parent_cid'=>$value['cid'],'isdelete'=>0))->select();

     }
    //var_dump($data);exit;
    //$data['category']=D('Admin/ArtCategory')->where(array('parent_cid'=>220,'isdelete'=>0))->select();
      
     $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
 }
//志愿者

public function VolunteerInfo($type){
    $type=I('type');
    switch ($type) {
        case '1':
            $data=M('VolunteerRecruit')->where($this->where)->select();
            foreach( $data as $key =>$value){
              $data[$key]['content']=$value['intro'];
              $data[$key]['pic']=unserialize($data[$key]['pic'])[0];
            }
            break;
         case '2':
            $data=M('VolunteerTrain')->where($this->where)->select();
            foreach( $data as $key =>$value){
              $data[$key]['pic']=unserialize($data[$key]['pic'])[0];
            }
            break;
        default:
            # code...
            break;
    }
    
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));

}

//文化设施

public function FacilityCategory(){
    $data=D('Admin/ArtCategory')->where(array('parent_cid'=>185))->select();
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
}
//站馆信息

public function StationInfo(){
    $tablename=I('tablename');
    if(empty($tablename)){
        $Comartcenter = D('Admin/Comartcenter')->relation(true)->scope('have_point')->where(array('isdelete'=>0,'auditstatus'=>35))->select();
        //echo D('Admin/Comartcenter')->getLastsql();
                //var_dump($Comartcenter);
                foreach ($Comartcenter as $key => $item) {
                    $Comartcenter[$key]['name'] = $item['cac_name'];
                    $Comartcenter[$key]['addr'] = $item['cac_addr'];
                    $Comartcenter[$key]['tablename'] = 'Comartcenter';
                }
                 $Library = D('Admin/Library')->relation(true)->scope('have_point')->where(array('isdelete'=>0,'auditstatus'=>35))->select();

                 //var_dump($Library);
                foreach ($Library as $key => $value) {
                    $Library[$key]['tablename'] = 'Library';
                }
               
               
                if($Comartcenter=='' && $Library !=''){
                   
                    $data=$Library;
                }elseif($Comartcenter!='' && $Library ==''){
                    $data=$Comartcenter;
                }else{
                    $data=array_merge($Comartcenter,$Library);
                }

    }else{
        if(I('tablename')=='1'){
                $data = D('Admin/Library')->relation(true)->scope('have_point')->where(array('isdelete'=>0,'auditstatus'=>35))->select();
        }else{
            $data = D('Admin/Comartcenter')->relation(true)->scope('have_point')->where(array('isdelete'=>0,'auditstatus'=>35))->select();
        }
    }
        
        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));        

}

//基本服务项目公示
 public function ServicesInfo($pagenum){
     $message['library']=D('Admin/Library')->select();
     $message['comartcenter']=D('Admin/Comartcenter')->select();
     foreach($message['comartcenter'] as $key=>$value){
         $message['comartcenter'][$key]['name']=$value['cac_name'];
     }
     //var_dump($message);exit;
     //$data=M('BaseServices')->where(array('isdelete'=>0))->select();
     $pagenum = I('post.pagenum', '1', '');
    $count =M('BaseServices')->where(array('isdelete'=>0))->count();
    $page = new \Libs\Util\Page($count, $this->ServicesInfo_Size, $pagenum);
    $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
    $data=M('BaseServices')->where(array('isdelete'=>0))->page($pagenum . ',' . $this->ServicesInfo_Size)->order('id desc')->select();
    $pageinfo["page"] = $page->show('sellercenter');
    $pageinfo['count'] = $count;
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'pagenum'=>$pagenum,'pageinfo'=>$pageinfo));     
 }

//  public function Servicesshow($id,$type){
//      $id=I('id');
//      $type=I('type');
//  }
 //数字文化下级页面('艺术')

 public function art($cid){
  $cid=I('cid');
  $data=D('Admin/ArtCategory')->where(array('cid'=>$cid))->find();
  $data['category']=D('Admin/ArtCategory')->where(array('parent_cid'=>$cid,'isdelete'=>0))->select();
  foreach($data['category'] as $key=>$value){
   $data['category'][$key]['son']=D('Admin/ArtCategory')->where(array('parent_cid'=>$value['cid'],'isdelete'=>0))->select();
  }
 
 $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
 }
 //('艺术')的lists页面
public function artlists($cid,$pagenum){
    $cid=I('cid');
    $pagenum = I('post.pagenum', '1', '');
    $count =D('Admin/ReCulture')->where(array('isdelete'=>0,'art_cid'=>$cid,'isdelete'=>0))->count();
    $page = new \Libs\Util\Page($count, $this->art_Size, $pagenum);
    $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
    $data=D('Admin/ReCulture')->where(array('isdelete'=>0,'art_cid'=>$cid,'isdelete'=>0))->page($pagenum . ',' . $this->art_Size)->order('id desc')->select();
     $pageinfo["page"] = $page->show('sellercenter');
    $pageinfo['count'] = $count;
    if(empty($data)){
     $count =D('Admin/ReCulture')->where(array('isdelete'=>0,'drama'=>$cid,'isdelete'=>0))->count();
    $page = new \Libs\Util\Page($count, $this->art_Size, $pagenum);
    $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));  
      $data=D('Admin/ReCulture')->where(array('isdelete'=>0,'drama'=>$cid,'isdelete'=>0))->order('id desc')->select();
     $pageinfo["page"] = $page->show('sellercenter');
     $pageinfo['count'] = $count;
      
    }
    $category=D('Admin/ArtCategory')->where(array('cid'=>$cid))->find();
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$category,'pageinfo'=>$pageinfo,'pagenum'=>$pagenum));
}

public function artshow($id){
     $id=I('id');
      $userid=service("Passport")->userid;
     $data=D('Admin/ReCulture')->where(array('id'=>$id))->find();
     $data['url']="http://www.sx-cc.com/index.php?s=/Resources/show/id/{$id}.html";
     $message=D('Admin/Comment')->where(array('show_id'=>$id,'tablename'=>'re_culture','isdelete'=>0))->order('id desc')->select();
      $result=M('Collection')->where(array('show_id'=>$id,'tablename'=>'re_culture','userid'=>$userid))->find();
    //  $data['abstract']=htmlspecialchars_decode($data['abstract']);
    //  var_dump($data);exit;
    if($result){
      $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>1));
    }else{
     $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>0));
    }
}
//公共文化
public function commlists($cid){
    $cid=I('cid');

    $data=array();
    if($cid == 43){
       
        $data=D('Admin/Library')->where(array('isdelete'=>0,'point_lng'=>array('neq',''),'point_lat'=>array('neq',''),'auditstatus'=>35))->select();
        $category=D('Admin/ArtCategory')->where(array('cid'=>$cid))->find();

    }elseif($cid==44){
       
        $data=M('Comartcenter')->where(array('isdelete'=>0,'point_lng'=>array('neq',''),'point_lat'=>array('neq',''),'auditstatus'=>35))->select();
        foreach( $data as $key=>$value){
            $data[$key]['name']=$value['cac_name'];

        }
        $category=D('Admin/ArtCategory')->where(array('cid'=>$cid))->find();
    }else{
        
            $data=M('Theatre')->select(); 
            foreach( $data as $key=>$value){
            $data[$key]['name']=$value['title'];
            $data[$key]['picture']=explode(",",$value['drama_picture_url']);

        }
        
       $category=D('Admin/ArtCategory')->where(array('cid'=>$cid))->find();
    }
 
   $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$category));
}


//详情页面

public function commshow($id,$cid){
  $id=I('id');
  $cid=I('cid');
  $userid=service("Passport")->userid;
  if($cid == 43){
    $data=D('Admin/Library')->where(array('id'=>$id))->find();
    $data['url']="http://www.sx-cc.com/index.php?s=/Pubservice/Facility/show/id{$id}/tablename/Library.html";
     $data['abstract']=strip_tags(str_replace('&nbsp;','',htmlspecialchars_decode($data['publish_content'])));
    $message=D('Admin/Comment')->where(array('show_id'=>$id,'tablename'=>'Library','isdelete'=>0))->order('id desc')->select();
      $result=M('Collection')->where(array('show_id'=>$id,'tablename'=>'Library','userid'=>$userid))->find();
  }elseif($cid==44){
     $data=M('Comartcenter')->where(array('id'=>$id))->find();
     $data['url']="http://www.sx-cc.com/index.php?s=/Pubservice/Facility/show/id/{$id}/tablename/Comartcenter.html";
     $data['abstract']=strip_tags(str_replace('&nbsp;','',htmlspecialchars_decode($data['publish_content'])));
     $message=D('Admin/Comment')->where(array('show_id'=>$id,'tablename'=>'Comartcenter','isdelete'=>0))->order('id desc')->select();
      $result=M('Collection')->where(array('show_id'=>$id,'tablename'=>'Comartcenter','userid'=>$userid))->find();
  }else{
   $data=M('Theatre')->where(array('id'=>$id))->find();
   $data['url']="http://www.sx-cc.com/index.php?s=/Resources/theatreshow/id/{$id}.html";
    $data['abstract']=strip_tags(str_replace('&nbsp;','',htmlspecialchars_decode($data['publish_content'])));
   $message=D('Admin/Comment')->where(array('show_id'=>$id,'tablename'=>'theatre','isdelete'=>0))->order('id desc')->select();
     $result=M('Collection')->where(array('show_id'=>$id,'tablename'=>'theatre','userid'=>$userid))->find();
  }
  //var_dump($data);exit;
  if($result){
$this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>1));
  }else{
 $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>0));
  }
}

//非遗
public function immcategorylists($cid){
    $cid=I('cid');
    if($cid == 75){
        $data=D('Admin/ArtCategory')->where(array('parent_cid'=>$cid,'isdelete'=>0))->select();
        //$data['代表性传承人']=D('Admin/ArtCategory')->where(array('parent_cid'=>$cid,'isdelete'=>0))->select();

    }else{
        $data=D('Admin/ArtCategory')->where(array('parent_cid'=>$cid,'isdelete'=>0))->select();
    }
    foreach($data as $key=>$value){
        
           $data[$key]['son'][1]=$this->getCategoryinfo($value['cid']);
       

    }
    //var_dump($data[0]['son'][1][0]);exit;
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
}
public function getCategoryinfo($cid){
    $cid=I('cid');
    $data=D('Admin/ArtCategory')->where(array('parent_cid'=>$cid,'isdelete'=>0))->select();
    foreach($data as $key=>$value){
        if($value['is_parent'] ==1){
           $data[$key]['son']=$this->getCategoryinfo($value['cid']);
        }

    }
    return $data;

}

public  function immlists($cid,$re_represen,$pagenum){
   $cid=I('cid');
   $pagenum = I('post.pagenum', '1', '');
   $re_represen=I('re_represen');
   if($re_represen == 0){
    $count =D('Admin/Immaterial')->where(array('art_cid'=>$cid))->count();
    $page = new \Libs\Util\Page($count, $this-> immlists_Size, $pagenum);
    $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
    $data=D('Admin/Immaterial')->where(array('art_cid'=>$cid))->page($pagenum . ',' . $this-> immlists_Size)->select();
  // $data=D('Admin/Immaterial')->where(array('art_cid'=>$cid))->select();
   }else{
    $count =D('Admin/Immaterial')->where(array('art_cid'=>$cid,'re_represen'=>$re_represen))->count();
    $page = new \Libs\Util\Page($count, $this-> immlists_Size, $pagenum);
    $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
    $data=D('Admin/Immaterial')->where(array('art_cid'=>$cid,'re_represen'=>$re_represen))->page($pagenum . ',' . $this-> immlists_Size)->select();   
    //$data=D('Admin/Immaterial')->where(array('art_cid'=>$cid,'re_represen'=>$re_represen))->select();
   }
  $pageinfo["page"] = $page->show('sellercenter');
    $pageinfo['count'] = $count;
  $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'pageinfo'=>$pageinfo,'pagenum'=>$pagenum));
}

public function immshow($id){
  $id=I('id');
  $userid=service("Passport")->userid;
  $data=D('Admin/Immaterial')->where(array('id'=>$id))->find();
  $data['url']="http://www.sx-cc.com/index.php?s=/Resources/immshow/id/{$id}.html";
  $message=D('Admin/Comment')->where(array('show_id'=>$id,'tablename'=>'immaterial','isdelete'=>0))->order('id desc')->select();
 $result=M('Collection')->where(array('show_id'=>$id,'tablename'=>'immaterial','userid'=>$userid))->find();
 if($result){
$this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>1));
 }else{
  $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>0));
 }
}
//文化产业

public function industry($cid){
    $cid=I('cid');
    $data=D('Admin/ArtCategory')->where(array('parent_cid'=>$cid,'isdelete'=>0))->select();
    
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
    
}

public function industrylists($cid,$pagenum){
    $cid=I('cid');
    $pagenum = I('post.pagenum', '1', '');
    $count =D('Admin/Industry')->where(array('art_cid'=>$cid,'isdelete'=>0))->count();
    $page = new \Libs\Util\Page($count, $this->instry_Size, $pagenum);
    $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
    $data=D('Admin/Industry')->where(array('art_cid'=>$cid,'isdelete'=>0))->page($pagenum . ',' . $this->instry_Size)->select();
    $pageinfo["page"] = $page->show('sellercenter');
    $pageinfo['count'] = $count;
     $category=D('Admin/ArtCategory')->where(array('cid'=>$cid))->find();
   $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$category,'pageinfo'=>$pageinfo,'pagenum'=>$pagenum));
    
}

public function industryshow($id){
    $id=I('id');
    $userid=service("Passport")->userid;
  $data=D('Admin/Industry')->where(array('id'=>$id))->find();
  $data['url']="http://www.sx-cc.com/index.php?s=/Resources/industryshow/id/{$id}.html";
  $message=D('Admin/Comment')->where(array('show_id'=>$id,'tablename'=>'industry','isdelete'=>0))->order('id desc')->select();
  
   $result=M('Collection')->where(array('show_id'=>$id,'tablename'=>'industry','userid'=>$userid))->find();
 if($result){
$this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>1));
 }else{
  $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>0));
 }
    
}
//政策
public function Policylists($cid,$pagenum){
      $pagenum = I('post.pagenum', '1');
     // echo $pagenum;exit;
  $cid=I('cid');
  if($cid ==176 ){
    $rand=array(347,348,349,350,351);
  
    $count =M('PolicyCulture')->where(array('art_cid'=>array('in',$rand),'isdelete'=>0))->count();
    $page = new \Libs\Util\Page($count, $this->Policy_Size, $pagenum);
    $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
    $data=M('PolicyCulture')->where(array('art_cid'=>array('in',$rand),'isdelete'=>0))->page($pagenum . ',' . $this->Policy_Size)->select();
  }else{
    
    $count =M('PolicyCulture')->where(array('art_cid'=>$cid,'isdelete'=>0))->count();
    $page = new \Libs\Util\Page($count, $this->Policy_Size, $pagenum);
    $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
     $data=M('PolicyCulture')->where(array('art_cid'=>$cid,'isdelete'=>0))->page($pagenum . ',' . $this->Policy_Size)->select(); 
  }
    $pageinfo["page"] = $page->show('sellercenter');
    $pageinfo['count'] = $count;
   $category=D('Admin/ArtCategory')->where(array('cid'=>$cid))->find();
  $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$category,'pageinfo'=>$pageinfo,'pagenum'=>$pagenum));
}

public function Policyshow($id){
    $id=I('id');
    $userid=service("Passport")->userid;
     $data=M('PolicyCulture')->where(array('id'=>$id,'isdelete'=>0))->find();
     $data['url']="http://www.sx-cc.com/index.php?s=/Resources/policyshow/id/{$id}.html";
     $message=D('Admin/Comment')->where(array('show_id'=>$id,'tablename'=>'policy_culture','isdelete'=>0))->order('id desc')->select();
      $result=M('Collection')->where(array('show_id'=>$id,'tablename'=>'policy_culture','userid'=>$userid))->find();
      if($result){
       $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>1));
      }else{
       $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>0));
      }
     

}

//公共文化活动的二级页面
public function activeshow($id){
    $id=I('id');
    $userid=service("Passport")->userid;
    $data=D('Admin/Active')->where(array('id'=>$id))->find();
    $data['abstract']=strip_tags($data['abstract']);
    $data['abstract']=str_replace('&nbsp;','',$data['abstract']);
    $data['url']="http://www.sx-cc.com/index.php?s=/Active/show/id/{$id}/tablename/active.html";
    $message=D('Admin/Comment')->where(array('show_id'=>$id,'tablename'=>'active','isdelete'=>0))->order('id desc')->select();
     $result=M('Collection')->where(array('show_id'=>$id,'tablename'=>'active','userid'=>$userid))->find();
     if($result){
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>1));
     }else{
      $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>0));
     }
    


}
//基本服务项目公示的二级页面

public function baseserver($id){
    $id=I('id');
    $data=D('Admin/BaseServices')->where(array('id'=>$id))->find();
    $data['content']=M('BaseContent')->where(array('id_project'=>$id))->select();
    
    $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));

}


public function Volunteershow($id,$type){
    $id=I('id');
    $userid=service("Passport")->userid;
    $type=I('type');
    if($type==1){
        $data=M('VolunteerRecruit')->where(array('id'=>$id))->find();
        $data['url']="http://www.sx-cc.com/index.php?s=/Pubservice/Volunteer/show/id/{$id}.html";
        $message=D('Admin/Comment')->where(array('show_id'=>$id,'tablename'=>'volunteer_recruit','isdelete'=>0))->order('id desc')->select();
        $result=M('Collection')->where(array('show_id'=>$id,'tablename'=>'volunteer_recruit','userid'=>$userid))->find();
     
    }else{
       $data=M('VolunteerTrain')->where(array('id'=>$id))->find();
        $data['url']="http://www.sx-cc.com/index.php?s=/Pubservice/Volunteer/show1/id/{$id}.html";   
        $message=D('Admin/Comment')->where(array('show_id'=>$id,'tablename'=>'volunteer_train','isdelete'=>0))->order('id desc')->select();
         $result=M('Collection')->where(array('show_id'=>$id,'tablename'=>'volunteer_train','userid'=>$userid))->find();
    }
     $data['content']=$data['intro'];
      $data['pic']=unserialize($data['pic']);
      ///var_dump($data);
      if($result){
        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>1));
      }else{
   $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$message,'collection'=>0));
      }
}

//最新咨询


public function newestshow($id){
    $id=I('id');
 $data=M('Newest')->where(array('id'=>$id))->find();
 $categoryinfo=array(329,330,331,332,333,334,335,336,337,338,339,340);
 $category=D('Admin/ArtCategory')->where(array('cid'=>array('in',$categoryinfo)))->select();
//  foreach($category as $key=>$value){
//      $category[$key]['message']=M('Newest')->where(array('news_id'=>$value['cid']))->select();

//  }
//var_dump($category);exit;
 $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$category));

}
public function newslist($cid){
    $cid=I('cid');
  $data=D('Admin/ArtCategory')->where(array('cid'=>$cid))->find();
  $news=M('Newest')->where(array('news_id'=>$data['cid'],'isdelete'=>0))->select();
  $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data,'message'=>$news));
}

//艺术档案馆

public function archivelist(){

  $data=D('Admin/Archive')->where(1)->select();
  $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));
}

 public function archiveshow($id){
     $id-I('id');
     $data['message']=D('Admin/Archive')->where(array('id'=>$id))->find();
     $data['message']['images']=unserialize($data['message']['images']);
    
     $data['video']=D('Admin/Archive')->where(array('category'=>'video'))->limit(3)->order('id desc')->select();//专题视频
     if(empty($data['video'])){
        unset($data['video']);
     }else{
       $data['video']=$this->images($data['video']);
     }
     
     $data['quality']=D('Admin/Archive')->where(array('category'=>'quality'))->limit(3)->order('id desc')->select();//精品鉴赏
     if(empty($data['quality'])){
        unset($data['quality']);
     }else{
      $data['quality']=$this->images($data['quality']);
     }
     
     $data['result']=D('Admin/Archive')->where(array('category'=>'result'))->limit(3)->order('id desc')->select();//编研成果
     if(empty($data['result'])){
        unset($data['result']);
     }else{
         $data['result']=$this->images($data['result']);
     }
    
     $data['online']=D('Admin/Archive')->where(array('category'=>'online'))->limit(3)->order('id desc')->select();//网上展览
      $data['online']=$this->images($data['online']);
     if(empty($data['online'])){
        unset($data['online']);
     }else{
          $data['online']=$this->images($data['online']);
     }
    
     $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=> $data));


 }

 //图片处理

 public function  images($data){
      foreach ($data as $key => $value) {
          $data[$key]['images']=unserialize($value['images']);
      }
    return $data;
 } 

}