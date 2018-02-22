<?php

use Phpmig\Migration\Migration;

class AlterTableIndustry extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_industry` CHANGE COLUMN `com_product` `com_product` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL COMMENT '经营产品' ;
                ALTER TABLE `cu_industry` CHANGE COLUMN `intro` `intro` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL COMMENT '项目简介' ;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_industry` CHANGE COLUMN `com_product` `com_product` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL COMMENT '经营产品' ;
                ALTER TABLE `cu_industry` CHANGE COLUMN `intro` `intro` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL COMMENT '项目简介' ;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}