<?php

use Phpmig\Migration\Migration;

class AddCommentAuthorId extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="ALTER TABLE `cu_comment` ADD `author_id` INT(10) NOT NULL COMMENT '上传这ID' AFTER `isdelete`;";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="ALTER TABLE `cu_comment` DROP `author_id`;";   
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
