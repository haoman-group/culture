<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">
<div class="am-list-news-bd">
<h4 style="color:#900;margin-top:15px;">|&nbsp;<if condition='$_GET["level"]==2'>二星企业<elseif condition='$_GET["level"]==3'/>三星企业<elseif condition='$_GET["level"]==4'/>四星企业<else/>五星企业</if></h4>
    <ul class="am-list">        
    <volist name="data" id="vo">
        <!--缩略图在标题右边-->
        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right">
            <div class=" am-u-sm-8 am-list-main">
                <h3 class="am-list-item-hd"><a href="{:U('Industry/companushow',['id'=>$vo['id']])}" class="">{$key+1}.{$vo.company_name}</a></h3>
            
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