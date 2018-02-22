<?php

use Phpmig\Migration\Migration;

class UpdateTableCacTalent extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="ALTER TABLE `culture`.`cu_cac_talent` ADD COLUMN `tal_position` INT NULL COMMENT '职称:1-中级，2-高级' AFTER `status`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="ALTER TABLE `culture`.`cu_cac_talent` DROP COLUMN `tal_position`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
