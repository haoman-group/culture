<?php

use Phpmig\Migration\Migration;

class AddUseridToB extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      // style 1表示前台注册，2表示后台注册
       $sql="ALTER TABLE `cu_bespeak` ADD `userid` INT(15) NOT NULL COMMENT '报名预约者' ;ALTER TABLE `cu_bespeak` ADD `style` INT(1) NOT NULL COMMENT '注册类型' ;";
       $container = $this->getContainer(); 
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="ALTER TABLE `cu_bespeak` DROP `userid`;ALTER TABLE `cu_bespeak` DROP `style`;";
      $container = $this->getContainer(); 
      $container['db']->query($sql); 
    }
}
