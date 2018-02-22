<?php

use Phpmig\Migration\Migration;

class InsertIntoMenunews extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        (342, '内容管理', 0, 'Admin', 'Content', 'index', '', 1, 1, '', 0),
        (343, '咨询中心', 342, 'Admin', 'Content', 'newslists', '', 1, 0, '', 0),
        (344, '消费服务', 342, 'Admin', 'Content', 'consumerlists', '', 1, 0, '', 0),
        (345, '文化资源', 342, 'Admin', 'Content', 'resourceslists', '', 1, 0, '', 0),
        (346, '政策法规', 342, 'Admin', 'Content', 'policylists', '', 1, 1, '', 0),
        (347, '经融服务', 342, 'Admin', 'Content', 'commerciallists', '', 1, 0, '', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `cu_menu`.`id` in(342,343,344,345,346,347);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}