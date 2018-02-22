<?php

use Phpmig\Migration\Migration;

class Addcommit extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="ALTER TABLE `cu_comment` ADD `tablename` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '表名';";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
    $sql="ALTER TABLE `cu_comment` DROP `tablename`;";
    $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
