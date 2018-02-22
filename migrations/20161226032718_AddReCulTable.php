<?php

use Phpmig\Migration\Migration;

class AddReCulTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
         $sql="ALTER TABLE `cu_re_culture` ADD `title` VARCHAR(125) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题';";
         $container = $this->getContainer(); 
         $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `cu_re_culture`DROP `title`;";
         $container = $this->getContainer(); 
         $container['db']->query($sql);
    }
}
