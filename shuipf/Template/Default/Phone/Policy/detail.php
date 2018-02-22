<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">

    <!-- 正文 -->
    <article class="am-article">
        <div class="am-article-hd">
            <h3 class="am-article-title">{$data.publish_name}</h3>
            <p class="am-article-meta"><?php echo date("Y-m-d H:i:s",$data['addtime']) ?>  来源：{$data['publish_agency']}</p>
        </div>
        <div class="am-article-bd">
            <!-- <p class="am-article-lead"></p> -->
            {$data['publish_content']}
        </div>
    </article>

</block>