<?php

use Phpmig\Migration\Migration;

class AddAudioTitleToArt extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `culture`.`cu_re_culture` 
				ADD COLUMN `audio_title` VARCHAR(255) DEFAULT '' COMMENT '显示音频标题信息';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `culture`.`cu_re_culture` 
				DROP COLUMN `audio_title`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
