<?php

use Phpmig\Migration\Migration;

class CreateInterpret extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_interpret` (
               `id` INT NOT NULL AUTO_INCREMENT,
              `title` varchar(1255) CHARACTER SET utf8 NOT NULL,
               `author` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '上传者',
               `unit` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '上传单位',
               `photographyer` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '摄影',
               `isdelete` int(1) NOT NULL,
               `addtime` date NOT NULL,
               `updatetime` date NOT NULL,
               `content` text CHARACTER SET utf8 NOT NULL COMMENT '内容',
               `intro` text CHARACTER SET utf8 NOT NULL COMMENT '简介',
               PRIMARY KEY (`id`)
               ) ENGINE=MyISAM DEFAULT CHARSET=utf8  COMMENT='演出论坛';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_interpret`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}