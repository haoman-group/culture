<?php

use Phpmig\Migration\Migration;

class CreateIndustryTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `cu_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) NOT NULL DEFAULT '' COMMENT '产品名称',
  `region` varchar(255) NOT NULL DEFAULT '' COMMENT '区域',
  `city` varchar(255) NOT NULL DEFAULT '' COMMENT '城市',
  `province` varchar(255) NOT NULL DEFAULT '' COMMENT '产地   省',
  `tourism` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否属于旅游产品  0 不是  1  是',
  `type` varchar(255) DEFAULT '' COMMENT '所属旅游产品类型',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价格',
  `manufacturer` varchar(255) NOT NULL DEFAULT '' COMMENT '生产厂家',
  `phone` varchar(25) NOT NULL DEFAULT '' COMMENT '联系方式',
  `thumb` text NOT NULL COMMENT '上传图片',
  `p_describe` text NOT NULL COMMENT '产品描述',
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  `updatatime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态 0 未审核   1  审核通过  2 未通过',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '关注数',
  `brand_id` int(11) NOT NULL DEFAULT '0' COMMENT '品牌id',
  `cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类id',
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT '类型id',
  `international` varchar(255) NOT NULL DEFAULT '' COMMENT '国际馆',
  `week_shop` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否属于一周一馆 0：不属于   1：属于',
  `sx_make` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否 属于 山西制造 1 是  0  不是',
  `special_market` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否属于特价超市 1 是 0 否',
  `union_act` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否属于联盟活动 1 是 0 否',
  `area` varchar(50) NOT NULL DEFAULT '' COMMENT '地区id组合',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

INSERT INTO `cu_product` (`id`, `p_name`, `region`, `city`, `province`, `tourism`, `type`, `price`, `manufacturer`, `phone`, `thumb`, `p_describe`, `uid`, `inputtime`, `updatatime`, `status`, `views`, `brand_id`, `cate_id`, `tid`, `international`, `week_shop`, `sx_make`, `special_market`, `union_act`, `area`) VALUES
(17, '清明上河图', '万柏林区', '太原市', '山西', 0, '佛教用品', '100000.00', '晋能信工', '18618648683', '/d/file/content/2017/02/58a6b038294cb.jpg', '&lt;p&gt;清明上河图&lt;/p&gt;', 2, 1487576946, 0, 1, 0, 0, 7, 0, '毛里求斯馆', 0, 1, 0, 0, '4,84,1298');


CREATE TABLE IF NOT EXISTS `cu_product_brand` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brandname` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `type_id` varchar(255) NOT NULL DEFAULT '' COMMENT '所属类型id 集合',
  `cate_id` varchar(255) NOT NULL DEFAULT '0' COMMENT '所属分类id',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `cu_product_brand_type` (
  `brand_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '品牌id',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned DEFAULT '0' COMMENT '功能id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `cu_product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL COMMENT '主题名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;


INSERT INTO `cu_product_category` (`id`, `c_name`) VALUES
(1, '玻璃水晶'),
(2, '陶瓷'),
(3, '书画'),
(4, '剪纸'),
(5, '漆器'),
(6, '布艺'),
(7, '雕塑'),
(8, '金属'),
(9, '文化科技'),
(10, '大学生创意作品');

CREATE TABLE IF NOT EXISTS `cu_product_follow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '产品id',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `followtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注时间',
  `status` tinyint(3) unsigned NOT NULL COMMENT '关注状态 1关注 0未关注 2 已取消',
  `updatatime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `cu_product_type` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(255) NOT NULL DEFAULT '' COMMENT '类型名称',
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类id',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `cu_product_type` (`tid`, `typename`, `cate_id`) VALUES
(1, '窗花', 4),
(2, '喜花', 4),
(3, '礼花', 4),
(4, '鞋花', 4),
(5, '门笺', 4),
(6, '斗香花', 4),
(7, '剪纸旗幡', 4),
(8, '其他', 4),
(9, '水晶', 1);
";
        $container = $this->getContainer();
        $container['db']->query($sql);      
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_product;
        drop table cu_product_brand;
        drop table cu_product_brand_type;
        drop table cu_product_category;
        drop table cu_product_follow;
        drop table cu_product_type";
        $container = $this->getContainer();
        $container['db']->query($sql);      
    }
}
