<?php

use Phpmig\Migration\Migration;

class AddStatisticsHistoryTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `cu_category_statistics_history` (
                `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
                `cid` int(10) NOT NULL COMMENT '分类信息',
                `area` int(10) NOT NULL COMMENT '地区信息',
                `total_num` int(10) NOT NULL COMMENT '统计数量',
                `addtime` DATETIME NULL,
			  	`level` varchar(25) DEFAULT '' COMMENT '级别:国家级、省级、市级:',
			  	`represent` tinyint(1) DEFAULT '0' COMMENT '代表性项目为1，代表性传承人为2, 0表示无此分类',
                 PRIMARY KEY (`id`),
				 KEY cid_addtime(cid, addtime)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='数据统计历史数据' AUTO_INCREMENT=1";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE cu_category_statistics_history;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
