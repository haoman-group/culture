<?php

use Phpmig\Migration\Migration;

class InsertFestival extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_festival` ADD `userid` INT(10) NOT NULL COMMENT '上传者';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_festival` DROP `userid`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}