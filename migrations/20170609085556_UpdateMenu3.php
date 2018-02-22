<?php

use Phpmig\Migration\Migration;

class UpdateMenu3 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(339, '志愿者列表', 329, 'Admin', 'Volunteer', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(340, '查看', 339, 'Admin', 'Volunteer', 'show', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(341, '删除', 339, 'Admin', 'Volunteer', 'delete', '', 1, 0, '', 0);


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `id`='339';
DELETE FROM `cu_menu` WHERE `id`='340';
DELETE FROM `cu_menu` WHERE `id`='341';


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}