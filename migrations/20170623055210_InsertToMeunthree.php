<?php

use Phpmig\Migration\Migration;

class InsertToMeunthree extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        (392, '添加', 354, 'Admin', 'Content', 'winchanceadd', '', 1, 0, '', 0),
        (393, '修改', 354, 'Admin', 'Content', 'winchanceedit', '', 1, 0, '', 0),
        (394, '删除', 354, 'Admin', 'Content', 'winchancedelete', '', 1, 0, '', 0);


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE  id=>392 and id<=394;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}