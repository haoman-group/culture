<?php

use Phpmig\Migration\Migration;

class AddMenuItem extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="INSERT INTO `cu_menu` VALUES(236, '待审列表', 233, 'Admin', 'Action', 'noaudit', '', 1, 1, '', 0),(237, '失败列表', 233, 'Admin', 'Action', 'audited', '', 1, 1, '', 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="DELETE FROM `culture`.`cu_menu`  WHERE `id` in ('236','237');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
