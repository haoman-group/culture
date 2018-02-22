<?php

use Phpmig\Migration\Migration;

class CreateCreativitytable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_creativity` (
                `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
                `userid` int(10) NOT NULL COMMENT '发表者',
                `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '标题',
                `content` text CHARACTER SET utf8 NOT NULL COMMENT '正文',
                `addtime` date NOT NULL COMMENT '发表时间',
                `updatetime` date NOT NULL COMMENT '跟新时间',
                `pass` int(11) NOT NULL DEFAULT '0' COMMENT '0未审核，1审核通过，2审核未通过''',
                 `type` int(11) NOT NULL COMMENT '1为热帖2为精华',
                `click_num` int(10) NOT NULL DEFAULT '0' COMMENT '点击量',
                `isdelete` int(1) NOT NULL DEFAULT '0',
                PRIMARY KEY (`id`)
                ) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COMMENT='我的创意';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_creativity;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}