<?php

use Phpmig\Migration\Migration;

class UpdateMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(333, '添加', 331, 'Admin', 'Volunteer', 'train_add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(334, '修改', 331, 'Admin', 'Volunteer', 'train_edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(335, '删除', 331, 'Admin', 'Volunteer', 'train_delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(336, '修改', 330, 'Admin', 'Volunteer', 'recruit_edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(337, '删除', 330, 'Admin', 'Volunteer', 'recruit_delete', '', 1, 0, '', 0);
UPDATE `culture`.`cu_menu` SET `status`='0' WHERE `id`='254';
UPDATE `culture`.`cu_menu` SET `status`='0' WHERE `id`='255';
UPDATE `culture`.`cu_menu` SET `status`='0' WHERE `id`='256';
UPDATE `culture`.`cu_menu` SET `status`='0' WHERE `id`='257';
UPDATE `culture`.`cu_menu` SET `listorder`='1' WHERE `id`='260';



        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `culture`.`cu_menu` WHERE `id`='333';
DELETE FROM `culture`.`cu_menu` WHERE `id`='334';
DELETE FROM `culture`.`cu_menu` WHERE `id`='335';
DELETE FROM `culture`.`cu_menu` WHERE `id`='336';
DELETE FROM `culture`.`cu_menu` WHERE `id`='337';
UPDATE `culture`.`cu_menu` SET `status`='1' WHERE `id`='254';
UPDATE `culture`.`cu_menu` SET `status`='1' WHERE `id`='255';
UPDATE `culture`.`cu_menu` SET `status`='1' WHERE `id`='256';
UPDATE `culture`.`cu_menu` SET `status`='1' WHERE `id`='257';
UPDATE `culture`.`cu_menu` SET `listorder`='0' WHERE `id`='260';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}