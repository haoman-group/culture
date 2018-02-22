<?php

use Phpmig\Migration\Migration;

class CreateCollectionTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_collection` (
                `id` int(10)  NOT NULL AUTO_INCREMENT,
                `show_id` int(10) NOT NULL COMMENT '收藏ID',
                `tablename` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '收藏信息的类别',
                `userid` int(10) NOT NULL COMMENT '收藏renID',
               `isdelete` int(1) NOT NULL DEFAULT '0',
                `addtime` varchar(35) NOT NULL,
                 PRIMARY KEY (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8  COMMENT='我的收藏';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_collection`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}