<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="content">
<template file="Phone/Resource/_nav"/>

<notempty name="child">
    <ul class="am-list am-list-static am-list-border am-list-striped">
        <volist name="child" id="vo">
            <li><a href="{:U('lists',['cid'=>$vo['cid']])}"> <i class="am-icon-book am-icon-fw"></i> {$vo.name}</a></li>
        </volist>
    </ul>
<else/>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd" style="background-color:#E6CF9D">{$cate.name}</div>
        <notempty name="cate['description']">
            <div class="am-panel-bd">
                {$cate.description}
            </div>
        </notempty>
    </div>
    <ul class="am-list">        
    <volist name="data" id="vo">
        <notempty name='vo["image"]'>
        <!--缩略图在标题右边-->
        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right">
            <div class="am-u-sm-8 am-list-main">
                <h3 class="am-list-item-hd"><a href="{:U('detail',['id'=>$vo['id'],'table'=>$table])}" class="">{$vo.title}</a></h3>
                <div class="am-list-item-text"><?php echo  mb_strcut(strip_tags($vo['introduction']),0,200)?>...</div>
            </div>
            <div class="am-u-sm-4 am-list-thumb">
                <a href="{:U('detail',['id'=>$vo['id'],'table'=>$table])}" class="">
                <img src="<?php 
                    $img = strpos($vo['image'],',')?strstr($vo['image'],",",true):$vo['image'];
                    echo thumb($img,80,80,1);
                ?>"/>
                </a>
            </div>
        </li>
        <else/>
        <li class="am-g am-list-item-desced">
            <div class="am-u-sm-12 am-list-main">
                <h3 class="am-list-item-hd"><a href="{:U('detail',['id'=>$vo['id'],'table'=>$table])}" class="">{$vo.title}{$vo.re_projectname}{$vo.com_name}{$vo.publish_name}{$vo.name}{$vo.cac_name}</a></h3>
                <div class="am-list-item-text">
                    <?php echo  mb_strcut(strip_tags($vo['introduction']),0,200)?>
                    <?php echo  mb_strcut(strip_tags($vo['intro']),0,200)?>
                    <?php echo  mb_strcut(strip_tags($vo['content']),0,200)?>
                    {$vo.publish_agency}{$vo.publish_order}{$vo.publish_topword}{$vo.addr}{$vo.cac_addr}{$vo.display_area}
                ...</div>
            </div>
        </li>
        </notempty>
    </volist>
    </ul>
</notempty>
</block>