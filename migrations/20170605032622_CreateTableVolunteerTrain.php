<?php

use Phpmig\Migration\Migration;

class CreateTableVolunteerTrain extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_volunteer_train` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `pic` varchar(1024) DEFAULT NULL,
  `content` text COMMENT '培训内容',
  `notice` varchar(1024) DEFAULT NULL COMMENT '培训须知',
  `addr` varchar(65) DEFAULT NULL COMMENT '培训地点',
  `time` varchar(45) DEFAULT NULL COMMENT '培训时间',
  `contact` varchar(45) DEFAULT NULL COMMENT '联系方式',
  `type` int(1) DEFAULT NULL,
  `totle` int(11) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_volunteer_train`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}