<?php

use Phpmig\Migration\Migration;

class InsertConfigAndMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES (484, '获取视频播放密钥', 3, 'Admin', 'Access', 'access', '', 1, 1, '', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_config` WHERE `cu_menu`.`id` = 484;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}