<?php

use Phpmig\Migration\Migration;

class CreateTableLibFund extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        //经费投入情况表
        $sql=" CREATE TABLE `cu_lib_fund` (
  `id_lib_fund` INT NOT NULL AUTO_INCREMENT COMMENT '序号',
  `library_id_lib` INT NOT NULL COMMENT '图书馆基本信息表外键',
  `fund_totle` VARCHAR(45) NULL COMMENT '政府拨款总额（万元）	',
  `fund_source` VARCHAR(45) NULL COMMENT '经费来源',
  `fund_new` VARCHAR(45) NULL COMMENT '新增藏量购置费（万元）',
  `fund_free` VARCHAR(45) NULL COMMENT '免费开放本地经费（万元）',
  `fund_ele` VARCHAR(45) NULL COMMENT '电子资源购置费',
   `isdelete` INT(1) NULL DEFAULT 0 ,
  `status` INT(1) NULL DEFAULT 0 ,
  `addtime` DATETIME NULL,
  `updatetime` DATETIME NULL,
  PRIMARY KEY (`id_lib_fund`),
  INDEX `id_lib_fund` (`id_lib_fund` ASC),
  CONSTRAINT `id_lib`
    FOREIGN KEY (`library_id_lib`)
    REFERENCES `culture`.`cu_library` (`id_lib`)
    ON DELETE CASCADE
    ON UPDATE CASCADE ) ENGINE=InnoDB DEFAULT CHARSET=utf8 
    COMMENT = '图书馆-经费投入情况表';
        ";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_lib_fund;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
