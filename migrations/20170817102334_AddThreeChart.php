<?php

use Phpmig\Migration\Migration;

class AddThreeChart extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_member` ADD `rdid` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '读者证号';
        ALTER TABLE `cu_supply_demand` ADD `style` VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' supply为供应方，demand为需求方';
        ALTER TABLE `cu_supply_demand` ADD `filename` VARCHAR(125) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文件名';
        ALTER TABLE `cu_supply_demand`  ADD `savepath` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL COMMENT '文件路径' ;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_recu_member` DROP `rdid`
        ALTER TABLE `cu_supply_demand` DROP `style`
        ALTER TABLE `cu_supply_demand` DROP `filename`
       ALTER TABLE `cu_supply_demand` DROP `savepath`

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}