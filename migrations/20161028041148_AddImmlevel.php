<?php

use Phpmig\Migration\Migration;

class AddImmlevel extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="ALTER TABLE `cu_immaterial` ADD `level` VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '级别' AFTER `art_cid`;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="ALTER TABLE `cu_immaterial`DROP `level`;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
