<?php

use Phpmig\Migration\Migration;

class CreateTableIndustry extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="CREATE TABLE `culture`.`cu_industry` (
            `id_ind` INT NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(45) NULL COMMENT '项目名称',
            `intro` VARCHAR(45) NULL COMMENT '项目简介',
            `support` VARCHAR(45) NULL COMMENT '项目配套',
            `com_name` VARCHAR(45) NULL COMMENT '实施单位名称',
            `com_property` VARCHAR(45) NULL COMMENT '单位性质',
            `com_leader` VARCHAR(45) NULL COMMENT '负责人',
            `com_phone` VARCHAR(45) NULL COMMENT '联系电话',
            `com_addr` VARCHAR(45) NULL COMMENT '联系地址',
            `com_product` VARCHAR(45) NULL COMMENT '经营产品',
            `com_mode` VARCHAR(45) NULL COMMENT '经营模式',
            `inv_totle` VARCHAR(45) NULL COMMENT '招商投资总额(investment)',
            `inv_financing` VARCHAR(45) NULL COMMENT '融资总额',
            `inv_years` VARCHAR(45) NULL COMMENT '投资年限',
            `inv_type` VARCHAR(45) NULL COMMENT '合作方式',
            `inv_use` VARCHAR(45) NULL COMMENT '资金用途',
            `sponsor`  VARCHAR(45) NULL COMMENT '主办者',
            `undertaker` VARCHAR(45) NULL COMMENT '承办者',
            `pavilion` VARCHAR(45) NULL COMMENT '参展展馆',
            `opentime` VARCHAR(45) NULL COMMENT '开始时间',
            `completetime` VARCHAR(45) NULL COMMENT '竣工时间',
            `addr` VARCHAR(45) NULL COMMENT '地址',
            `total_area` VARCHAR(45) NULL COMMENT '总面积',
            `boutique`  VARCHAR(45) NULL COMMENT '馆藏精品',
            `specification` VARCHAR(45) NULL COMMENT '规格',
            `rank` VARCHAR(45) NULL COMMENT '级别',
            `area`  VARCHAR(45) NULL COMMENT '所属地区',
            `status` int(1) NOT NULL DEFAULT '0' COMMENT '状态',
            `isdelete` int(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
            `addtime` datetime DEFAULT NULL,
            `updatetime` datetime DEFAULT NULL,
            `art_cid` int(11) DEFAULT NULL COMMENT '分类ID',
            `author_id` varchar(45) DEFAULT NULL COMMENT '上传人ID',
            PRIMARY KEY (`id_ind`))
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_bin
            COMMENT = '文化产业';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_industry;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
