<?php

use Phpmig\Migration\Migration;

class CreateTableVirtuoso extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_virtuoso` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(45) NULL COMMENT '标题',
            `intro` VARCHAR(545) NULL COMMENT '简介',
            `cover` VARCHAR(64) NULL COMMENT '封面图片',
            `images` VARCHAR(1045) NULL COMMENT '图片',
            `price` DECIMAL(10,2) NOT NULL DEFAULT 0.00 COMMENT '价格',
            `author` VARCHAR(45) NULL COMMENT '作者',
            `content` TEXT NULL COMMENT '详情',
            `stock` INT NOT NULL DEFAULT 0 COMMENT '库存',
            `property` TEXT NULL COMMENT '属性',
            `addtime` INT(11) NULL,
            `updatetime` INT(11) NULL,
            `status` VARCHAR(45) NULL COMMENT '状态',
            PRIMARY KEY (`id`))
          COMMENT = '艺术品购买';
          

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_virtuoso;`

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}