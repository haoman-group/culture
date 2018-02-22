<?php

use Phpmig\Migration\Migration;

class AlterTableForImageVideo extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_re_culture` 
				CHANGE `image` `image` VARCHAR(2550) NOT NULL COMMENT '显示图片地址',
				CHANGE `voide` `video` VARCHAR(255) NOT NULL COMMENT '显示视频信息';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_re_culture` 
				CHANGE `image` `image`  VARCHAR(100) NOT NULL COMMENT '图片',
				CHANGE `video` `voide`  VARCHAR(100) NOT NULL COMMENT '视频';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
