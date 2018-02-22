<?php

use Phpmig\Migration\Migration;

class AddLibAndCom extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="ALTER TABLE `cu_library` ADD `level` VARCHAR(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '级别' ;
       ALTER TABLE `cu_comartcenter` ADD `level` VARCHAR(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '级别' ;   
     ";
     $container = $this->getContainer();
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="ALTER TABLE `cu_library`DROP `level`;
            ALTER TABLE `cu_comartcenter`DROP `level`;
      ";
      $container = $this->getContainer();
      $container['db']->query($sql);
    }
}
