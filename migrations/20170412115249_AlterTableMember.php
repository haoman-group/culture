<?php

use Phpmig\Migration\Migration;

class AlterTableMember extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_member`  ADD `type` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1-个人2-企业' ,  ADD `legal_person` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '法人' ,  ADD `business_license` INT(255) NOT NULL ,  ADD `registered_capital` INT(255) NOT NULL ,  ADD `business_address` INT(255) NOT NULL ,  ADD `registration_type` INT(255) NOT NULL ,  ADD `business_scope` INT(255) NOT NULL ,  ADD `business_license_pic` INT(255) NOT NULL ,  ADD `tax_pic` INT(255) NOT NULL ,  ADD `mobile` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_member`
                DROP `type`,
                DROP `legal_person`,
                DROP `business_license`,
                DROP `registered_capital`,
                DROP `business_address`,
                DROP `registration_type`,
                DROP `business_scope`,
                DROP `business_license_pic`,
                DROP `tax_pic`,
                DROP `mobile`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
