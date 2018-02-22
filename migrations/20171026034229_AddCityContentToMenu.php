<?php

use Phpmig\Migration\Migration;

class AddCityContentToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(485, '市级内容', 342, 'Admin', 'CityContent', 'index', '', 1, 1, '市级文化云内容管理', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(486, '新增', 485, 'Admin', 'CityContent', 'add', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(487, '修改', 485, 'Admin', 'CityContent', 'edit', '', 1, 0, '', 0);
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(488, '删除', 485, 'Admin', 'CityContent', 'delete', '', 1, 0, '', 0);
        

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_menu where id>=485 and id <=488;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}