<?php

use Phpmig\Migration\Migration;

class CreateTableShow extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_imm_show` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `art_cid` int(10) NOT NULL COMMENT '类名CID',
  `author_id` int(10) NOT NULL COMMENT '上传者ID',
  `sh_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '名称',
  `sh_building` varchar(25) CHARACTER SET utf8 NOT NULL COMMENT '解设年代',
  `sh_situation` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '基本情况',
  `sh_content` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '展示内容',
  `sh_key` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '重点非遗项目',
  `sh_actcontent` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '活动内容',
  `area` int(10) NOT NULL COMMENT '所属地区',
  `addtime` date NOT NULL,
  `uodatetime` date NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='非遗展示' AUTO_INCREMENT=1 ;";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql = "drop table cu_imm_show;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
