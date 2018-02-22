<?php

use Phpmig\Migration\Migration;

class CreateTableLibVolunteer extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
//志愿者队伍建设
        $sql=" CREATE TABLE `cu_lib_volunteer` (
  `id_lib_vol` INT NOT NULL AUTO_INCREMENT,
  `library_id_lib` INT NOT NULL  COMMENT '图书馆基本信息表外键',
  `vol_name` VARCHAR(12) NULL COMMENT '姓名',
  `vol_sex` INT(1) DEFAULT 0 COMMENT '性别',
  `vol_nation` VARCHAR(12) NULL COMMENT '民族',
  `vol_birthday` VARCHAR(45) NULL COMMENT '出生年月',
  `vol_pol_status` VARCHAR(45) NULL COMMENT '政治面貌',
  `vol_join_date` DATE NULL COMMENT '入党时间',
  `vol_schooltag` VARCHAR(45) NULL COMMENT '毕业院校',
  `vol_graduate_date` DATE NULL COMMENT '毕业时间',
  `vol_major` VARCHAR(45) NULL COMMENT '所学专业',
  `vol_edu_bg` VARCHAR(45) NULL COMMENT '学历(BackGround:教育背景)',
  `vol_edu_degree` VARCHAR(45) NULL COMMENT '学位',
  `vol_begin_date` DATE NULL COMMENT '加入志愿者日期',
  `vol_company` VARCHAR(45) NULL COMMENT '工作单位',
  `vol_degree` VARCHAR(45) NULL COMMENT '教育程度',
  `vol_speciality` INT(1) NULL COMMENT '专长',
  `isdelete` INT(1) NULL DEFAULT 0 ,
  `status` INT(1) NULL DEFAULT 0 ,
  `addtime` DATETIME NULL,
  `updatetime` DATETIME NULL,
  PRIMARY KEY (`id_lib_vol`),
  CONSTRAINT `id_lib_vol`
    FOREIGN KEY (`library_id_lib`)
    REFERENCES `cu_library` (`id_lib`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '图书馆-志愿者队伍建设表';
        ";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_lib_volunteer;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
