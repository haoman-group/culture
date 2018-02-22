<?php

use Phpmig\Migration\Migration;

class UpdateArtCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "UPDATE `culture`.`cu_art_category` SET `relation`='1' WHERE `cid` in ('119','120','121','122','123','164','165','166');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `culture`.`cu_art_category` SET `relation`='0' WHERE `cid` in ('119','120','121','122','123','164','165','166');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
