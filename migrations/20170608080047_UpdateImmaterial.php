<?php

use Phpmig\Migration\Migration;

class UpdateImmaterial extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_immaterial` 
ADD COLUMN `image` TEXT NULL COMMENT '图片资源' AFTER `activities`,
ADD COLUMN `attachment` TEXT NULL COMMENT '文档及其他附件' AFTER `image`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_immaterial` 
DROP COLUMN `attachment`,
DROP COLUMN `image`;


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}