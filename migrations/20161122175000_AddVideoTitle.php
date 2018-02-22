<?php

use Phpmig\Migration\Migration;

class AddVideoTitle extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_re_culture` 
				ADD COLUMN `video_title` VARCHAR(255) DEFAULT '' COMMENT '显示视频标题信息';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_re_culture` 
				DROP COLUMN `video_title`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
