<?php

use Phpmig\Migration\Migration;

class CreateGoods extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE IF NOT EXISTS `cu_goods` (
         `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
         `title` varchar(255) NOT NULL DEFAULT '' COMMENT '商品名称',
         `content` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
         `time` varchar(255) NOT NULL DEFAULT '' COMMENT '时间',
         `address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
         `price` varchar(255) NOT NULL DEFAULT '',
         `status` varchar(255) NOT NULL DEFAULT '' COMMENT '状态',
         `person` varchar(255) NOT NULL DEFAULT '' COMMENT '演出人员',
         `tel` varchar(255) NOT NULL DEFAULT '' COMMENT '电话',
         `thumb` varchar(1000) NOT NULL DEFAULT '' COMMENT '图片路径',
         `pid` int(11) NOT NULL DEFAULT '0' COMMENT '价格关联id',
        `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
         `photo` varchar(2000) NOT NULL DEFAULT '' COMMENT '剧组图片',
         PRIMARY KEY (`id`)
       ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
       $container = $this->getContainer();
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {  
       $sql="DROP TABLE `cu_goods;";
       $container = $this->getContainer();
       $container['db']->query($sql);
    }
}
