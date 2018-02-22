<?php

use Phpmig\Migration\Migration;

class Updatatablename extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_collection` CHANGE `tablename` `tablename` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收藏信息的类别';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_collection` CHANGE `tablename` `tablename` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收藏信息的类别';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}