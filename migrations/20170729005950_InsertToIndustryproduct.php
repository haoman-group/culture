<?php

use Phpmig\Migration\Migration;

class InsertToIndustryproduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(452, '文化产品展示馆', 281, 'Admin', 'Industryproduct', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(453, '编辑', 452, 'Admin', 'Industryproduct', 'edit', '', 1, 0, '', 0);


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `id` >= 452 and `id`=<453;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}