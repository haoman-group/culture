<?php

use Phpmig\Migration\Migration;

class UpdateArtCategory3 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="UPDATE `culture`.`cu_art_category` SET `is_leaf` = '0' WHERE `cu_art_category`.`cid` = 2;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="UPDATE `culture`.`cu_art_category` SET `is_leaf` = '1' WHERE `cu_art_category`.`cid` = 2;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
