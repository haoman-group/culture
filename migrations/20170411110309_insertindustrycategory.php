<?php

use Phpmig\Migration\Migration;

class Insertindustrycategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="INSERT INTO `cu_industry_category` (`id`, `categoryname`) VALUES
(1, '新闻出版发行服务'),
(2, '广播电视电影服务'),
(3, '文化艺术服务'),
(4, '文化信息传输服务'),
(5, '文化创意和设计服务'),
(6, '文化休闲娱乐服务'),
(7, '工艺美术品的生产'),
(8, '文化产品生产的辅助生产'),
(9, '文化用品的生产'),
(10, '文化专用设备的生产');";
  $container = $this->getContainer();
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="DELETE FROM `culture`.`cu_industry_category` WHERE `cu_industry_category`.`id` in(1,2,3,4,5,6,7,8,9,10);";  
      $container = $this->getContainer();
       $container['db']->query($sql);
    }
}
