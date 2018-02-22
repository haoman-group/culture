<?php

use Phpmig\Migration\Migration;

class InsertaRCHIVE extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_archive` ADD `hits` INT(10) NOT NULL COMMENT '浏览'; 

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_archive`DROP `hits`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}