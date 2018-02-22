<?php

use Phpmig\Migration\Migration;

class CreateTableSupplyDemand extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_supply_demand` (
  `id` int(10) unsigned NOT NULL,
  `category` varchar(45) DEFAULT NULL COMMENT '分类',
  `sub_category` varchar(45) DEFAULT NULL COMMENT '子分类',
  `type` enum('personal','company') DEFAULT 'personal' COMMENT '个人/公司',
  `area_id` int(11) DEFAULT NULL COMMENT '地区ID',
  `name` varchar(145) DEFAULT NULL COMMENT '公司或者个人名称',
  `author` varchar(45) DEFAULT NULL COMMENT '上传人',
  `intro` varchar(1045) DEFAULT NULL COMMENT '说明',
  `status` enum('normal','disabled') DEFAULT 'normal',
  `addtime` int(11) DEFAULT NULL,
  `udpatetime` int(11) DEFAULT NULL,
  `role` enum('supply','demand') DEFAULT NULL COMMENT '角色(供需)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='供需资源';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_supply_demand`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}