<?php

use Phpmig\Migration\Migration;

class CreateTableEjournals extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_ejournals` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL COMMENT '期刊名称',
  `intro` VARCHAR(145) NULL COMMENT '简介',
  `publish_date` INT NULL COMMENT '出版日期',
  `category` VARCHAR(45) NULL COMMENT '期刊类目',
  `content` LONGTEXT NULL COMMENT '内容',
  `pagecount` INT NULL COMMENT '总页数',
  `type` ENUM('image', 'text') NULL COMMENT '期刊类型',
  `hits` INT NULL COMMENT '点击量',
  `status` VARCHAR(10) NULL COMMENT '状态',
  `create_time` INT NULL,
  `update_time` INT NULL,
  PRIMARY KEY (`id`))
COMMENT = '电子期刊';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_ejournals;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}