<?php

use Phpmig\Migration\Migration;

class AlterAreaDataModules extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_area_data` CHANGE COLUMN `index_slide` `modules` VARCHAR(1025) CHARACTER SET 'utf8' NULL DEFAULT NULL COMMENT '首页模块展示' ; ";
        $container = $this->getContainer();
        $container['db']->query($sql);

        $sql = "UPDATE `culture`.`cu_area_data` SET `modules`='a:8:{s:10:\"\'fastlink\'\";s:8:\"fastlink\";s:12:\"\'activities\'\";s:10:\"activities\";s:10:\"\'location\'\";s:8:\"location\";s:9:\"\'archive\'\";s:7:\"archive\";s:6:\"\'news\'\";s:4:\"news\";s:9:\"\'product\'\";s:7:\"product\";s:13:\"\'shanxiopera\'\";s:11:\"shanxiopera\";s:13:\"\'cityculture\'\";s:11:\"cityculture\";}' ; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `culture`.`cu_area_data` SET `modules`='' ; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
        
        $sql = "ALTER TABLE `culture`.`cu_area_data` CHANGE COLUMN `modules` `index_slide` VARCHAR(1025) CHARACTER SET 'utf8' NULL DEFAULT NULL COMMENT '首页轮播' ; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}