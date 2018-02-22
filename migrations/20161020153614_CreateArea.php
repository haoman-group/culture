<?php

use Phpmig\Migration\Migration;

class CreateArea extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'XX(省)XX(市)XX(县)XX(乡)',  
  `pid` int(11) DEFAULT NULL COMMENT '父id',
  `name` varchar(20) DEFAULT NULL COMMENT '省市名称',
  `span` int(11) DEFAULT '1' COMMENT '所属地区的范围，1000000省，10000市，100县，1乡',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='省市地区表';";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql = "drop table cu_area;";
      $container = $this->getContainer(); 
      $container['db']->query($sql);
    }
}
