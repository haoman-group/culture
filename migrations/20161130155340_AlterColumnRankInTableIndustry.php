<?php

use Phpmig\Migration\Migration;

class AlterColumnRankInTableIndustry extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_industry` 
				CHANGE `rank` `level` varchar(45) COLLATE utf8_bin DEFAULT NULL COMMENT '级别';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_industry` 
				CHANGE `level` `rank` varchar(45) COLLATE utf8_bin DEFAULT NULL COMMENT '级别';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
