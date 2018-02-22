<?php

use Phpmig\Migration\Migration;

class AlterTablePolicyCulture extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_policy_culture` 
ADD COLUMN `addtime` DATETIME NULL AFTER `isdelete`,
ADD COLUMN `updatetime` DATETIME NULL AFTER `addtime`,
ADD COLUMN `art_cid` INT NULL COMMENT '分类ID' AFTER `updatetime`,
ADD COLUMN `author_id` VARCHAR(45) NULL COMMENT '上传人ID' AFTER `art_cid`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_policy_culture` 
DROP COLUMN `author_id`,
DROP COLUMN `art_cid`,
DROP COLUMN `updatetime`,
DROP COLUMN `addtime`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
