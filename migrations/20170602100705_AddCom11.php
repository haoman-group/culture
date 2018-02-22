<?php

use Phpmig\Migration\Migration;

class AddCom11 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_comartcenter` ADD `computer_layout` TEXT CHARACTER 
               SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '馆内布局' ,
               ADD `computer_notice` TEXT CHARACTER SET utf8 
        COLLATE utf8_general_ci NOT NULL COMMENT '入馆须知' ;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_comartcenter` DROP `computer_layout`, DROP `computer_notice`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}