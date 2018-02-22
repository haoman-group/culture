<?php

use Phpmig\Migration\Migration;

class DeleteDuplicateArtCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="delete from cu_art_category where cid=172 and parent_cid=164 and name='展销会';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="insert into cu_art_category (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`) VALUES (172, 164, '展销会', '0', 0, '1476148829', 0, 0, 0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
