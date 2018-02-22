<?php

use Phpmig\Migration\Migration;

class AddPositionTomenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(458, '精品推荐', 399, 'Admin', 'Festival', 'position', '', 1, 1, '', 0);        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 458;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}