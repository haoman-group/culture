<?php

use Phpmig\Migration\Migration;

class CreateTableVolunteerRecruit extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_volunteer_recruit` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `addr` VARCHAR(45) NULL COMMENT '服务地址',
  `totle` INT NULL COMMENT '总需求人数',
  `intro` TEXT NULL,
  `condition` VARCHAR(45) NULL COMMENT '招募条件',
  `pic` VARCHAR(1025) NULL,
  `time` VARCHAR(45) NULL COMMENT '服务时间',
  `contact` VARCHAR(45) NULL COMMENT '联系方式',
  `create_time` INT(10) NULL,
  `update_time` INT(10) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '志愿者招募';


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_volunteer_recruit`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}