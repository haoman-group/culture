<?php

use Phpmig\Migration\Migration;

class CreateGoodsFollow extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE IF NOT EXISTS `cu_goods_follow` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `good_id` int(10) unsigned NOT NULL COMMENT '商品id',
          `uid` int(10) unsigned NOT NULL COMMENT '用户id',
          `inputtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏时间',
          PRIMARY KEY (`id`)
         ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
         $container = $this->getContainer();
         $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="DROP TABLE `cu_goods_follow;";
       $container = $this->getContainer();
       $container['db']->query($sql);
    }
}
