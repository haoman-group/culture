<?php

use Phpmig\Migration\Migration;

class CreateTableLandmark extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="CREATE TABLE IF NOT EXISTS `cu_landmark` (
    `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `title` int(10) NOT NULL COMMENT '标题',
    `content` text NOT NULL COMMENT '内容',
    `addtime` datetime DEFAULT NULL,
    `updatetime` datetime DEFAULT NULL,
    `isdelete` INT(1) NULL DEFAULT 0 ,
    `status` INT(1) NULL DEFAULT 0 ,
     PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文化地标';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="drop table cu_landmark;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
