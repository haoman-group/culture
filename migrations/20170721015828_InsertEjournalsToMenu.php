<?php

use Phpmig\Migration\Migration;

class InsertEjournalsToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(439, '删除', 436, 'Admin', 'Ejournals', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(438, '编辑', 436, 'Admin', 'Ejournals', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(437, '添加', 436, 'Admin', 'Ejournals', 'add', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(436, '电子期刊', 342, 'Admin', 'Ejournals', 'index', '', 1, 1, '', 0);


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `id` >= 436 and `id`=<439;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}