<?php

use Phpmig\Migration\Migration;

class CreateTableComCulter extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE `culture`.`cu_cac_comculter` (
  `id_cac_cc` INT NOT NULL AUTO_INCREMENT,
  `id_cac` INT NULL COMMENT '群艺馆基本信息ID',
  `cc_name` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '刊物名称',
  `cc_publishnum` VARCHAR(15) CHARACTER SET 'utf8' NULL COMMENT '发行量',
  `cc_publishrang` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '发行范围',
  `addtime` DATE NULL,
  `updatetime` DATE NULL,
  `is_delete` INT(1) NULL DEFAULT 0,
  `status` INT(1) NULL,
  PRIMARY KEY (`id_cac_cc`),
  INDEX `id_cc_cac_idx` (`id_cac` ASC),
  CONSTRAINT `id_cc_cac`
    FOREIGN KEY (`id_cac`)
    REFERENCES `culture`.`cu_comartcenter` (`id_cac`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
COMMENT = '群众文艺辅导资料';";
     $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_cac_comculter;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
