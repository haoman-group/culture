<?php

use Phpmig\Migration\Migration;

class CreateTableNewest extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_newest` (
               `id` int(10) UNSIGNED NOT NULL,
               `news_id` int(10) NOT NULL COMMENT '咨询类别',
               `upload_unit` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '上传单位',
               `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '标题',
               `image` varchar(255) CHARACTER SET utf8 NOT NULL,
               `content` text CHARACTER SET utf8 NOT NULL COMMENT '内容',
               `isdelete` int(1) NOT NULL DEFAULT '0',
               `addtime` int(25) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='最新咨询';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_newest` ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}