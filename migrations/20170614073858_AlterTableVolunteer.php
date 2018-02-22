<?php

use Phpmig\Migration\Migration;

class AlterTableVolunteer extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_volunteer` 
CHANGE COLUMN `hobby` `hobby` VARCHAR(145) NULL DEFAULT NULL COMMENT '志愿爱好' ;


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_volunteer` 
CHANGE COLUMN `hobby` `hobby` VARCHAR(145) NULL DEFAULT NULL COMMENT '志愿爱好' ;


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}