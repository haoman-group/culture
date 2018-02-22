<?php

use Phpmig\Migration\Migration;

class UpdateArtCategorynew extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "UPDATE `cu_art_category` SET `isdelete` = '1' WHERE `cu_art_category`.`cid` = 123; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `cu_art_category` SET `isdelete` = '0' WHERE `cu_art_category`.`cid` = 123;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}