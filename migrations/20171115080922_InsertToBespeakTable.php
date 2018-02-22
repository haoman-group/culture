<?php

use Phpmig\Migration\Migration;

class InsertToBespeakTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_bespeak` ADD `notice` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '预约备注' ;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_bespeak`  DROP `notice`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}