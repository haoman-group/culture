<?php

use Phpmig\Migration\Migration;

class AddReCulture extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    { 
      $sql="ALTER TABLE `cu_re_culture` ADD `drama` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '艺术种类' ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `cu_re_culture` DROP `drama`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
