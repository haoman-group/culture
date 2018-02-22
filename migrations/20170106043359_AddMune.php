<?php

use Phpmig\Migration\Migration;

class AddMune extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="INSERT DELAYED INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        (260, '评论', 253, 'Admin', 'Comment', 'commentlists', '', 1, 1, '', 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="delete from cu_menu where id =260;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
