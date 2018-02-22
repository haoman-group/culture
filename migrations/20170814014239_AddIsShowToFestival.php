<?php

use Phpmig\Migration\Migration;

class AddIsShowToFestival extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_festival` 
        ADD COLUMN `position` ENUM('yes', 'no') NULL DEFAULT 'no' COMMENT '是否添加至精品推荐' AFTER `site`;
        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_festival` DROP COLUMN `position`;        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}