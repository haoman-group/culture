<?php

use Phpmig\Migration\Migration;

class CreateTableTrainact extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     
    $sql="CREATE TABLE `culture`.`cu_cac_trainact` (
  `id_cac_ta` INT(10) NOT NULL AUTO_INCREMENT,
  `id_cac` INT(10) NULL COMMENT '群艺馆基本信息ID',
  `ta_traintype` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '目录',
  `ta_name` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '名称',
  `ta_content` VARCHAR(255) CHARACTER SET 'utf8' NULL COMMENT '内容',
  `ta_time` DATE NULL,
  `ta_addr` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '活动地点',
  `ta_profitnum` INT(3) NULL COMMENT '收益人数',
  `ta_frequency` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '活动开展频率',
  `addtime` DATE NULL,
  `updatetime` DATE NULL,
  `is_delete` INT(1) NULL DEFAULT 0,
  `status` INT(1) NULL,
  PRIMARY KEY (`id_cac_ta`),
  INDEX `id_ta_cac_idx` (`id_cac` ASC),
  CONSTRAINT `id_ta_cac`
    FOREIGN KEY (`id_cac`)
    REFERENCES `culture`.`cu_comartcenter` (`id_cac`)
     ON DELETE CASCADE
    ON UPDATE CASCADE)
    COMMENT = '辅导培训活动';";
       $container = $this->getContainer(); 
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_cac_trainact;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
