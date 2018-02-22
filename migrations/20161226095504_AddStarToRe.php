<?php

use Phpmig\Migration\Migration;

class AddStarToRe extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="ALTER TABLE `cu_re_culture` ADD `stars` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '主演' ;";
      $container = $this->getContainer(); 
         $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="ALTER TABLE `cu_re_culture`DROP `stars`;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
