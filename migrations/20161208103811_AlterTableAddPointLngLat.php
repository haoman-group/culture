<?php

use Phpmig\Migration\Migration;

class AlterTableAddPointLngLat extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        //图书馆
        $sql = "ALTER TABLE `culture`.`cu_library` ADD COLUMN `point_lng` VARCHAR(45) NULL DEFAULT 0 ,ADD COLUMN `point_lat` VARCHAR(45) NULL DEFAULT 0 ;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        //群艺馆
        $sql = "ALTER TABLE `culture`.`cu_comartcenter` ADD COLUMN `point_lng` VARCHAR(45) NULL DEFAULT 0 ,ADD COLUMN `point_lat` VARCHAR(45) NULL DEFAULT 0 ;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        //图书馆
        $sql = "ALTER TABLE `culture`.`cu_library` DROP COLUMN `point_lat`,DROP COLUMN `point_lng`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        //群艺馆
        $sql = "ALTER TABLE `culture`.`cu_comartcenter` DROP COLUMN `point_lat`,DROP COLUMN `point_lng`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
