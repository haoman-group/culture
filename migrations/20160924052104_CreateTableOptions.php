<?php

use Phpmig\Migration\Migration;

class CreateTableOptions extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `cu_option` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
CREATE TABLE IF NOT EXISTS `cu_option_field` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT '',
  `pid` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name_2` (`name`,`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
(180, '其他设置', 3, 'Admin', 'Option', 'index', '', 0, 1, '', 0),
(181, '选项管理', 180, 'Admin', 'Option', 'index', '', 1, 1, '', 0);
";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_option;drop table cu_option_field;delete from cu_menu where id in(180,181);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
