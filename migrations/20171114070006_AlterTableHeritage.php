<?php

use Phpmig\Migration\Migration;

class AlterTableHeritage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE  `cu_heritage` 
        ADD COLUMN `position` ENUM('yes', 'no') NULL DEFAULT 'no' AFTER `intangible`;        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_heritage` DROP COLUMN `position`;        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}