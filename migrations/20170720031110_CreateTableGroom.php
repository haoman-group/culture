<?php

use Phpmig\Migration\Migration;

class CreateTableGroom extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_groom` (
               `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
              `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '标题',
              `scree_time` date NOT NULL COMMENT '上映时间',
               `click_num` int(10) NOT NULL COMMENT '浏览次数',
              `content` text CHARACTER SET utf8 NOT NULL COMMENT '简介',
              `isdelete` int(1) DEFAULT '0',
             `addtime` varchar(45) NOT NULL COMMENT '添加时间',
             `url` varchar(255) CHARACTER SET utf8 NOT NULL,
             `image` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '图片',
              PRIMARY KEY (`id`)
             )ENGINE = InnoDB DEFAULT CHARACTER SET = utf8  COMMENT='最新推荐';
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_groom

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}