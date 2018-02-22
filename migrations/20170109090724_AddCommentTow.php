<?php

use Phpmig\Migration\Migration;

class AddCommentTow extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="ALTER TABLE `cu_comment` ADD `commit_id` INT(10) NOT NULL , ADD `content` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '回复内容' ;";
       $container = $this->getContainer(); 
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="ALTER TABLE `cu_comment`DROP `commit_id`,DROP `content`;";  
      $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
