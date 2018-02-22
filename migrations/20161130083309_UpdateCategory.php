<?php

use Phpmig\Migration\Migration;

class UpdateCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
    $sql="UPDATE `cu_art_category` SET is_parent = 1 WHERE cid=14";    
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
    $sql="UPDATE `cu_art_category` SET is_parent = 0 WHERE cid=14";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }
}
