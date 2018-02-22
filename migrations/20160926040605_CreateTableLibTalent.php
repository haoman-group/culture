<?php

use Phpmig\Migration\Migration;

class CreateTableLibTalent extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
//人才队伍建设情况表
        $sql=" CREATE TABLE `cu_lib_talent` (
  `id_lib_tal` INT NOT NULL AUTO_INCREMENT,
  `library_id_lib` INT NOT NULL  COMMENT '图书馆基本信息表外键',
  `tal_name` VARCHAR(12) NULL COMMENT '姓名',
  `tal_sex` INT(1) NULL COMMENT '性别',
  `tal_nation` VARCHAR(12) NULL COMMENT '民族',
  `tal_birthday` VARCHAR(45) NULL COMMENT '出生年月',
  `tal_pol_status` VARCHAR(45) NULL COMMENT '政治面貌',
  `tal_join_date` DATE NULL COMMENT '入党时间',
  `tal_schooltag` VARCHAR(45) NULL COMMENT '毕业院校',
  `tal_graduate_date` DATE NULL COMMENT '毕业时间',
  `tal_major` VARCHAR(45) NULL COMMENT '所学专业',
  `tal_edu_bg` VARCHAR(45) NULL COMMENT '学历(BackGround:教育背景)',
  `tal_edu_degree` VARCHAR(45) NULL  COMMENT '学位',
  `tal_position` VARCHAR(45) NULL COMMENT '职称',
  `tal_train_hours` VARCHAR(45) NULL COMMENT '岗位培训学时',
  `tal_rewards` VARCHAR(45) NULL COMMENT '获奖情况',
  `tal_if_business` INT(1) NULL COMMENT '是否业务人员(1-是,0-否)',
  `tal_identity` VARCHAR(45) NULL COMMENT '人员身份',
  `isdelete` INT(1) NULL DEFAULT 0 ,
  `status` INT(1) NULL DEFAULT 0 ,
  `addtime` DATETIME NULL,
  `updatetime` DATETIME NULL,
  PRIMARY KEY (`id_lib_tal`),
  INDEX `id_lib_idx` (`library_id_lib` ASC),
  CONSTRAINT `id_lib_tal`
    FOREIGN KEY (`library_id_lib`)
    REFERENCES `cu_library` (`id_lib`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '图书馆-人才队伍建设情况表';
        ";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_lib_talent;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
