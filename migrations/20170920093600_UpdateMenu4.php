<?php

use Phpmig\Migration\Migration;

class UpdateMenu4 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        (479, '本地设置', 327, 'Admin', 'Areadata', 'edit', '', 1, 0, '', 0);        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_menu where id=479;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}