<?php

use Phpmig\Migration\Migration;

class UpdateArtCategory2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "UPDATE `culture`.`cu_art_category` SET `is_parent`='1' WHERE `cid` in ('75','78','79');
                UPDATE `culture`.`cu_art_category` SET `relation`='1' WHERE `cid` in ('75','76','77','114','115','116','117','118');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `culture`.`cu_art_category` SET `is_parent`='0' WHERE `cid` in ('75','78','79');
                UPDATE `culture`.`cu_art_category` SET `relation`='0' WHERE `cid` in ('75','76','77','114','115','116','117','118');";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
