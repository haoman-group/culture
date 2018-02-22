<?php

use Phpmig\Migration\Migration;

class CreateTableCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_art_category` (
`cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_cid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `status` varchar(255) DEFAULT '0',
  `listorder` int(11) DEFAULT '0',
  `addtime` varchar(255) DEFAULT '',
  `isdelete` tinyint(1) DEFAULT '0',
  `is_parent` tinyint(1) DEFAULT '0',
  `relation` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) DEFAULT CHARSET=utf8 COMMENT = '分类表';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
        
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES 
                (187,'分类管理',45,'Admin','ArtCategory','index','',0,1,'',0),
                (188,'添加分类',187,'Admin','ArtCategory','add','',0,1,'',0),
                (189,'修改分类',187,'Admin','ArtCategory','edit','',1,0,'',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        $sql = "INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`) VALUES(1, 0, '文化艺术', '0', 0, '1476093405', 0, 1);
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`) VALUES(2, 0, '公共文化', '0', 0, '1476093416', 0, 1);
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`) VALUES(3, 0, '非物质文化遗产', '0', 0, '1476093431', 0, 1);
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`) VALUES(4, 0, '文化产业', '0', 0, '1476093449', 0, 1);
INSERT INTO `cu_art_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`) VALUES(5, 0, '文化政策', '0', 0, '1476093457', 0, 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_art_category;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        $sql = "delete from cu_menu where id in(187,188,189);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        // $sql = "delete from cu_art_category where id in(1,2,3,4,5);";
        // $container = $this->getContainer(); 
        // $container['db']->query($sql);
    }
}
