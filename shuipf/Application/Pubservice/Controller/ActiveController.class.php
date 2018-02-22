<?php
//文化活动

namespace Pubservice\Controller;

use Admin\Service\User;
use Common\Controller\Base;
use Think\Controller;
use Pubservice\Controller\PubBaseController;

class ActiveController extends PubBaseController
{
    protected $Page_Size = 20;
     protected $page_size = 20;

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
        /*
        $condition = I('get.');
        $pagenum = I('get.page', '1', '');
        //var_dump(User::getInstance()->getInfo());exit;
        $cid = empty(I('catid')) ? 185 : I('catid');
        $cidinfo = D('Admin/ArtCategory')->where(array('cid' => $cid))->find();
        $categoryid = empty(I('categoryid')) ? 189 : I('categoryid');
        $category = D('Admin/ArtCategory')->where(array('parent_cid' => $cid))->select();
        $categoryname = D('Admin/ArtCategory')->where(array('parent_cid' => $categoryid))->select();
        $where = $this->getcondition($condition);
        $count = D('Admin/Active')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Active')->where($where)->page($pagenum . ',' . $this->Page_Size)->order("id desc")->select();
        foreach($data as $index=>$item){
            $data[$index]['bespeak_num'] =  D('Admin/Bespeak')->where(array('tab_cid' => $item['id'], 'tablename' => 'Active'))->count();
        }
        //echo D('Admin/Active')->getLastsql();exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->assign('data', $data);
        $this->assign('category', $category);
        $this->assign('categoryname', $categoryname);
        $this->assign('cidinfo',$cidinfo);
        $this->display();
        */
        $keyword=I('get.kw',null);
        if($keyword){
           $where['content_title'] = array('like', '%'.$keyword.'%');
        }
        $art_cid = I('get.catid',null);
        $areaid=I('get.areaid',null);
        if($areaid){
          $where['area']=$areaid;
        }else{
             $where['area']=$this->area['id'];
        }
        if($art_cid){
         $where['art_cid']=$art_cid;
        }else{
            $cid=array(221,222,223,224,225,226,227,228);
            $where['art_cid']=array('in',$cid);
        }
        // $pagenum = I('get.page', '1', '');
        // $where['area']=D('Admin/Area')->getIDWhereCondition($this->area['id']);
       
        $pagenum = I('get.page', '1', '');
        // $where = $this->getcondition($condition);
        //var_dump($where);exit;
        $count = D('Admin/Active')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Active')->where($where)->page($pagenum . ',' . $this->Page_Size)->order("id desc")->select();
        //var_dump($data);exit;
        // echo D("Admin/Active")->getLastSql();
        //获取已报人数
        foreach($data as $index=>$item){
            $data[$index]['bespeak_num'] =  D('Admin/Bespeak')->where(array('tab_cid' => $item['id'], 'tablename' => 'Active'))->count();
            // $data[$index]['art_cid'] = D('Admin/ArtCategory')->where(['cid'=>$item['art_cid']])->find();
        }
        //活动分类
        $active_type = D('Admin/ArtCategory')->getCategory('220');
        //分页
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign(compact('data','active_type','pageinfo'));
        $this->display();
    }

    public function showtocountryside(){

        $this->display();
    }

    // public function getcondition($condition)
    // {
    //     $where = array();
    //     $where['isdelete'] = 0;
    //     if (empty($condition)) {
    //         //$cid=185;
    //         // $where['category'] = 185;
    //     } else {
    //         if (empty($condition['catid'])) {
    //             // $where['category'] = 185;
    //         }
    //         if (isset($condition['city']) && empty($condition['county'])) {
    //             $area = D('Admin/Area')->where(array('name' => $condition['city']))->getField('id');
    //             $rand = array(between, array($area, $area + 10000));
    //             $where['area'] = $rand;

    //         } elseif (isset($condition['city']) && isset($condition['county'])) {
    //             $city = D('Admin/Area')->where(array('name' => $condition['city']))->getField('id');
    //             $country = D('Admin/Area')->where(array('name' => $condition['county']))->getField('id');
    //             if ($city < $country and $country < $city + 10000) {
    //                 $area = D('Admin/Area')->where(array('name' => $condition['county']))->getField('id');
    //                 $where['area'] = $area;
    //             } else {
    //                 $area = D('Admin/Area')->where(array('name' => $condition['city']))->getField('id');
    //                 $rand = array(between, array($area, $area + 10000));
    //                 $where['area'] = $rand;
    //             }

    //         } elseif (empty($condition['city']) && isset($condition['county'])) {
    //             $area = D('Admin/Area')->where(array('name' => $condition['county']))->getField('id');
    //             $where['area'] = $area;
    //         } else {
    //             empty($condition['area']) ? NULL : $where['art_cid'] = D('Admin/Area')->where(array('name' => $condition['county']))->getField('id');
    //         }
    //         empty($condition['type']) ? NULL : $where['art_cid'] = $condition['type'];
    //         empty($condition['categoryid']) ? NULL : $where['type'] = $condition['categoryid'];
    //         empty($condition['catid']) ? NULL : $where['art_cid'] = $condition['catid'];
    //     }

    //     return $where;
    // }

    public function show()
    {
        $id = I('id');
        $pagenum = I('get.page', '1', '');
        $data = D('Admin/Active')->where(array('id' => $id))->find();
        //var_dump( $data);exit;
        $num = D('Admin/Bespeak')->where(array('tab_cid' => $data['id'], 'tablename' => 'active'))->getField('attendance_num', true);
        $data['num'] = array_sum($num);
        $data['scene'] = D('Admin/Active')->where(array('parent_id' => $data['id'], 'isdelete' => 0))->select();
        $data['review'] = D('Admin/Active')->where(array('art_cid' => $data['art_cid'], 'id' => array('neq', $data['id']), 'isdelete' => 0))->limit(4)->select();
        $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
        $data['publish_ordersetup'] = htmlspecialchars_decode($data['publish_ordersetup']);
        $data['publish_ordermessage'] = htmlspecialchars_decode($data['publish_ordermessage']);
        $data['publish_orderintroduce'] = htmlspecialchars_decode($data['publish_orderintroduce']);
        $data['abstract'] = htmlspecialchars_decode($data['abstract']);
        //var_dump($data['abstract']);exit;
        $condition['tablename'] = I('get.tablename');
        $condition['show_id'] = $id;
        $condition['isdelete'] = 0;
        $count=M('Comment')->where($condition)->order('id desc')->count();
        $page = new \Libs\Util\Page($count, $this->page_size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $comment['data'] = M('Comment')->page($pagenum . ',' . $this->page_size)->where($condition)->order('id desc')->select();
        foreach ($comment['data'] as $key => $value) {
            $comment['data'][$key]['picture'] = D('Admin/Member')->where(array('userid' => $value['userid']))->getField('userpic');
            $comment['data'][$key]['publish_content'] = htmlspecialchars_decode($comment['data'][$key]['publish_content']);
            //  $comment['data'][$key]['abstract'] = htmlspecialchars_decode($comment['data'][$key]['abstract']);
            $comment['data'][$key]['reply'] = D('Admin/Comment')->where(array('commit_id' => $value['id']))->select();
        }
        //var_dump($data);exit;
        $comment['num'] = M('Comment')->where($condition)->order('id desc')->count();
        $comment['num_person'] = M('Comment')->where($condition)->count("distinct userid");
         $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $type = $this->gettype($data['art_cid']);
        $this->assign('comment', $comment);
        $this->assign('type', $type);
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
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

    //添加社会团体的子信息

   
}