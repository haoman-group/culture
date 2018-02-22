<?php

use Phpmig\Migration\Migration;

class UpdataArtCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="UPDATE `culture`.`cu_art_category` SET `name` = '文化馆' WHERE `cu_art_category`.`cid` = 190;";
       $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="UPDATE `culture`.`cu_art_category` SET `name` = '群艺馆/文化馆' WHERE `cu_art_category`.`cid` = 190;";
       $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
