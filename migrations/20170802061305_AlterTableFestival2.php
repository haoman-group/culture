<?php

use Phpmig\Migration\Migration;

class AlterTableFestival2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_festival` 
ADD COLUMN `start_date` INT NULL COMMENT '活动开始时间' AFTER `images`,
ADD COLUMN `end_date` INT NULL COMMENT '活动结束时间' AFTER `start_date`,
ADD COLUMN `site` VARCHAR(145) NULL COMMENT '演出场馆' AFTER `end_date`;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_festival` DROP COLUMN `site`,DROP COLUMN `end_date`,DROP COLUMN `start_date`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}