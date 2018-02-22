<?php

use Phpmig\Migration\Migration;

class CreateTableCacTalent extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE `culture`.`cu_cac_talent` (
  `id_cac_tal` INT(10) NOT NULL AUTO_INCREMENT,
  `id_cac` INT(10) NULL COMMENT '群艺馆基本情况的ID',
  `tal_name` VARCHAR(45) NULL COMMENT '姓名',
  `tal_sex` INT NULL DEFAULT 1 COMMENT '性别',
  `tal_nation` VARCHAR(15) NULL COMMENT '名族',
  `tal_birthday` DATE NULL COMMENT '出生日期',
  `tal_pol_status` VARCHAR(15) NULL COMMENT '政治面貌',
  `tal_join_date` DATE NULL COMMENT '入党时间',
  `tal_schooltag` VARCHAR(45) NULL COMMENT '毕业院校',
  `tal_graduate_date` DATE NULL COMMENT '毕业时间',
  `tal_edu_bg` VARCHAR(15) NULL COMMENT '学历',
  `tal_rewards` VARCHAR(45) NULL COMMENT '获奖情况',
  `tal_if_business` INT NULL COMMENT '是否业务人员',
  `tal_nickname` VARCHAR(45) NULL COMMENT '昵称',
  `tal_train_hours` VARCHAR(45) NULL COMMENT '岗位培训学时',
  `is_delete` INT(1) NULL DEFAULT 0,
  `addtime` DATE NULL,
  `updatetime` DATE NULL,
  `status` INT NULL,
  PRIMARY KEY (`id_cac_tal`),
  INDEX `id_cactal_idx` (`id_cac` ASC),
  CONSTRAINT `id_cac_tal`
    FOREIGN KEY (`id_cac`)
    REFERENCES `culture`.`cu_comartcenter` (`id_cac`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = '群艺馆人才队伍建设情况';
";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_cac_talent;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
