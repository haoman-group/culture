<?php

use Phpmig\Migration\Migration;

class AlterTableLandmark2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_landmark` CHANGE COLUMN `title` `title` VARCHAR(255) NOT NULL COMMENT '标题' ;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_landmark` CHANGE COLUMN `title` `title` int(10) NOT NULL COMMENT '标题' ;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
