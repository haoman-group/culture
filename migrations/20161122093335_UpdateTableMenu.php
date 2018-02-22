<?php

use Phpmig\Migration\Migration;

class UpdateTableMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        //将分类设置菜单 迁移到  设置 菜单
        $sql = "UPDATE `culture`.`cu_menu` SET `parentid`='180' WHERE `id`='187';";
        $container = $this->getContainer();
        $container['db']->query($sql);

        //添加审核菜单
        $sql = "INSERT INTO `cu_menu` VALUES
        (232, '审核查看', 166, 'Admin', 'Audit', 'show', '', 1, 0, '', 0),
        (233, '审核列表', 166, 'Admin', 'Action', 'lists', '', 1, 0, '', 0),
        (234, '审核提交', 166, 'Admin', 'Audit', 'add', '', 1, 0, '', 0),
        (235, '审核修改', 166, 'Admin', 'Audit', 'edit', '', 1, 0, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql);

        //去掉无用菜单
        $sql = "UPDATE `culture`.`cu_menu` SET `status`='0' WHERE `id` in('1','37','44','90','113');";
        $container = $this->getContainer();
        $container['db']->query($sql);

        //更新代办事项顺序
        $sql = "UPDATE `culture`.`cu_menu` SET `listorder`='1' WHERE `id`='165';
        UPDATE `culture`.`cu_menu` SET `listorder`='2' WHERE `id`='156';
        UPDATE `culture`.`cu_menu` SET `listorder`='3' WHERE `id`='167';
        UPDATE `culture`.`cu_menu` SET `listorder`='4' WHERE `id`='175';
        UPDATE `culture`.`cu_menu` SET `listorder`='5' WHERE `id`='177';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `culture`.`cu_menu` SET `parentid`='45' WHERE `id`='187';";
        $container = $this->getContainer();
        $container['db']->query($sql);

        $sql = "DELETE FROM `culture`.`cu_menu`  WHERE `id` in ('232','233','234','235');";
        $container = $this->getContainer();
        $container['db']->query($sql);

        //去掉无用菜单
        $sql = "UPDATE `culture`.`cu_menu` SET `status`='1' WHERE `id` in('1','37','44','90','113');";
        $container = $this->getContainer();
        $container['db']->query($sql);

        $sql = "UPDATE `culture`.`cu_menu` SET `listorder`='0' WHERE `id` in ('165','156','167','175','177');";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
