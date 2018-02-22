<?php

use Phpmig\Migration\Migration;

class CreateComment extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_comment` (
     `id` int(10) NOT NULL AUTO_INCREMENT,
    `userid` int(10) NOT NULL COMMENT '评论人ID',
    `username` varchar(125) CHARACTER SET utf8 NOT NULL COMMENT '评论者姓名',
    `show_id` int(10) NOT NULL COMMENT '评论数据ID',
    `publish_content` text CHARACTER SET utf8 NOT NULL COMMENT '评论内容',
    `addtime` datetime NOT NULL,
     `updatetime` datetime NOT NULL,
     `isdelete` int(1) DEFAULT '0',
     `status` int(1) DEFAULT '0' COMMENT '举报',
      PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论' AUTO_INCREMENT=1 ;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="DROP TABLE cu_comment;";  
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
