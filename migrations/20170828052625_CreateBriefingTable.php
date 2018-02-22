<?php

use Phpmig\Migration\Migration;

class CreateBriefingTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_briefing` (
               `id` INT NOT NULL AUTO_INCREMENT,
               `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '标题',
                `content` text CHARACTER SET utf8 NOT NULL COMMENT '内容',
                `author_id` int(10) NOT NULL COMMENT '上传着ID',
                `addtime` date NOT NULL,
                `updatetime` date NOT NULL,
                `isdelete` int(1) NOT NULL DEFAULT '0',
                 `issue` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '第几期',
                 PRIMARY KEY (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='演出活动新闻简报表';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_briefing`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}