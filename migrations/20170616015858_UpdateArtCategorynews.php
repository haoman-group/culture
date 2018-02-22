<?php

use Phpmig\Migration\Migration;

class UpdateArtCategorynews extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "UPDATE `cu_art_category` SET `listorder` = '1' WHERE `cu_art_category`.`cid` = 7;
                UPDATE `cu_art_category` SET `listorder` = '2' WHERE `cu_art_category`.`cid` = 8;
                UPDATE `cu_art_category` SET `listorder` = '3' WHERE `cu_art_category`.`cid` = 9;
                UPDATE `cu_art_category` SET `listorder` = '4' WHERE `cu_art_category`.`cid` = 11;
                UPDATE `cu_art_category` SET `listorder` = '5' WHERE `cu_art_category`.`cid` = 12;
                UPDATE `cu_art_category` SET `listorder` = '6' WHERE `cu_art_category`.`cid` = 13;
                UPDATE `cu_art_category` SET `listorder` = '7' WHERE `cu_art_category`.`cid` = 10;
                UPDATE `cu_art_category` SET `listorder` = '1' WHERE `cu_art_category`.`cid` = 14;
                UPDATE `cu_art_category` SET `listorder` = '2' WHERE `cu_art_category`.`cid` = 15;
                UPDATE `cu_art_category` SET `listorder` = '4' WHERE `cu_art_category`.`cid` = 16;
                UPDATE `cu_art_category` SET `listorder` = '5' WHERE `cu_art_category`.`cid` = 17;
                UPDATE `cu_art_category` SET `listorder` = '6' WHERE `cu_art_category`.`cid` = 18;
                UPDATE `cu_art_category` SET `listorder` = '3' WHERE `cu_art_category`.`cid` = 256;
               

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 7;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 8;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 9;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 11;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 12;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 13;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 10;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 14;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 15;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 16;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 17;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 18;
                UPDATE `cu_art_category` SET `listorder` = '0' WHERE `cu_art_category`.`cid` = 256;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}