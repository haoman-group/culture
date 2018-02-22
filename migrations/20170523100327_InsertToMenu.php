<?php

use Phpmig\Migration\Migration;

class InsertToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
(327, '地区设置', 3, 'Admin', 'Areadata', 'index', '', 1, 1, '各级地区首页轮播设置', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_menu where id=327;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}