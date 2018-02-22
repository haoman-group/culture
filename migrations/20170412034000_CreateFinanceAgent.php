<?php

use Phpmig\Migration\Migration;

class CreateFinanceAgent extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_finance_agent` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `objid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '项目id',
    `money` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '融资金额  单位（万）',
    `method` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '融资方式',
    `purpose` varchar(255) NOT NULL DEFAULT '' COMMENT '用途',
    `profit` varchar(255) NOT NULL DEFAULT '' COMMENT '收益',
    `term` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投资期限',
    `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
    `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
    `status` tinyint(4) DEFAULT '0' COMMENT '状态 0 未审核 1 通过 2 审核不通过',
    `imethod` varchar(50) DEFAULT '' COMMENT '类型',
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT  CHARSET=utf8 AUTO_INCREMENT=1 ;";
     $container = $this->getContainer();
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="DROP TABLE cu_finance_agent;";   
       $container = $this->getContainer();
       $container['db']->query($sql);
    }
}
