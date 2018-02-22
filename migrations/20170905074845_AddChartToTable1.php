<?php

use Phpmig\Migration\Migration;

class AddChartToTable1 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_area_data` ADD `author_id` INT(10) NOT NULL COMMENT '上传IP';
        INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
                              (474, '轮播设置', 3, 'Admin', 'Carousel', 'index', '', 1, 1, '', 0),
                              (475, '添加', 474, 'Admin', 'Carousel', 'add', '', 1, 0, '', 0),
                              (476, '修改', 474, 'Admin', 'Carousel', 'edit', '', 1, 0, '', 0),
                              (477, '删除', 474, 'Admin', 'Carousel', 'delete', '', 1, 0, '', 0),
                              (478, '显示', 474, 'Admin', 'Carousel', 'show', '', 1, 0, '', 0);
        ALTER TABLE `cu_area_data` CHANGE `index_slide` `index_slide` VARCHAR(1025) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '首页轮播'; 
        ALTER TABLE `cu_area_data` CHANGE `pub_slide` `pub_slide` VARCHAR(1025) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公共服务轮播';                     

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_area_data` DROP `author_id`;
                DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 474;
                DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 475;
                DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 476;
                DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 477;
                DELETE FROM `cu_menu` WHERE `cu_menu`.`id` = 478;
                

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}