<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">
<div class="am-list-news-bd">
    <ul class="am-list">        
    <volist name="data" id="vo">
        <notempty name='vo["images"]'>
        <!--缩略图在标题右边-->
        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right">
            <div class=" am-u-sm-8 am-list-main">
                <h3 class="am-list-item-hd"><a href="{:U('detail',['id'=>$vo['id']])}" class="">{$vo.title}</a></h3>
                <div class="am-list-item-text">{$vo['intro']}</div>
            </div>
            <div class="am-u-sm-4 am-list-thumb">
                <a href="{:U('detail',['id'=>$vo['id']])}" class="">
                <img src="<?php 
                    $img = unserialize($vo['images']);
                    echo thumb($img[0],80,80,1);
                ?>" class="am-img-thumbnail"/>
                </a>
            </div>
        </li>
        <else/>
        <li class="am-g am-list-item-desced">
            <div class="am-u-sm-12 am-list-main">
                <h3 class="am-list-item-hd"><a href="{:U('detail',['id'=>$vo['id']])}" class="">{$vo.title}</a></h3>
                <div class="am-list-item-text">{$vo['intro']}</div>
            </div>
        </li>
        </notempty>
    </volist>
    </ul>
</div>
 <!-- 分页 -->
 <ul data-am-widget="pagination" class="am-pagination am-pagination-default">
        {$pageinfo.page}
</ul>
</block>