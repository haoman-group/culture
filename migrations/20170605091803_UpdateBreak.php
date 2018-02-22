<?php

use Phpmig\Migration\Migration;

class UpdateBreak extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_bespeak` CHANGE `tel` `tel` VARCHAR(125) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '联系电话';
                ALTER TABLE `cu_bespeak` CHANGE `credential_no` `credential_no` VARCHAR(125) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '证件号';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_bespeak` CHANGE `tel` `tel` VARCHAR(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '联系电话';
                ALTER TABLE `cu_bespeak` CHANGE `credential_no` `credential_no` VARCHAR(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '证件号'; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}