<?php

use Phpmig\Migration\Migration;

class CreateUnionActive extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
            DROP TABLE IF EXISTS `cu_union_active`;
CREATE TABLE `cu_union_active` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active_name` varchar(255) NOT NULL DEFAULT '' COMMENT '活动名称',
  `active_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '活动图片',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  `active_start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '活动开始时间',
  `active_end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '活动结束时间',
  `adminid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传管理员id',
  `updatatime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `updataadminid` int(10) unsigned NOT NULL COMMENT '修改人的id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_union_active`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
