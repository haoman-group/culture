<?php

use Phpmig\Migration\Migration;

class AlterTableArea extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_area` 
        ADD COLUMN `sub_domain` VARCHAR(45) NULL COMMENT '子域名' AFTER `area_display`;        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_area` DROP COLUMN `sub_domain`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}