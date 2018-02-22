<?php
//文化活动

namespace Pubservice\Controller;

use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
use Pubservice\Controller\PubBaseController;

class SearchController extends PubBaseController
{
    protected $Page_Size = 20;

    protected function _initialize()
    {
        parent::_initialize();
        $this->model = D('Admin/BaseServices');
        $userInfo = User::getInstance()->getInfo();
        $this->assign('userInfo', $userInfo);
        $this->assign('admin_url', "<a href='/admin'>[进入后台]</a>");
    }

    public function index()
    {
        $pagenum = I('get.page', '1', '');
        //var_dump(User::getInstance()->getInfo());exit;
        $keyword =  I('kw');
        //var_dump($keyword);exit;
        $where['content_title'] = array('like', '%'.$keyword.'%');
        $where['isdelete'] = 0;
        $count = D('Admin/Active')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Active')->where($where)->page($pagenum . ',' . $this->Page_Size)->select();
        //echo D('Admin/Active')->getLastsql();exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->assign('data', $data);
        $this->display();
    }


    public function show()
    {
        $id = I('id');
        $data = D('Admin/Active')->where(array('id' => $id))->find();
        $num = D('Admin/Bespeak')->where(array('tab_cid' => $data['id'], 'tablename' => 'Active'))->getField('attendance_num', true);
        $data['num'] = array_sum($num);
        $data['scene'] = D('Admin/Active')->where(array('parent_id' => $data['id'], 'isdelete' => 0))->select();
        $data['review'] = D('Admin/Active')->where(array('art_cid' => $data['art_cid'], 'id' => array('neq', $data['id']), 'isdelete' => 0))->select();
        $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
        $data['publish_ordersetup'] = htmlspecialchars_decode($data['publish_ordersetup']);
        $data['publish_ordermessage'] = htmlspecialchars_decode($data['publish_ordermessage']);
        $data['publish_orderintroduce'] = htmlspecialchars_decode($data['publish_orderintroduce']);
        $condition['tablename'] = I('get.tablename');
        $condition['show_id'] = $id;
        $condition['isdelete'] = 0;
        $comment['data'] = M('Comment')->where($condition)->order('id desc')->select();
        foreach ($comment['data'] as $key => $value) {
            $comment['data'][$key]['picture'] = D('Admin/Member')->where(array('userid' => $value['userid']))->getField('userpic');
            $comment['data'][$key]['publish_content'] = htmlspecialchars_decode($comment['data'][$key]['publish_content']);
            $comment['data'][$key]['reply'] = D('Admin/Comment')->where(array('commit_id' => $value['id']))->select();
        }

        $comment['num'] = M('Comment')->where($condition)->order('id desc')->count();
        $comment['num_person'] = M('Comment')->where($condition)->count("distinct userid");
        $type = $this->gettype($data['art_cid']);
        $this->assign('comment', $comment);
        $this->assign('type', $type);
        $this->assign('data', $data);
        $this->display();
    }

    public function gettype($art_cid)
    {

        $category = D('Admin/ArtCategory')->where(array('cid' => $art_cid))->find();
        $parent_cid = D('Admin/ArtCategory')->where(array('cid' => $category['parent_cid']))->find();
        $type = D('Admin/ArtCategory')->where(array('cid' => $parent_cid['parent_cid']))->find();
        return $type;
    }

    public function details()
    {
        $id = I('id');
        $data = D('Admin/Active')->where(array('id' => $id))->find();
        //var_dump($data);exit;
        $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);

        $this->assign('data', $data);
        $this->display();
    }

    public function showdetails()
    {
        $id = I('id');
        $data = D('Admin/Active')->where(array('id' => $id))->find();
        //var_dump($data);exit;
        $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);

        $this->assign('data', $data);
        $this->display();
    }
    //直播页
    public function live(){
        $id = I('get.id',null);
        //评论内容
        // $condition['tablename'] = I('get.tablename','Active');
        $condition['show_id'] = $id;
        $condition['isdelete'] = 0;
        $comment['data'] = M('Comment')->where($condition)->order('id desc')->select();
        foreach ($comment['data'] as $key => $value) {
            $comment['data'][$key]['picture'] = D('Admin/Member')->where(array('userid' => $value['userid']))->getField('userpic');
            $comment['data'][$key]['publish_content'] = htmlspecialchars_decode($comment['data'][$key]['publish_content']);
            $comment['data'][$key]['reply'] = D('Admin/Comment')->where(array('commit_id' => $value['id']))->select();
        }

        $comment['num'] = M('Comment')->where($condition)->order('id desc')->count();
        $comment['num_person'] = M('Comment')->where($condition)->count("distinct userid");
        $this->assign('comment', $comment);

        $data = D('Admin/Active')->where(array('id' => $id))->find();
        $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
        $data['totle_num'] =M('Bespeak')->where(['tablename'=>'Active','tab_cid'=>$id])->count();
        $this->assign('data', $data);
        $this->display();
    }
}