<?php

use Phpmig\Migration\Migration;

class InsertChartToTableBriefing extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_briefing` ADD `position` INT(10) NOT NULL COMMENT '排序';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_briefing` DROP `position`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}