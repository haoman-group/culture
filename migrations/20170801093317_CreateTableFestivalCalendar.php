<?php

use Phpmig\Migration\Migration;

class CreateTableFestivalCalendar extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_festival_calendar` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(145) NULL COMMENT '活动标题',
  `site` VARCHAR(45) NULL COMMENT '场馆',
  `start` INT NULL COMMENT '开始时间',
  `end` INT NULL COMMENT '结束时间',
  `class` VARCHAR(45) NULL COMMENT '颜色类型',
  `addtime` INT NULL,
  `updatetime` INT NULL,
  PRIMARY KEY (`id`))ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT = '艺术节日常安排';


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_festival_calendar`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}