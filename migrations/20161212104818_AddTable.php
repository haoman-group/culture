<?php

use Phpmig\Migration\Migration;

class AddTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
       $sql = "ALTER TABLE `culture`.`cu_active` ADD COLUMN `point_lng` VARCHAR(45) NULL DEFAULT 0 ,ADD COLUMN `point_lat` VARCHAR(45) NULL DEFAULT 0 ;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql = "ALTER TABLE `culture`.`cu_active` DROP COLUMN `point_lat`,DROP COLUMN `point_lng`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
