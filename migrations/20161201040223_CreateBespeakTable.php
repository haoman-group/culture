<?php

use Phpmig\Migration\Migration;

class CreateBespeakTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_bespeak` (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `tablename` varchar(15) NOT NULL COMMENT '表名',
      `tab_cid` int(15) NOT NULL COMMENT '表的id',
      `permanent_name` varchar(25) CHARACTER SET utf8 NOT NULL COMMENT '预约人姓名',
      `permanent_address` varchar(125) CHARACTER SET utf8 NOT NULL COMMENT '户籍',
      `document_type` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '证件类型',
      `credential_no` int(25) NOT NULL COMMENT '证件号',
     `institute` varchar(125) CHARACTER SET utf8 NOT NULL COMMENT '所属单位',
      `tel` varchar(25) CHARACTER SET utf8 NOT NULL COMMENT '联系电话',
     `email` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '电子邮箱',
     `attendance_num` int(3) NOT NULL COMMENT '预约参观人数',
     `adult_num` int(3) NOT NULL COMMENT '成人',
     `student_num` int(3) NOT NULL COMMENT '学生',
     `elder_num` int(3) NOT NULL COMMENT '老人',
    `child_num` int(3) NOT NULL COMMENT '小孩',
    `appointment_time` datetime NOT NULL COMMENT '预约参观日期',
    `time_interval` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '时段',
    `permanent_persons` tinytext CHARACTER SET utf8 NOT NULL COMMENT '预约人姓名',
    `addtime` datetime NOT NULL COMMENT '添加时间',
    `isdelete` int(1) NOT NULL,
    `updatetime` datetime NOT NULL,
    PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='参加预约表' AUTO_INCREMENT=1 ;";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
    $sql="drop table cu_bespeak;";     
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }
}
