<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员个人空间
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Industrymem\Controller;

class HomeController extends MemberBase {

    //主题文件存放目录
    protected $themePath = '';
    //主题名称
    protected $themeName = 't0';
    //当前空间用户ID
    protected $currentUserid = 0;
    //当前空间用户资料
    protected $currentUserinfo = array();
    //是否在自己个人空间
    protected $isMyHome = false;
    //当前登陆用户是否已经关注当前空间主人
    protected $isFans = false;
    //分页规则
    protected $pageRule = array();
    //homerun
    protected $homeRun = NULL;

    //初始化
    protected function _initialize() {
        parent::_initialize();
        $this->homeRun = D('Member/HomeRun');
        $this->themePath = MODEL_EXTRESDIR . 'theme/';
        //当前空间用户UID
        $this->currentUserid = I('get.userid', 0, 'intval');
        //如果当前用户是空，默认访问自己的
        if (empty($this->currentUserid)) {
            $this->currentUserid = $this->userid;
        }
        //当前用户ID为空，跳转到登录页
        if (empty($this->currentUserid)) {
            $this->redirect(U('Industry/Public/login'));
        }
        //加载当前空间用户资料
        if ($this->userid == $this->currentUserid) {
            $this->currentUserinfo = $this->userinfo;
            $this->isMyHome = true;
        } else {
            $this->currentUserinfo = service("Passport")->getLocalUser((int) $this->currentUserid);
            //热度+1
            $this->homeRun->homeHeatSet($this->currentUserid);
            if ($this->userid) {
                //增加访客记录
                $this->homeRun->visitorsAdd($this->currentUserinfo, $this->userinfo);
                //是否关注
                $this->isFans = $this->homeRun->isAtYou($this->userid, $this->currentUserid);
            }
        }
        if (empty($this->currentUserinfo)) {
            $this->error('该用户空间不存在！', U('Industrymem/Index/index'));
        }
        //分页规则
        $this->pageRule = array(
            'index' => UM('Home/' . ACTION_NAME, array('userid' => $this->currentUserid)),
            'list' => str_replace('%7B%24page%7D', '{$page}', UM('Home/' . ACTION_NAME, array('userid' => $this->currentUserid, C('VAR_PAGE') => '{$page}'))),
        );
        //获取主题
        $this->themeName = $this->currentUserinfo['theme'] ? $this->currentUserinfo['theme'] : 't0';

        $this->assign('userinfo', $this->currentUserinfo);
        $this->assign('themeName', $this->themeName);
        $this->assign('ismyhome', $this->isMyHome);
        $this->assign('isfans', $this->isFans);
        $this->assign('isonline', $this->homeRun->isOnline($this->currentUserid));
    }

    //个人空间首页
    public function index() {
        //首页照片显示
        $albumHome = $this->homeRun->getHomeShow($this->currentUserid);
        //查询留言
        $wall = $this->homeRun->getWall($this->currentUserid);
        //加载分享
        $share = $this->homeRun->getShare($this->currentUserid);
        //取得用户的访客信息
        $visitors = $this->homeRun->getUserVisitorsList($this->currentUserid, 8);
        //我关注的人总数
        $friendsCount = $this->homeRun->friendsCount($this->currentUserid);
        //我关注的人
        $friends = $this->homeRun->getFriendUserInfo($this->currentUserid, 8);
        //查询出一条最新微博
        $findWeibo = D('Weibo')->where(array('userid' => $this->currentUserid))->order(array('id' => 'DESC'))->find();

        $this->assign('visitors', $visitors);
        $this->assign('friends', $friends);
        $this->assign('friendsCount', $friendsCount);
        $this->assign('albumHome', $albumHome);
        $this->assign('wall', $wall);
        $this->assign('share', $share);
        $this->assign('weibo', $findWeibo);
        $this->assign('ExecutionTime', G('run', 'end') . 's');
        $this->display();
    }

    //空间换皮肤
    public function skin() {
        $Theme = D('Theme');
        $where = array();
        $orderby = I('get.order', 0, 'intval');
        if ($orderby) {
            $order = array('adoption' => 'DESC');
        } else {
            $order = array('datetime' => 'DESC');
        }
        $count = $Theme->where($where)->count();
        $config = array(
            'rule' => $this->pageRule,
            'isrule' => true
        );
        $p = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $page = $this->page($count, 20, $p, $config);
        $theme = $Theme->where($where)->order($order)->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign('theme', $theme);
        $this->assign('orderby', $orderby);
        $this->assign("Page", $page->show('Admin'));
        $this->assign('count', $count);
        $this->assign('ExecutionTime', G('run', 'end') . 's');
        $this->display();
    }

    //动态
    public function feed() {
        $Dongtai = D('Dongtai');
        $where = array('userid' => $this->currentUserid);
        $count = $Dongtai->where($where)->count();
        $config = array(
            'rule' => $this->pageRule,
            'isrule' => true
        );
        $p = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $page = $this->page($count, 20, $p, $config);
        $feed = $Dongtai->where($where)->order(array('datetime' => 'DESC', 'id' => 'DESC'))->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign('feed', $feed);
        $this->assign("Page", $page->show('Admin'));
        $this->assign('count', $count);
        $this->assign('ExecutionTime', G('run', 'end') . 's');
        $this->display();
    }

    //分享
    public function share() {
        $where = array('userid' => $this->currentUserid);
        //加载分享
        $count = D('Share')->where($where)->count();
        $config = array(
            'rule' => $this->pageRule,
            'isrule' => true
        );
        $p = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $page = $this->page($count, 20, $p, $config);
        $share = $this->homeRun->getShare($this->currentUserid, $page->firstRow . ',' . $page->listRows);

        $this->assign("Page", $page->show('Admin'));
        $this->assign('count', $count);
        $this->assign('share', $share);
        $this->assign('ExecutionTime', G('run', 'end') . 's');
        $this->display();
    }

    //相册
    public function album() {
        $Album = D('Album');
        $id = I('get.id', 0, 'intval');
        //当前分页号
        $pages = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $where = array('userid' => $this->currentUserid);
        if ($id) {
            $where['id'] = $id;
            //查询出照片信息
            $info = $Album->where($where)->find();
            if (empty($info)) {
                $this->error('该照片不存在或者已经删除！', UM('Home/album', array('userid' => $this->currentUserid)));
            }
            //分页
            $pa = I('get.' . C('VAR_PAGE'), 0, 'intval');
            //评论
            $commentCount = D('AlbumComment')->getCommentCountByaid($id);
            //分页规则,ajax分页
            $this->pageRule = array(
                'index' => 'javascript:albumLib.commentPageInit(1, ' . $this->currentUserid . ', ' . $id . ')',
                'list' => 'javascript:albumLib.commentPageInit({$page}, ' . $this->currentUserid . ', ' . $id . ');',
            );
            $config = array(
                'rule' => $this->pageRule,
                'isrule' => true
            );
            $page = $this->page($commentCount, 10, $pa, $config);
            $page->SetPager('Admin', '共有{recordcount}条信息&nbsp;{pageindex}/{pagecount}&nbsp;{first}{prev}&nbsp;{liststart}{list}{listend}&nbsp;{next}{last}');
            $comment = D('AlbumComment')->getCommentByaid($id, $page->firstRow . ',' . $page->listRows);
            if ($pa && IS_AJAX) {
                $this->assign('comment', $comment);
                $this->assign("Page", $page->show('Admin'));
                $this->assign('ExecutionTime', G('run', 'end') . 's');
                $this->display('albumcomment');
                return true;
            }
            if ($info['listorder']) {
                //next
                $nextId = $Album->where(array('listorder' => array('LT', $info['listorder']), 'userid' => $this->currentUserid))->order(array("listorder" => "DESC", 'id' => 'ASC'))->getField('id');
                //pre
                $preId = $Album->where(array('listorder' => array('GT', $info['listorder']), 'userid' => $this->currentUserid))->order(array("listorder" => "ASC", 'id' => 'DESC'))->getField('id');
                $preCount = $Album->where(array('listorder' => array('GT', $info['listorder']), 'userid' => $this->currentUserid))->count();
            } else {
                //next
                $nextId = $Album->where(array('id' => array('LT', $id), 'userid' => $this->currentUserid))->order(array("listorder" => "DESC", 'id' => "DESC"))->getField('id');
                //pre
                $preId = $Album->where(array('id' => array('GT', $id), 'userid' => $this->currentUserid))->order(array("listorder" => "ASC", 'id' => "ASC"))->getField('id');
                $preCount = $Album->where(array('id' => array('GT', $id), 'userid' => $this->currentUserid))->count();
            }
            //图片导航
            if ($preCount == 0 || $preCount < 7) {
                $limit = "0,7";
            } else {
                $q = floor($preCount / 7) * 7;
                $limit = "{$q},7";
            }
            //照片7张图片导航
            $daoh = $Album->where(array('userid' => $this->currentUserid))->limit($limit)->order(array("listorder" => "DESC", 'id' => "DESC"))->select();
            //是否喜欢过
            $isLove = D('AlbumLove')->isLove($this->userid, $id);
            //谁喜欢过
            $loveLog = D('AlbumLove')->getAlbumByaid($id);

            $this->assign('islove', $isLove);
            $this->assign('lovelog', $loveLog);
            $this->assign('comment', $comment);
            $this->assign("daohang", $daoh);
            $this->assign('next', UM('Home/album', array('userid' => $this->currentUserid, 'id' => $nextId)));
            $this->assign('pre', UM('Home/album', array('userid' => $this->currentUserid, 'id' => $preId)));
            $this->assign('info', $info);
            $this->assign('id', $id);
            $this->assign("Page", $page->show('Admin'));
            $this->assign('ExecutionTime', G('run', 'end') . 's');
            $this->display('photo');
            return true;
        }
        //加载照片
        $count = $Album->where($where)->count();
        $config = array(
            'rule' => $this->pageRule,
            'isrule' => true
        );
        $p = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $page = $this->page($count, 20, $p, $config);
        $album = $Album->where($where)->order(array("listorder" => "DESC", 'id' => "DESC"))->limit($page->firstRow . ',' . $page->listRows)->select();
        if (IS_AJAX) {
            $callback = I('request.callback', '');
            if (empty($callback)) {
                $type = 'JSON';
            } else {
                $type = 'JSONP';
                C('VAR_JSONP_HANDLER', 'callback');
            }
            //加url
            foreach ($album as $k => $v) {
                $album[$k]['url'] = UM('Home/album', array('userid' => $this->currentUserid, 'id' => $v['id']));
            }
            $this->ajaxReturn(array('data' => $album, 'totalpages' => $page->Total_Pages), $type);
        }

        $this->assign("Page", $page->show('Admin'));
        $this->assign("pages", $pages);
        $this->assign('count', $count);
        $this->assign('album', $album);
        $this->assign('ExecutionTime', G('run', 'end') . 's');
        $this->display();
    }

    //留言
    public function wall() {
        //留言ID
        $id = I('get.id', 0, 'intval');
        if ($id) {
            //查询单条留言
            $wall = $this->homeRun->getWallById($this->currentUserid, $id);
            if (empty($wall)) {
                $this->error('该留言不存在或者已经删除！', UM('Home/wall', array('userid' => $this->currentUserid)));
            }
        } else {
            $Wall = D('Wall');
            $count = $Wall->where(array('userid' => $this->currentUserid, 'parentid' => 0))->count();
            $config = array(
                'rule' => $this->pageRule,
                'isrule' => true
            );
            $p = I('get.' . C('VAR_PAGE'), 1, 'intval');
            $page = $this->page($count, 20, $p, $config);
            //查询留言
            $wall = $this->homeRun->getWall($this->currentUserid, $page->firstRow . ',' . $page->listRows);
            $this->assign("Page", $page->show('Admin'));
        }

        $this->assign('wall', $wall);
        $this->assign('ExecutionTime', G('run', 'end') . 's');
        $this->display();
    }

    //关注的人
    public function following() {
        $Friends = D('Friends');
        $where = array(
            'userid' => $this->currentUserid,
        );
        $count = $this->homeRun->friendsCount($this->currentUserid);
        $config = array(
            'rule' => $this->pageRule,
            'isrule' => true
        );
        $p = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $page = $this->page($count, 20, $p, $config);
        $friends = $Friends->getFriendUserInfo($this->currentUserid, $page->firstRow . ',' . $page->listRows);
        foreach ($friends as $k => $r) {
            $friends[$k]['isonline'] = $this->homeRun->isOnline($r['fuserid']);
            if ($this->currentUserid == $this->userid) {
                $friends[$k]['isfans'] = true;
            } else {
                $friends[$k]['isfans'] = $Friends->isAchtung($this->userid, $this->currentUserid);
            }
        }

        $this->assign('friends', $friends);
        $this->assign("Page", $page->show('Admin'));
        $this->assign('ExecutionTime', G('run', 'end') . 's');
        $this->display();
    }

    //粉丝
    public function fans() {
        $Friends = D('Friends');
        $where = array(
            'fuserid' => $this->currentUserid,
        );
        $count = $Friends->where($where)->count();
        $config = array(
            'rule' => $this->pageRule,
            'isrule' => true
        );
        $p = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $page = $this->page($count, 20, $p, $config);
        $fans = $Friends->getFriendFansUserInfo($this->currentUserid, $page->firstRow . ',' . $page->listRows);
        foreach ($fans as $k => $r) {
            $fans[$k]['isonline'] = $this->homeRun->isOnline($r['userid']);
            if ($this->currentUserid == $this->userid) {
                $fans[$k]['isfans'] = true;
            } else {
                $fans[$k]['isfans'] = $Friends->isAchtung($this->userid, $this->currentUserid);
            }
        }

        $this->assign('fans', $fans);
        $this->assign("Page", $page->show('Admin'));
        $this->assign('ExecutionTime', G('run', 'end') . 's');
        $this->display();
    }

    //随便说说
    public function miniblog() {
        $Weibo = D('Weibo');
        $where = array(
            'userid' => $this->currentUserid,
        );
        //微博ID
        $id = I('get.id', 0, 'intval');
        if ($id) {
            $where['id'] = $id;
            $info = $Weibo->where($where)->find();
            if (empty($info)) {
                $this->error('该微博不存在！', UM('Home/miniblog', array('userid' => $this->currentUserid)));
            }
            $WeiboComment = D('WeiboComment');
            //取得回复列表
            $comment = $WeiboComment->where(array('wid' => $id))->order(array('datetime' => 'DESC'))->select();

            $this->assign('info', $info);
            $this->assign('comment', $comment);
            $this->assign('ExecutionTime', G('run', 'end') . 's');
            $this->display('miniblogshow');
            return true;
        }
        $count = $Weibo->where($where)->count();
        $config = array(
            'rule' => $this->pageRule,
            'isrule' => true
        );
        $p = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $page = $this->page($count, 10, $p, $config);
        $data = $Weibo->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();

        $this->assign('weibo', $data);
        $this->assign("Page", $page->show('Admin'));
        $this->assign('ExecutionTime', G('run', 'end') . 's');
        $this->display();
    }

    //收藏
    public function favorites() {
        $Favorite = D('Favorite');
        //查询条件
        $where = array(
            'userid' => $this->currentUserid,
        );
        $count = $Favorite->where($where)->count();
        $config = array(
            'rule' => $this->pageRule,
            'isrule' => true
        );
        $p = I('get.' . C('VAR_PAGE'), 1, 'intval');
        $page = $this->page($count, 20, $p, $config);
        $favorite = $Favorite->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("fid" => "DESC"))->select();

        $this->assign("Page", $page->show('Admin'));
        $this->assign('favorite', $favorite);
        $this->assign('ExecutionTime', G('run', 'end') . 's');
        $this->display();
    }

    /**
     * 析构方法
     * @access public
     */
    public function __destruct() {
        parent::__destruct();
        tag('member_home_end', $this->currentUserinfo);
    }

}
