<?php

use Phpmig\Migration\Migration;

class UpdateBespeak extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="ALTER TABLE `cu_bespeak` CHANGE `credential_no` `credential_no` VARCHAR(25) NOT NULL COMMENT '证件号';";
     $container = $this->getContainer(); 
     $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="ALTER TABLE `cu_bespeak` CHANGE `credential_no` `credential_no` INT(25) NOT NULL COMMENT '证件号';";
      $container = $this->getContainer(); 
      $container['db']->query($sql); 
    }
}
