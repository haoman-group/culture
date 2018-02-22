<?php

use Phpmig\Migration\Migration;

class CreatePositionData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_position_data` (
         `id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'ID',
         `catid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
        `posid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位ID',
        `module` char(20) NOT NULL DEFAULT '' COMMENT '模型',
        `modelid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
        `thumb` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否有缩略图',
        `data` mediumtext COMMENT '数据信息',
        `listorder` mediumint(8) NOT NULL DEFAULT '0' COMMENT '排序',
        `expiration` int(10) NOT NULL,
        `extention` char(30) NOT NULL DEFAULT '',
        `synedit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否同步编辑',
        KEY `posid` (`posid`),
        KEY `listorder` (`listorder`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐位数据表';";
      $container = $this->getContainer();
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="DROP TABLE `cu_position_data;";
       $container = $this->getContainer();
       $container['db']->query($sql);
    }
}
