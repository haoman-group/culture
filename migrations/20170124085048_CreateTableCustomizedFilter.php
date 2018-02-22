<?php

use Phpmig\Migration\Migration;

class CreateTableCustomizedFilter extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_customized_filter` (
            `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
            `filter_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '过滤名称',
            `item_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '过滤项名称',
            `addtime` varchar(255) NULL,
            `status` int(1) NOT NULL COMMENT '状态',
            `isdelete` int(1) NOT NULL,
             PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='过滤条件表,手动添加过滤项' AUTO_INCREMENT=1;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_customized_filter;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
