<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">
<div class="am-list-news-bd">
    <ul class="am-list">        
    <volist name="data" id="vo">
        <notempty name='vo["image"]'>
        <!--缩略图在标题右边-->
        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right">
            <div class=" am-u-sm-8 am-list-main">
                <h3 class="am-list-item-hd"><a href="{:U('/Phone/Policy/detail',['id'=>$vo['id']])}" class="">{$vo.publish_name}</a></h3>
                <div class="am-list-item-text"><?php echo  mb_strcut(strip_tags($vo['content']),0,200)?>...</div>
            </div>
            <div class="am-u-sm-4 am-list-thumb">
                <a href="{:U('/Phone/News/detail',['id'=>$vo['id']])}" class="">
                <img src="<?php 
                    $img = strpos($vo['image'],',')?strstr($vo['image'],",",true):$vo['image'];
                    echo thumb($img,80,80,1);
                ?>"/>
                </a>
            </div>
        </li>
        <else/>
        <li class="am-g am-list-item-desced">
            <div class="am-u-sm-12 am-list-main" >
                <h4 class="am-list-item-hd" style="margin-top:25px;"><a href="{:U('Policy/detail',['id'=>$vo['id']])}" class="" style="color:black;">{$key+1}.<?php echo  mb_strcut($vo['publish_name'],0,35)?></a></h4>
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