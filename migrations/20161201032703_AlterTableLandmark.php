<?php

use Phpmig\Migration\Migration;

class AlterTableLandmark extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="ALTER TABLE `culture`.`cu_landmark` 
                ADD COLUMN `cover` VARCHAR(45) NULL COMMENT '封面图片' AFTER `status`,
                ADD COLUMN `introduction` TEXT NULL COMMENT '简介' AFTER `cover`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="ALTER TABLE `culture`.`cu_landmark` DROP COLUMN `introduction`,DROP COLUMN `cover`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
