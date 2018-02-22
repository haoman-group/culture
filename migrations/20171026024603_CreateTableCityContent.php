<?php

use Phpmig\Migration\Migration;

class CreateTableCityContent extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_city_content` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(45) NOT NULL COMMENT '标题',
            `views` INT NULL DEFAULT 0 COMMENT '浏览次数',
            `author` VARCHAR(45) NULL COMMENT '作者',
            `addtime` INT NULL,
            `updatetime` INT NULL,
            `content` TEXT NULL COMMENT '内容',
            `category` VARCHAR(45) NULL COMMENT '分类',
            `cover` VARCHAR(145) NULL COMMENT '封面图片',
            `intro` VARCHAR(500) NOT NULL COMMENT '简介',
            `operater` VARCHAR(45) NULL COMMENT '上传人',
            `source` VARCHAR(45) NULL COMMENT '来源',
            PRIMARY KEY (`id`))
          ENGINE = InnoDB
          DEFAULT CHARACTER SET = utf8
          COMMENT = '市级文化云内容';
          

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_city_content`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}