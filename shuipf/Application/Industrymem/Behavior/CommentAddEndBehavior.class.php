<?php

/**
 * 评论发表完成后的行为调用，主要实现的也就是被回复后进行系统通知
 * comment_add_end
 * File Name：CommentAddEndBehavior.class.php
 * File Encoding：UTF-8
 * File New Time：2014-1-16 15:11:17
 * Author：水平凡
 * Mailbox：admin@abc3210.com
 */
namespace Industrymem\Behavior;

class CommentAddEndBehavior {

    public function run(&$data) {
        if (empty($data)) {
            return false;
        }
        //被回复的评论id
        $parent = $data['parent'];
        //被回复的评论
        $parentInfo = D("Comments")->where(array('id' => $parent))->find();
        $GLOBALS['comment_gxp'] = array(
            //被回复的评论id
            'parent' => $parent,
            //被回复的评论相关信息
            'parentdata' => $parentInfo,
            //被回复的评论是否登陆会员发表
            'islogin' => $parentInfo['user_id'] ? true : false,
            //被回复的评论是否和当前回复他的用户是同一个人
            'ismy' => ($parentInfo['user_id'] && $parentInfo['user_id'] == AppframeAction::$Cache['uid']) ? true : false,
        );
        //所属文章id
        $comment_id = explode('-', $data['comment_id'], 3);
        //栏目ID
        $catid = $comment_id[1];
        //信息ID
        $id = $comment_id[2];
        $tab = ucwords(getModel(getCategory($catid,'modelid'),'tablename'));
        //查询出文章信息
        $article = M($tab)->where(array("id" => $id))->field("id,title,url,catid,updatetime,sysadd,username,status")->find();
        if (empty($article)) {
            return false;
        }
        //产生通知的用户信息
        $sendUser = array(
            'userid' => AppframeAction::$Cache['uid'],
            'username' => AppframeAction::$Cache['username'],
        );
        //我是文章作者，被评论提醒（回复评论不提醒）
        if ($article['sysadd'] == 0 && $data['parent'] == 0) {
            //文章的作者信息
            $userInfo = D('Member/Member')->getUserInfo($article['username'], 'userid,username');
            if ($data['user_id'] != $userInfo['userid']) {
                //附带参数
                $extendParams = array(
                    'title' => '您的《' . $article['title'] . '》 被 [' . $sendUser['username'] . '] 进行了评论！',
                    //回复人
                    'userid' => $sendUser['userid'],
                    'username' => $sendUser['username'],
                    //回复的评论id
                    'comment_id' => $data['id'],
                    //回复时间
                    'datetime' => $data['date'],
                    //评论的信息数组
                    'article' => $article,
                    //通知类型
                    'type' => 'comment',
                );
                //进行通知被回复的用户
                D('Member/Message')->sendNotice($userInfo['userid'], $sendUser, 'default', $extendParams);
            }
        }
        
        //评论被回复提醒
        if ($data['approved'] && $data['user_id'] && $GLOBALS['comment_gxp']['islogin'] && $GLOBALS['comment_gxp']['ismy'] == false) {
            //被回复的评论
            $parentInfo = $GLOBALS['comment_gxp']['parentdata'];
            if (empty($parentInfo)) {
                return false;
            }
            //附带参数
            $extendParams = array(
                'title' => '您在《' . $article['title'] . '》 的评论被 [' . $sendUser['username'] . '] 进行了回复！',
                //回复人
                'userid' => $sendUser['userid'],
                'username' => $sendUser['username'],
                //回复的评论id
                'comment_id' => $data['id'],
                //回复时间
                'datetime' => $data['date'],
                //评论的信息数组
                'article' => $article,
                //通知类型
                'type' => 'comment_reply',
            );
            //进行通知被回复的用户
            D('Member/Message')->sendNotice($parentInfo['user_id'], $sendUser, 'default', $extendParams);
        }
    }

}
