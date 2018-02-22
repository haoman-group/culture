<?php

use Phpmig\Migration\Migration;

class AlterAreaData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        //清空表结构
        $sql = "truncate table cu_area_data;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    
        //插入原始数据
        $sql = "INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(15, 25040000, '', '', 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(4, 25000000, '', 0, 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(5, 25070000, '', '', 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(6, 25050000, '', '', 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(7, 25080000, '', '', 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(8, 25110000, '', '', 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(9, 25100000, '', '', 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(10, 25090000, '', '', 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(11, 25060000, '', '', 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(12, 25030000, '', '', 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(13, 25020000, '', '', 0, 0, 0, '', 0, 0);
        INSERT INTO `cu_area_data` (`id`, `area_id`, `index_slide`, `pub_slide`, `create_time`, `update_time`, `status`, `picture_url`, `author_id`, `position`) VALUES(14, 25010000, '', '', 0, 0, 0, '', 0, 0);";
        $container = $this->getContainer();
        $container['db']->query($sql);

        //添加子域名字段
        $sql = "ALTER TABLE `cu_area_data` 
        ADD COLUMN `sub_domain` VARCHAR(45) NULL COMMENT '子域名';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        //清空表结构
        $sql = "truncate table cu_area_data;";
        $container = $this->getContainer();
        $container['db']->query($sql);

        //删除子域名字段
        $sql = "ALTER TABLE `cu_area_data` DROP COLUMN `sub_domain`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}