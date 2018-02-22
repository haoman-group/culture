<?php

use Phpmig\Migration\Migration;

class AddifResourceToRe extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_re_culture` ADD `if_resources` INT(1) NOT NULL COMMENT '是否推荐至公共服务平台';
                ALTER TABLE `cu_immaterial` ADD `if_resources` INT(1) NOT NULL COMMENT '是否推荐至公共服务平台';
                ALTER TABLE `cu_industry` ADD `if_resources` INT(1) NOT NULL COMMENT '是否推荐至公共服务平台';
                ALTER TABLE `cu_policy_culture` ADD `if_resources` INT(1) NOT NULL COMMENT '是否推荐至公共服务平台';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_re_culture` DROP `if_resources`;
                ALTER TABLE `cu_cu_immaterial` DROP `if_resources`;
                ALTER TABLE `cu_industry` DROP `if_resources`;
                ALTER TABLE `cu_policy_culture` DROP `if_resources`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}