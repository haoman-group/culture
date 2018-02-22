<?php

use Phpmig\Migration\Migration;

class InsertChartToInterpretTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_interpret` ADD `url` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '视频链接' ; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_interpret` DROP `url`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}