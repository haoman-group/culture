<?php

use Phpmig\Migration\Migration;

class CreateTableTrainBase extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE `culture`.`cu_cac_trainbase` (
       `id_cac_tb` INT NOT NULL AUTO_INCREMENT,
        `id_cac` INT NULL COMMENT '群艺馆基础信息ID',
       `tb_addr` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '地点',
       `tb_area` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '面积',
       `tb_includenum` INT(3) NULL COMMENT '可容纳培训人数',
       `tb_yearnum` INT(3) NULL COMMENT '年举办培训次数',
       `addtime` DATE NULL,
       `updatetime` DATE NULL,
       `is_delete` INT(1) NULL DEFAULT 0,
       `status` INT NULL,
        PRIMARY KEY (`id_cac_tb`),
        INDEX `id_tb_cac_idx` (`id_cac` ASC),
        CONSTRAINT `id_tb_cac`
        FOREIGN KEY (`id_cac`)
        REFERENCES `culture`.`cu_comartcenter` (`id_cac`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
       COMMENT = '培训基地';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_cac_trainbase;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
