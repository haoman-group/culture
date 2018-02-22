<?php

use Phpmig\Migration\Migration;

class AlterTableFestivalHits extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_festival` ADD COLUMN `hits` INT NULL  DEFAULT 0 COMMENT '点击量' AFTER `userid`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_festival` DROP COLUMN `hits`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}