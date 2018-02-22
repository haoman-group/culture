<?php

use Phpmig\Migration\Migration;

class AddAreaToTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_newest` ADD `area` INT(15) NULL DEFAULT '25000000' COMMENT '地址IP' ;
            ALTER TABLE `cu_groom` ADD `area` INT(15) NOT NULL DEFAULT '25000000' COMMENT '地址IP' ;
            ALTER TABLE `cu_winchance` ADD `area` INT(15) NOT NULL DEFAULT '25000000' COMMENT '地址IP';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_newest` DROP `area`;
                ALTER TABLE `cu_groom` DROP `area`;
                ALTER TABLE `cu_winchance` DROP `area`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}