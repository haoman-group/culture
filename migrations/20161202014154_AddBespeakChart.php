<?php

use Phpmig\Migration\Migration;

class AddBespeakChart extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
       $sql="ALTER TABLE `cu_bespeak` ADD `area` INT(15) NOT NULL COMMENT '地址ID' ;";
       $container = $this->getContainer(); 
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="ALTER TABLE `cu_bespeak` DROP `area`;";   
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
