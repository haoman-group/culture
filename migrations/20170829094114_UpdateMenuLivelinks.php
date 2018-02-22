<?php

use Phpmig\Migration\Migration;

class UpdateMenuLivelinks extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(467, '直播链接管理', 399, 'Admin', 'Festival', 'live', '', 1, 1, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(468, '添加', 467, 'Admin', 'Festival', 'liveadd', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(469, '修改', 467, 'Admin', 'Festival', 'liveedit', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(470, '删除', 467, 'Admin', 'Festival', 'livedelete', '', 1, 0, '', 0);        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 467;
        DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 468;
        DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 469;
        DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 470;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}