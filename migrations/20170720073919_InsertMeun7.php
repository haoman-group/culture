<?php

use Phpmig\Migration\Migration;

class InsertMeun7 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
                (428, '最新推荐', 342, 'Admin', 'Content', 'groom', '', 1, 1, '', 0),
                (429, '添加', 428, 'Admin', 'Content', 'groomadd', '', 1, 0, '', 0),
                (430, '修改', 428, 'Admin', 'Content', 'groomedit', '', 1, 0, '', 0),
                (431, '删除',428, 'Admin', 'Content', 'groomdelete', '', 1, 0, '', 0),
                (432, '剧院', 158, 'Admin', 'Theatre', 'index', '', 1, 1, '', 0),
                (433, '添加', 432, 'Admin', 'Theatre', 'add', '', 1, 0, '', 0),
                (434, '修改', 432, 'Admin', 'Theatre', 'edit', '', 1, 0, '', 0),
                (435, '删除', 433, 'Admin', 'Theatre', 'delete', '', 1, 0, '', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `id` >= 428 and `id`=<435;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}