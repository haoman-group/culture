<?php

use Phpmig\Migration\Migration;

class CreateTableVolact extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE `culture`.`cu_cac_volact` (
      `id_cac_volact` INT NOT NULL AUTO_INCREMENT,
      `id_cac` INT NULL COMMENT '群艺馆的基本信息ID',
       `volact_title` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '活动名称',
      `volact_joinname` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '参加活动志愿者的姓名',
     `volact_time` DATE NULL COMMENT '活动时间',
     `volact_addr` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '活动地址',
     `volact_joinnum` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '参加人数',
     `volact_profitnum` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '参加活动收益人数',
      `addtime` DATE NULL,
     `updatetime` DATE NULL,
     `is_delete` INT NULL DEFAULT 0,
     `status` INT NULL,
     PRIMARY KEY (`id_cac_volact`),
     INDEX `id_volact_cac_idx` (`id_cac` ASC),
     CONSTRAINT `id_volact_cac`
    FOREIGN KEY (`id_cac`)
    REFERENCES `culture`.`cu_comartcenter` (`id_cac`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
     COMMENT = '支援者服务活动';";
     $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_cac_volact;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
