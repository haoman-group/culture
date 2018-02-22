<?php

use Phpmig\Migration\Migration;

class UpdateReCultureTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_re_culture` CHANGE `figures` `figures` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '代表人物';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_re_culture` CHANGE `figures` `figures` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '代表人物'; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}