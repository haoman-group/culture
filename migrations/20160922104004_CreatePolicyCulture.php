<?php

use Phpmig\Migration\Migration;

class CreatePolicyCulture extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE IF NOT EXISTS `cu_policy_culture` (
    `id_publish` int(10) NOT NULL AUTO_INCREMENT,
    `publish_agency` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '发布机构',
    `publish_date` datetime NOT NULL COMMENT '发布时间',
    `publish_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '发布名称',
    `publish_order` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT '文号',
    `publish_topword` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '主题字',
    `publish_content` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '内容',
     `publish_update` datetime NOT NULL COMMENT '更新时间',
    `status` int(1) NOT NULL DEFAULT '0' COMMENT '状态',
    `isdelete` int(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
    PRIMARY KEY (`id_publish`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文化政策';";
     $container = $this->getContainer(); 
     $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_policy_culture;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
