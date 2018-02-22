<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">

    <!-- 正文 -->
    <article class="am-article">
        <div class="am-article-hd">
            <h1 class="am-article-title">{$data.content_title}</h1>
            <notempty name="data['act_time']"><p class="am-article-meta">时间：{$data['act_time']}</p> </notempty>
            <notempty name="data['act_address']"><p class="am-article-meta">地址：{$data['act_address']}</p></notempty>
            <notempty name="data['contacts']"><p class="am-article-meta">联系人：{$data['contacts']} </p></notempty>
            <notempty name="data['contacts_tel']"><p class="am-article-meta">联系方式：{$data['contacts_tel']}</p></notempty>
        </div>

        <div class="am-article-bd">
            {$data['abstract']}
        </div>
    </article>

</block>