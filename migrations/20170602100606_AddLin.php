<?php

use Phpmig\Migration\Migration;

class AddLin extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_library` ADD `computer_notice` TEXT CHARACTER  SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '入馆须知' ,
        ADD `computer_permit` TEXT CHARACTER  SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '办证须知',
        ADD `computer_layout` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '馆内布局';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_library` DROP `computer_notice`, DROP `computer_permit`,DROP `computer_layout`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}