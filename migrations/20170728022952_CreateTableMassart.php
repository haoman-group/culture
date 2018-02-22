<?php

use Phpmig\Migration\Migration;

class CreateTableMassart extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_massart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(145) DEFAULT NULL,
  `content` text COMMENT '内容',
  `video` varchar(45) DEFAULT NULL COMMENT '内容',
  `video_title` varchar(145) DEFAULT NULL COMMENT '视频标题',
  `images` text COMMENT '图片',
  `cover` varchar(145) DEFAULT NULL COMMENT '封面',
  `keywords` varchar(500) DEFAULT NULL COMMENT '关键词',
  `category` varchar(45) DEFAULT NULL COMMENT '文艺分类',
  `session` varchar(45) DEFAULT NULL COMMENT '第几届',
  `type` varchar(145) DEFAULT NULL COMMENT '类型',
  `hits` int(11) DEFAULT NULL COMMENT '点击量',
  `author_id` int(11) DEFAULT NULL COMMENT '作者',
  `isdelete` int(1) DEFAULT '0' COMMENT '是否删除',
  `addtime` int(11) DEFAULT NULL COMMENT '新增时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='群众文艺';


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_massart`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}