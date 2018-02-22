<?php

use Phpmig\Migration\Migration;

class AddAreadisplay extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `cu_re_culture` ADD `area_display` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '显示地区信息' AFTER `area`;
        ALTER TABLE `cu_policy_culture` ADD `area` INT(10) NOT NULL COMMENT '所属地区' AFTER `publish_update`, ADD `area_display` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '显示地区信息' AFTER `area`;
        ALTER TABLE `cu_industry` ADD `area_display` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '显示地区信息' AFTER `area`;
        ALTER TABLE `cu_immaterial` ADD `area_display` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '详细地址' AFTER `area`;";
         $container = $this->getContainer(); 
         $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `cu_re_culture` DROP `area_display`;
         ALTER TABLE `cu_policy_culture` DROP `area_display`;
         ALTER TABLE `cu_policy_culture` DROP `area`;
         ALTER TABLE `cu_industry` DROP `area_display`;
         ALTER TABLE `cu_immaterial` DROP `area_display`;

        ";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
