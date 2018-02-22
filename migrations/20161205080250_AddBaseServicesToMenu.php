<?php

use Phpmig\Migration\Migration;

class AddBaseServicesToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(246, '基本服务项目公示', 238, 'Admin', 'Baseservices', 'index', '', 1, 1, '基本服务项目公示', 0);
                INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(247, '编辑', 246, 'Admin', 'Baseservices', 'addedit', '', 1, 1, '', 0);
                INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(248, '删除', 246, 'Admin', 'Baseservices', 'delete', '', 1, 0, '', 0);
                INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(249, '子内容编辑', 246, 'Admin', 'Baseservices', 'content', '', 1, 0, '', 0);
                INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(250, '子内容删除', 246, 'Admin', 'Baseservices', 'content_del', '', 1, 0, '', 0);
                INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(251, '子内容预览', 246, 'Admin', 'Baseservices', 'preview', '', 1, 0, '', 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from cu_menu where id >=246 and id<=251;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
