<?php

use Phpmig\Migration\Migration;

class InsertPosition extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
       $sql="INSERT INTO `cu_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`) VALUES(1, '4', '0', '首页-产业新闻', 6, '', 0);
             INSERT INTO `cu_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`) VALUES(3, '4', '5', '视频--推荐位', 1, '', 0);
             INSERT INTO `cu_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`) VALUES(2, '4', '0', '首页轮播图', 1, '', 0);
             INSERT INTO `cu_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`) VALUES(4, '4', '4', '图片新闻推荐位', 3, '', 0);
             INSERT INTO `cu_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`) VALUES(5, '4', '17', '消费资讯推荐位', 10, '', 0);";
         $container = $this->getContainer();
         $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
         $sql="delete from cu_position where id >=1 and id <=5;";
         $container = $this->getContainer();
         $container['db']->query($sql);
    }
}
