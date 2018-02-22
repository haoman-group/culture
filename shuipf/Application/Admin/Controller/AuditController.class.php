<?php
//审核信息
namespace Admin\Controller;

use Admin\Model\AreaModel;
use Admin\Model\ArtCategoryModel;
use Common\Controller\AdminBase;
use Admin\Service\User;

class AuditController extends AdminBase
{

    private $auditModel = NULL;
    //静态审核状态
    public static $auditStatus = array(-1 => '未审核', 5 => '审核通过(县)', 10 => '驳回(县)', 15 => '审核通过(市)', 20 => '驳回(市)', 25 => '审核通过(省)', 30 => '驳回(省)', 35 => '审核通过', 40 => '驳回');

    protected function _initialize()
    {
        parent::_initialize();
        //$level = User::getInstance()->getUserLevel();
        $this->auditModel = D('Admin/Audit');
        $this->assign('maxPicNum', 5);
        $this->assign('maxVideoNum', 1);
        // switch ($level) {
        //     case AreaModel::XIANG:
        //         $this->assign('auditstatus', array(5 => '审核通过', 10 => '驳回'));
        //         break;
        //     case AreaModel::XIAN:
        //         $this->assign('auditstatus', array(15 => '审核通过', 20 => '驳回'));
        //         break;
        //     case AreaModel::SHI:
        //         $this->assign('auditstatus', array(25 => '审核通过', 30 => '驳回'));
        //         break;
        //     case AreaModel::SHENG:
        //         $this->assign('auditstatus', array(35 => '审核通过', 40 => '驳回'));
        //         break;

        //     default:
        //         # code...
        //         break;
        // }

    }

    //待审核的详细信息
    public function show()
    {
        $id = I('id');
        $type = I('type');
        if (empty($type)) {
            $type = I('showtype');
        }
        $auditstatus = I('auditstatus');

        if (empty($id) || empty($type)) {
            $this->error('参数不完整');
        } else {

            $where['isdelete'] = 0;
            $where['id_au'] = I('id_au');
            $where['id'] = I('id');
            $where['aduitstatus']=0;
            // $level = User::getInstance()->getUserLevel();
            // switch ($level) {
            //     case AreaModel::XIANG:
            //         $where['aduitstatus'] = -1;
            //         break;
            //     case AreaModel::XIAN:
            //         $where['aduitstatus'] = 10;
            //         break;
            //     case AreaModel::SHI:
            //         $where['aduitstatus'] = 20;
            //         break;
            //     case AreaModel::SHENG:
            //         $where['aduitstatus'] = 30;
            //         break;

            //     default:
            //         # code...
            //         break;
            // }

            if ($type == 'ReCulture') {
                $data = D('Admin/' . $type)->where($where)->select();
                //echo D('Admin/'.$type)->getLastsql();exit;
                foreach ($data as $key => $value) {
                    $data[$key]['categoryname']= D('Admin/ArtCategory')->where(array('cid' => $value['drama']))->find();
                }
                $data['0']['audit'] = D('Admin/Audit')->where(array('cid' => $data['0']['id'], 'isdelete' => 0))->select();
                $this->assign('data', $data[0]);
                foreach ($data[0]['audit'] as $key => $value) {
                    $data[0]['audit'][$key]['author'] = D('Admin/User')->where(array('id' => $value['audit_id']))->getField('username');
                }
                //var_dump($data);exit;
                $this->assign('data', $data[0]);
                $this->assign('picture_urls', explode(",", $data[0]['image']));
                $this->display('Art/show');
            } else if ($type == 'Policy') {
                $data = D('Admin/PolicyCulture')->where($where)->select();
                //var_dump($data);exit;
                foreach ($data as $key => $value) {
                    $data[$key]['categoryname'] = D('Admin/ArtCategory')->where(array('cid' => $value['art_cid']))->getField('name');
                }
                $data['0']['audit'] = D('Admin/Audit')->where(array('cid' => $data['0']['id'], 'isdelete' => 0))->select();
                foreach ($data[0]['audit'] as $key => $value) {
                    $data[0]['audit'][$key]['author'] = D('Admin/User')->where(array('id' => $value['audit_id']))->getField('username');
                }

                $this->assign('data', $data[0]);
                $this->display('Policy/show');
            } else if ($type == 'Comartcenter') {
                $data = D('Admin/Comartcenter')->where($where)->find();
                $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
                $data['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['art_cid']);
                $data['categoryname'] = D('Admin/ArtCategory')->where(array('cid' => $data['drama']))->find();
                $data['audit'] = D('Admin/Audit')->where(array('cid' => $data['id'], 'isdelete' => 0))->select();
                foreach ($data['audit'] as $key => $value) {
                    $data['audit'][$key]['author'] = D('Admin/User')->where(array('id' => $value['audit_id']))->getField('username');
                }
                $this->assign('picture_urls', explode(",", $data['picture']));
                $this->assign('data', $data);
                $this->display('ComArtCenter/show');
            } else {
                $data = D('Admin/' . $type)->where($where)->find();
                $data['publish_content'] = htmlspecialchars_decode($data['publish_content']);
                $data['categoryname'] = D('Admin/ArtCategory')->where(array('cid' => $data['art_cid']))->getField('name');
                $data['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['art_cid']);
                $data['audit'] = D('Admin/Audit')->where(array('cid' => $data['id'], 'isdelete' => 0))->select();
                foreach ($data['audit'] as $key => $value) {
                    $data['audit'][$key]['author'] = D('Admin/User')->where(array('id' => $value['audit_id']))->getField('username');
                }
                if($type=="Industry"){
                     $this->assign('acrobatics_picture_url', explode(",", $data['acrobatics_picture_url']));
                    $this->assign('music_picture_urls', explode(",", $data['acrobatics_picture_url']));

                }else{
                  $this->assign('picture_urls', explode(",", $data['picture']));
                }
                
                $this->assign('data', $data);
                $this->display($type . '/show');
            }
        }
    }

    public function add()
    {
        $id = I('cid');
        $type = I('type');

        $auditstatus = I("auditstatus");

        $data = $_POST;
        if ($data['auditstatus'] == '请选择') {
            $this->error("审核状态必须操作");
        } else {
            $this->auditModel->create($_POST);
            $this->auditModel->add();
        }
        if ($type == 'Policy') {
            D('Admin/PolicyCulture')->where(array('id' => $id))->setField('auditstatus', $auditstatus);

        } else {
            D('Admin/' . $type)->where(array('id' => $id))->setField('auditstatus', $auditstatus);
        }
        $this->success("操作成功", U("Action/index"));
    }

    public function edit()
    {
        $id = I('id');
        $type = I('type');
        if (empty($id) || empty($type)) {
            $this->error('参数不完整');
        } else {

            $where['isdelete'] = 0;
            $where['id'] = $id;
            $where['auditstatus']=0;
            }
            if ($type == 'ReCulture') {
                $data = D('Admin/' . $type)->where($where)->select();
                $data[0]['audit'] = M('Audit')->alias('a')->field("a.*,cu_user.username as author")->where(array('cid' => $data['0']['id'], 'category' => $type))->join("cu_user on cu_user.id = a.audit_id", 'left')->select();
                $data[0]['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['0']['art_cid']);
                //var_dump($data);exit;
                $this->assign('data', $data[0]);
                $this->assign('picture_urls', explode(",", $data[0]['image']));

                $this->display('Art/edit');
            } else if ($type == 'Policy') {
                $data = D('Admin/PolicyCulture')->where($where)->select();
                $data[0]['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['0']['art_cid']);
                $data[0]['audit'] = M('Audit')->alias('a')->field("a.*,cu_user.username as author")->where(array('cid' => $data['0']['id'], 'category' => $type))->join("cu_user on cu_user.id = a.audit_id", 'left')->select();
                $this->assign('data', $data[0]);

                $this->display('Policy/edit');
            } elseif ($type == "Comartcenter") {
                $data = D('Admin/' . $type)->where($where)->find();
                $data['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['art_cid']);

                $data['audit'] = M('Audit')->alias('a')->field("a.*,cu_user.username as author")->where(array('cid' => $data['id'], 'category' => $type))->join("cu_user on cu_user.id = a.audit_id", 'left')->select();
                $this->assign('data', $data);
                $this->display($type . '/add');
            } elseif ($type == 'Library') {
                $data = D('Admin/' . $type)->where($where)->find();
                $data['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['art_cid']);

                $data['audit'] = M('Audit')->alias('a')->field("a.*,cu_user.username as author")->where(array('cid' => $data['id'], 'category' => $type))->join("cu_user on cu_user.id = a.audit_id", 'left')->select();
                $this->assign('data', $data);
                $this->display($type . '/add');
            } else {
                $data = D('Admin/' . $type)->where($where)->find();

                $data['parent_artcid'] = D('Admin/ArtCategory')->getparent($data['art_cid']);
                //var_dump($data);exit;
                $data['audit'] = M('Audit')->alias('a')->field("a.*,cu_user.username as author")->where(array('cid' => $data['id'], 'category' => $type))->join("cu_user on cu_user.id = a.audit_id", 'left')->select();
                $this->assign('data', $data);
                //var_dump($type.'/edit');exit;
                $this->display($type . '/edit');
            }
        }
    }

