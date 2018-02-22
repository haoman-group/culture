<?php

use Phpmig\Migration\Migration;

class AddTableArt extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="CREATE TABLE `culture`.`cu_art` (
  `id_art` INT NOT NULL AUTO_INCREMENT COMMENT '文化艺术表ID',
  `title` VARCHAR(80) NULL COMMENT '标题',
  `keywords` VARCHAR(60) NULL COMMENT '关键字',
  `source1` VARCHAR(45) NULL COMMENT '来源1',
  `source2` VARCHAR(45) NULL COMMENT '来源2',
  `abstract` VARCHAR(80) NULL COMMENT '摘要',
  `content` TEXT NULL COMMENT '内容',
  `attachemnt` VARCHAR(128) NULL COMMENT '附件',
  `attachemnttype` VARCHAR(12) NULL COMMENT '附件类型',
  `isdelete` INT(1) NULL DEFAULT '0', 
  `status` VARCHAR(1) NULL DEFAULT '0',
  `addtime` DATETIME NULL,
  `updatetime` DATETIME NULL,
  `artist` VARCHAR(12) NULL COMMENT '主要表演艺术家',
  `groupname` VARCHAR(24) NULL COMMENT '剧团名称',
  `arttype` VARCHAR(12) NULL COMMENT '剧种',
  `awards` VARCHAR(60) NULL COMMENT '所获奖项',
  `city` VARCHAR(12) NULL COMMENT '所在市级',
  `area` VARCHAR(12) NULL COMMENT '所在区县',
  `towns` VARCHAR(12) NULL COMMENT '所在乡镇',
  PRIMARY KEY (`id_art`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC))  ENGINE=InnoDB DEFAULT CHARSET=utf8 
COMMENT = '文化艺术表';
";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_art;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
