<?php

use Phpmig\Migration\Migration;

class CreateTableVolunteer2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_volunteer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` enum('男','女') DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL COMMENT '国籍',
  `nation` varchar(45) DEFAULT NULL COMMENT '民族',
  `birthday` varchar(45) DEFAULT NULL,
  `political_status` varchar(45) DEFAULT NULL COMMENT '政治面貌',
  `idcard_type` varchar(45) DEFAULT NULL COMMENT '身份证件类型',
  `idcard_no` varchar(45) DEFAULT NULL COMMENT '证件号码',
  `education` varchar(45) DEFAULT NULL COMMENT '学历',
  `major` varchar(45) DEFAULT NULL COMMENT '专业',
  `university` varchar(45) DEFAULT NULL COMMENT '学校',
  `degree` varchar(45) DEFAULT NULL,
  `unit_type` varchar(45) DEFAULT NULL COMMENT '工作单位性质',
  `photo` varchar(145) DEFAULT NULL COMMENT '一寸免冠照',
  `organization` varchar(45) DEFAULT NULL COMMENT '所属组织',
  `hobby` varchar(45) DEFAULT NULL COMMENT '志愿爱好',
  `have_skill` enum('是','否') DEFAULT NULL COMMENT '是否具备相关志愿服务技能',
  `specialty` varchar(45) DEFAULT NULL COMMENT '个人特长',
  `server_time` varchar(45) DEFAULT NULL,
  `if_commitment` enum('是','否') DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `volunteer_recruit_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='志愿者库	';


        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `cu_volunteer`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}