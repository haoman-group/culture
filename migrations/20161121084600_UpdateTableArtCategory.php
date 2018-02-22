<?php

use Phpmig\Migration\Migration;

class UpdateTableArtCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "UPDATE `culture`.`cu_art_category` SET `name`='图书馆', `is_parent`='0' WHERE `cid`='43';
                UPDATE `culture`.`cu_art_category` SET `name`='群艺馆', `is_parent`='0' WHERE `cid`='44';
                UPDATE `culture`.`cu_art_category` set `isdelete`='1' WHERE `cid`>='47' and `cid`<='70';
                ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `culture`.`cu_art_category` SET `name`='优秀传统文化', `is_parent`='1' WHERE `cid`='43';
                UPDATE `culture`.`cu_art_category` SET `name`='当地先进文化', `is_parent`='1' WHERE `cid`='44';
                UPDATE `culture`.`cu_art_category` set `isdelete`='0' WHERE `cid`>='47' and `cid`<='70';
                ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
