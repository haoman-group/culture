<?php

use Phpmig\Migration\Migration;

class AddIm extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_immaterial` 
        ADD `situation` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `auditstatus`,
        ADD `content` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `situation`, 
        ADD `activities` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_immaterial` DROP `situation`, DROP `content`,DROP `activities`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}