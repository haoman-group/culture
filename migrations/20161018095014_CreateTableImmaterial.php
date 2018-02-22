<?php

use Phpmig\Migration\Migration;

class CreateTableImmaterial extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE IF NOT EXISTS `cu_immaterial` (
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
    `prot_level` int(1) NOT NULL COMMENT '级别',
    `prot_zone` int(1) NOT NULL COMMENT '保护实验区',
    `prot_survey` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '国家级文化生态保护区总体概况',
    `prot_introduction` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '晋中文化生态保护区简介',
    `prot_rule` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '总体规划及实施细则',
    `prot_method` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '相关制度办法',
    `prot_topic` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '课题研究',
    `prot_projects` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '保护区内国家级非遗代表性项目',
    `prot_center` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '综合传习中心',
    `ba_level` int(1) NOT NULL COMMENT '级别',
    `ba_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '基地名称',
    `ba_introduction` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '基地简介',
    `ba_creattime` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '成立时间',
    `me_plan` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '工作方案',
    `me_manual` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '工作手册',
    `me_list` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '试点乡镇名单',
    `me_more` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '其他',
    `me_typical` varchar(25) CHARACTER SET utf8 NOT NULL COMMENT '典型乡镇',
    `me_exchange` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '经验交流',
    `me_media` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '媒体报道',
    `sh_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '名称',
    `sh_building` varchar(25) CHARACTER SET utf8 NOT NULL COMMENT '解设年代',
    `sh_situation` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '基本情况',
    `sh_content` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '展示内容',
    `sh_key` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '重点非遗项目',
    `sh_actcontent` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '活动内容',
    `area` int(1) NOT NULL COMMENT '所属地区',
    `addtime` date NOT NULL,
    `updatetime` date NOT NULL,
    `is_delete` int(1) NOT NULL DEFAULT '0',
    `status` int(1) NOT NULL DEFAULT '0',
    `author_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='非物质文化遗产' AUTO_INCREMENT=1;";
   $container = $this->getContainer(); 
   $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql = "drop table cu_immaterial;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
