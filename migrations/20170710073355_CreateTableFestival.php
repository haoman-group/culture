<?php

use Phpmig\Migration\Migration;

class CreateTableFestival extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_festival` (
                `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '标题',
  `url` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '链接',
  `source` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '来源',
  `editer` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '编辑',
  `image` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '图片',
  `content` text CHARACTER SET utf8 NOT NULL COMMENT '内容',
  `categorytype` int(2) NOT NULL COMMENT '类别',
  `periodical_date` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '刊物时间',
  `host_title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '主标题',
  `deputy_title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '副标题',
  `voide` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '视频',
  `addtime`  datetime NOT NULL,
  `updatetime`  datetime NOT NULL,
  `isdelete` int(1) NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8  COMMENT='艺术节';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_festival

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}