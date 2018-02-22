<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    
    <title>{$data.categoryname|default='活动详情'}</title>
    <base href="/statics/wap/">
    <link rel="stylesheet" href="./css/dc.css">
</head>
<body class="detail">
    
<div class="dccon prodscon">
    <header class="holiheard detailhead">
        <a class="aback" href="javascript:history.back()"></a>
        <h5>{$data.categoryname|default='活动详情'}</h5>
        <a class="share"></a>
    </header>
    <div class="title">
        {$data.title}<br>
        {$data.deputy_title}
        <p>
            <notempty name="data['source']">#{$data.source}</notempty>
            <notempty name="data['editer']">-{$data.editer} </notempty>
            <notempty name="data['updatetime']">{$data.updatetime}</notempty>
            <notempty name="data['hits']">点击量：{$data.hits}</notempty>
        </p>
    </div>
    <div class="content">
        <notempty name="data['image']"><img src="{$data.image}"></notempty>
        <!-- <span class="tipimg">图/张宇   文/李磊</span> -->
        <notempty name="data['voide']">
        <p>
            <div id="youkuplayer" style="width:100%;height:300px;" data-type="{$data.title}"></div>
            <script type="text/javascript" src="http://player.youku.com/jsapi"></script>
            <script>
                var player = new YKU.Player('youkuplayer',{
                        styleid: '0',
                        client_id: '{:C('YOUKU_CLIENT_ID')}',
                        vid: '{$data.voide}',
                        newPlayer: true
                    });
            </script>
        </p>
        </notempty>
        <p>
            {$data.content}
        </p>
    </div>
    <div class="detailtip">
        <span> 推荐</span>
        <!-- <div>
            <a><img src="images/iconpaysuc.png"></a>
            <a><img src="images/iconpaysuc.png"></a>
        </div> -->
    </div>
    <ul class="newsshow">
        <volist name="position" id="po">
            <li>
                <notempty name="type">
                    <a href="{:U('detail',['type'=>$type,'id'=>$po['id']])}">
                <else/>
                    <a href="{:U('detail',['id'=>$po['id']])}">
                </notempty>
                <notempty name="po['image']"><img class="rightimg" src="{:thumb($po['image'],88,68,1)}"></notempty>
                <div class="leftcont">
                    <h5>{$po.title}</h5>
                    <empty name="type">
                    <p><span>{$po.categoryname}</span>#{$po.editer}</p>
                    </empty>
                </div>
                </a>
            </li>
        </volist>
    </ul>
<footer>
    <img src="/statics/wap/images/headerimg.jpg" alt="">
</footer>

<script src="./js/jquery.min.js"></script>
<script src="./js/swiper-3.4.0.jquery.min.js"></script>
<script src="./js/dccommon.js"></script>
<script src="./js/self/shopprods.js"></script>
<script>
    $(".newsnav li").click(function(){
        $(this).addClass("on").siblings().removeClass("on");
    })
</script>

</body>
</html>