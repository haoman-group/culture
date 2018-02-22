<?php

use Phpmig\Migration\Migration;

class CreateTableLibrary extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `cu_library` (
  `id_lib` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL COMMENT '名称',
  `addr` VARCHAR(45) NULL COMMENT '地址',
  `legal_person` VARCHAR(45) NULL COMMENT '法人代表',
  `telephone` VARCHAR(45) NULL COMMENT '联系电话',
  `covered_area` VARCHAR(45) NULL COMMENT '馆舍建筑面积',
  `floor_area` VARCHAR(45) NULL COMMENT '占地面积',
  `book_area` VARCHAR(45) NULL COMMENT '书库面积',
  `readroom_area` VARCHAR(45) NULL COMMENT '阅览室面积',
  `readroom_seat_num` INT NULL COMMENT '阅览室坐席数',
  `chilreadroom_seat_num` INT NULL COMMENT '少儿阅览坐席数',
  `reportroom_area` VARCHAR(45) NULL COMMENT '报告厅面积',
  `reportroom_seat_num` INT NULL COMMENT '报告厅坐席数',
  `ereadroom_area` VARCHAR(45) NULL COMMENT '电子阅览室面积',
  `ereadroom_seat_num` INT NULL COMMENT '电子阅览室坐席数',
  `computer_num` INT NULL COMMENT '计算机总数',
  `reader_user_num` INT NULL COMMENT '供读者使用的计算机数量',
  `have_wifi` INT(1) NULL COMMENT '读者服务区是否提供无线网络覆盖',
  `computer_info_node` VARCHAR(45) NULL COMMENT '计算机信息节点',
  `bandwidth` VARCHAR(45) NULL COMMENT '宽带接入',
  `storage` VARCHAR(45) NULL COMMENT '存储容量',
  `num_totle` INT(10) NULL COMMENT '总藏量',
  `num_e_doc` VARCHAR(45) NULL COMMENT '电子文献藏量',
  `num_e_book` VARCHAR(45) NULL COMMENT '电子图书藏量',
  `num_e_periodical` VARCHAR(45) NULL COMMENT '电子期刊藏量',
  `num_collect_book` VARCHAR(45) NULL COMMENT '图书年入藏量',
  `num_collect_periodical` VARCHAR(45) NULL COMMENT '报刊年入藏量',
  `num_collect_audio` VARCHAR(45) NULL COMMENT '试听文献年入藏量',
  `num_digit_totle` VARCHAR(45) NULL COMMENT '数字资源总量',
  `num_digit_self` VARCHAR(45) NULL COMMENT '自建数字资源总量',
  `ser_name` VARCHAR(45) NULL COMMENT '基础服务项目',
  `ser_hours` VARCHAR(45) NULL COMMENT '每周开馆时间',
  `ser_interleaved` INT(1) NULL COMMENT '是否错时开放',
  `ser_borrow_num` VARCHAR(45) NULL COMMENT '书看文献年外借册次',
  `ser_people_count` VARCHAR(45) NULL COMMENT '年总流通人次',
  `ser_nodeborrow_num` VARCHAR(45) NULL COMMENT '流动服务点书刊借阅册次',
  `ser_avg_visit` VARCHAR(45) NULL COMMENT '人均年到馆次数',
  `ser_accessible` VARCHAR(45) NULL COMMENT '无障碍设施',
  `ser_braille_num` VARCHAR(45) NULL COMMENT '盲文图书藏量',
  `dig_website` VARCHAR(45) NULL COMMENT '官方网站',
  `dig_app` VARCHAR(45) NULL COMMENT 'APP',
  `dig_blog` VARCHAR(45) NULL COMMENT '博客',
  `dig_weibo` VARCHAR(45) NULL COMMENT '微博',
  `dig_zone` VARCHAR(45) NULL COMMENT '空间',
  `dig_community` VARCHAR(45) NULL COMMENT '社区',
  `dig_wechat` VARCHAR(45) NULL COMMENT '微信公众号',
  `dig_webserver` VARCHAR(45) NULL COMMENT '网上服务项目',
  `dig_PV` VARCHAR(45) NULL COMMENT '年网站访问量',
  `dig_remote_num` VARCHAR(45) NULL COMMENT '可远程访问的数字资源',
  `dig_ifshare` INT(1) NULL COMMENT '是否建有文化信息资源共享工程站点',
  `dig_share_fund` VARCHAR(45) NULL COMMENT '文化信息资源共享工程经费投入',
  `dig_expand_fund` VARCHAR(45) NULL COMMENT '数字图书馆推广工程经费投入',
  `dig_havemanager` VARCHAR(45) NULL COMMENT '公共电子阅览室终端是否统一安装管理软件',
  `dig_computer_num` VARCHAR(45) NULL COMMENT '公共电子阅览室终端数量',
  `anc_totle` INT(10) NULL COMMENT '古籍数量',
  `anc_fund` VARCHAR(45) NULL COMMENT '经费投入',
  `anc_activity_num` INT(10) NULL COMMENT '古籍保护宣传活动次数',
  `city` VARCHAR(45) NULL COMMENT '市级',
  `area` VARCHAR(45) NULL COMMENT '区县',
  `author_id` INT(3) NULL COMMENT '上传作者ID',
  `isdelete` INT(1) NULL DEFAULT 0 ,
  `status` INT(1) NULL DEFAULT 0 ,
  `addtime` DATETIME NULL,
  `updatetime` DATETIME NULL,
  PRIMARY KEY (`id_lib`))   ENGINE=InnoDB DEFAULT CHARSET=utf8 
COMMENT = '图书馆基本信息表';
";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table cu_library;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
