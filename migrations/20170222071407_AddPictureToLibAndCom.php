<?php

use Phpmig\Migration\Migration;

class AddPictureToLibAndCom extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="ALTER TABLE `cu_library` ADD `picture` VARCHAR(255) NOT NULL COMMENT '图片' ;
     ALTER TABLE `cu_comartcenter` ADD `picture` VARCHAR(255) NOT NULL COMMENT '图片' ; 
     ";   
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="ALTER TABLE `cu_library` DROP `picture`;
     ALTER TABLE `cu_comartcenter` DROP `picture`;   
     ";   
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
