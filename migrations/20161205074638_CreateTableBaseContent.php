<?php

use Phpmig\Migration\Migration;

class CreateTableBaseContent extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_base_content` (
  `id_content` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) DEFAULT NULL COMMENT '外键',
  `content_title` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT '内容标题',
  `content` text CHARACTER SET utf8 COMMENT '正文内容',
  `isdelete` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `addtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id_content`),
  KEY `pro_idx` (`id_project`),
  CONSTRAINT `pro` FOREIGN KEY (`id_project`) REFERENCES `cu_base_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='基本服务项目内容	';
";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="DROP TABLE `culture`.`cu_base_content`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
