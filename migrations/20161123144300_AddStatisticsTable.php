<?php

use Phpmig\Migration\Migration;

class AddStatisticsTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_art_category` 
				ADD COLUMN `total_num` int(10) DEFAULT 0 COMMENT '统计该分类的条目总数';
				CREATE TABLE IF NOT EXISTS `cu_category_statistics` (
                `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
                `cid` int(10) NOT NULL COMMENT '分类信息',
                `area` int(10) NOT NULL COMMENT '地区信息',
                `total_num` int(10) NOT NULL COMMENT '统计数量',
                `addtime` DATETIME NULL,
                 PRIMARY KEY (`id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='数据统计' AUTO_INCREMENT=1";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_art_category`DROP COLUMN `total_num`;
                DROP TABLE cu_category_statistics;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
