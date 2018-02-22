<?php

use Phpmig\Migration\Migration;

class AddArtCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
$sql="INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `relation`) VALUES
(214, 38, '油器、漆画', '0', 0, '1484729789', 0, 0, 0),
(215, 38, '澄泥砚', '0', 0, '1484729789', 0, 0, 0),
(216, 38, '木雕', '0', 0, '1484729789', 0, 0, 0),
(217, 38, '黑陶', '0', 0, '1484729789', 0, 0, 0),
(218, 38, '螺钿镶嵌器', '0', 0, '1484729789', 0, 0, 0),
(219, 38, '牙雕，骨雕', '0', 0, '1484729789', 0, 0, 0);";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="delete from cu_art_category where cid between 214 and 219;";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }
}
