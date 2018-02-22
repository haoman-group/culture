<?php

use Phpmig\Migration\Migration;

class AlterTableFestival extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_festival` ADD COLUMN `images` TEXT NULL AFTER `hits`;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_festival` DROP COLUMN `images`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}