<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="style">
<style>
.am-control-paging{
    display:none;
}
</style>
<style>
.am-nav-prev{
    display:none;
}
</style>
<style>
.am-nav-next{
    display:none;
}
</style>
</block>

<block name="content">

    <!-- 正文 -->
    <article class="am-article">
        <div class="am-article-hd">
            <h1 class="am-article-title">{$data.title}</h1>
            <p class="am-article-meta"><?php echo date("Y-m-d H:i:s",$data['create_time']) ?>&nbsp;&nbsp;&nbsp;&nbsp;点击量：{$data['hits']}</p>
        </div>
        <div class="am-article-bd">
        <p class="am-article-meta">出版日期:{$data['publish_date']}<br>期刊类目：{$data['category']}<br>期刊类型：<if condition="$data['type'] eq image">图片数据<else/>文本数据</if></p>
         <!--<p class="am-article-meta">期刊类目:{$data['category']}</p>-->
            <!-- <p class="am-article-lead"></p> -->
            {$data['intro']}
        </div>

        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-1 am-avg-md-1 am-avg-lg-2 am-gallery-default" data-am-gallery="{ pureview: true }" >
            <volist name="data['content']" id="vo">
            <li>
                <div class="am-gallery-item">
                    <img src="{$vo}" alt="">
                </div>
            </li>
            </volist>
        </ul>
    </article>
</block>
