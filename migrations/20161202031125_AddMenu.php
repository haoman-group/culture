<?php

use Phpmig\Migration\Migration;

class AddMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(242, '参加预约', 238, 'Admin', 'Facility', 'lists', '', 1, 1, '参加预约', 0);";
       $container = $this->getContainer(); 
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="delete from cu_menu where id =242;"; 
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
