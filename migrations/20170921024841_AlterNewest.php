<?php

use Phpmig\Migration\Migration;

class AlterNewest extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_newest` 
        ADD COLUMN `video` VARCHAR(45) NULL COMMENT '视频id' AFTER `area`;        
        ALTER TABLE `cu_newest` 
        ADD COLUMN `video_title` VARCHAR(45) NULL COMMENT '视频标题' AFTER `video`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_newest` DROP COLUMN `video`;    ALTER TABLE `cu_newest` DROP COLUMN `video_title`;     

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}