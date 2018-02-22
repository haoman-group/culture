<?php

use Phpmig\Migration\Migration;

class UpdateIndustryIssue extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_industry_issue` 
        ADD COLUMN `create_time` INT NULL AFTER `area`,
        ADD COLUMN `update_time` INT NULL AFTER `create_time`;
        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_industry_issue` 
        DROP COLUMN `update_time`,
        DROP COLUMN `create_time`;
        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}