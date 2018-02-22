<?php

use Phpmig\Migration\Migration;

class CreateTableLibEducationAct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="CREATE TABLE `cu_lib_edu_act` (
  `id_lib_eact` INT NOT NULL AUTO_INCREMENT,
  `library_id_lib` INT NULL,
  `eact_catelog` VARCHAR(45) NULL COMMENT '目录',
  `eact_title` VARCHAR(45) NULL COMMENT '活动名称',
  `eact_join_num` VARCHAR(45) NULL COMMENT '参加人数',
  `eact_date` DATE NULL COMMENT '活动时间',
  `eact_location` VARCHAR(45) NULL COMMENT '活动地点',
  `eact_content` VARCHAR(45) NULL COMMENT '活动内容',
   `isdelete` INT(1) NULL  DEFAULT 0 ,
  `status` INT(1) NULL  DEFAULT 0 ,
  `addtime` DATETIME NULL,
  `updatetime` DATETIME NULL,
  PRIMARY KEY (`id_lib_eact`),
  INDEX `id_eact_idx` (`library_id_lib` ASC),
  CONSTRAINT `id_eact`
    FOREIGN KEY (`library_id_lib`)
    REFERENCES `cu_library` (`id_lib`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '图书馆-社会教育活动';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_lib_edu_act;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
