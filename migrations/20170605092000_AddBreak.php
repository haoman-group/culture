<?php

use Phpmig\Migration\Migration;

class AddBreak extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_bespeak` ADD `age_group` VARCHAR(25) NOT NULL COMMENT '年龄段' ;
        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_bespeak` DROP `age_group`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}