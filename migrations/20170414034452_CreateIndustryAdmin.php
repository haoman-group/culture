<?php

use Phpmig\Migration\Migration;

class CreateIndustryAdmin extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `cu_business_alliance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '企业名称',
  `adress` varchar(255) NOT NULL DEFAULT '' COMMENT '企业地址',
  `registered` int(11) NOT NULL DEFAULT '0' COMMENT '注册资本，单位为万',
  `legal_person` varchar(255) NOT NULL DEFAULT '' COMMENT '法人代表',
  `linkman` varchar(255) NOT NULL DEFAULT '' COMMENT '联系人',
  `telephone` varchar(255) NOT NULL DEFAULT '' COMMENT '联系电话',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  ` turnover` int(11) NOT NULL DEFAULT '0' COMMENT '年营业额，单位万',
  `company_type` varchar(255) NOT NULL DEFAULT '' COMMENT '公司注册类型',
  `industry` varchar(255) NOT NULL DEFAULT '' COMMENT '所属行业',
  `range` varchar(255) NOT NULL DEFAULT '' COMMENT '经营范围',
  `survey` text NOT NULL COMMENT '企业概况',
  `introduce` varchar(255) NOT NULL DEFAULT '' COMMENT '产品介绍',
  `photo` varchar(255) NOT NULL DEFAULT '' COMMENT '公司图片',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT '加盟时间',
  `pass` int(11) NOT NULL DEFAULT '0' COMMENT '申请是否通过，0，通过，1不通过',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);

         $sql = "CREATE TABLE IF NOT EXISTS `cu_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '商品名称',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `time` varchar(255) NOT NULL DEFAULT '' COMMENT '时间',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `price` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(255) NOT NULL DEFAULT '' COMMENT '状态',
  `person` varchar(255) NOT NULL DEFAULT '' COMMENT '演出人员',
  `tel` varchar(255) NOT NULL DEFAULT '' COMMENT '电话',
  `thumb` varchar(1000) NOT NULL DEFAULT '' COMMENT '图片路径',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '价格关联id',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `photo` varchar(2000) NOT NULL DEFAULT '' COMMENT '剧组图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS `cu_goods_follow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `good_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS `cu_industry_report` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) NOT NULL DEFAULT '' COMMENT '产品名称',
  `uname` varchar(255) NOT NULL DEFAULT '' COMMENT '单位名称',
  `uquality` varchar(255) NOT NULL DEFAULT '' COMMENT '单位性质',
  `capital` int(11) unsigned NOT NULL COMMENT '注册资本',
  `ctime` varchar(255) NOT NULL DEFAULT '' COMMENT '成立时间',
  `representative` varchar(255) NOT NULL DEFAULT '' COMMENT '法定代表人',
  `tphone` int(11) NOT NULL COMMENT '联系电话',
  `paddress` varchar(255) NOT NULL DEFAULT '' COMMENT '注册地址',
  `scope` varchar(255) NOT NULL DEFAULT '' COMMENT '经营范围',
  `presention` varchar(255) NOT NULL DEFAULT '' COMMENT '产品介绍',
  `uoption` varchar(255) NOT NULL DEFAULT '' COMMENT '单位审核意见',
  `expert` varchar(255) NOT NULL DEFAULT '' COMMENT '专家评审意见',
  `ooption` varchar(255) NOT NULL DEFAULT '' COMMENT '办公室意见',
  `inputtime` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_business_alliance`;drop table `cu_goods`;drop table `cu_goods_follow`;drop table `cu_industry_report`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
