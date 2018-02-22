<?php

use Phpmig\Migration\Migration;

class InsertToMassart extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_massart` ADD `areaid` INT(15) NOT NULL COMMENT '地址IP' ,
         ADD `deputy_title` VARCHAR(255) NOT NULL COMMENT '副标题' ;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_massart`DROP `areaid`, DROP `deputy_title`; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}