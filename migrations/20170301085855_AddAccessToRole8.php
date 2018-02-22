<?php

use Phpmig\Migration\Migration;

class AddAccessToRole8 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `cu_access` (`role_id`, `app`, `controller`, `action`, `status`)
            VALUES
                (8, 'Admin', 'Facility', 'breakshow', 1),
                (8, 'Admin', 'Active', 'add', 1),
                (8, 'Admin', 'Active', 'edit', 1),
                (8, 'Admin', 'Active', 'delete', 1),
                (8, 'Admin', 'Active', 'showadd', 1),
                (8, 'Admin', 'Active', 'showedit', 1),
                (8, 'Admin', 'Active', 'showdelete', 1),
                (8, 'Admin', 'Active', 'activeadd', 1),
                (8, 'Admin', 'Active', 'activeedit', 1),
                (8, 'Admin', 'Active', 'activedelete', 1),
                (8, 'Admin', 'Active', 'groupadd', 1),
                (8, 'Admin', 'Active', 'groupedit', 1),
                (8, 'Admin', 'Active', 'groupdelete', 1);
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="delete from cu_access where (role_id=8 and app='Admin' and controller='Facility' and action='breakshow')
            or (role_id=8 and app='Admin' and controller='Active' and action='add')
            or (role_id=8 and app='Admin' and controller='Active' and action='edit')
            or (role_id=8 and app='Admin' and controller='Active' and action='delete')
            or (role_id=8 and app='Admin' and controller='Active' and action='showadd')
            or (role_id=8 and app='Admin' and controller='Active' and action='showedit')
            or (role_id=8 and app='Admin' and controller='Active' and action='showdelete')
            or (role_id=8 and app='Admin' and controller='Active' and action='activeadd')
            or (role_id=8 and app='Admin' and controller='Active' and action='activeedit')
            or (role_id=8 and app='Admin' and controller='Active' and action='activedelete')
            or (role_id=8 and app='Admin' and controller='Active' and action='groupadd')
            or (role_id=8 and app='Admin' and controller='Active' and action='groupedit')
            or (role_id=8 and app='Admin' and controller='Active' and action='groupdelete')
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
