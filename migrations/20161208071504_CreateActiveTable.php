<?php

use Phpmig\Migration\Migration;

class CreateActiveTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_active` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `art_cid` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `content_title` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '主标题',
  `host_unit` varchar(125) CHARACTER SET utf8 NOT NULL COMMENT '主办单位',
  `act_address` varchar(125) CHARACTER SET utf8 NOT NULL COMMENT '活动地点',
  `act_time` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '活动时间',
  `subtitle` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '副标题',
  `training_title` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '培训标题(讲座)',
  `start_time` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '开课时间',
  `end_time` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '结束时间',
  `training_addr` varchar(125) CHARACTER SET utf8 NOT NULL COMMENT '培训地点(讲座)',
  `lecturer` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '授课讲师',
  `duration` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '时长',
  `participation_mode` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '参与方式',
  `contacts` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '联系人',
  `contacts_tel` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT '联系电话',
  `acceptance` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT '容纳人数',
  `type` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '类别',
  `category` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '类型',
  `dance_winning` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '舞蹈类/书法类',
  `art_winning` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '艺术/美术',
  `theatre_winning` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '戏剧/水墨',
  `music_winning` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '音乐/毛笔',
  `publish_content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `publish_ordersetup` text CHARACTER SET utf8 NOT NULL COMMENT '课程设置',
  `publish_ordermessage` text CHARACTER SET utf8 NOT NULL COMMENT '学期通知',
  `publish_orderintroduce` text NOT NULL COMMENT '老师介绍',
  `abstract` text CHARACTER SET utf8 NOT NULL COMMENT '简介',
  `image` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '图片',
  `voide` varchar(100) CHARACTER SET utf8 NOT NULL,
  `author_id` int(15) NOT NULL COMMENT '上传人',
  `area` int(15) NOT NULL COMMENT '地址ID',
  `addtime` datetime NOT NULL,
  `isdelete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;
";  
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="drop table cu_active;";   
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
