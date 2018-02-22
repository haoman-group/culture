<?php

use Phpmig\Migration\Migration;

class DelImmChar extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
       $sql="ALTER TABLE `cu_immaterial` DROP `re_level`,DROP `prot_level`, DROP `ba_level`;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="ALTER TABLE `cu_immaterial` ADD `re_level` INT(1) NOT NULL COMMENT '级别' AFTER `art_cid`,
           ADD `prot_level` INT(1) NOT NULL COMMENT '级别',
           ADD `ba_level` INT(1) NOT NULL COMMENT '级别' ;";
           $container = $this->getContainer(); 
           $container['db']->query($sql);


    
    }
}
