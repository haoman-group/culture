<?php

use Phpmig\Migration\Migration;

class CreateTableLibVolunteerAct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
//人才队伍建设情况表
        $sql="CREATE TABLE `cu_lib_vol_act` (
  `id_lib_vact` INT NOT NULL AUTO_INCREMENT,
  `library_id_lib` INT NOT NULL,
  `vact_title` VARCHAR(45) NULL COMMENT '活动名称',
  `vact_names` VARCHAR(45) NULL COMMENT '参加活动志愿者姓名',
  `vact_date` DATE NULL COMMENT '活动日期',
  `vact_location` VARCHAR(45) NULL COMMENT '活动地点',
  `isdelete` INT(1) NULL DEFAULT 0 ,
  `status` INT(1) NULL DEFAULT 0 ,
  `addtime` DATETIME NULL,
  `updatetime` DATETIME NULL,
  PRIMARY KEY (`id_lib_vact`),
  CONSTRAINT `id_lib_vact`
    FOREIGN KEY (`library_id_lib`)
    REFERENCES `cu_library` (`id_lib`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '图书馆-志愿服务活动	';
";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_lib_vol_act;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
