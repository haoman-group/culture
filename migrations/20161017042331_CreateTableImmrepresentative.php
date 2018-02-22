<?php

use Phpmig\Migration\Migration;

class CreateTableImmrepresentative extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE IF NOT EXISTS `cu_imm_representative` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `art_cid` int(10) NOT NULL COMMENT '类目的CID',
  `re_level` int(1) NOT NULL COMMENT '级别',
  `re_represen` int(1) NOT NULL COMMENT '代表性项目或代表性传承人',
  `re_projectname` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '项目名称',
  `re_itemnum` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '项目编号',
  `re_introduction` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '项目简介',
  `re_unit` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '申报地区或单位',
  `re_directorytime` date NOT NULL COMMENT '入选本级名录时间',
  `re_batch` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '入选本级名录批次',
  `re_protectunit` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '项目保护单位',
  `re_name` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '姓名',
  `re_sex` int(1) NOT NULL COMMENT '性别',
  `re_nation` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '民族',
  `re_birth` date NOT NULL COMMENT '出身日期',
  `re_belongunit` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '所在单位',
  
  `area` int(1) NOT NULL,
  `addtime` date NOT NULL,
  `updatetime` date NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `author_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='非物质文化遗产的代表性项目及代表性传承人' AUTO_INCREMENT=1;";
   $container = $this->getContainer(); 
   $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql = "drop table cu_imm_representative;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
