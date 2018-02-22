<?php

use Phpmig\Migration\Migration;

class AddDisplayToArea extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="ALTER TABLE `culture`.`cu_area` 
                ADD COLUMN `area_display` VARCHAR(64) COMMENT '地区全路径显示';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="ALTER TABLE `culture`.`cu_area` DROP COLUMN `area_display`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
