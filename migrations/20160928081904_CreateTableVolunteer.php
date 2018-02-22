<?php

use Phpmig\Migration\Migration;

class CreateTableVolunteer extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE `culture`.`cu_cac_volunteer` (
     `id_cac_vol` INT(10) NOT NULL AUTO_INCREMENT,
     `id_cac` INT(10) NULL,
      `vol_name` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '姓名',
      `vol_sex` INT(1) NULL COMMENT '性别',
     `vol_nation` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '名族',
     `vol_birthday` DATE NULL COMMENT '出生日期',
    `vol_polstatus` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '政治面貌',
    `vol_schooltag` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '毕业学校',
    `vol_graduatedate` DATE NULL COMMENT '毕业时间',
    `vol_workunit` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '工作单位',
    `vol_level` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '教育程度',
    `vol_expertise` VARCHAR(45) CHARACTER SET 'utf8' NULL COMMENT '专长',
    `addtime` DATE NULL,
    `updatetime` DATE NULL,
    `is_delete` INT(10) NULL DEFAULT 0,
    `status` INT NULL,
    PRIMARY KEY (`id_cac_vol`),
    INDEX `id_vol_cac_idx` (`id_cac` ASC),
    CONSTRAINT `id_vol_cac`
    FOREIGN KEY (`id_cac`)
    REFERENCES `culture`.`cu_comartcenter` (`id_cac`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
    COMMENT = '支援者队伍建设';";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_cac_volunteer;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
