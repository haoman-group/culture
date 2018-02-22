<?php

use Phpmig\Migration\Migration;

class Createindustrycategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
       $sql="CREATE TABLE IF NOT EXISTS `cu_industry_category` (
             `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `categoryname` varchar(50) NOT NULL DEFAULT '' COMMENT '项目类别',
             PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT  CHARSET=utf8 AUTO_INCREMENT=1 ;";
       $container = $this->getContainer();
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="DROP TABLE cu_industry_category;";   
       $container = $this->getContainer();
       $container['db']->query($sql);
    }
}
