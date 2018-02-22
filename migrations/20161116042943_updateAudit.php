<?php

use Phpmig\Migration\Migration;

class UpdateAudit extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="ALTER TABLE `cu_audit` CHANGE `category` `category` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '大分类';
       ALTER TABLE `cu_audit` CHANGE `id` `id_au` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'ID'
     ;"    
     ;
     $container = $this->getContainer();
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="ALTER TABLE `cu_audit` CHANGE `category` `category` INT(10) NOT NULL COMMENT '大分类';
     ALTER TABLE `cu_audit` CHANGE `id_au` `id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'ID'  
     ";
     $container = $this->getContainer();
     $container['db']->query($sql);
    }
}
