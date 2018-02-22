<?php

use Phpmig\Migration\Migration;

class AlterTabelSupplyDemand2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_supply_demand` 
CHANGE COLUMN `udpatetime` `updatetime` INT(11) NULL DEFAULT NULL ,
ADD COLUMN `download` INT NULL COMMENT '下载次数' AFTER `contact`;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_festival` DROP COLUMN `cu_supply_demand`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}