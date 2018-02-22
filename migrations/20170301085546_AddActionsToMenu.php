<?php

use Phpmig\Migration\Migration;

class AddActionsToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
            VALUES
                (267, '查看', 242, 'Admin', 'Facility', 'breakshow', '', 1, 0, '', 0),
                (268, '添加', 254, 'Admin', 'Active', 'add', '', 1, 0, '', 0),
                (269, '修改', 254, 'Admin', 'Active', 'edit', '', 1, 0, '', 0),
                (270, '删除', 254, 'Admin', 'Active', 'delete', '', 1, 0, '', 0),
                (271, '添加', 255, 'Admin', 'Active', 'showadd', '', 1, 0, '', 0),
                (272, '修改', 255, 'Admin', 'Active', 'showedit', '', 1, 0, '', 0),
                (273, '删除', 255, 'Admin', 'Active', 'showdelete', '', 1, 0, '', 0),
                (274, '添加', 256, 'Admin', 'Active', 'activeadd', '', 1, 0, '', 0),
                (275, '修改', 256, 'Admin', 'Active', 'activeedit', '', 1, 0, '', 0),
                (276, '删除', 256, 'Admin', 'Active', 'activedelete', '', 1, 0, '', 0),
                (277, '添加', 257, 'Admin', 'Active', 'groupadd', '', 1, 0, '', 0),
                (278, '修改', 257, 'Admin', 'Active', 'groupedit', '', 1, 0, '', 0),
                (279, '删除', 257, 'Admin', 'Active', 'groupdelete', '', 1, 0, '', 0);
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="delete from cu_menu where id between 267 and 279;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
