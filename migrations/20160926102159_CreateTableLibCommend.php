<?php

use Phpmig\Migration\Migration;

class CreateTableLibCommend extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="CREATE TABLE `cu_lib_commend` (
  `id_lib_comm` INT NOT NULL AUTO_INCREMENT,
  `library_id_lib` INT NOT NULL,
  `comm_content` VARCHAR(45) NULL,
  `comm_entity` VARCHAR(45) NULL COMMENT '表彰单位',
  `comm_type` VARCHAR(45) NULL COMMENT '表彰类型',
  `comm_date` DATE NULL COMMENT '表彰日期',
  `isdelete` INT(1) NULL  DEFAULT 0 ,
  `status` INT(1) NULL  DEFAULT 0 ,
  `addtime` DATETIME NULL,
  `updatetime` DATETIME NULL,
  PRIMARY KEY (`id_lib_comm`),
  INDEX `id_lib_comm_idx` (`library_id_lib` ASC),
  CONSTRAINT `id_lib_comm`
    FOREIGN KEY (`library_id_lib`)
    REFERENCES `cu_library` (`id_lib`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '图书馆-上级表彰信息表';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="drop table cu_lib_commend;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
