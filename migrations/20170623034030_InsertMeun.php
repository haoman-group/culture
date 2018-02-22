<?php

use Phpmig\Migration\Migration;

class InsertMeun extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
              (355, '添加', 353, 'Admin', 'Content', 'newestadd', '', 1, 0, '', 0),
              (356, '修改', 353, 'Admin', 'Content', 'newestedit', '', 1, 0, '', 0),
              (357, '删除', 353, 'Admin', 'Content', 'newestdelete', '', 1, 0, '', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE  id=>355 and id<=357; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}