<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">

    <!-- 正文 -->
    <article class="am-article">
        <div class="am-article-hd">
            <h1 class="am-article-title">{$data.title}</h1>
            <p class="am-article-meta"><?php echo date("Y-m-d H:i:s",$data['addtime']) ?>  点击量：{$data['hits']}</p>
        </div>

        <div class="am-article-bd">
            <!-- <p class="am-article-lead"></p> -->
            {$data['intro']}
            <div id="youkuplayer" style="width:100%;height:300px;" data-type="{$data.title}"></div>
            <script type="text/javascript" src="http://player.youku.com/jsapi"></script>
            <script>
                var player = new YKU.Player('youkuplayer',{
                        styleid: '0',
                        client_id: '{:C('YOUKU_CLIENT_ID')}',
                        vid: '{$data.video}',
                        newPlayer: true
                    });
            </script>
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-1 am-avg-md-1 am-avg-lg-2 am-gallery-default" data-am-gallery="{ pureview: true }" >
            <?php $images = unserialize($vo['images']);?>
                <volist name="images" id="vo">
                <li>
                    <div class="am-gallery-item">
                        <img src="{$vo}" alt="" >
                    </div>
                </li>
                </volist>
            </ul>
        </div>
    </article>

</block>