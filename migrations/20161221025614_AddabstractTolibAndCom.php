<?php

use Phpmig\Migration\Migration;

class AddabstractTolibAndCom extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="ALTER TABLE `cu_library` ADD `abstract` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '简介';
           ALTER TABLE `cu_comartcenter` ADD `abstract` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '简介';";
     $container = $this->getContainer();
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
    $sql = "ALTER TABLE `cu_library` DROP `abstract`;
            ALTER TABLE `cu_comartcenter` DROP  `abstract`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
