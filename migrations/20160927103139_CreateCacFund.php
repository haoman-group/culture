<?php

use Phpmig\Migration\Migration;

class CreateCacFund extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE `culture`.`cu_cac_fund` (
  `id_cac_fund` INT(10) NOT NULL AUTO_INCREMENT,
  `id_cac` INT(10) NULL,
  `fund_totle` VARCHAR(45) NULL COMMENT '财政拨款总额',
  `fund_source` VARCHAR(45) NULL COMMENT '资金来源',
  `isbudget` INT(1) NULL DEFAULT 1,
  `fund_free` VARCHAR(45) NULL COMMENT '免费开放经费补助金额',
  `fund_major` VARCHAR(45) NULL COMMENT '专项业务活动经费',
  `addtime` DATE NULL,
  `updatetime` DATE NULL,
  `is_delete` INT(1) NULL DEFAULT 0,
  `status` INT(1) NULL,
  PRIMARY KEY (`id_cac_fund`),
  INDEX `id_cac_idx` (`id_cac` ASC),
  CONSTRAINT `id_cac`
    FOREIGN KEY (`id_cac`)
    REFERENCES `culture`.`cu_comartcenter` (`id_cac`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = '经费投入情况';
";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_cac_fund;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
