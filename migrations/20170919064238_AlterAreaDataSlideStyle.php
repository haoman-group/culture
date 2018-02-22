<?php

use Phpmig\Migration\Migration;

class AlterAreaDataSlideStyle extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_area_data` 
        CHANGE COLUMN `picture_url` `slide_style` TEXT CHARACTER SET 'utf8' NOT NULL COMMENT '轮播样式' ;";
        $container = $this->getContainer();
        $container['db']->query($sql);

        $sql = "UPDATE `cu_area_data` SET `slide_style`='style-default';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_area_data` 
        CHANGE COLUMN `slide_style` `picture_url` TEXT CHARACTER SET 'utf8' NOT NULL COMMENT '轮播样式' ;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}