<?php

use Phpmig\Migration\Migration;

class CreateTableTheatre extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_theatre` (
   `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '剧院名称',
  `unit` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '上传单位',
  `display_area` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '地址详情',
  `drama_picture_url` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '图片',
  `publish_content` text CHARACTER SET utf8 NOT NULL COMMENT '内容',
  `addtime` varchar(255) NOT NULL,
  `auditStatus` int(2) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `isdelete` int(1) NOT NULL DEFAULT '0',
  `author_id` int(11) NOT NULL COMMENT '上传者ID',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COMMENT='剧院';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_theatre

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}