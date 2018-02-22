<?php

use Phpmig\Migration\Migration;

class Createcomartcentertable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_comartcenter` (
  `id_cac` int(10) NOT NULL AUTO_INCREMENT COMMENT '群艺馆ID',
  `cac_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '群艺馆名称',
  `cac_addr` varchar(150) CHARACTER SET utf8 NOT NULL COMMENT '群艺馆地址',
  `cac_legalpre` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '法人代表',
  `cac_tel` varchar(13) CHARACTER SET utf8 NOT NULL COMMENT '联系电话',
  `cac_ area` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT '馆舍建筑面积',
  `cac_outdoorarea` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT '室外活动使用场地面积',
  `cac_pocularea` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT '群众文化活动房使用面积',
  `cac_propagatelen` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT '宣传橱窗、栏长度’',
  `cac_elearea` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT '电子阅览室面积',
  `cac_elesitnum` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT '电子阅览室座次数',
  `cac_iswireless` int(1) NOT NULL COMMENT '服务区是否提供无线网络覆盖，1为有，2为没有',
  `cac_bandwidth` varchar(15)  CHARACTER SET utf8  NOT NULL COMMENT '宽带接入',
  `sev_opentime` varchar(8) CHARACTER SET utf8 NOT NULL COMMENT '每周对外开放时间',
  `sev_crosstime` int(1) NOT NULL COMMENT '是否错时开放,1为是，2为否',
  `sev_noregcul` varchar(3) CHARACTER SET utf8 NOT NULL COMMENT '不定期特色文化项目',
  `sev_lastingfree` varchar(3) CHARACTER SET utf8 NOT NULL COMMENT '常设免费项目',
  `sev_yearoutnum` varchar(3) CHARACTER SET utf8 NOT NULL COMMENT '年外出服务人次',
  `sev_yearavenum` varchar(3) CHARACTER SET utf8 NOT NULL COMMENT '人均年到次数',
  `sev_accessibility` varchar(3) CHARACTER SET utf8 NOT NULL COMMENT '无障碍设置',
  `dig_website` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '官方网站',
  `dig_wechat` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '微信公告号',
  `dig_webserver` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '网上服务项目',
  `dig_PV` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '年访问量',
  `dig_resources` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '特色文化数宇资源',
  `dig_terminalnum` varchar(45) CHARACTER SET utf8 NOT NULL COMMENT '公共电子阅览室终端数量',
  `cac_addtime` datetime NOT NULL COMMENT '添加时间',
  `cac_city` VARCHAR(45) NULL COMMENT '市级',
  `cac_area` VARCHAR(45) NULL COMMENT '区县',
  
  `is_delete` int(1) NOT NULL DEFAULT '0' COMMENT '是否伪删除,0为没有删除,1为删除',
  `cac_updatetime` datetime NOT NULL COMMENT '更新时间',
  `cac_status` int(1) NOT NULL COMMENT '状态',
  PRIMARY KEY (`id_cac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT = '群艺馆基本详情表' ;";
    $container = $this->getContainer(); 
    $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_comartcenter;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
