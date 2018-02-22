<?php

use Phpmig\Migration\Migration;

class InsertToTheme2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        
 (446, '修改', 444, 'Admin', 'Festival', 'noticedit', '', 1, 0, '', 0),
(445, '添加', 444, 'Admin', 'Festival', 'noticadd', '', 1, 0, '', 0),
(444, '通知公告', 399, 'Admin', 'Festival', 'notic', '', 1, 1, '', 0),
(447, '删除', 444, 'Admin', 'Festival', 'noticdelete', '', 1, 0, '', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="DELETE FROM `cu_menu` WHERE `id` >= 444 and `id`=<447;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}