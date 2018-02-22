<?php

use Phpmig\Migration\Migration;

class ModifyArtCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`) VALUES
(181, 14, '蒲剧', '0', 0, '1476148829', 0, 0, 0),
(182, 14, '晋剧', '0', 0, '1476156693', 0, 0, 0),
(183, 14, '北路梆子', '0', 0, '1476156693', 0, 0, 0),
(184, 14, '上党梆子', '0', 0, '1476156693', 0, 0, 0);
ALTER TABLE `cu_art_category` add is_leaf TINYINT(1) DEFAULT '0', add description VARCHAR(1024) DEFAULT '', add picture VARCHAR(255) DEFAULT '';
UPDATE `cu_art_category` SET is_leaf = 1 WHERE cid in (14,15,16,17,18,19,25,31,32,33,34,35,36,37,38,39,71,72,73,74,80,81,95,96,97,98,99,100,101,102,103,104,107,108,109);
";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="delete from cu_art_category where cid between 181 and 184;
		alter table cu_art_category drop is_leaf, drop description, drop picture;";
     $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
