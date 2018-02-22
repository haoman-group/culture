<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <base href="/statics/wap/">
    <title>表演类活动</title>
    <link rel="stylesheet" href="./css/dc.css">
</head>
<body>
    
<div class="dccon">
    <header class="holiheard">
        <a class="aback"  href="javascript:history.back()"></a>
        <h5>表演类活动</h5>
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
        <ul class="style1">
            <?php $first = array_shift($perform);?>
            <a href="{:U('more',['categorytype'=>$first['key']])}"><h4><span></span>{$first['name']}<img src="images/ulfillarr.png"></h4></a>
            <volist name="first['data']" id="fi" offset="0" length='4'>
            <li class="nomarginl">
                <a href="{:U('detail',['id'=>$fi['id']])}">
                <img src="{:thumb($fi['image'],173,100,1)}" style="width:173px;height:100px;padding-left:5px;">
                <p class="title">{$fi.title}<img class="tip" src="images/holiulfire.png"> </p>
                <p>{$fi.deputy_title}</p>
                </a>
            </li>
            </volist>
        </ul>
        <ul class="style2">
            <?php $second = array_shift($perform);?>
            <a href="{:U('more',['categorytype'=>$second['key']])}"><h4><span></span>{$second['name']}<img src="images/ulfillarr.png"></h4></a>
            <volist name="second['data']" id="se">
            <li>
                <a href="{:U('detail',['id'=>$se['id']])}">
                <img class="rightimg" src="{:thumb($se['image'],88,68,1)}" >
                <div class="leftcont">
                    <h5>{$se.title}</h5>
                    <p><span>热门</span>#{$se.deputy_title}</p>
                </div>
                </a>
            </li>
            </volist>
        </ul>
        <ul class="style3">
            <?php $third = array_shift($perform);?>
            <a href="{:U('more',['categorytype'=>$third['key']])}"><h4><span></span>{$third['name']}<img src="images/ulfillarr.png"></h4></a>
            <div class="show">
                <a href="{:U('detail',['id'=>$third['data'][0]['id']])}"><img alt="{$third['data'][0]['title']}" src="{:thumb($third['data'][0]['image'],481,117,1)}" class="wimg nomarginl" ></a>
                <a href="{:U('detail',['id'=>$third['data'][1]['id']])}"><img alt="{$third['data'][1]['title']}" src="{:thumb($third['data'][1]['image'],233,117,1)}"></a>
                <a href="{:U('detail',['id'=>$third['data'][2]['id']])}"><img alt="{$third['data'][2]['title']}" src="{:thumb($third['data'][2]['image'],233,117,1)}" class="nomarginl"></a>
                <a href="{:U('detail',['id'=>$third['data'][3]['id']])}"><img alt="{$third['data'][3]['title']}" src="{:thumb($third['data'][3]['image'],233,117,1)}"></a>
                <a href="{:U('detail',['id'=>$third['data'][4]['id']])}"><img alt="{$third['data'][4]['title']}" src="{:thumb($third['data'][4]['image'],233,117,1)}"></a>
            </div>
        </ul>
        <ul class="style4">
            <?php $fourth = array_shift($perform);?>
            <a href="{:U('more',['categorytype'=>$fourth['key']])}"><h4><span></span>{$fourth['name']}<img src="images/ulfillarr.png"></h4></a>
            <div class="ulbox">
                <div class="ul">
                    <volist name="fourth['data']" id="fo">
                    <li class="nomarginl">
                        <a href="{:U('detail',['id'=>$fo['id']])}">
                        <img src="{:thumb($fo['image'],349,201,1)}" style="width:349px;height:201px;padding-left:10px;">
                        <h5>{$fo.title}<img class="tip" src="images/holiulfire.png"> </h5>
                        <p>#{$fo.deputy_title}<span>热门</span></p>
                        </a>
                    </li>
                    </volist>
                </div>

            </div>
        </ul>
         <ul>
            <?php $fifth = array_shift($perform);?>
            <a href="{:U('more',['categorytype'=>$fifth['key']])}"><h4><span></span>{$fifth['name']}<img src="images/ulfillarr.png"></h4></a>
            <volist name="fifth['data']" id="fi">
                <a href="{:U('detail',['id'=>$fi['id']])}">
                    <img src="{:thumb($fi['image'],355,204,1)}" style="width:355px;height:204px;">
                    <p class="title">{$fi.title} </p>
                    <p>{$fi.deputy_title}</p>
                </a>
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