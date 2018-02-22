<?php

use Phpmig\Migration\Migration;

class CreateBusinessAlliance extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_business_alliance` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(255) NOT NULL DEFAULT '' COMMENT '企业名称',
         `adress` varchar(255) NOT NULL DEFAULT '' COMMENT '企业地址',
         `registered` int(11) NOT NULL DEFAULT '0' COMMENT '注册资本，单位为万',
        `legal_person` varchar(255) NOT NULL DEFAULT '' COMMENT '法人代表',
        `linkman` varchar(255) NOT NULL DEFAULT '' COMMENT '联系人',
        `telephone` varchar(255) NOT NULL DEFAULT '' COMMENT '联系电话',
        `email` varchar(255) NOT NULL DEFAULT '' COMMENT '电子邮箱',
        `turnover` int(11) NOT NULL DEFAULT '0' COMMENT '年营业额，单位万',
        `company_type` varchar(255) NOT NULL DEFAULT '' COMMENT '公司注册类型',
        `industry` varchar(255) NOT NULL DEFAULT '' COMMENT '所属行业',
        `range` varchar(255) NOT NULL DEFAULT '' COMMENT '经营范围',
       `survey` text NOT NULL COMMENT '企业概况',
       `introduce` varchar(255) NOT NULL DEFAULT '' COMMENT '产品介绍',
       `photo` varchar(255) NOT NULL DEFAULT '' COMMENT '公司图片',
       `time` int(11) NOT NULL DEFAULT '0' COMMENT '加盟时间',
       `pass` int(11) NOT NULL DEFAULT '0' COMMENT '申请是否通过，0，通过，1不通过',
       `company_content` text NOT NULL COMMENT '企业概况',
        PRIMARY KEY (`id`)
       ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;";
       $container = $this->getContainer();
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="DROP TABLE `cu_business_alliance;";
        $container = $this->getContainer();
        $container['db']->query($sql);  
     
    }
}
