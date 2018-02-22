<?php

namespace Industrymem\Controller;

// use Common\Controller\Base;

class AccountDatumController extends MemberBase{

	protected function _initialize() {
        parent::_initialize();
        $this->member = D('Member/member');
    }

    public function index(){
        $userid = $this->uid;
        $userInfo = service("Passport")->getLocalUser((int) $userid);
        // var_dump($userInfo);
        $this->assign('userInfo',$userInfo);
        if($userInfo['type'] == "1"){
          $this->display();  
        }else{
            $this->display('company_info');
        } 
        
    }
//修改个人资料

    public function editdatum(){
        if(IS_POST){
            $data = I('post.');
            // var_dump($data);die;
            if(isset($data['mobile'])){
                if (empty($data['mobile'])) {
                    $this->error('手机号不能为空！');
                }
                if(!checkMobile($data['mobile'])){
                    $this->error('手机号不正确');
                }
            }
            if(isset($data['email'])){
                if(!checkEmail($post['email'])){
                    $this->error('邮箱不正确');
                }
            }
            if(isset($data['licence'])){
               $data['userpic'] = $data['licence'];
            }
            // var_dump($a);die;
            $info = $this->member->where(array('userid'=>$this->uid))->save($data);
            if(!$info){
                //更新失败
                $this->error('编辑失败！');
            }else{
                $this->success('更新成功！',U('Industrymem/AccountDatum/index'));
            }
        }
    }
    /*
     * 修改公司账户的信息
     */
    public function company_edit(){
        if(IS_POST){
            $data = I('post.');
            // var_dump($data);die;
            if(isset($data['mobile'])){
                if (empty($data['mobile'])) {
                    $this->error('手机号不能为空！');
                }
                if(!checkMobile($data['mobile'])){
                    $this->error('手机号不正确');
                }
            }
            if(isset($data['email'])){
                if(!checkEmail($post['email'])){
                    $this->error('邮箱不正确');
                }
            }
            if(isset($data['legal_person'])){
                if(!empty($data['legal_person'])){
                    $this->error('请填写法人');
                }
            }
            if(isset($data['business_license'])){
                if(!empty($data['business_license'])){
                    $this->error('请填写营业执照号');
                }
            }
            if(isset($data['business_address'])){
                if(!empty($data['business_address'])){
                    $this->error('请填写公司地址');
                }
            }
            if(isset($data['registration_type'])){
                if(!empty($data['registration_type'])){
                    $this->error('请填写公司注册类型');
                }
            }
            if(isset($data['registration_type'])){
                if(!empty($data['registration_type'])){
                    $this->error('请填写公司经营类型');
                }
            }
            
            $info = $this->member->where(array('userid'=>$this->uid))->save($data);
            if(!$info){
                //更新失败
                $this->error('编辑失败！');
            }else{
                $this->success('更新成功！',U('Industrymem/AccountDatum/index'));
            }
        }
    }
    //修改密码
    public function modify(){
    	$this->display();
    }
    public function editPwd(){
    	if(IS_POST){
    		$username = I('post.username',null, 'trim');
    		$oldpwd = I('post.oldpwd');
    		$newpwd = I('post.newpwd');
    		$cpwd = I('post.cpwd');
    		$uid = $this->uid;
    		$userid = service("Passport")->loginLocal($username, $oldpwd, $cookieTime ? 86400 * 180 : 86400);
    		if($uid != $userid){
    			$this->message(20023, array(), 'error');
    		}
    		if($newpwd != $cpwd){
    			$this->message(20021, array(), 'error');
    		}
    		$info = $this->member->ChangePassword($uid, $newpwd);
    		if(!$info){
    			$this->message(20023, array(), 'error');
    		}else{
    			service("Passport")->logoutLocal();
		        session("connect_openid", NULL);
		        session("connect_app", NULL);
		        //注销在线状态
		        D('Member/Online')->onlineDel();
		        //tag 行为点
		        tag('action_member_logout');
    			$this->success('修改成功！请您重新登录',U("Member/Index/login"));
    		}
    	}
    }


}



