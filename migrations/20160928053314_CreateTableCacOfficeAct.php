<?php

use Phpmig\Migration\Migration;

class CreateTableCacOfficeAct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE `culture`.`cu_cac_officeact` (
    `id_cac_officeact` INT NOT NULL AUTO_INCREMENT,
    `id_cac` INT NULL COMMENT '群艺馆基本资料ID',
    `officeact_name` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '活动名称',
    `officeact_catalog` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '目录',
    `officeact_joinnum` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '参加人数',
    `officeact_time` DATE NULL COMMENT '活动时间',
    `officeact_addr` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '活动地点',
    `officeact_content` VARCHAR(255) CHARACTER SET 'utf8' NULL COMMENT '主要内容',
    `addtime` DATE NULL,
    `updatetime` DATE NULL,
    `is_delete` INT(1) NULL DEFAULT 0,
    `status` INT(1) NULL,
     PRIMARY KEY (`id_cac_officeact`),
     INDEX `id_officeact_cac_idx` (`id_cac` ASC),
     CONSTRAINT `id_officeact_cac`
      FOREIGN KEY (`id_cac`)
      REFERENCES `culture`.`cu_comartcenter` (`id_cac`)
      ON DELETE CASCADE
      ON UPDATE CASCADE)
      COMMENT = '馆办活动';
      ";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_cac_officeact;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
