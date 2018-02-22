<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">

    <!-- 正文 -->
    <article class="am-article">
        <div class="am-article-hd">
            <h4 >{$data.title}</h4>
            <p class="am-article-meta"><?php echo date("Y-m-d H:i:s",$data['inputtime']) ?>  浏览次数：{$data['views']}</p>
        </div>
        <div class="am-article-bd">
            <img   src="{$data['thumb']}"  height="120" width="100%;" />
            {$data['content']}
        </div>
    </article>

</block>