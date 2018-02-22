<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">

    <!-- 正文 -->
    <article class="am-article">
        <div class="am-article-hd">
            <h1 class="am-article-title">{$data.title}</h1>
            <p class="am-article-meta"><?php echo date("Y-m-d H:i:s",$data['addtime']) ?>  来源：{$data['upload_unit']}</p>
        </div>
        <div class="am-article-bd">
            <!-- <p class="am-article-lead"></p> -->
            {$data['content']}
        </div>
        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-1 am-avg-md-1 am-avg-lg-2 am-gallery-default" data-am-gallery="{ pureview: true }" >
            <?php $images =  explode(",",$data['image']);?>
            <volist name="images" id="vo">
            <li>
                <div class="am-gallery-item">
                    <img src="{$vo}" alt="">
                </div>
            </li>
            </volist>
        </ul>
    </article>

</block>