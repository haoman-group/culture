<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">
<div class="am-list-news-bd">
    <ul class="am-list">        
    <volist name="data" id="vo">
        <notempty name='vo["image"]'>
        <!--缩略图在标题右边-->
        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right">
            <div class=" am-u-sm-8 am-list-main">
           
                <h3 class="am-list-item-hd"><a href="{:U('detail',['id'=>$vo['id'],'type'=>$_GET['cid']])}" class="" title="{$vo['title']}"><?php echo  mb_strcut(strip_tags($vo['title']),0,40)?>...</a></h3>
               <if condition="$vo['intro'] neq '' "> <div class="am-list-item-text"><?php echo  mb_strcut(strip_tags($vo['intro']),0,150)?>...</div><else/>
               <div class="am-list-item-text"> <?php echo  mb_strcut(strip_tags($vo['content']),0,150)?>...</div>
               </if>
            </div>
            <div class="am-u-sm-4 am-list-thumb">
                <a href="{:U('detail',['id'=>$vo['id']])}" class="">
                <img src="<?=strpos($vo['image'],',')?strstr($vo['image'],",",true):$vo['image']?>"  class ="am-img-thumbnail"/>
                </a>
            </div>
        </li>
        <else/>
        <li class="am-g am-list-item-desced">
            <div class="am-u-sm-12 am-list-main">
                <h3 class="am-list-item-hd"><a href="{:U('detail',['id'=>$vo['id'],'type'=>$_GET['cid']])}" class=""><?php echo  mb_strcut(strip_tags($vo['title']),0,40)?>...</a></h3>
               <if condition="$vo['intro'] neq '' "> <div class="am-list-item-text"><?php echo  mb_strcut(strip_tags($vo['intro']),0,150)?>...</div><else/>
               <div class="am-list-item-text"> <?php echo  mb_strcut(strip_tags($vo['content']),0,150)?>...</div>
               </if>
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