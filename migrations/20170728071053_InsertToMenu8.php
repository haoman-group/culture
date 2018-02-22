<?php

use Phpmig\Migration\Migration;

class InsertToMenu8 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
               (448, '群众文艺', 342, 'Admin', 'Massart', 'index', '', 1, 1, '', 0),
               (449, '添加', 448, 'Admin', 'Massart', 'add', '', 1, 0, '', 0),
               (450, '修改', 448, 'Admin', 'Massart', 'edit', '', 1, 0, '', 0),
               (451, '删除', 448, 'Admin', 'Massart', 'delete', '', 1, 0, '', 0) 

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `id` >= 448 and `id`=<451;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}