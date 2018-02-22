<?php

use Phpmig\Migration\Migration;

class AddActionToMenu2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(206, '删除', 162, 'Admin', 'Library', 'del', '', 1, 0, '删除', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(207, '修改', 162, 'Admin', 'Library', 'edit', '', 1, 0, '修改', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(208, '子内容添加', 162, 'Admin', 'Library', 'subAdd', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(209, '子内容删除', 162, 'Admin', 'Library', 'subDel', '', 1, 0, '子内容删除', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(210, '子内容修改', 162, 'Admin', 'Library', 'subEdit', '', 1, 0, '子内容修改', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(211, '子内容-经费', 162, 'Admin', 'Library', 'addFund', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(212, '子内容-人才', 162, 'Admin', 'Library', 'addTalent', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(213, '子内容-服务', 162, 'Admin', 'Library', 'addServer', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(214, '子内容-志愿者', 162, 'Admin', 'Library', 'addVolunteer', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(215, '子内容-活动', 162, 'Admin', 'Library', 'addVolunteerAct', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(216, '子内容-教育', 162, 'Admin', 'Library', 'addEducationAct', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(217, '子内容-表彰', 162, 'Admin', 'Library', 'addCommend', '', 1, 0, '子内容添加', 0);

        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(218, '删除', 163, 'Admin', 'ComArtCenter', 'indexdelete', '', 1, 0, '删除', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(219, '修改', 163, 'Admin', 'ComArtCenter', 'edit', '', 1, 0, '修改', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(220, '子内容添加', 163, 'Admin', 'ComArtCenter', 'subAdd', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(221, '子内容删除', 163, 'Admin', 'ComArtCenter', 'subDel', '', 1, 0, '子内容删除', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(222, '子内容修改', 163, 'Admin', 'ComArtCenter', 'subEdit', '', 1, 0, '子内容修改', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(223, '子内容-经费', 163, 'Admin', 'ComArtCenter', 'addFund', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(224, '子内容-人才', 163, 'Admin', 'ComArtCenter', 'addTalent', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(225, '子内容-服务活动', 163, 'Admin', 'ComArtCenter', 'addAct', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(226, '子内容-馆办活动', 163, 'Admin', 'ComArtCenter', 'addOfficeact', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(227, '子内容-志愿者', 163, 'Admin', 'ComArtCenter', 'addVolunteer', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(228, '子内容-志愿者活动', 163, 'Admin', 'ComArtCenter', 'addVolact', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(229, '子内容-基地', 163, 'Admin', 'ComArtCenter', 'addTrainbase', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(230, '子内容-辅导', 163, 'Admin', 'ComArtCenter', 'addComculter', '', 1, 0, '子内容添加', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(231, '子内容-群艺资料', 163, 'Admin', 'ComArtCenter', 'addTrainact', '', 1, 0, '子内容添加', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_menu where id >=206 and id <=231;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
