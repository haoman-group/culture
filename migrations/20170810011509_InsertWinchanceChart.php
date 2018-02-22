<?php

use Phpmig\Migration\Migration;

class InsertWinchanceChart extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_winchance` ADD `is_show` INT(1) NOT NULL COMMENT '1为推荐2为不推荐' ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_winchance` DROP `is_show`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}