<?php

use Phpmig\Migration\Migration;

class AddToW extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_winchance` ADD `category_id` INT(10) NOT NULL COMMENT 'tpshop的分类' ;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "“ALTER TABLE `cu_winchance` DROP ` category_id `;”

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}