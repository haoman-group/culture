<?php

use Phpmig\Migration\Migration;

class AddChartToNews extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_news` ADD `areaid` INT(15) NOT NULL COMMENT '地区';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_news` DROP ` areaid `;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}