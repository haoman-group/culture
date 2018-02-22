<?php

use Phpmig\Migration\Migration;

class AlterTpshopUser extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `tpshop`.`tp_users` ADD COLUMN `username` VARCHAR(60) NULL AFTER `token`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `tpshop`.`tp_users` DROP COLUMN `username`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
