<?php

use Phpmig\Migration\Migration;

class AddIndustryTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_industry` ADD `join_date` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '加入企业注册时间' , 
        ADD `person_num` INT(5) NOT NULL COMMENT '人数' , 
        ADD `scale` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '规模' ,
        ADD `output_value` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '年产值（统计）',
        ADD `survey` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '项目概况' ,
        ADD `acrobatics_picture_url` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图片';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_industry` DROP `join_date`, DROP `person_num`,DROP `scale`,DROP `output_value`,DROP `survey`,DROP `acrobatics_picture_url`;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}