<?php

use Phpmig\Migration\Migration;

class UpdateMenuName extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "UPDATE `culture`.`cu_art_category` SET `name`='展览展演' WHERE `cid`='186';
                UPDATE `culture`.`cu_art_category` SET `name`='群文赛事' WHERE `cid`='187';
                UPDATE `culture`.`cu_art_category` SET `name`='群文团体' WHERE `cid`='188';
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
        $sql = "UPDATE `culture`.`cu_menu` SET `name`='文化馆' WHERE `id`='163';
                UPDATE `culture`.`cu_menu` SET `name`='文化馆' WHERE `id`='171';
                UPDATE `culture`.`cu_menu` SET `name`='展览展演' WHERE `id`='255';
                UPDATE `culture`.`cu_menu` SET `name`='群文赛事' WHERE `id`='256';
                UPDATE `culture`.`cu_menu` SET `name`='群文团体' WHERE `id`='257';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
        $sql = "UPDATE `culture`.`cu_art_category` SET `name`='省级文化馆' WHERE `cid`='211';
                UPDATE `culture`.`cu_art_category` SET `name`='市级文化馆' WHERE `cid`='212';
                UPDATE `culture`.`cu_art_category` SET `name`='县级文化馆' WHERE `cid`='213';
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
        $sql = "UPDATE `culture`.`cu_menu` SET `name`='文化馆' WHERE `id`='163';
                UPDATE `culture`.`cu_menu` SET `name`='文化馆' WHERE `id`='171';
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);

        

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `culture`.`cu_art_category` SET `name`='展览展演' WHERE `cid`='186';
                UPDATE `culture`.`cu_art_category` SET `name`='群文赛事' WHERE `cid`='187';
                UPDATE `culture`.`cu_art_category` SET `name`='群文团体' WHERE `cid`='188';
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}