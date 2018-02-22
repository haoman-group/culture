<?php

use Phpmig\Migration\Migration;

class Addmeunaction extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(185, '添加', 162, 'Admin', 'Library', 'add', '', 1, 1, '', 0);
          INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(186, '添加', 163, 'Admin', 'ComArtCenter', 'add', '', 1, 1, '', 0);";
      $container = $this->getContainer();
      $container['db']->query($sql);
    }
    /**
     * Undo the migration
     */

    public function down()
    {
    $sql="delete from cu_menu where id in ('185','186');";    
    $container = $this->getContainer();
    $container['db']->query($sql);
    }
}
