<?php

use Phpmig\Migration\Migration;

class UpdateIndustryInvTotel extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_industry` CHANGE `inv_totle` `inv_totlemoney` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '招商投资总额(investment)';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_industry` CHANGE `inv_totlemoney` `inv_totle` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '招商投资总额(investment)';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}