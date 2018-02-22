<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">
<div class="am-list-news-bd">
    <ul class="am-list">        
    <volist name="data" id="vo">
       
        <!--缩略图在标题右边-->
        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right">
            <div class=" am-u-sm-12 am-list-main">
                <h3 class="am-list-item-hd"><a href="{:U('Consume/show',['id'=>$vo['id']])}" class=""><?php echo  mb_strcut($vo['title'],0,80)?></a></h3>
            </div>
        </li>
        </volist>
    </ul>
</div>
 <!-- 分页 -->
<ul data-am-widget="pagination" class="am-pagination am-pagination-default">
        {$pageinfo.page}
</ul>
</block>