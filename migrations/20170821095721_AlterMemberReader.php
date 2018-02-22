<?php

use Phpmig\Migration\Migration;

class AlterMemberReader extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_member` 
        ADD COLUMN `reader_card_pwd` VARCHAR(45) NULL COMMENT '读者证账号密码(md5)' AFTER `rdid`
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_member` 
        DROP COLUMN `reader_card_pwd` 
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}