<?php
namespace Admin\Controller;

use Common\Controller\AdminBase;
use Admin\Service\User;
use Admin\Model\AreaModel;
class ActiveController extends AdminBase
{
    //培训辅导
    protected $Page_Size = 20;
    protected $active = null;
    protected function _initialize()
    {
        parent::_initialize();
        $areaid=User::getInstance()->getInfo()['area'];
        $areaname=D('Admin/Area')->getFullAreaName($areaid);
        $this->Category = D('Admin/ArtCategory');
        $this->ReCulture = D('Admin/ReCulture');
        $this->active = D('Admin/Active');
        $this->assign('maxPicNum', 1);
        $this->assign('areaname', $areaname);
        $this->assign('maxVideoNum', 1);
    }

    private function _procData()
    {
        $data = I('post.');
        //var_dump($data);exit;
        if ($data['form_cid'] == "189" && $data['drama_picture_url'] != "") {
            $data['image'] = implode(',', $data['drama_picture_url']);
            //$data['type']=$this->getlevel();
        } else if ($data['form_cid'] == "193" && $data['music_picture_url'] != "") {
            $data['image'] = implode(',', $data['music_picture_url']);
        } else if ($data['form_cid'] == "194" && $data['dance_picture_url'] != "") {
            $data['image'] = implode(',', $data['dance_picture_url']);
        } else if ($data['form_cid'] == "195" && $data['art_picture_url'] != "") {
            $data['image'] = implode(',', $data['art_picture_url']);
        } else if ($data['form_cid'] == "196" && $data['folk_picture_url'] != "") {
            $data['image'] = implode(',', $data['folk_picture_url']);
        } else if ($data['form_cid'] == "199" && $data['acrobatics_picture_url'] != "") {
            $data['image'] = implode(',', $data['acrobatics_picture_url']);
        } else if ($data['form_cid'] == "200" && $data['handwriting_picture_url'] != "") {
            $data['image'] = implode(',', $data['handwriting_picture_url']);
        } else if ($data['form_cid'] == "201" && $data['exhibition_picture_url'] != "") {
            $data['image'] = implode(',', $data['exhibition_picture_url']);
        } else if ($data['form_cid'] == "202" && $data['active_picture_url'] != "") {
            $data['image'] = implode(',', $data['active_picture_url']);
        } else if ($data['form_cid'] == "205" && $data['stars_picture_url'] != "") {
            $data['image'] = implode(',', $data['stars_picture_url']);
        } else if ($data['form_cid'] == "206" && $data['more_picture_url'] != "") {
            $data['image'] = implode(',', $data['more_picture_url']);
        } else if ($data['form_cid'] == "207" && $data['shengji_picture_url'] != "") {
            $data['image'] = implode(',', $data['shengji_picture_url']);
        } else if ($data['form_cid'] == "208" && $data['shiji_picture_url'] != "") {
            $data['image'] = implode(',', $data['shiji_picture_url']);
        } else if ($data['form_cid'] == "211" && $data['group_picture_url'] != "") {
            $data['image'] = implode(',', $data['group_picture_url']);
        } else if ($data['form_cid'] == "212" && $data['city_picture_url'] != "") {
            $data['image'] = implode(',', $data['city_picture_url']);
        } else if ($data['form_cid'] == "213" && $data['xian_picture_url'] != "") {
            $data['image'] = implode(',', $data['xian_picture_url']);
        } else if ($data['form_cid'] == "210" && $data['shehui_picture_url'] != "") {
            $data['image'] = implode(',', $data['shehui_picture_url']);
        } else {
            $this->error("请选择图片进行上传！");
        }

        if ($data['art_cid'] == "191") {
            $data['type'] = $this->getlevel(191);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "192") {
            $data['type'] = $this->getlevel(192);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "193") {
            $data['type'] = $this->getlevel(193);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "194") {
            $data['type'] = $this->getlevel(194);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "195") {
            $data['type'] = $this->getlevel(195);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "196") {
            $data['type'] = $this->getlevel(196);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "199") {
            $data['type'] = $this->getlevel(199);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "200") {
            $data['type'] = $this->getlevel(200);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "201") {
            $data['type'] = $this->getlevel(201);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "202") {
            $data['category'] = $this->getlevel(202);
            $data['type'] = $data['art_cid'];
        } else if ($data['art_cid'] == "205") {
            $data['type'] = $this->getlevel(205);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "206") {
            $data['type'] = $this->getlevel(206);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "207") {
            $data['type'] = $this->getlevel(207);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "208") {
            $data['type'] = $this->getlevel(208);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "211") {
            $data['type'] = $this->getlevel(211);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "212") {
            $data['type'] = $this->getlevel(212);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "213") {
            $data['type'] = $this->getlevel(213);
            $data['category'] = $this->getlevel($data['type']);
        } else if ($data['art_cid'] == "210") {
            $data['category'] = $this->getlevel(210);
            $data['type'] = $data['art_cid'];
        }
        if ($data['form_cid'] == "205" && $data['drama_video'] != "") {
            $data['video'] = implode(',', $data['drama_video']);
            $data['video_title'] = implode('|', $data['drama_video_title']);
        } else if ($data['form_cid'] == "206" && $data['music_video'] != "") {
            $data['video'] = implode(',', $data['music_video']);
            $data['video_title'] = implode('|', $data['music_video_title']);
        } else if ($data['form_cid'] == "9" && $data['dance_video'] != "") {
            $data['video'] = implode(',', $data['dance_video']);
            $data['video_title'] = implode('|', $data['dance_video_title']);
        } else if ($data['form_cid'] == "11" && $data['folk_video'] != "") {
            $data['video'] = implode(',', $data['folk_video']);
            $data['video_title'] = implode('|', $data['folk_video_title']);
        } else if ($data['form_cid'] == "7" && $data['acrobatics_video'] != "") {
            $data['video'] = implode(',', $data['acrobatics_video']);
            $data['video_title'] = implode('|', $data['acrobatics_video_title']);
        }
        return $data;
    }

    public function lists()
    {
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = '0';
        $rand = array('191', '192', '193', '194', '195', '196');
        $where['art_cid'] = array('in', $rand);
        $count = D('Admin/Active')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Active')->where($where)->page($pagenum . ',' . $this->Page_Size)->select();
        foreach ($data as $key => $value) {
            $data[$key]['categoryname'] = D('Admin/ArtCategory')->where(array('cid' => $value['art_cid']))->getField('name');
        }

        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }

    //培训辅导->添加
    public function add()
    {
        if (IS_POST) {
            //var_dump($_POST);exit;
            $data = $this->_procData();

            if (D('Admin/Active')->create($data)) {
                D('Admin/Active')->add();
                // if($_POST['channel'] =='1' ){
                //     $rechannel= new \Libs\Util\Channel($AppKey, $Nonce, $CurTime,$CheckSum);
                //     $rech=$rechannel->createUserId($_POST['channelname'],0);
                //     //var_dump($rech);exit;
                // }
               
                $author_id = \Admin\Service\User::getInstance()->id;
                $content = D('Admin/Active')->where(array('author_id' => $author_id))->order('id desc')->find();
                //echo D('Admin/Active')->getLastsql();exit;
                if ($_POST['art_cid'] == 193 || $_POST['art_cid'] == 194) {
                    $this->success('添加成功!', U('edit', array('id' => $content['id'], 'type' => 'articel')));
                    
                } else {
                    $this->success('添加成功', U('lists'));
                }
            } else {
                $this->error(D('Admin/Active')->getError());
            }
        } else {
            $result = D('Admin/ArtCategory')->getCategory('185');
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $this->assign('data', $data);
            $this->assign('result', $result);
            $this->display();
        }
    }

    //培训辅导->修改
    public function edit()
    {
        $id = I('id');
        if (IS_POST) {
            $id = I('id');
            $data = $this->_procData();
            D('Admin/Active')->create($data);
            D('Admin/Active')->where(array('id' => $id))->save();
            $this->success('修改成功!', U('lists'));
        } else {
            $data = D('Admin/Active')->where(array('id' => $id))->find();
            //var_dump($data);exit;
            $data['articel'] = D('Admin/Active')->where(array('parent_id' => $id, 'isdelete' => 0))->select();
            $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
            $data['publish_ordersetup'] = htmlspecialchars_decode($data['publish_ordersetup']);
            //  $data['publish_ordersetup'] = htmlspecialchars_decode($data['abstract']);
            $data['publish_ordermessage'] = htmlspecialchars_decode($data['publish_ordermessage']);
            $data['publish_orderintroduce'] = htmlspecialchars_decode($data['publish_orderintroduce']);
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            
            $this->assign('picture_urls', explode(",", $data['image']));
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function content()
    {
        if (IS_POST) {
            $content = I('post.');
          
            D('Admin/Active')->create($content);
            D('Admin/Active')->add();
            $author_id = \Admin\Service\User::getInstance()->id;
            //$data = D('Admin/Active')->where(array('author_id' => $author_id, 'id' => $content['parent_id']))->order('id desc')->find();
           
                $this->success('添加成功!', U('exedit', array('id' => $content['parent_id'])));
            
        } else {
            $parent_id=I('parent_id');
            $this->assign('parent_id', $parent_id);
            //var_dump($parent_id);exit;
            $this->display();
        }
    }

    public function groupcontent()
    {
        if (IS_POST) {
            $content = I('post.');
            
            $content['voide'] = implode(',', $content['dance_video']);
            $content['video_title'] = implode('|', $content['dance_video_title']);

            //unset($content['dance_video']);exit;
            // unset($content['dance_video_title']);exit;
            D('Admin/Active')->create($content);
            D('Admin/Active')->add();
            //var_dump($content);exit;
            $author_id = \Admin\Service\User::getInstance()->id;
            $data = D('Admin/Active')->where(array('author_id' => $author_id, 'id' => $content['parent_id']))->order('id desc')->find();
            if ($data['art_cid'] == '193' || $data['art_cid'] == '194') {
                $this->success('添加成功!', U('edit', array('id' => $data['id'], 'type' => 'articel')));
            } else {
                $this->success('添加成功!', U('groupedit', array('id' => $data['id'], 'type' => 'articel')));
            }
        } else {
            $this->display();
        }
    }

    public function contentedit()
    {
        $id = I('id');
        if (IS_POST) {
            $data = $_POST;
          // $data['image'] = explode(',', $data['image']);
            //var_dump($data);
            D('Admin/Active')->create($data);
            D('Admin/Active')->save();
            //echo D('Admin/Active')->getLastsql();exit;
                $this->success('添加成功!', U('exedit', array('id' => $data['parent_id'])));
            
        } else {
            $data = D('Admin/Active')->where(array('id' => $id))->find();
            //var_dump(explode(",", $data['image']));exit;
            $this->assign('image', explode(",", $data['image']));

            $this->assign('data', $data);
            $this->display();
        }
    }

    public function groupcontentedit()
    {
        $id = I('id');
        if (IS_POST) {
            $data = $_POST;
            $data['voide'] = implode(',', $data['drama_video']);
            D('Admin/Active')->create($data);
            D('Admin/Active')->save();
            if ($data['parent_id'] == 193 || $data['parent_id'] == 194) {
                $this->success('添加成功!', U('edit', array('id' => $data['parent_id'], 'type' => 'articel')));
            } else {
                $this->success('添加成功!', U('groupedit', array('id' => $data['parent_id'], 'type' => 'articel')));
            }
        } else {
            $data = D('Admin/Active')->where(array('id' => $id))->find();
            $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function contentdelete()
    {
        $id = I('id');
        $result = D('Admin/Active')->where(array('id' => $id))->setField('isdelete', 1);
        $this->success('删除成功');
    }

    public function groupcontentdelete()
    {
        $id = I('id');
        $result = D('Admin/Active')->where(array('id' => $id))->setField('isdelete', 1);
        $this->success('删除成功');
    }

    public function delete()
    {
        $id = I('id');
        $re = D('Admin/Active')->where(array('id' => $id))->setField('isdelete', 1);
        $this->success('删除成功', U('lists'));
    }

    public function showlists()
    {
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
        $rand = array('199', '200', '201');
        $where['art_cid'] = array('in', $rand);
        $count = D('Admin/Active')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Active')->where($where)->page($pagenum . ',' . $this->Page_Size)->select();
        foreach ($data as $key => $value) {
            $data[$key]['categoryname'] = D('Admin/ArtCategory')->where(array('cid' => $value['art_cid']))->getField('name');
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }

    public function showadd()
    {
        if (IS_POST) {
            $data = $this->_procData();
            if (D('Admin/Active')->create($data)) {
                D('Admin/Active')->add();
                $this->success('添加成功!', U('showlists'));
            } else {
                $this->error(D('Admin/Active')->getError());
            }
        } else {
            $result = D('Admin/ArtCategory')->getCategory('186');
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $this->assign('data', $data);
            $this->assign('result', $result);
            $this->display();
        }
    }

    public function showedit()
    {
        $id = I('id');
        if (IS_POST) {
            $id = I('id');
            $data = $this->_procData();
            D('Admin/Active')->create($_POST);
            D('Admin/Active')->where(array('id' => $id))->save();
            $this->success('修改成功!', U('showlists'));
        } else {
            $data = D('Admin/Active')->where(array('id' => $id))->find();
            //var_dump($data);exit;
            $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
            $data['publish_ordersetup'] = htmlspecialchars_decode($data['publish_ordersetup']);
            $data['publish_ordermessage'] = htmlspecialchars_decode($data['publish_ordermessage']);
            $data['publish_orderintroduce'] = htmlspecialchars_decode($data['publish_orderintroduce']);
            //$data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $this->assign('picture_urls', explode(",", $data['image']));
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            //$this->assign('picture_urls',explode(",",$data['image']));
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function showdelete()
    {
        $id = I('id');
        $re = D('Admin/Active')->where(array('id' => $id))->setField('isdelete', 1);
        $this->success('删除成功', U('showlists'));
    }

    //群文活动
    public function activelists()
    {
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
        $rand = array('202', '205', '206', '207', '208');
        $where['art_cid'] = array('in', $rand);
        $count = D('Admin/Active')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Active')->where($where)->page($pagenum . ',' . $this->Page_Size)->select();
        foreach ($data as $key => $value) {
            $data[$key]['categoryname'] = D('Admin/ArtCategory')->where(array('cid' => $value['art_cid']))->getField('name');
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }

    public function activeadd()
    {
        if (IS_POST) {
            $data = $this->_procData();
            if (D('Admin/Active')->create($data)) {
                D('Admin/Active')->add();
                $this->success('添加成功!', U('activelists'));
            } else {
                $this->error(D('Admin/Active')->getError());
            }
        } else {
            $result = D('Admin/ArtCategory')->getCategory('187');
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $this->assign('data', $data);
            $this->assign('result', $result);
            $this->display();
        }
    }

    public function activeedit()
    {
        $id = I('id');
        if (IS_POST) {
            $id = I('id');
            $data = $this->_procData();
            D('Admin/Active')->create($data);
            D('Admin/Active')->where(array('id' => $id))->save();
            $this->success('修改成功!', U('activelists'));
        } else {
            $data = D('Admin/Active')->where(array('id' => $id))->find();
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
            $data['publish_ordersetup'] = htmlspecialchars_decode($data['publish_ordersetup']);
            $data['publish_ordermessage'] = htmlspecialchars_decode($data['publish_ordermessage']);
            $data['publish_orderintroduce'] = htmlspecialchars_decode($data['publish_orderintroduce']);
            //$data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            //$this->assign('picture_urls',explode(",",$data['image']));
            $this->assign('picture_urls', explode(",", $data['image']));
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function activedelete()
    {
        $id = I('id');
        $re = D('Admin/Active')->where(array('id' => $id))->setField('isdelete', 1);
        $this->success('删除成功', U('activelists'));
    }

    //社会团体
    public function grouplists()
    {
        $pagenum = I('get.page', '1', '');
        $where['isdelete'] = 0;
        $rand = array('210', '211', '212', '213');
        $where['art_cid'] = array('in', $rand);
        $count = D('Admin/Active')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Active')->where($where)->page($pagenum . ',' . $this->Page_Size)->select();
        foreach ($data as $key => $value) {
            $data[$key]['categoryname'] = D('Admin/ArtCategory')->where(array('cid' => $value['art_cid']))->getField('name');
        }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }

    public function groupadd()
    {
        if (IS_POST) {
            $data = $this->_procData();
            if (D('Admin/Active')->create($data)) {
                D('Admin/Active')->add();
                $author_id = \Admin\Service\User::getInstance()->id;
                $content = D('Admin/Active')->where(array('author_id' => $author_id))->order('id desc')->find();
                //echo D('Admin/Active')->getLastsql();exit;
                if ($_POST['art_cid'] == 211 || $_POST['art_cid'] == 212 || $_POST['art_cid'] == 213) {
                    $this->success('添加成功!', U('groupedit', array('id' => $content['id'], 'type' => 'articel')));
                } else {
                    $this->success('添加成功', U('grouplists'));
                }
            } else {
                $this->error(D('Admin/Active')->getError());
            }
        } else {
            $result = D('Admin/ArtCategory')->getCategory('188');
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $this->assign('data', $data);
            $this->assign('result', $result);
            $this->display();
        }
    }

    public function groupedit()
    {
        $id = I('id');
        if (IS_POST) {
            $id = I('id');

            $data = $this->_procData();
            D('Admin/Active')->create($data);
            D('Admin/Active')->where(array('id' => $id))->save();
            $this->success('修改成功!', U('grouplists'));
        } else {
            $data = D('Admin/Active')->where(array('id' => $id))->find();
            //var_dump($data);exit;
            $data['articel'] = D('Admin/Active')->where(array('parent_id' => $id, 'isdelete' => 0))->select();
            $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
            $data['publish_ordersetup'] = htmlspecialchars_decode($data['publish_ordersetup']);
             $data['abstract'] = htmlspecialchars_decode($data['abstract']);
            $data['publish_ordermessage'] = htmlspecialchars_decode($data['publish_ordermessage']);
            $data['publish_orderintroduce'] = htmlspecialchars_decode($data['publish_orderintroduce']);
            // $data['default_area_level'] = D('Admin/Area')->getUserLevel(User::getInstance()->getInfo()['area']);
            // $this->assign('picture_urls',explode(",",$data['image']));
            $this->assign('picture_urls', explode(",", $data['image']));
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function groupdelete()
    {
        $id = I('id');
        $re = D('Admin/Active')->where(array('id' => $id))->setField('isdelete', 1);
        $this->success('删除成功', U('grouplists'));
    }

    //获取上一级
    public function getlevel($cid)
    {
        $parent_cid = D('Admin/ArtCategory')->where(array('cid' => $cid))->getField('parent_cid');

        return $parent_cid;

    }


    public function exadd(){
        $active_type = D('Admin/ArtCategory')->getCategory('220');
        $this->assign('active_type',$active_type);
        if(IS_POST){
            
            if($this->active->create($_POST)){
                if($this->active->add()){
                    
                    $this->success('添加成功',U('exlist'));
                }else{
                    $this->error('添加失败:'.$this->active->getError());
                }
            }else{
                $this->error('数据检查失败:'.$this->active->getError());
            }
        }
         $areaid=User::getInstance()->getInfo()['area'];
         $addressname=D('Admin/Area')->getCityName($areaid);
          //$areaname = D('Admin/Area')->getFullAreaName(User::getInstance()->getInfo()['area']);
          //var_dump($areaname);
          $this->assign('addressname',$addressname);
        //echo $areaid;
        $this->display();
    }
    public function exlist(){
        $pagenum = I('get.page','1','');
		$where['isdelete']=0;
        $where['art_cid']=array('neq',0);
        if(!User::getInstance()->isAdministrator()){
            $where['author_id'] = (int) User::getInstance()->isLogin();
        }
        $where['area']=D('Admin/Area')->getIDWhereCondition(User::getInstance()->getInfo()['area']);
       
		$count=$this->active->where($where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data=$this->active->where($where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
        //echo $this->active->getLastsql();exit;
        foreach($data as $index=>$item){
            //分类名称
            $data[$index]['art_cid'] = D('Admin/ArtCategory')->where(['cid'=>$item['art_cid']])->find();
            $data[$index]['bespeak_num'] =  D('Admin/Bespeak')->where(array('tab_cid' => $item['id'], 'tablename' => 'Active'))->count();
        }
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
		$this->display();
    }
    public function exedit(){
        if(IS_POST){
            if($this->active->create($_POST)){
                //var_dump($_POST);exit;
                if($_POST['art_cid'] !=228 ){
                   $_POST['type']=0;
                }
                if($this->active->save()){
                    //echo $this->active->getLastsql();exit;
                    $this->success('更新成功',U('exlist'));
                }else{
                    $this->error('更新失败:'.$this->active->getError());
                }
            }else{
                $this->error('数据检查失败:'.$this->active->getError());
            }
        }
        $active_type = D('Admin/ArtCategory')->getCategory('220');
        $this->assign('active_type',$active_type);
        $id = I('get.id',null);
        $data = $this->active->where(['id'=>$id])->select();
        $data['0']['areaname']=D('Admin/Area')->where(array('id'=>$data['0']['area']))->getField('name');
        $articel=$this->active->where(array('parent_id'=>$id,'isdelete'=>0))->select();
        $this->assign('articel',$articel);
        $this->assign('data',$data[0]);
        $this->display();
    }
    public function exdelete(){
        $id = I('request.id','','');
        if (!$id) {
            $this->error("请指定需要删除的项目！");
        }
        $re = $this->active->find($id);
        if(!$re) $this->error("不存在待删除数据");
         if (false == $this->active->where(array('id'=>$id))->delete()){
             $this->error('删除失败！');
         }
        $this->success('删除成功！');
    }
}