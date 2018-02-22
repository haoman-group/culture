<?php

use Phpmig\Migration\Migration;

class InsertToMenu3 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(389, '添加', 338, 'Admin', 'Active', 'exadd', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(390, '修改', 338, 'Admin', 'Active', 'exedit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(391, '删除', 338, 'Admin', 'Active', 'exdelete', '', 1, 0, '', 0);


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `cu_menu` WHERE  id=>389 and id<=391;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}