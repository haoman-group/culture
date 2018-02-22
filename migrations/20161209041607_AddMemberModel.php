<?php

use Phpmig\Migration\Migration;

class AddMemberModel extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        //清空用户模型的两个表
        $sql = "TRUNCATE `culture`.`cu_model`;TRUNCATE `culture`.`cu_model_field`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        //插入模型数据
        $sql = "INSERT INTO `cu_model` (`modelid`, `name`, `description`, `tablename`, `setting`, `addtime`, `items`, `enablesearch`, `disabled`, `default_style`, `category_template`, `list_template`, `show_template`, `js_template`, `sort`, `type`) VALUES
                    (1, 'common', '文化云平台参数', 'member_common', '', 1481253888, 0, 0, 0, '', '', '', '', '', 0, 2);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
        
        //插入模型字段数据
        $sql = "INSERT INTO `cu_model_field` (`fieldid`, `modelid`, `field`, `name`, `tips`, `css`, `minlength`, `maxlength`, `pattern`, `errortips`, `formtype`, `setting`, `formattribute`, `unsetgroupids`, `unsetroleids`, `iscore`, `issystem`, `isunique`, `isbase`, `issearch`, `isadd`, `isfulltext`, `isposition`, `listorder`, `disabled`, `isomnipotent`) VALUES(1, 1, 'source_page', '注册来源页面', '', '', 0, 0, '', '', 'text', 'a:3:{s:4:\"size\";s:2:\"50\";s:12:\"defaultvalue\";s:0:\"\";s:10:\"ispassword\";s:1:\"0\";}', '', '', '', 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        //创建自定义模型
        $sql = "CREATE TABLE `cu_member_common` (`userid` mediumint(8) unsigned NOT NULL,`source_page` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,UNIQUE KEY `userid` (`userid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

        //修改所有Membere表modelid字段
        $sql = "UPDATE `culture`.`cu_member` SET `modelid`='1';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `culture`.`cu_member_common`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
