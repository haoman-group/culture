<?php

use Phpmig\Migration\Migration;

class CreateTableMemory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_imm_memory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `art_cid` int(10) NOT NULL COMMENT '类别CID',
  `author_id` int(10) NOT NULL COMMENT '上传者ID',
  `me_plan` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '工作方案',
  `me_manual` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '工作手册',
  `me_list` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '试点乡镇名单',
  `me_more` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '其他',
  `me_typical` varchar(25) CHARACTER SET utf8 NOT NULL COMMENT '典型乡镇',
  `me_exchange` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '经验交流',
  `me_media` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '媒体报道',
  `area` int(10) NOT NULL COMMENT '所属地区',
  `addtime` date NOT NULL,
  `updatetime` date NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='乡村文化记忆工程' AUTO_INCREMENT=1 ;";
   $container = $this->getContainer(); 
   $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql = "drop table cu_imm_memory;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
