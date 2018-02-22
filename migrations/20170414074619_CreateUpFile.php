<?php

use Phpmig\Migration\Migration;

class CreateUpFile extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE IF NOT EXISTS `cu_upfile` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `file_path` varchar(255) NOT NULL DEFAULT '' COMMENT '文件路径',
         `type` varchar(255) NOT NULL DEFAULT '' COMMENT '上传模块',
         `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
         PRIMARY KEY (`id`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
    $sql="DROP TABLE `cu_upfile;";   
    $container = $this->getContainer();
    $container['db']->query($sql);
    }
}
