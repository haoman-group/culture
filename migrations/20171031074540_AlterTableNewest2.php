<?php

use Phpmig\Migration\Migration;

class AlterTableNewest2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_newest` 
        ADD COLUMN `post_time` DATETIME NULL DEFAULT NULL COMMENT '发布时间' AFTER `video_title`;        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_newest` 
        DROP COLUMN `post_time`;
        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}