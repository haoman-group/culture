<?php

use Phpmig\Migration\Migration;

class CreateTableProtzone extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE IF NOT EXISTS `cu_imm_protzone` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `art_cid` int(10) NOT NULL COMMENT '类别CID',
  `author_id` int(10) NOT NULL COMMENT '上传者ID',
  `prot_level` int(1) NOT NULL COMMENT '级别',
  `prot_zone` int(1) NOT NULL COMMENT '保护实验区',
  `prot_survey` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '国家级文化生态保护区总体概况',
  `prot_introduction` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '晋中文化生态保护区简介',
  `prot_rule` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '总体规划及实施细则',
  `prot_method` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '相关制度办法',
  `prot_topic` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '课题研究',
  `prot_projects` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '保护区内国家级非遗代表性项目',
  `prot_center` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '综合传习中心',
  `area` int(10) NOT NULL COMMENT '所辖地区',
  `addtime` date NOT NULL,
  `updatetime` date NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文化生态保护区' AUTO_INCREMENT=1 ;";
   $container = $this->getContainer(); 
   $container['db']->query($sql);
    }

    public function down()
    {
      $sql = "drop table cu_imm_protzone;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
