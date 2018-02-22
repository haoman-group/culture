<?php

use Phpmig\Migration\Migration;

class AlterTableCityContent extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_city_content` 
        ADD COLUMN `area` INT NULL COMMENT '地区ID' AFTER `source`;
        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_city_content` 
        DROP COLUMN `area`;
        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}