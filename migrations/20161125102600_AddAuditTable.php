<?php

use Phpmig\Migration\Migration;

class AddAuditTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="ALTER TABLE `cu_audit` ADD `auditstatus` INT(5) NOT NULL COMMENT '审核状态' ;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="ALTER TABLE `cu_audit` DROP `auditstatus`;";   
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
