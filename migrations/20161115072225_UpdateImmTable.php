<?php

use Phpmig\Migration\Migration;

class UpdateImmTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_immaterial` CHANGE `is_delete` `isdelete` INT(1) NOT NULL DEFAULT '0';";
        $container = $this->getContainer();
        $container['db']->query($sql);

        $sql = "ALTER TABLE `cu_comartcenter` CHANGE `is_delete` `isdelete` INT(1) NOT NULL DEFAULT '0';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="ALTER TABLE `cu_immaterial` CHANGE `isdelete` `is_delete` INT(1) NOT NULL DEFAULT '0';";
        $container = $this->getContainer();
        $container['db']->query($sql);

        $sql = "ALTER TABLE `cu_comartcenter` CHANGE `isdelete` `is_delete` INT(1) NOT NULL DEFAULT '0';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
