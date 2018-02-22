<?php
namespace Phone\Controller;
use Common\Controller\Base;
class UserController extends Base {
    protected function _initialize(){
        parent::_initialize();
        $this->userid = service("Passport")->userid;
        $this->category = [
            ['name'=>'个人中心','cid'=>'profile'],
            ['name'=>'信息编辑','cid'=>'edit'],
            // ['name'=>'修改密码','cid'=>'password'],
            ['name'=>'我的预约','cid'=>'bespeak'],
            ['name'=>'我的读者证','cid'=>'reader'],
            ['name'=>'退出','cid'=>'logout']
            // ['name'=>'个人中心','cid'=>'profile']
        ];
        $this->assign('title','个人中心');
    }
    private function checkin(){
        if(!$this->userid){
            $this->redirect('login');
        }
    }
    /**
     * 个人中心首页
     *
     * @return void
     */
    public function profile(){
        $this->checkin();
        $userinfo = service("Passport")->getInfo();
        $avatar = service("Passport")->getUserAvatar($this->userid);
        $this->assign(compact('avatar','userinfo'));
        $this->assign('category',$this->category);
        $this->display();
    }
    /**
     * 用户中心路由方法
     *
     * @return void
     */
    public function lists(){
        $cid = I('get.cid','profile');
        $this->redirect($cid);
    }
    /**
     * 编辑个人信息
     *
     * @return void
     */
    public function edit(){
        $this->checkin();
        if(IS_POST){
            $data = I('post.');
            $data['userid'] = $this->userid;
            $memberModel = M("Member");
            $rules = [
                array('nickname', '', '该昵称已经存在！', 0, 'unique', 1),
                array('email', 'email', '邮箱地址有误！')
            ];
            if($data){
                if(!$memberModel->validate($rules)->check($data)){
                    $this->error($memberModel->getError());
                }else{
                    $memberModel->where(['userid'=>$this->userid])->save($data);
                }
            }
            $this->redirect('profile');
        }else{
            $userinfo = service("Passport")->getInfo();
            $this->assign('category',$this->category);
            $this->assign(compact('userinfo'));
            $this->display();
        }
    }
    /**
     * 登陆方法
     *
     * @return void
     */
    public function login(){
        if(IS_POST){    
            if($this->userid){
                $this->error('已经登陆，无需重复登陆！');
            }
            //DoLogin
            //账户名称
            $username = I("post.username", null, "trim");
            //账户密码
            $password = I("post.password", null, "trim");
            $userid = service('Passport')->loginLocal($username, $password, $cookieTime ? 86400 * 180 : 86400);
            if($userid >0){
                //Success
                $this->redirect('profile');
            }else{
                $this->error('用户名或密码错误！请重试！');
            }
        }
        $this->assign('title','会员登陆');
        $this->display();
    }
    /**
     * 注册方法
     *
     * @return void
     */
    public function register(){
        $this->assign('title','新会员注册');
        $this->display();
    }
    /**
     * 退出方法
     *
     * @return void
     */
    public function logout(){
        redirect('/Cudatabase/Public/doLogout');
    }
    /**
     * 我的预约
     *
     * @return void
     */
    public function bespeak(){
        $this->checkin();
        $data=M('Bespeak')->where(array('userid'=>$this->userid,'isdelete'=>0))->select();
        foreach ($data as $key => $value) {
            switch ($value['tablename']) {
                case 'active':

                   $data[$key]['show']=M('Active')->where(array('id'=>$value['tab_cid'],'isdelete'=>0))->find();
                    break;

                    case 'Comartcenter':
                   $data[$key]['show']=D('Comartcenter')->where(array('id'=>$value['tab_cid'],'isdelete'=>0))->find();
                    break;
                    case 'Library':
                   $data[$key]['show']=D('Library')->where(array('id'=>$value['tab_cid'],'isdelete'=>0))->find();
                    break;  
                
                default:
                    # code...
                    break;
            }
           
        } 
        
        $this->assign('data',$data);
        $this->assign('title','我的预约');
        $this->display();
    }

    /**
     * 修改密码
     */
    public function password(){
        $this->display();
    }
    /**
     * 我的读者证
     */
    public function reader(){
        $this->checkin();
        $userinfo = service("Passport")->getInfo();
        $if_bind = empty($userinfo['rdid'])?false:true;
        if($if_bind){
            $readerInfo = ReaderApi($userinfo['rdid'],$userinfo['reader_card_pwd'],'getReaderInfoByRdid');
            $this->assign('info',$readerInfo->return);
        }
        $this->assign('if_bind',$if_bind);
        $this->display();
    }
}