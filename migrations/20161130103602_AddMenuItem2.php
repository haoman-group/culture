<?php

use Phpmig\Migration\Migration;

class AddMenuItem2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(238, '公共服务', 0, 'Admin', 'Index', 'index', '', 1, 1, '', 0);
              INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(239, '文化地标', 238, 'Admin', 'Landmark', 'index', '', 1, 1, '文化地标', 0);
              INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(240, '新增/删除', 239, 'Admin', 'Landmark', 'addedit', '', 1, 0, '', 0);
              INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(241, '删除', 239, 'Admin', 'Landmark', 'delete', '', 1, 0, '', 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="delete from cu_menu where id in ('238','239','240','241');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
