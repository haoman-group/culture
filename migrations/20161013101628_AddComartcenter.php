<?php

use Phpmig\Migration\Migration;

class AddComartcenter extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="ALTER TABLE `cu_comartcenter` ADD `author_id` INT(3) NOT NULL COMMENT '上传者ID' ;";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    public function down()
    {
      $sql="ALTER TABLE `cu_comartcenter` DROP `author_id`;";
       $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
