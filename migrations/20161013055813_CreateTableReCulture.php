<?php

use Phpmig\Migration\Migration;

class CreateTableReCulture extends Migration
{
    
    public function up()
    {
        $sql="CREATE TABLE IF NOT EXISTS `cu_re_culture` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `art_cid` int(10) NOT NULL COMMENT 'cid',
  `author_id` int(10) NOT NULL COMMENT '上传者ID',
  `unit` varchar(20)  NOT NULL COMMENT '表演单位',
  `region` varchar(45)  NOT NULL COMMENT '流布区域',
  `troupe` varchar(45) NOT NULL COMMENT '剧团',
  `image` varchar(100)  NOT NULL COMMENT '图片',
  `voide` varchar(100)  NOT NULL COMMENT '视频',
  `awards` varchar(100)  NOT NULL COMMENT '获奖情况',
  `example` varchar(50)  NOT NULL COMMENT '代表作',
  `agency` varchar(20)  NOT NULL COMMENT '机构',
  `figures` varchar(50)  NOT NULL COMMENT '代表人物',
  `audio` varchar(50)  NOT NULL COMMENT '音频',
  `band` varchar(50)  NOT NULL COMMENT '乐团',
  `performer` varchar(50)  NOT NULL COMMENT '表演者',
  `introduction` text  NOT NULL COMMENT '简介',
  `area` int(10)  NOT NULL COMMENT '所属地区',
  `authorname` varchar(50)  NOT NULL COMMENT '作者',
  `technique` varchar(50)  NOT NULL COMMENT '技法',
  `theme` varchar(50)  NOT NULL COMMENT '题材',
  `category` varchar(50)  NOT NULL COMMENT '类别',
  `artist` varchar(45)  NOT NULL COMMENT '艺术家',
  
  `isdelete` int(1) NOT NULL DEFAULT '0',
  `addtime` date NOT NULL,
  `updatetime` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文化艺术表' AUTO_INCREMENT=1 ;";
  $container = $this->getContainer(); 
  $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql = "drop table cu_re_culture;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
