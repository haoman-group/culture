<?php

use Phpmig\Migration\Migration;

class AddLevelToStatistic extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_category_statistics` 
				ADD COLUMN `level` VARCHAR(25) DEFAULT '' COMMENT '级别:国家级、省级、市级:'";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_category_statistics`DROP COLUMN `level`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
