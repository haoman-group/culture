<?php

use Phpmig\Migration\Migration;

class AddAreaDisplayToLib extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
         $sql = "ALTER TABLE `cu_library` ADD `area_display` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '详细地址' AFTER `area`;";
         $container = $this->getContainer(); 
         $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_library` DROP column `area_display`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
