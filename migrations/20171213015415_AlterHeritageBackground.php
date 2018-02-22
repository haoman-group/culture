<?php

use Phpmig\Migration\Migration;

class AlterHeritageBackground extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_heritage` ADD COLUMN `background` VARCHAR(64) NULL COMMENT '背景图片' AFTER `position`;        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_heritage`  DROP COLUMN `background`;        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}