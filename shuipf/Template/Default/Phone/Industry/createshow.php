<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">

    <!-- 正文 -->
    <article class="am-article">
        <div class="am-article-hd">
            <h4 style="text-align:center">{$data.title}</h4>
            <p class="am-article-meta">{$data['addtime']}  浏览次数：{$data['click_num']} 评论者：{$data['username']}</p>
        </div>
        <div class="am-article-bd">
           
            {$data['content']}
        </div>
    </article>

</block>