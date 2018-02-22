<?php

namespace Pubservice\Controller;

use Admin\Service\User;
use Pubservice\Controller\PubBaseController;

class CommentController extends PubBaseController
{
    public function add()
    {
        if (IS_POST) {
            $data = $_POST;
            $data['author_id'] = D('Admin/Active')->where(array('id' => $data['show_id']))->getField('author_id');
            D("Admin/Comment")->create($data);
            $id = D("Admin/Comment")->add();
            $result = D("Admin/Comment")->where(array("id" => $id))->select();
            $condition['tablename'] = $data['tablename'];
            $condition['show_id'] = $data['show_id'];
            $condition['isdelete'] = 0;
            $comment_num = M('Comment')->where($condition)->order('id desc')->count();
            $comment_person_num = M('Comment')->where($condition)->count("distinct userid");

            $this->ajaxReturn(array(
                'data' => $result[0],
                'status' => 1,
                'comment_num' => $comment_num,
                'comment_person_num' => $comment_person_num,
                'picture' => D('Admin/Member')->where(array('userid' => $result[0]["userid"]))->getField('userpic')
            ));
        } else {
//            $data = array();
//            $wherre['tablename'] = I('get.tablename');
//            $where['show_id'] = I('get.id');
//            $where['isdelete'] = 0;
//            $comment = M('Comment')->where($where)->order('id desc')->select();
//            var_dump($comment);
//            exit;
//            $comment['num'] = M('Comment')->where($where)->order('id desc')->count();
//            $this->assign('data', $data);
//            $this->display();
        }
    }

    public function report()
    {
        $id = I('id');
        $result = D('Admin/Comment')->where(array('id' => $id))->setField('status', 1);
        if ($result) {
            $this->success('操作成功');

        } else {
            $this->error('举报失败');
        }
    }

    public function reply()
    {

        $data = $_POST;
        D("Admin/Comment")->create($data);
        D("Admin/Comment")->add();
        $this->success('添加成功!');
    }

}