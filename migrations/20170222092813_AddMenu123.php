<?php

use Phpmig\Migration\Migration;

class AddMenu123 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT DELAYED INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        (266, '设置', 238, 'Admin', 'Show', 'showlist', '', 1, 1, '', 0);";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="delete from cu_menu where id =266;";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
