<?php

use Phpmig\Migration\Migration;

class Delete extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="delete from cu_menu where id in (258,259);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="INSERT  INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        (259, '文章列表', 258, 'Admin', 'Article', 'lists', '', 1, 1, '', 0),
        (258, '文章管理', 0, 'Admin', 'Index', 'index', '', 1, 1, '文章管理', 0)
       ;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
