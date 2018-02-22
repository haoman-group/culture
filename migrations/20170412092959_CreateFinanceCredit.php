<?php

use Phpmig\Migration\Migration;

class CreateFinanceCredit extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_finance_credit` (
      `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `company_name` varchar(255) NOT NULL DEFAULT '' COMMENT '企业名称',
    `representative_name` varchar(50) NOT NULL DEFAULT '' COMMENT '法人代表',
    `tel` varchar(20) NOT NULL DEFAULT '' COMMENT '电话号码',
    `licence` varchar(255) NOT NULL DEFAULT '' COMMENT '营业执照',
    `tax` varchar(255) NOT NULL DEFAULT '' COMMENT '税务登记',
    `workers_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公司人数',
    `is_assurance` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否缴纳社会保障 0：否    1：是',
    `prev_assurance_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上年度缴纳社保人数',
    `prev_electric_fee` decimal(18,4) unsigned NOT NULL DEFAULT '0.0000' COMMENT '上年度电费    单位（万）',
     `prev_output_value` decimal(18,4) unsigned NOT NULL DEFAULT '0.0000' COMMENT '上年度产值',
     `prev_sales` decimal(18,4) NOT NULL COMMENT '上年度销售总额',
     `prev_tax` decimal(18,4) unsigned NOT NULL DEFAULT '0.0000' COMMENT '上年度纳税 单位  万',
     `prev_assets` decimal(18,4) unsigned NOT NULL DEFAULT '0.0000' COMMENT '上年度总资产 单位（万）',
     `prev_mortgage` decimal(18,4) unsigned NOT NULL DEFAULT '0.0000' COMMENT '上年度可抵押资产',
      `prev_debt_ratio` decimal(18,4) NOT NULL DEFAULT '0.0000' COMMENT '上年度负债率',
     `member_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
     `level` tinyint(4) DEFAULT '0' COMMENT '评价等级',
      `inputtime` int(11) DEFAULT '0' COMMENT '填表时间',
      `audit` tinyint(4) DEFAULT '0' COMMENT '后台审核结果  0 未审核   1  通过  2 不合格',
      `updatatime` int(11) DEFAULT '0' COMMENT '更新时间',
       PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
    $sql="DROP TABLE cu_finance_credit;";   
    $container = $this->getContainer();
    $container['db']->query($sql);
    }
}
