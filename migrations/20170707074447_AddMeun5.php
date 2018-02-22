<?php

use Phpmig\Migration\Migration;

class AddMeun5 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
               (399, '艺术节', 0, 'Admin', 'Festival', 'festival', '', 1, 1, '', 0),
               (400, '媒体报道', 399, 'Admin', 'Festival', 'media', '', 1, 1, '', 0),
               (401, '修改', 400, 'Admin', 'Festival', 'mediaedit', '', 1, 0, '', 0),
               (402, '删除', 400, 'Admin', 'Festival', 'mediadelete', '', 1, 0, '', 0),
               (403, '展览类活动', 399, 'Admin', 'Festival', 'exhibition', '', 1, 1, '', 0),
               (404, '修改', 403, 'Admin', 'Festival', 'exhibitionedit', '', 1, 0, '', 0),
               (405, '删除', 403, 'Admin', 'Festival', 'exhibitiondelete', '', 1, 0, '', 0),
               (406, '表演类活动', 399, 'Admin', 'Festival', 'perform', '', 1, 1, '', 0),
               (407, '修改', 406, 'Admin', 'Festival', 'performedit', '', 1, 0, '', 0),
               (408, '删除', 406, 'Admin', 'Festival', 'performdelete', '', 1, 0, '', 0),
               (410, '添加', 403, 'Admin', 'Festival', 'exhibitionadd', '', 1, 0, '', 0),
              (409, '添加', 400, 'Admin', 'Festival', 'mediaadd', '', 1, 0, '', 0),
              (411, '添加', 406, 'Admin', 'Festival', 'performadd', '', 1, 0, '', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `id` >= 399 and `id`=<411;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}