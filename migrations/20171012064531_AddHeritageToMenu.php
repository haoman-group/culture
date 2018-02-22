<?php

use Phpmig\Migration\Migration;

class AddHeritageToMenu extends Migration
{
     /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
                              (480, '非遗影像', 342, 'Admin', 'Heritage', 'index', '', 1, 1, '', 0),
                              (481, '添加', 480, 'Admin', 'Heritage', 'add', '', 1, 0, '', 0),
                              (482, '修改', 480, 'Admin', 'Heritage', 'edit', '', 1, 0, '', 0),
                              (483, '删除', 480, 'Admin', 'Heritage', 'delete', '', 1, 0, '', 0);
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_menu where id in (480,481,482,483);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}