<?php

use Phpmig\Migration\Migration;

class UpdateTableMenu2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="UPDATE `culture`.`cu_menu` SET `name`='待办事项' WHERE `id`='166';UPDATE `culture`.`cu_menu` SET `name`='待办事件' WHERE `id`='165';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="UPDATE `culture`.`cu_menu` SET `name`='待办事项' WHERE `id`='166';UPDATE `culture`.`cu_menu` SET `name`='待办事件' WHERE `id`='165';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
