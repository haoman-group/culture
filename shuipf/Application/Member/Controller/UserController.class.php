<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员设置管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Member\Controller;
use Admin\Service\User;
class UserController extends MemberbaseController {
     protected $Page_Size=20;
    //会员设置界面
    public function profile() {
        //====基本资料表单======
        $modelid = $this->userinfo['modelid'];
        //会员模型数据表名
        $tablename = 'Member';
        //相应会员模型数据
        $modeldata = M(ucwords($tablename))->where(array("userid" => $this->userid))->find();
        if (!is_array($modeldata)) {
            $modeldata = array();
        }
        $data = array_merge($this->userinfo, $modeldata);
        $content_form = new \content_form($modelid);
        $data['modelid'] = $modelid;
        //字段内容
        $forminfos = $content_form->get($data);

        //====头像======
        $user_avatar = service("Passport")->getUploadPhotosHtml($this->userid);
        $this->assign('user_avatar', $user_avatar);
        $this->assign("forminfos", $forminfos);
        $this->assign('type', I('get.type', 'profile'));
        $this->assign("userinfo", $data);
        $this->display();
    }

    //保存基本信息
    public function doprofile() {
        if (IS_POST) {
            $post = $_POST;
            $info = $post['info'];
            //获取用户信息
            $userinfo = service("Passport")->getLocalUser($this->userid);
            if (empty($userinfo)) {
                $this->error('该会员不存在！');
            }
            //基本信息
            $data = $this->memberDb->create($post, 2);
            if (!$data) {
                $this->error($this->memberDb->getError());
            }
            //详细信息验证
            if (!empty($info)) {
                $ContentModel = \Content\Model\ContentModel::getInstance($this->userinfo['modelid']);
                $content_input = new \content_input($this->userinfo['modelid']);
                $info['userid'] = $this->userid;
                $inputinfo = $content_input->get($info, 3);
                if ($inputinfo) {
                    //数据验证
                    $inputinfo = $ContentModel->token(false)->create($inputinfo, 2);
                    if (false == $inputinfo) {
                        $ContentModel->tokenRecovery($post);
                        $this->error($ContentModel->getError());
                    }
                    //检查详细信息是否已经添加过
                    if ($ContentModel->where(array("userid" => $this->userid))->find()) {
                        $status = $ContentModel->where(array("userid" => $this->userid))->save($inputinfo);
                    } else {
                        $inputinfo['userid'] = $this->userid;
                        $status = $ContentModel->add($inputinfo);
                    }
                } else {
                    $ContentModel->tokenRecovery($post);
                    $this->error($content_input->getError());
                }
            }
            //修改基本资料
            if ($userinfo['username'] != $data['username'] || !empty($data['password']) || $userinfo['email'] != $data['email']) {
                $edit = service("Passport")->userEdit($userinfo['username'], '', '', $data['email'], 1);
                if (empty($edit)) {
                    $this->error(service("Passport")->getError()? : '修改失败！');
                }
            }
            unset($data['username'], $data['password'], $data['email']);
            if (!empty($data)) {
                $this->memberDb->where(array("userid" => $this->userid))->save($data);
            }
            if (false !== $status) {
                $this->success("基本信息修改成功！");
            } else {
                $this->error('基本信息修改失败！');
            }
        } else {
            $this->error('基本信息修改失败！');
        }
    }

    //修改密码
    public function dopassword() {
        if (IS_POST) {
            $post = I('post.');
            //旧密码
            $oldPassword = $post['oldPassword'];
            //根据当前密码取得用户资料
            $userInfo = service("Passport")->getLocalUser($this->userid, $oldPassword);
            if (false == $userInfo) {
                $this->error('旧密码错误，请重新输入！');
            }
            //设置密码
            $password = $post['password'];
            if (empty($password)) {
                $this->error('请输入你的密码！');
            }
            if (false == isMin($password, 6)) {
                $this->error('密码长度不能小于6位！');
            }
            //再次密码确认
            $password2 = $post['password2'];
            if ($password != $password2) {
                $this->error('两次密码输入不一致！');
            }
            $edit = service("Passport")->userEdit($this->username, '', $password, '', 1);
            if ($edit) {
                //注销当前登陆
                service("Passport")->logoutLocal();
                $this->success('密码修改成功！');
            } else {
                $this->error(service("Passport")->getError()? : '密码修改失败！');
            }
        } else {
            $this->error('修改失败！');
        }
    }
    //我的预约
    public function bespeak(){
        $userid=$this->userinfo['userid'];

        $count=M('Bespeak')->where(array('userid'=>$userid,'isdelete'=>0))->count();
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
        $data=M('Bespeak')->where(array('userid'=>$userid,'isdelete'=>0))->page($pagenum.','.$this->Page_Size)->select();
        //echo M('Bespeak')->getLastsql();exit;
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
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
        $this->display();
    }
    /**
     * 我的预约-修改
     *
     * @return void
     */
    public function bedit(){
        $id=I('id');

        if(IS_POST){
            $data=I('post.');
             $data['tel']=implode(',',$data['tel']);
             $data['credential_no']=implode(',',$data['credential_no']);
             $data['style']=$data['stylenum'];
             $message=M('Bespeak')->where(array('id'=>$id))->find();
            $attendance_num=M('Bespeak')->where(array('tablename'=>$message['tablename'],'tab_cid'=>$$message['tab_cid'],'isdelete'=>0,'id'=>array('neq',$_POST['id'])))->getField('attendance_num',true);
           $count=array_sum($attendance_num);
           $acceptance=D('Admin/Active')->where(array('id'=>$data['tab_cid']))->getField('acceptance');
            //  $data['areaname']=D("Admin/Area")->getFullAreaName($data['areaid']);
            //  $data['permanent_address']=$data['areaname'].":".$data['permanent_address']; 
            if($acceptance-$count-$data['attendance_num']<=0){
               $this->error("预约人数已超");
            }else{        
             $result=M('Bespeak')->where(array('id'=>$_POST['id']))->save($data);
            if($result){
                $this->success('修改成功',U('Member/User/bespeak',array('type1'=>1)));

            }else{
                $this->error('修改失败');
            }
            }
        }else{
           $id=I('id');
           $data=M('Bespeak')->where(array('id'=>$id))->find();
           $attendance_num=M('Bespeak')->where(array('tablename'=>$data['tablename'],'tab_cid'=>$data['tab_cid'],'isdelete'=>0,'id'=>array('neq',$id)))->getField('attendance_num',true);
           $count=array_sum($attendance_num);
          
           $acceptance=D('Admin/Active')->where(array('id'=>$data['tab_cid']))->getField('acceptance');
           $data['credential_no']=explode(",",$data['credential_no']);
           $data['tel']=explode(",",$data['tel']);
           $active=D('Admin/Active')->where(array('isdelete'=>0,'if_bespeak'=>1,'id'=>array('neq',$_GET['id'])))->limit(4)->order('id desc')->select();
        //    $data['permanent_address']=explode(':', $data['permanent_address']);
        //    $data['areaname']=explode('-',$data['permanent_address'][0] );
        //    $data['area']=D('Admin/Area')->where(array('name'=>array('like',"%".$data['areaname'][2]."%")))->getField("id");
           //$data['default_area'] =$this->getFullAreaID($data['area']);
           //$data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $this->assign('data',$data);
             $this->assign('active',$active);
             $this->assign('count',$count);
             $this->assign('acceptance',$acceptance);
            $this->display();
        }
       
       
        
    }

    public function delete(){
        $id=I('id');
        $result=M('Bespeak')->where(array('id'=>$id))->setField('isdelete',1);
        if($result){
                $this->success('删除成功');

            }else{
                $this->error('删除失败');
            }
    }
  public function getFullAreaID($area_id) {
        if($area_id ==0 || empty($area_id)){
           return false;
        }
        $full_area = $area_id;
        while(True) {
            $pid = M('Area')->where(array('id' => $area_id))->getField('pid');
            if ($pid == "1") {
                break;
            }
            $full_area = $pid.",".$full_area;
            $area_id = $pid;
        }
        return $full_area;
    }
    //加载直播页面
    public function live(){
        $this->display();
    }

}
