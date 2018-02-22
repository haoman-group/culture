<?php

use Phpmig\Migration\Migration;

class UpdateCategory1 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="UPDATE `culture`.`cu_art_category` SET `isdelete` = '0' WHERE `cu_art_category`.`cid` = 5;";
      $container = $this->getContainer(); 
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="UPDATE `culture`.`cu_art_category` SET `isdelete` = '1' WHERE `cu_art_category`.`cid` = 5;";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
