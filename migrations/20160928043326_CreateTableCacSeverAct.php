<?php

use Phpmig\Migration\Migration;

class CreateTableCacSeverAct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE `culture`.`cu_cac_act` (
  `id_cac_act` INT(10) NOT NULL AUTO_INCREMENT,
  `id_cac` INT(10) NULL COMMENT '群艺馆基本信息ID',
  `act_object` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '活动对象',
  `act_name` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '活动名称',
  `act_content` VARCHAR(255) CHARACTER SET 'utf8' NULL COMMENT '活动内容',
  `act_time` DATE NULL COMMENT '活动时间',
  `act_addr` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '活动地点',
  `act_pernum` VARCHAR(45) NULL COMMENT '收益人数',
  `addtime` DATE NULL,
  `updatetime` DATE NULL,
  `is_delete` INT(1) NULL DEFAULT 0,
  `status` INT(1) NULL,
  PRIMARY KEY (`id_cac_act`),
  INDEX `id_act_cac_idx` (`id_cac` ASC),
  CONSTRAINT `id_act_cac`
    FOREIGN KEY (`id_cac`)
    REFERENCES `culture`.`cu_comartcenter` (`id_cac`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
  COMMENT = '服务活动';

   ";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql = "drop table cu_cac_act;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
