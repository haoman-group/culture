<?php

use Phpmig\Migration\Migration;

class Update extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="update `cu_menu` set `status`=0 where `id`= 247;";   
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="update `cu_menu` set `status`=1 where `id`= 247;";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
