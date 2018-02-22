<?php

use Phpmig\Migration\Migration;

class Createindustrystage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      
      $sql="CREATE TABLE IF NOT EXISTS `cu_industry_stage` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stagename` varchar(50) NOT NULL DEFAULT '' COMMENT '项目阶段名称',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT  CHARSET=utf8 AUTO_INCREMENT=1 ;";
  $container = $this->getContainer();
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="DROP TABLE cu_industry_stage;";   
       $container = $this->getContainer();
       $container['db']->query($sql);
    }
    }

    /**
     * Undo the migration
     */
   

