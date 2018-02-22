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
            <p class="am-article-meta">发表时间：<?php echo date("Y-m-d H:i:s",$data['addtime']) ?></p>
        </div>

        <div class="am-article-bd">
            <!-- <p class="am-article-lead"></p> -->
            {$data['content']}
             <if condition="$data['video'] neq '' ">
            <div id="youkuplayer" style="width:100%;height:300px;" data-type="{$data.title}"></div>
            </if>
            <if condition="$data['video'] neq '' ">
                <script type="text/javascript" src="http://player.youku.com/jsapi"></script>
                <script>
                    var player = new YKU.Player('youkuplayer',{
                            styleid: '0',
                            client_id: '{:C('YOUKU_CLIENT_ID')}',
                            vid: '{$data.video}',
                            newPlayer: true
                        });
                </script>
            </if>
        </div>
        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-1 am-avg-md-1 am-avg-lg-2 am-gallery-default" data-am-gallery="{ pureview: true }" >
            <volist name="data['images']" id="vo">
            <li>
                <div class="am-gallery-item">
                    <img class="am-thumbnail" src="{$vo}" alt="">
                </div>
            </li>
            </volist>
        </ul>
    </article>
</block>