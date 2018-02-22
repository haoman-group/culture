<?php

use Phpmig\Migration\Migration;

class AddMyAuditToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(245, '我的驳回', 233, 'Admin', 'Action', 'myaudit', '', 1, 1, '我驳回的记录', 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_menu where id=245;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
