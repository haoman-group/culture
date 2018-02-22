<?php

use Phpmig\Migration\Migration;

class AddmenuAndArtCent extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT DELAYED INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        (252, '文章列表', 251, 'Admin', 'Article', 'lists', '', 1, 1, '', 0),
        (251, '文章管理', 0, 'Admin', 'Index', 'index', '', 1, 1, '文章管理', 0),
        (250, '社会团体', 246, 'Admin', 'Active', 'grouplists', '', 1, 1, '社会团体', 0),
        (249, '群文活动', 246, 'Admin', 'Active', 'activelists', '', 1, 1, '', 0),
        (248, '文化展览', 246, 'Admin', 'Active', 'showlists', '', 1, 1, '文化展览', 0),
        (246, '文化活动', 0, 'Admin', 'Index', 'index', '', 1, 1, '', 0),
        (247, '培训辅导', 246, 'Admin', 'Active', 'lists', '', 1, 1, '培训辅导', 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="delete from cu_menu where id in (246,247,248,249,250,251,252);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
