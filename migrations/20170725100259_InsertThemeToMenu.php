<?php

use Phpmig\Migration\Migration;

class InsertThemeToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(440, '主题性活动', 399, 'Admin', 'Festival', 'theme', '', 1, 1, '', 0),
(441, '添加', 440, 'Admin', 'Festival', 'themeadd', '', 1, 0, '', 0),
(442, '修改', 440, 'Admin', 'Festival', 'themeedit', '', 1, 0, '', 0),
(443, '删除', 440, 'Admin', 'Festival', 'themedelete', '', 1, 0, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `id` >= 440 and `id`=<443;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}