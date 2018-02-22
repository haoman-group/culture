<?php

use Phpmig\Migration\Migration;

class CreateTableIndustryProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_industry_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `keyword` varchar(255) NOT NULL COMMENT '关键字',
  `image` varchar(255) NOT NULL COMMENT '封面图片',
  `url` varchar(255) NOT NULL COMMENT '产品展示地址',
  `addtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `isdelete` int(1) NOT NULL DEFAULT '0' COMMENT '是否删除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文化产品展示馆';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_industry_product`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}