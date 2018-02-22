<?php

use Phpmig\Migration\Migration;

class CreatePosition extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_position` (
            `posid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
            `modelid` char(30) NOT NULL DEFAULT '' COMMENT '模型id',
            `catid` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目id',
            `name` char(30) NOT NULL DEFAULT '' COMMENT '推荐位名称',
            `maxnum` smallint(5) NOT NULL DEFAULT '20' COMMENT '最大存储数据量',
            `extention` char(100) NOT NULL DEFAULT '',
           `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
            PRIMARY KEY (`posid`)
          ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='推荐位' AUTO_INCREMENT=6 ;";
        $container = $this->getContainer();
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="DROP TABLE `cu_position;";
       $container = $this->getContainer();
       $container['db']->query($sql);
    }
}
