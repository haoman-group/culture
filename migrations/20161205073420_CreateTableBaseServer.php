<?php

use Phpmig\Migration\Migration;

class CreateTableBaseServer extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_base_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `area` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT '所在地区编码',
  `city` varchar(45) COLLATE utf8_bin DEFAULT NULL COMMENT '城市',
  `county` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT '区县',
  `type` varchar(45) COLLATE utf8_bin DEFAULT NULL COMMENT '项目类型',
  `business_hours` varchar(45) COLLATE utf8_bin DEFAULT NULL COMMENT '营业时间',
  `closing_hours` varchar(45) COLLATE utf8_bin DEFAULT NULL COMMENT '闭馆时间',
  `cover` varchar(45) COLLATE utf8_bin DEFAULT NULL COMMENT '项目封面',
  `isdelete` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `addtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='基本服务项目公示	';
";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `culture`.`cu_base_services`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
