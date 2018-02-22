<?php

use Phpmig\Migration\Migration;

class UpdateActive extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_active` 
ADD COLUMN `if_bespeak` INT(1) NULL DEFAULT 1 COMMENT '是否开启预约' ;


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_active` 
DROP COLUMN `if_bespeak`;


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}