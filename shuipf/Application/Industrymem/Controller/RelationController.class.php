<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员关系
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class RelationController extends MemberBase {

    //好友分组数据对象
    protected $friendsGroup = NULL;
    //好友数据对象
    protected $friends = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->friends = D('Member/Friends');
    }

    //我关注的
    public function following() {
        $this->friendsGroup = D('Member/Friendsgroup');
        //显示所有好友分类
        $friendsGroup = $this->friendsGroup->where(array('userid' => $this->userid))->getField('gid,gid,userid,name');
        //类型
        $cid = I('get.cid', 0, 'intval');
        //分组id
        $gid = I('get.gid', 0, 'intval');
        $this->assign('cid', $cid);
        //查询条件
        $where = array();
        $where['userid'] = $this->userid;
        //关注类型，悄悄，相互
        if ($cid == 3) {
            $where['at'] = \Member\Model\FriendsModel::at_mutual;
        }
        //悄悄关注
        if ($cid == 2) {
            $where['atquietly'] = 1;
        }
        //未分组
        if ($cid == 1) {
            $where['groupid'] = 0;
        }
        //指定分组显示
        if ($cid == 4) {
            $where['groupid'] = $gid;
        }

        $count = $this->friends->where($where)->count();
        $page = $this->page($count, 12);
        $friends = $this->friends->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("fid" => "DESC"))->select();

        $this->assign("Page", $page->show('Admin'));
        $this->assign('friendsGroup', $friendsGroup);
        $this->assign('friendsGroupInfo', $friendsGroup[$gid]);
        $this->assign('friends', $friends);
        $this->assign('friendsCount', $count);
        $this->display();
    }

    //我的粉丝
    public function fans() {
        //查询条件
        $where = array();
        $where['fuserid'] = $this->userid;
        $count = $this->friends->where($where)->count();
        $page = $this->page($count, 12);
        $friends = $this->friends->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("fid" => "DESC"))->select();
        $selectUid = array();
        foreach ($friends as $k => $v) {
            //是否已经关注
            $friends[$k]['guanzhu'] = $this->friends->isAchtung($this->userid, $v['userid']);
            //是否在线
            $friends[$k]['isonline'] = D('Online')->getLastActiveTime($v['userid']);
            $selectUid[$v['userid']] = $v['userid'];
        }
        if (!empty($selectUid)) {
            $userList = $this->memberDb->where(array('userid' => array('IN', $selectUid)))->getField('userid,username,nickname,fans');
        }
        $this->assign("Page", $page->show('Admin'));
        $this->assign('friends', $friends);
        $this->assign('friendsCount', $count);
        $this->assign('userList', $userList);
        $this->display();
    }

    //访问脚印 - 谁看过我
    public function visitorin() {
        $Visitors = D('Visitors');
        $where = array(
            'byuserid' => $this->userid,
        );
        $count = $Visitors->where($where)->count();
        $page = $this->page($count, 12);
        $visitors = $Visitors->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("datetime" => "DESC"))->select();
        $selectUid = array();
        if (!empty($visitors)) {
            foreach ($visitors as $k => $v) {
                //是否已经关注
                $visitors[$k]['guanzhu'] = $this->friends->isAchtung($this->userid, $v['userid']);
                //是否在线
                $visitors[$k]['isonline'] = D('Online')->getLastActiveTime($v['userid']);
                $selectUid[$v['userid']] = $v['userid'];
            }
        }
        if (!empty($selectUid)) {
            $userList = $this->memberDb->where(array('userid' => array('IN', $selectUid)))->getField('userid,username,nickname,fans');
        }

        $this->assign("Page", $page->show('Admin'));
        $this->assign('visitors', $visitors);
        $this->assign('count', $count);
        $this->assign('userList', $userList);
        $this->display();
    }

    //访问脚印 - 我看过谁
    public function visitorout() {
        $Visitors = D('Member/Visitors');
        $where = array(
            'userid' => $this->userid,
        );
        $count = $Visitors->where($where)->count();
        $page = $this->page($count, 12);
        $visitors = $Visitors->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("datetime" => "DESC"))->select();
        $selectUid = array();
        foreach ($visitors as $k => $v) {
            //是否已经关注
            $visitors[$k]['guanzhu'] = $this->friends->isAchtung($this->userid, $v['byuserid']);
            //是否在线
            $visitors[$k]['isonline'] = D('Online')->getLastActiveTime($v['byuserid']);
            $selectUid[$v['byuserid']] = $v['byuserid'];
        }
        $userList = $this->memberDb->where(array('userid' => array('IN', $selectUid)))->getField('userid,username,nickname,fans');

        $this->assign("Page", $page->show('Admin'));
        $this->assign('visitors', $visitors);
        $this->assign('count', $count);
        $this->assign('userList', $userList);
        $this->display();
    }

    //添加分组
    public function groupadd() {
        $this->friendsGroup = D('Member/Friendsgroup');
        $post = I('request.');
        if (empty($post)) {
            $this->error('分组添加失败！');
        }
        //分组名称
        $name = $post['name'];
        if (empty($name)) {
            $this->message(10007);
        }
        if (false == isMax($name, 7)) {
            $this->message(10006);
        }
        //检查分组数量
        if ($this->friendsGroup->getUserGroupCount($this->userid) > 8) {
            $this->message(array(
                'info' => '分组名超过不能超过七个字！',
                'error' => 100061,
            ));
        }
        //不允许重复
        if ($this->friendsGroup->where(array('name' => $name, 'userid' => $this->userid))->count()) {
            $this->error('该分组名称已经存在！');
        }
        //添加分组
        $data = $this->friendsGroup->create($post);
        if ($data) {
            $gid = $this->friendsGroup->add(array('name' => $name, 'userid' => $this->userid));
            if ($gid) {
                $this->message(10000, array(
                    'gid' => $gid,
                    'name' => $name,
                        ), true);
            } else {
                $this->error('分组添加失败！');
            }
        } else {
            $this->error($this->friendsGroup->getError());
        }
    }

    //修改分组名称
    public function groupeditname() {
        if (IS_POST) {
            $post = I('post.');
            $gid = (int) $post['gid'];
            if (empty($post['gid'])) {
                $this->error('该分组不存在！');
            }
            if (empty($post['name'])) {
                $this->message(10007);
            }
            if (false == isMax($post['name'], 7)) {
                $this->message(10006);
            }
            $this->friendsGroup = D('Member/Friendsgroup');
            unset($post['gid']);
            //不允许重复
            if ($this->friendsGroup->where(array('name' => $post['name'], 'userid' => $this->userid, 'gid' => array('NEQ', $gid)))->count()) {
                $this->error('该分组名称已经存在！');
            }
            $data = $this->friendsGroup->create($post, 2);
            if ($data) {
                if (false !== $this->friendsGroup->where(array('gid' => $gid))->save($data)) {
                    $this->message(10000, array(
                        'gid' => $gid,
                        'name' => $data['name'],
                            ), true);
                } else {
                    $this->error('分组名称修改失败！');
                }
            } else {
                $this->error($this->friendsGroup->getError());
            }
        } else {
            $this->error('分组名修改失败！');
        }
    }

    //删除分组
    public function groupdel() {
        $gid = I('get.gid', 0, 'intval');
        if (empty($gid)) {
            $this->message(array(
                'info' => '请指定需要删除的分组！',
                    ), array('info' => '请指定需要删除的分组！'));
        }
        $this->friendsGroup = D('Friendsgroup');
        $info = $this->friendsGroup->where(array('userid' => $this->userid, 'gid' => $gid))->find();
        if (empty($info)) {
            $this->message(20002);
        }
        if ($this->friendsGroup->where(array('userid' => $this->userid, 'gid' => $gid))->delete()) {
            //把改组的好友设置为未分组
            $this->friends->where(array('userid' => $this->userid, 'groupid' => $gid))->save(array('groupid' => 0));
            $this->message(10000, array(
                'url' => U('Relation/following')
                    ), true);
        } else {
            $this->message(array(
                'info' => '分组删除失败！',
                    ), array('info' => '分组删除失败！'));
        }
    }

    //给我关注的人分组
    public function groupdesignate() {
        if (IS_POST) {
            //需要分组的用户UID
            $friend_uid = I('post.friend_uid', 0, 'intval');
            //旧分组
            $oldfgid = I('post.oldfgid', 0, 'intval');
            //新分组
            $newfgid = I('post.newfgid', 0, 'intval');
            if (empty($newfgid)) {
                $this->error('请指定需要选择的分组！');
            }
            $this->friendsGroup = D('Member/Friendsgroup');
            $info = $this->friendsGroup->where(array('gid' => $newfgid, 'userid' => $this->userid))->find();
            if (empty($info)) {
                $this->error('请指定需要选择的分组！');
            }
            //取得需要分组的会员信息
            $friendInfo = $this->friends->where(array('userid' => $this->userid, 'fuserid' => $friend_uid))->find();
            if (empty($friendInfo)) {
                $this->error('你还没关注该用户，无法对其进行分组！');
            }
            if ($newfgid == $friendInfo['groupid']) {
                $this->error('此用户已经是该分组成员或分组没有变动！');
            }
            if (false !== $this->friends->where(array('userid' => $this->userid, 'fuserid' => $friend_uid))->save(array('groupid' => $newfgid))) {
                $this->message(10000, array(), true);
            } else {
                $this->error('操作失败！');
            }
        } else {
            //分组ID
            $fgid = I('get.fgid', 0, 'intval');
            //用户名
            $nickname = I('get.nickname');
            //用户uid
            $friend_uid = I('get.friend_uid', 0, 'intval');
            $this->friendsGroup = D('Member/Friendsgroup');
            //显示所有好友分类
            $friendsGroup = $this->friendsGroup->where(array('userid' => $this->userid))->getField('gid,gid,userid,name');
            $this->assign('fgid', $fgid);
            $this->assign('nickname', $nickname);
            $this->assign('friend_uid', $friend_uid);
            $this->assign('friendsGroup', $friendsGroup);
            $this->display();
        }
    }

    //删除我所关注的好友
    public function followingdel() {
        if (IS_POST) {
            //需要解除的用户UID
            $friend_uid = I('post.friend_uid', 0, 'intval');
            //分组
            $fgid = I('post.fgid', 0, 'intval');
            if ($this->friends->followingDel($this->userid, $friend_uid)) {
                $this->message(10000, array(), true);
            } else {
                $this->error($this->friends->getError() ? $this->friends->getError() : '解除失败！');
            }
        } else {
            $this->error('粉丝关系解除失败！');
        }
    }

    //添加粉丝
    public function fansAdd() {
        if (IS_POST) {
            //用户uid
            $friend_uid = I('post.uid', 0, 'intval');
            if ($friend_uid == $this->userid) {
                $this->message(array(
                    'info' => '您只能关注别人，不能关注自己哦！',
                    'error' => 10013,
                ));
            }
            //检查是否关注过
            if ($this->friends->where(array('userid' => $this->userid, 'fuserid' => $friend_uid))->count()) {
                $this->message(array(
                    'info' => '您已经关注过该用户！',
                    'error' => 10003,
                ));
            }
            //分组
            $fgid = I('post.fgid', 0, 'intval');
            //是否悄悄关注
            $is_quietly = I('post.is_quietly', 0, 'intval');
            $fid = $this->friends->fansAdd($this->userid, $friend_uid, $fgid, $is_quietly);
            if ($fid) {
                $this->message(10000, array(), true);
            } else {
                $this->error($this->friends->getError() ? $this->friends->getError() : '关注失败！');
            }
        } else {
            //用户uid
            $friend_uid = I('get.uid', 0, 'intval');
            $friendInfo = $this->memberDb->where(array('userid' => $friend_uid))->getField('userid,userid,username');
            if (empty($friendInfo)) {
                $this->error('该用户不存在！');
            }
            $this->friendsGroup = D('Friendsgroup');
            //显示所有好友分类
            $friendsGroup = $this->friendsGroup->where(array('userid' => $this->userid))->getField('gid,gid,userid,name');
            $data = array(
                'friendsGroup' => $friendsGroup, //我拥有的分组
                //关注用户基本信息
                'friendsUser' => array(
                    'userid' => $friend_uid,
                    'username' => $friendInfo[$friend_uid]['username'],
                ),
                'is_quietly' => 0, //当前关注用户是否悄悄关注
                'gid' => 0, //当前关注用户分组id
            );
            $this->message(10000, $data, true);
        }
    }

}
