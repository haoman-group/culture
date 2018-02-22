<?php

use Phpmig\Migration\Migration;

class InsertToHeritage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_heritage` ADD `process` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '制作工艺',
                                          ADD `theme` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '主题特色' , 
                                          ADD `heritage` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '非遗传人' ,
                                          ADD `intangible` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '非遗纵横'

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_heritage `DROP `process`,
                                          DROP `theme`,
                                          DROP `heritage`,
                                          DROP `intangible`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}