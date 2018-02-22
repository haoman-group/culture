<?php

use Phpmig\Migration\Migration;

class CreateTableLibServer extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        //服务活动
        $sql ="CREATE TABLE `cu_lib_server` (
  `id_lib_ser` INT NOT NULL AUTO_INCREMENT,
  `library_id_lib` INT NOT NULL  COMMENT '图书馆基本信息表外键',
  `ser_object` VARCHAR(45) NULL COMMENT '活动对象',
  `ser_title` VARCHAR(45) NULL COMMENT '活动名称',
  `ser_content` VARCHAR(45) NULL COMMENT '主要内容',
  `ser_date` DATE NULL COMMENT '活动时间',
  `ser_location` VARCHAR(45) NULL COMMENT '活动地点',
  `ser_benefit_num` VARCHAR(45) NULL COMMENT '受益人数',
  `isdelete` INT(1) NULL DEFAULT 0 ,
  `status` INT(1) NULL DEFAULT 0 ,
  `addtime` DATETIME NULL,
  `updatetime` DATETIME NULL,
  PRIMARY KEY (`id_lib_ser`),
  CONSTRAINT `id_lib_ser`
    FOREIGN KEY (`library_id_lib`)
    REFERENCES `cu_library` (`id_lib`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '图书馆-服务活动表';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_lib_server;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
