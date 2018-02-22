<?php

use Phpmig\Migration\Migration;

class Createregion extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_region` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
      `name` varchar(50) NOT NULL COMMENT '地区名称',
      `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '地区父ID',
      `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
      `deep` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '地区深度，从1开始',
      PRIMARY KEY (`id`),
      KEY `area_parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT  CHARSET=utf8 AUTO_INCREMENT=1 ;";
$container = $this->getContainer();
$container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="DROP TABLE cu_region;";   
       $container = $this->getContainer();
       $container['db']->query($sql);
    }
}
