<?php

use Phpmig\Migration\Migration;

class AddPictureUrlToAreaData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_area_data` ADD `picture_url` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图片的链接'; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_area_data` DROP ` picture_url `;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}