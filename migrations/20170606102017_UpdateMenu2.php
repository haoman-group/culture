<?php

use Phpmig\Migration\Migration;

class UpdateMenu2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(338, '活动管理', 253, 'Admin', 'Active', 'exlist', '', 1, 1, '', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `culture`.`cu_menu` WHERE `id`='338';


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}