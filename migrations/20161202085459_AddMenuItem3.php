<?php

use Phpmig\Migration\Migration;

class AddMenuItem3 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(243, '查看', 170, 'Admin', 'Library', 'show', '', 1, 0, '', 0);
              INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(244, '查看', 171, 'Admin', 'ComArtCenter', 'show', '', 1, 0, '', 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {   
        $sql ="delete from cu_menu where id in (243,244);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
