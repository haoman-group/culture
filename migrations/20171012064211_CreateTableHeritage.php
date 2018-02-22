<?php

use Phpmig\Migration\Migration;

class CreateTableHeritage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_heritage` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(45) NULL COMMENT '名称',
            `level` VARCHAR(45) NULL COMMENT '批次',
            `intro` VARCHAR(500) NULL COMMENT '简介',
            `images` TEXT NULL COMMENT '图片',
            `cover` VARCHAR(100) NULL COMMENT '封面',
            `content` TEXT NULL COMMENT '图文内容',
            `video` VARCHAR(45) NULL COMMENT '视频VID',
            `video_title` VARCHAR(45) NULL COMMENT '视频标题',
            `author` INT NULL COMMENT '上传人',
            `addtime` INT NULL,
            `updatetime` INT NULL,
            PRIMARY KEY (`id`))
          COMMENT = '山西非遗影像志';
          

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_heritage`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}