<?php

use Phpmig\Migration\Migration;

class UpdateMenuBriefing extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(459, '演出活动新闻简报', 399, 'Admin', 'Briefing', 'index', '', 1, 1, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(460, '新增', 459, 'Admin', 'Briefing', 'add', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(461, '修改', 459, 'Admin', 'Briefing', 'edit', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(462, '删除', 459, 'Admin', 'Briefing', 'delete', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(463, '演出论坛', 399, 'Admin', 'Interpret', 'index', '', 1, 1, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(464, '添加', 463, 'Admin', 'Interpret', 'add', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(465, '修改', 463, 'Admin', 'Interpret', 'edit', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(466, '删除', 463, 'Admin', 'Interpret', 'delete', '', 1, 0, '', 0);        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 459;
        DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 460;
        DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 461;
        DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 462;
        DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 463;
        DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 464;
        DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 465;
        DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 466;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}