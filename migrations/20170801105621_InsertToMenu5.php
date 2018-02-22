<?php

use Phpmig\Migration\Migration;

class InsertToMenu5 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(454, '日程安排', 399, 'Admin', 'FestivalCalendar', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(455, '添加', 454, 'Admin', 'FestivalCalendar', 'add', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(456, '修改', 454, 'Admin', 'FestivalCalendar', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(457, '删除', 454, 'Admin', 'FestivalCalendar', 'delete', '', 1, 0, '', 0);


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 454;
DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 455;
DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 456;
DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 457;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}