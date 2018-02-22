<?php

use Phpmig\Migration\Migration;

class AddActive extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_active` ADD `channel` INT(1) NOT NULL COMMENT '1为创建，2为非创建' AFTER `point_lat`,
         ADD `channelname` VARCHAR(125) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '频道名称',
         ADD `channelid` INT(10) NOT NULL COMMENT '频道ID';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_active` DROP `channel`, DROP `channelname`,DROP `channelid`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}