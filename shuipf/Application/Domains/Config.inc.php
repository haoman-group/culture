<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 模块配置
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------
return array(
    //模块名称
    'modulename' => '域名绑定',
    //图标
    'icon' => 'http://www.shuipfcms.com/d/file/contents/2013/11/527dc4e2dab30.png',
    //模块简介
    'introduce' => '提供对模块进行二级域名绑定！',
    //模块介绍地址
    'address' => 'http://www.shuipfcms.com',
    //模块作者
    'author' => '水平凡',
    //作者地址
    'authorsite' => 'http://www.shuipfcms.com',
    //作者邮箱
    'authoremail' => 'admin@abc3210.com',
    //版本号，请不要带除数字外的其他字符
    'version' => '1.0.0',
    //适配最低ShuipFCMS版本，
    'adaptation' => '2.0.0',
    //签名
    'sign' => '01d1cc6e0b01e5b5a1bc114ea8f2b3e9',
    //依赖模块
    'depend' => array(),
    //行为标签
    'tags' => array(
        'app_init' => array(
            'type' => 1,
            'phpfile:Domains|module:Domains',
        ),
    ),
    //缓存，格式：缓存key=>array('module','model','action')
    'cache' => array(
        'Domains_list' => array(
            'name' => '域名绑定模块',
            'model' => 'Domains',
            'action' => 'domains_cache',
        ),
        'Module_Domains_list' => array(
            'name' => '模块绑定域名',
            'model' => 'Domains',
            'action' => 'domains_domainslist',
        ),
    ),
);
