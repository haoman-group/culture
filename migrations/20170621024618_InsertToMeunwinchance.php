<?php

use Phpmig\Migration\Migration;

class InsertToMeunwinchance extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = " INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
             (354, '文创精品', 342, 'Admin', 'Content', 'winchance', '', 1, 1, '', 0); ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "FROM `cu_menu` WHERE `cu_menu`.`id` = 354;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}