<?php

use Phpmig\Migration\Migration;

class UpdateTableMenu3 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        //显示用户模块
        $sql = "update `cu_menu` set status = '1' WHERE id>=114 and id<=142";
        $container = $this->getContainer();
        $container['db']->query($sql);

        //直接删除多余模块
        $sql = "DELETE FROM `culture`.`cu_menu` WHERE `cu_menu`.`id`>=37 and `id`<=112;DELETE FROM `culture`.`cu_menu` WHERE `cu_menu`.`id`>=151 and `id`<=154;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        //将分类设置菜单 迁移到  设置 菜单
        $sql = "update `cu_menu` set status = '0' WHERE id>=114 and id<=142;";
        $container = $this->getContainer();
        $container['db']->query($sql);

        //恢复“模块”模块
        $sql = "INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(37, '模块', 0, 'Admin', 'Module', 'index', '', 0, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(38, '在线云平台', 37, 'Admin', 'Cloud', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(39, '模块商店', 38, 'Admin', 'Moduleshop', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(40, '插件商店', 38, 'Admin', 'Addonshop', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(41, '在线升级', 38, 'Admin', 'Upgrade', 'index', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(42, '本地模块管理', 37, 'Admin', 'Module', 'local', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(43, '模块管理', 42, 'Admin', 'Module', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(44, '内容', 0, 'Content', 'Index', 'index', '', 0, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(45, '内容管理', 44, 'Content', 'Content', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(46, '内容相关设置', 44, 'Content', 'Category', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(47, '栏目列表', 46, 'Content', 'Category', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(48, '添加栏目', 47, 'Content', 'Category', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(49, '添加单页', 47, 'Content', 'Category', 'singlepage', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(50, '添加外部链接栏目', 47, 'Content', 'Category', 'wadd', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(51, '编辑栏目', 47, 'Content', 'Category', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(52, '删除栏目', 47, 'Content', 'Category', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(53, '栏目属性转换', 47, 'Content', 'Category', 'categoryshux', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(54, '模型管理', 46, 'Content', 'Models', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(55, '创建新模型', 54, 'Content', 'Models', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(56, '删除模型', 54, 'Content', 'Models', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(57, '编辑模型', 54, 'Content', 'Models', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(58, '模型禁用', 54, 'Content', 'Models', 'disabled', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(59, '模型导入', 54, 'Content', 'Models', 'import', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(60, '字段管理', 54, 'Content', 'Field', 'index', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(61, '字段修改', 60, 'Content', 'Field', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(62, '字段删除', 60, 'Content', 'Field', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(63, '字段状态', 60, 'Content', 'Field', 'disabled', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(64, '模型预览', 60, 'Content', 'Field', 'priview', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(65, '管理内容', 45, 'Content', 'Content', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(66, '附件管理', 45, 'Attachment', 'Atadmin', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(67, '删除', 66, 'Attachment', 'Atadmin', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(68, '发布管理', 44, 'Content', 'Createhtml', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(69, '批量更新栏目页', 68, 'Content', 'Createhtml', 'category', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(70, '生成首页', 68, 'Content', 'Createhtml', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(71, '批量更新URL', 68, 'Content', 'Createhtml', 'update_urls', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(72, '批量更新内容页', 68, 'Content', 'Createhtml', 'update_show', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(73, '刷新自定义页面', 68, 'Template', 'Custompage', 'createhtml', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(74, 'URL规则管理', 46, 'Content', 'Urlrule', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(75, '添加规则', 74, 'Content', 'Urlrule', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(76, '编辑', 74, 'Content', 'Urlrule', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(77, '删除', 74, 'Content', 'Urlrule', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(78, '推荐位管理', 46, 'Content', 'Position', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(79, '信息管理', 78, 'Content', 'Position', 'item', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(80, '添加推荐位', 78, 'Content', 'Position', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(81, '修改推荐位', 78, 'Content', 'Position', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(82, '删除推荐位', 78, 'Content', 'Position', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(83, '信息编辑', 79, 'Content', 'Position', 'item_manage', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(84, '信息排序', 79, 'Content', 'Position', 'item_listorder', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(85, '数据重建', 78, 'Content', 'Position', 'rebuilding', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(86, 'Tags管理', 45, 'Content', 'Tags', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(87, '修改', 86, 'Content', 'Tags', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(88, '删除', 86, 'Content', 'Tags', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(89, 'Tags数据重建', 86, 'Content', 'Tags', 'create', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(90, '界面', 0, 'Template', 'Style', 'index', '', 0, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(91, '模板管理', 90, 'Template', 'Style', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(92, '模板风格', 91, 'Template', 'Style', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(93, '添加模板页', 92, 'Template', 'Style', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(94, '删除模板', 92, 'Template', 'Style', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(95, '修改模板', 92, 'Template', 'Style', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(96, '主题管理', 91, 'Template', 'Theme', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(97, '主题更换', 96, 'Template', 'Theme', 'chose', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(98, '自定义页面', 90, 'Template', 'Custompage', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(99, '自定义页面', 98, 'Template', 'Custompage', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(100, '添加自定义页面', 99, 'Template', 'Custompage', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(101, '删除自定义页面', 99, 'Template', 'Custompage', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(102, '编辑自定义页面', 99, 'Template', 'Custompage', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(103, '自定义列表', 98, 'Template', 'Customlist', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(104, '添加列表', 103, 'Template', 'Customlist', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(105, '删除列表', 103, 'Template', 'Customlist', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(106, '编辑列表', 103, 'Template', 'Customlist', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(107, '生成列表', 103, 'Template', 'Customlist', 'generate', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(108, '安装模块', 39, 'Admin', 'Moduleshop', 'install', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(109, '升级模块', 39, 'Admin', 'Moduleshop', 'upgrade', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(110, '安装插件', 40, 'Admin', 'Addonshop', 'install', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(111, '升级插件', 40, 'Admin', 'Addonshop', 'upgrade', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(112, '栏目授权', 26, 'Admin', 'Rbac', 'setting_cat_priv', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(37, '模块', 0, 'Admin', 'Module', 'index', '', 0, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(38, '在线云平台', 37, 'Admin', 'Cloud', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(39, '模块商店', 38, 'Admin', 'Moduleshop', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(40, '插件商店', 38, 'Admin', 'Addonshop', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(41, '在线升级', 38, 'Admin', 'Upgrade', 'index', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(42, '本地模块管理', 37, 'Admin', 'Module', 'local', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(43, '模块管理', 42, 'Admin', 'Module', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(44, '内容', 0, 'Content', 'Index', 'index', '', 0, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(45, '内容管理', 44, 'Content', 'Content', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(46, '内容相关设置', 44, 'Content', 'Category', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(47, '栏目列表', 46, 'Content', 'Category', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(48, '添加栏目', 47, 'Content', 'Category', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(49, '添加单页', 47, 'Content', 'Category', 'singlepage', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(50, '添加外部链接栏目', 47, 'Content', 'Category', 'wadd', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(51, '编辑栏目', 47, 'Content', 'Category', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(52, '删除栏目', 47, 'Content', 'Category', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(53, '栏目属性转换', 47, 'Content', 'Category', 'categoryshux', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(54, '模型管理', 46, 'Content', 'Models', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(55, '创建新模型', 54, 'Content', 'Models', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(56, '删除模型', 54, 'Content', 'Models', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(57, '编辑模型', 54, 'Content', 'Models', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(58, '模型禁用', 54, 'Content', 'Models', 'disabled', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(59, '模型导入', 54, 'Content', 'Models', 'import', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(60, '字段管理', 54, 'Content', 'Field', 'index', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(61, '字段修改', 60, 'Content', 'Field', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(62, '字段删除', 60, 'Content', 'Field', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(63, '字段状态', 60, 'Content', 'Field', 'disabled', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(64, '模型预览', 60, 'Content', 'Field', 'priview', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(65, '管理内容', 45, 'Content', 'Content', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(66, '附件管理', 45, 'Attachment', 'Atadmin', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(67, '删除', 66, 'Attachment', 'Atadmin', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(68, '发布管理', 44, 'Content', 'Createhtml', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(69, '批量更新栏目页', 68, 'Content', 'Createhtml', 'category', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(70, '生成首页', 68, 'Content', 'Createhtml', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(71, '批量更新URL', 68, 'Content', 'Createhtml', 'update_urls', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(72, '批量更新内容页', 68, 'Content', 'Createhtml', 'update_show', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(73, '刷新自定义页面', 68, 'Template', 'Custompage', 'createhtml', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(74, 'URL规则管理', 46, 'Content', 'Urlrule', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(75, '添加规则', 74, 'Content', 'Urlrule', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(76, '编辑', 74, 'Content', 'Urlrule', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(77, '删除', 74, 'Content', 'Urlrule', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(78, '推荐位管理', 46, 'Content', 'Position', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(79, '信息管理', 78, 'Content', 'Position', 'item', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(80, '添加推荐位', 78, 'Content', 'Position', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(81, '修改推荐位', 78, 'Content', 'Position', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(82, '删除推荐位', 78, 'Content', 'Position', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(83, '信息编辑', 79, 'Content', 'Position', 'item_manage', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(84, '信息排序', 79, 'Content', 'Position', 'item_listorder', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(85, '数据重建', 78, 'Content', 'Position', 'rebuilding', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(86, 'Tags管理', 45, 'Content', 'Tags', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(87, '修改', 86, 'Content', 'Tags', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(88, '删除', 86, 'Content', 'Tags', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(89, 'Tags数据重建', 86, 'Content', 'Tags', 'create', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(90, '界面', 0, 'Template', 'Style', 'index', '', 0, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(91, '模板管理', 90, 'Template', 'Style', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(92, '模板风格', 91, 'Template', 'Style', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(93, '添加模板页', 92, 'Template', 'Style', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(94, '删除模板', 92, 'Template', 'Style', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(95, '修改模板', 92, 'Template', 'Style', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(96, '主题管理', 91, 'Template', 'Theme', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(97, '主题更换', 96, 'Template', 'Theme', 'chose', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(98, '自定义页面', 90, 'Template', 'Custompage', 'index', '', 0, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(99, '自定义页面', 98, 'Template', 'Custompage', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(100, '添加自定义页面', 99, 'Template', 'Custompage', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(101, '删除自定义页面', 99, 'Template', 'Custompage', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(102, '编辑自定义页面', 99, 'Template', 'Custompage', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(103, '自定义列表', 98, 'Template', 'Customlist', 'index', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(104, '添加列表', 103, 'Template', 'Customlist', 'add', '', 1, 1, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(105, '删除列表', 103, 'Template', 'Customlist', 'delete', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(106, '编辑列表', 103, 'Template', 'Customlist', 'edit', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(107, '生成列表', 103, 'Template', 'Customlist', 'generate', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(108, '安装模块', 39, 'Admin', 'Moduleshop', 'install', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(109, '升级模块', 39, 'Admin', 'Moduleshop', 'upgrade', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(110, '安装插件', 40, 'Admin', 'Addonshop', 'install', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(111, '升级插件', 40, 'Admin', 'Addonshop', 'upgrade', '', 1, 0, '', 0);
INSERT INTO `cu_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(112, '栏目授权', 26, 'Admin', 'Rbac', 'setting_cat_priv', '', 1, 0, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
