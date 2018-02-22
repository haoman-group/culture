<?php

use Phpmig\Migration\Migration;

class AddRepresentToStatistic extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_category_statistics` 
				ADD COLUMN `represent` TINYINT(1) DEFAULT 0 COMMENT '代表性项目为1，代表性传承人为2, 0表示无此分类'";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_category_statistics`DROP COLUMN `represent`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
