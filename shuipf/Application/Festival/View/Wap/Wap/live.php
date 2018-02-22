<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <base href="/statics/wap/">
    <title>直播视频</title>
    <link rel="stylesheet" href="./css/dc.css">
</head>
<body>
    
<div class="dccon">
    <header class="holiheard">
        <a class="aback"  href="javascript:history.back()"></a>
        <h5>直播视频</h5>
    </header>
    <div class="holishow">
        <img src="{:thumb($top['image'],200,130,1)}" style="width:200px;height:130px;margin-right:20px;" >
        <div class="introduce">
            <h5>{$top.title}</h5>
            <p class="colw">{$top.deputy_title}</p> 
            <p class="colw">{$top.content}</p>
            <!-- <p><span>王博</span>丨瓷器讲坛丨90分钟</p> -->
            <p>{$top.periodical_date} </p>
            <!-- <p class="cols">2012年4月27日13:28<span>重播</span></p> -->
            <a href="{:U('detail',['id'=>$top['id']])}">点击播放</a>
        </div>
        <div class="text">
            {$top.content}...
        </div>
    </div>
    <div class="holiul">
        
        <ul class="style2">
            <a href="###"><h4><span></span>直播列表</h4></a>
            <volist name="live" id="se">
            <li>
                <a href="{:U('detail',['id'=>$se['id']])}">
                <img class="rightimg" src="{:thumb($se['image'],88,68,1)}" >
                <div class="leftcont">
                    <h5>{$se.title}</h5>
                    <p>#<span>直播时间：</span>{$se.periodical_date}</p>
                </div>
                </a>
            </li>
            </volist>
        </ul>
        
    </div>
    <footer>
    <img src="/statics/wap/images/headerimg.jpg" alt="">
</footer>

</div>



<script src="./js/jquery.min.js"></script>
<script src="./js/swiper-3.4.0.jquery.min.js"></script>
<script src="./js/dccommon.js"></script>
<script src="./js/self/shopprods.js"></script>


</body>
</html>