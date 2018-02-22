<?php

use Phpmig\Migration\Migration;

class UpdateMeun extends Migration
{
    /**
     * Do the migration
     */
   public function up()
    {
        $sql="INSERT DELAYED INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        (259, '文章列表', 259, 'Admin', 'Article', 'lists', '', 1, 1, '', 0),
        (258, '文章管理', 0, 'Admin', 'Index', 'index', '', 1, 1, '文章管理', 0),
        (257, '社会团体', 253, 'Admin', 'Active', 'grouplists', '', 1, 1, '社会团体', 0),
        (256, '群文活动', 253, 'Admin', 'Active', 'activelists', '', 1, 1, '', 0),
        (255, '文化展览', 253, 'Admin', 'Active', 'showlists', '', 1, 1, '文化展览', 0),
        (253, '文化活动', 0, 'Admin', 'Index', 'index', '', 1, 1, '', 0),
        (254, '培训辅导', 253, 'Admin', 'Active', 'lists', '', 1, 1, '培训辅导', 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="delete from cu_menu where id in (253,254,255,256,257,258,259);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
