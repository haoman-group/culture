<?php

use Phpmig\Migration\Migration;

class AlterTableNewest extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_newest` 
CHANGE COLUMN `id` `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
ADD PRIMARY KEY (`id`);


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}