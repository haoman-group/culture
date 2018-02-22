<?php

use Phpmig\Migration\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_feedback` (
               `id` int(10)  NOT NULL AUTO_INCREMENT,
               `content` text CHARACTER SET utf8 NOT NULL,
                `image` varchar(255) CHARACTER SET utf8 NOT NULL,
                 `tel` varchar(255) CHARACTER SET utf8 NOT NULL,
               `isdelete` int(1) NOT NULL DEFAULT '0',
              `addtime` varchar(35) NOT NULL,
               PRIMARY KEY (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8  COMMENT='意见反馈';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_feedback`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}