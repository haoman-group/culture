<?php

use Phpmig\Migration\Migration;

class AlterImmContentSize extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "SET SESSION sql_mode='ALLOW_INVALID_DATES' ;ALTER TABLE `culture`.`cu_immaterial` 
        CHANGE COLUMN `content` `content` MEDIUMTEXT NOT NULL ;        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_immaterial` 
        CHANGE COLUMN `content` `content` TEXT NOT NULL ;        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}