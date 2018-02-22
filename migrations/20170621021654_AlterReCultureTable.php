<?php

use Phpmig\Migration\Migration;

class AlterReCultureTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_re_culture` 
ADD COLUMN `if_position` INT(1) NULL DEFAULT 0 AFTER `stars`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_re_culture` 
DROP COLUMN `if_position`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}