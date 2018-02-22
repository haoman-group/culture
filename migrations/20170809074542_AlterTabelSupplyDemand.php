<?php

use Phpmig\Migration\Migration;

class AlterTabelSupplyDemand extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_supply_demand` 
CHANGE COLUMN `id` `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
ADD COLUMN `contact` VARCHAR(45) NULL COMMENT '联系方式' AFTER `role`;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_festival` DROP COLUMN `contact`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}