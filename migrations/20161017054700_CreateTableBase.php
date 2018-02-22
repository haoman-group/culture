<?php

use Phpmig\Migration\Migration;

class CreateTableBase extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE IF NOT EXISTS `cu_imm_base` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `art_cid` int(10) NOT NULL COMMENT '类目CID',
  `author_id` int(10) NOT NULL COMMENT '上传者ID',
  `ba_level` int(1) NOT NULL COMMENT '级别',
  `ba_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '基地名称',
  `ba_introduction` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '基地简介',
  `ba_creattime` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '成立时间',
  `are` int(10) NOT NULL COMMENT '所属地区',
  `is_delete` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `addtime` date NOT NULL,
  `updatetime` date NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='生产性保护示范基地' AUTO_INCREMENT=1 ;";
   $container = $this->getContainer(); 
   $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql = "drop table cu_imm_base;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
