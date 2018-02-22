<?php

use Phpmig\Migration\Migration;

class AddChartToTableAreaDate extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_area_data` ADD `position` INT(2) NOT NULL COMMENT '轮播顺序';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_area_data` DROP `position`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}