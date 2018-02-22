<?php

use Phpmig\Migration\Migration;

class InsertToMeunOneChart extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
             (353, '最新咨询', 342, 'Admin', 'Content', 'newestlists', '', 1, 1, '', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 353;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}