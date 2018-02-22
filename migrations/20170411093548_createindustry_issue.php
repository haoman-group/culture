<?php

use Phpmig\Migration\Migration;

class CreateindustryIssue extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE IF NOT EXISTS `cu_industry_issue` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cname` varchar(30) NOT NULL DEFAULT '' COMMENT '企业名称',
  `pname` varchar(30) NOT NULL DEFAULT '' COMMENT '项目名称',
  `pcategory` int(11) NOT NULL DEFAULT '0' COMMENT '类型id',
  `plimit` int(11) NOT NULL COMMENT '投资总额',
  `pleader` varchar(15) NOT NULL DEFAULT '' COMMENT '项目负责人',
  `contactnum` varchar(11) NOT NULL DEFAULT '0' COMMENT '联系电话',
  `plocation` varchar(30) NOT NULL DEFAULT '' COMMENT '项目所在地',
  `pbriefing` varchar(255) NOT NULL DEFAULT '' COMMENT '项目简介',
  `pstage` int(11) NOT NULL DEFAULT '0' COMMENT '投资阶段id',
  `prospect` varchar(255) NOT NULL DEFAULT '' COMMENT '项目前景',
  `pthumb` varchar(255) NOT NULL DEFAULT '' COMMENT '项目图片',
  `pfinancing` tinyint(11) NOT NULL COMMENT '是否进入融资',
  `inputtime` int(11) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '0' COMMENT '状态',
  `uid` int(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '项目类型',
  `area` varchar(50) DEFAULT '' COMMENT '地址省市区 ID',
  PRIMARY KEY (`id`)
  )ENGINE=InnoDB DEFAULT  CHARSET=utf8 AUTO_INCREMENT=1 ;";
    $container = $this->getContainer();
   $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="DROP TABLE cu_industry_issue;";   
     $container = $this->getContainer();
   $container['db']->query($sql);
    }
}
