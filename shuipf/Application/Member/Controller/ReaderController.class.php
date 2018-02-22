<?php
/**
 * 读者服务
 */

namespace Member\Controller;
use Admin\Service\User;
class ReaderController extends MemberbaseController {
    //初始化
    protected function _initialize() {
        parent::_initialize();
        $this->groupCache = cache('Member_group');
        $this->groupsModel = cache('Model_Member');
        $this->member = D('Member/Member');
        var_dump();
    }
    /**
     * 我的读者证
     *
     * @return void
     */
    public function mycard(){
        $if_bind = empty($this->userinfo['rdid'])?false:true;
        if($if_bind){
            $readerInfo = ReaderApi($this->userinfo['rdid'],$this->userinfo['reader_card_pwd'],'getReaderInfoByRdid');
            $this->assign('info',$readerInfo->return);
        }
        $this->assign('if_bind',$if_bind);
        $this->display();
    }     
    /**
     * 读者证解绑
     *
     * @return void
     */
    public function remove(){
        $this->member->save(['rdid'=>'','reader_card_pwd'=>'','userid'=>$this->userid]);
        $this->success('解绑成功',U('mycard'));
    }
    /**
     * 读者证绑定
     *
     * @return void
     */
    public function bind(){
        if(IS_POST){
            $rdid = I('post.rdid',null);
            $password = I('post.password',null);
            if(empty($rdid) || empty($password)){
                $this->error('错误：请填写读者账号和密码！');
            }else{
                $password = md5($password);
            }
            $res = ReaderApi($rdid,$password);
            if(is_bool($res->return) && $res->return){
                $this->member->save(['rdid'=>$rdid,'reader_card_pwd'=>$password,'userid'=>$this->userid]);
                $this->success('绑定成功',U('mycard'));
            }else{
                $this->error('绑定失败:'.($res->return == false?'账号密码错误！':$res));
            }
        }else{
            $this->display();
        }
    }
}
