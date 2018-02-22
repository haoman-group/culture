<?php

use Phpmig\Migration\Migration;

class UpdateTableMenuForCustomizedFilter extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "insert into `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) values (261, '过滤条件管理', 180, 'Admin', 'CustomizedFilter', 'index', '', 1, 1, '', 0),
(262, '添加过滤条件', 261, 'Admin', 'CustomizedFilter', 'add', '', 1, 1, '', 0);
";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from `culture`.`cu_menu` where `id` in (261, 262);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
