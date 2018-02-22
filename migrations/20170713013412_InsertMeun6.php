<?php

use Phpmig\Migration\Migration;

class InsertMeun6 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
                (412, '产业服务', 0, 'Admin', 'Forum', 'index', '', 1, 1, '', 0),
                (413, '我的创意', 412, 'Admin', 'Forum', 'lists', '', 1, 1, '', 0),
                (414, '设置', 413, 'Admin', 'Forum', 'show', '', 1, 0, '', 0),
                (415, '删除', 413, 'Admin', 'Forum', 'delete', '', 1, 0, '', 0),
                (416, '产业研究', 342, 'Admin', 'Content', 'industry', '', 1, 1, '', 0),
                (417, '添加', 416, 'Admin', 'Content', 'industryadd', '', 1, 0, '', 0),
                (418, '修改', 416, 'Admin', 'Content', 'industryedit', '', 1, 0, '', 0),
                (419, '删除', 416, 'Admin', 'Content', 'industrydelete', '', 1, 0, '', 0),
                (420, '产业案例', 342, 'Admin', 'Content', 'casese', '', 1, 1, '', 0),
                (421, '添加', 420, 'Admin', 'Content', 'caseseadd', '', 1, 0, '', 0),
                (422, '修改', 420, 'Admin', 'Content', 'caseseedit', '', 1, 0, '', 0),
                (423, '删除', 420, 'Admin', 'Content', 'casesedelete', '', 1, 0, '', 0),
                (424, '热点专题', 342, 'Admin', 'Content', 'hot', '', 1, 1, '', 0),
                (425, '添加', 424, 'Admin', 'Content', 'hotadd', '', 1, 0, '', 0),
                (426, '修改', 424, 'Admin', 'Content', 'hotedit', '', 1, 0, '', 0),
                (427, '删除', 424, 'Admin', 'Content', 'hotdelete', '', 1, 0, '', 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE `id` >= 412 and `id`<=427;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}