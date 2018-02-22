<?php

use Phpmig\Migration\Migration;

class UpdateMenuForIndustryAudit extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(489, '查看', 295, 'Admin', 'InPro', 'show', '', 1, 0, '查看', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(490, '删除', 295, 'Admin', 'InPro', 'delete', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(491, '审核', 296, 'Admin', 'InPro', 'show', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(492, '删除', 296, 'Admin', 'InPro', 'delete', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(493, '审核', 297, 'Admin', 'InPro', 'show', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(494, '删除', 297, 'Admin', 'InPro', 'delete', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(495, '审核', 298, 'Admin', 'InPro', 'show', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(496, '删除', 298, 'Admin', 'InPro', 'delete', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(497, '通过', 295, 'Admin', 'InPro', 'pass', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(498, '不通过', 295, 'Admin', 'InPro', 'failed', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(499, '通过', 296, 'Admin', 'InPro', 'pass', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(500, '不通过', 296, 'Admin', 'InPro', 'failed', '', 1, 0, '', 0);
        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `culture`.`cu_menu` WHERE `id`='489';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='490';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='491';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='492';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='493';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='494';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='495';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='496';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='497';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='498';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='499';
        DELETE FROM `culture`.`cu_menu` WHERE `id`='500';
        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}