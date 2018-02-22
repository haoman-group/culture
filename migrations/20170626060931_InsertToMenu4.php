<?php

use Phpmig\Migration\Migration;

class InsertToMenu4 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(395, '艺术档案', 342, 'Admin', 'Archive', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(396, '添加', 395, 'Admin', 'Archive', 'add', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(397, '修改', 395, 'Admin', 'Archive', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(398, '删除', 395, 'Admin', 'Archive', 'delete', '', 1, 0, '', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 395;
DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 396;
DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 397;
DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 398;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}