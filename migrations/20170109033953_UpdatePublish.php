<?php

use Phpmig\Migration\Migration;

class UpdatePublish extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
       $sql="ALTER TABLE `cu_active` CHANGE `publish_content` `publish_content` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
    $sql="ALTER TABLE `cu_active` CHANGE `publish_content` `publish_content` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }
}
