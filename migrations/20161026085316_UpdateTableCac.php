<?php

use Phpmig\Migration\Migration;

class UpdateTableCac extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_comartcenter` CHANGE `cac_area` `area` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '区县';
               ALTER TABLE `cu_comartcenter` CHANGE `cac_ area` `cac_area` VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '馆舍建筑面积';
               ALTER TABLE `cu_comartcenter` ADD `area_display` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '详细地址' AFTER `area`;
               ALTER TABLE `cu_comartcenter` ADD `addtime` DATETIME NOT NULL , ADD `updatetime` DATETIME NOT NULL , ADD `status` INT(1) NOT NULL ;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_comartcenter` DROP `area_display`;
        ALTER TABLE `cu_comartcenter` DROP `addtime`;
        ALTER TABLE `cu_comartcenter` DROP `updatetime`;
        ALTER TABLE `cu_comartcenter` DROP `status`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
