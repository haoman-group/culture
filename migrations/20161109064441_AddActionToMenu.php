<?php

use Phpmig\Migration\Migration;

class AddActionToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(190, '添加', 161, 'Admin', 'Policy', 'add', '', 1, 0, '添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(191, '添加', 160, 'Admin', 'Industry', 'add', '', 1, 0, '添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(192, '添加', 159, 'Admin', 'Immaterial', 'add', '', 1, 0, '添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(193, '添加', 157, 'Admin', 'Art', 'add', '', 1, 0, '添加', 0);
        
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(194, '修改', 161, 'Admin', 'Policy', 'edit', '', 1, 0, '修改', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(195, '修改', 160, 'Admin', 'Industry', 'edit', '', 1, 0, '修改', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(196, '修改', 159, 'Admin', 'Immaterial', 'edit', '', 1, 0, '修改', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(197, '修改', 157, 'Admin', 'Art', 'edit', '', 1, 0, '修改', 0);

        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(198, '删除', 161, 'Admin', 'Policy', 'delete', '', 1, 0, '删除', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(199, '删除', 160, 'Admin', 'Industry', 'del', '', 1, 0, '删除', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(200, '删除', 159, 'Admin', 'Immaterial', 'del', '', 1, 0, '删除', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(201, '删除', 157, 'Admin', 'Art', 'delete', '', 1, 0, '删除', 0);

        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(202, '查看', 174, 'Admin', 'Policy', 'show', '', 1, 0, '查看', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(203, '查看', 173, 'Admin', 'Industry', 'show', '', 1, 0, '查看', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(204, '查看', 172, 'Admin', 'Immaterial', 'show', '', 1, 0, '查看', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(205, '查看', 168, 'Admin', 'Art', 'show', '', 1, 0, '查看', 0);
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_menu where id >=190 and id <=205;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
