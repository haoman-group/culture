<?php

use Phpmig\Migration\Migration;

class CreateIndustryTable2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
CREATE TABLE IF NOT EXISTS `cu_buyer_addr` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `name` varchar(12) DEFAULT '' COMMENT '收货人姓名',
  `area` varchar(64) DEFAULT '' COMMENT '收货地区',
  `address` varchar(64) DEFAULT '' COMMENT '收货地址',
  `postcode` varchar(6) DEFAULT '' COMMENT '邮编',
  `phone` varchar(12) DEFAULT '' COMMENT '联系电话',
  `email` varchar(64) DEFAULT '' COMMENT '联系邮箱',
  `default` int(1) DEFAULT '0' COMMENT '默认地址',
  `pay_type` varchar(12) DEFAULT '' COMMENT '支付方式',
  `alias` varchar(12) DEFAULT '' COMMENT '地址别名',
  `addtime` int(11) DEFAULT '0',
  `updatetime` int(11) DEFAULT '0',
  `zone` varchar(255) DEFAULT '' COMMENT '收货地区(汉字)',
  `area1` varchar(12) DEFAULT '' COMMENT '收货地区省份',
  `area2` varchar(12) DEFAULT '' COMMENT '收货地区市区',
  `area3` varchar(12) DEFAULT '' COMMENT '收货地区区县',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;


CREATE TABLE IF NOT EXISTS `cu_connect` (
  `connectid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `openid` varchar(32) NOT NULL COMMENT '授权标识',
  `uid` mediumint(8) NOT NULL COMMENT '用户ID',
  `app` varchar(10) NOT NULL COMMENT '应用名称',
  `accesstoken` char(50) NOT NULL COMMENT 'access_token',
  `expires` int(10) NOT NULL COMMENT 'token过期时间',
  PRIMARY KEY (`connectid`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='登陆授权' AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `cu_member_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region` varchar(255) NOT NULL DEFAULT '' COMMENT '地区',
  `detailed` varchar(255) NOT NULL DEFAULT '' COMMENT '详细信息',
  `code` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '邮编',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '收货人',
  `phone` varchar(15) NOT NULL DEFAULT '' COMMENT '电话',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加的用户 id',
  `area` varchar(50) NOT NULL DEFAULT '' COMMENT '地区id集合',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table `cu_buyer_addr`;drop table `cu_connect`;drop table `cu_member_address`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
