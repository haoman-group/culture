<?php

use Phpmig\Migration\Migration;

class Adduser extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="ALTER TABLE `cu_user` ADD `city` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '市级',  
      ADD `area` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '县级'
      ";
     $container = $this->getContainer();
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="ALTER TABLE `cu_user`
     DROP `city`,
     DROP `area`;";
   $container = $this->getContainer();
    $container['db']->query($sql);
    }
}
