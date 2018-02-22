<?php

use Phpmig\Migration\Migration;

class AddNewAnalysisToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT DELAYED INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        (326, '文化活动分析', 177, 'Admin', 'Analysis', 'action', '', 1, 1, '', 0);";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="delete from cu_menu where id =326;";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
