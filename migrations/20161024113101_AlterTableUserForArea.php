<?php

use Phpmig\Migration\Migration;

class AlterTableUserForArea extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_user` 
				CHANGE `city` `area_display` VARCHAR(32) NOT NULL COMMENT '显示地区信息',
				CHANGE `area` `area` INT(11) NOT NULL COMMENT '地区ID信息，对应cu_area.id';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_user` 
				CHANGE `area_display` `city`  VARCHAR(20) NOT NULL COMMENT '市级',
				CHANGE `area` `area`  VARCHAR(30) NOT NULL COMMENT '县级';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
