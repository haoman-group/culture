<?php

use Phpmig\Migration\Migration;

class AddAreaInToTabelArchive extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_archive` ADD `area` INT(15) NULL DEFAULT '25000000' COMMENT '地区ID' ;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_archive` DROP `area`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}