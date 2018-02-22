<?php

use Phpmig\Migration\Migration;

class UpdateAnalysisAction extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        //显示用户模块
        $sql = "update `cu_menu` set controller='Analysis', action='analysis', parameter='datatype=click' WHERE id = 178;";
        $container = $this->getContainer();
        $container['db']->query($sql);

        $sql = "update `cu_menu` set controller='Analysis', action='analysis', parameter='datatype=download' WHERE id = 179;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        //将分类设置菜单 迁移到  设置 菜单
        $sql = "update `cu_menu` set status = '0' WHERE id in (178, 179)"; // no need to undo this action, so there is nonsense sql
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
