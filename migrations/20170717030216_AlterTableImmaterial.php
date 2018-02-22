<?php

use Phpmig\Migration\Migration;

class AlterTableImmaterial extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_immaterial` 
ADD COLUMN `national_level` VARCHAR(45) NOT NULL COMMENT '国家级级别' AFTER `level`;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_immaterial` DROP COLUMN `national_level`;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}