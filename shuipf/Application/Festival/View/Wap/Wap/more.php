<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>{$categoryname}</title>
    <base href="/statics/wap/">
    <link rel="stylesheet" href="./css/dc.css">
</head>
<body>

    <header class="holiheard">
        <a class="aback" href="javascript:history.back()"></a>
        <h3 style="margin-left:30px;">{$categoryname}</h3>
    </header>

    <div class="libbox">
        <!-- <h4><span></span>{$categoryname}</h4> -->
        <ul class="artwul" href="javascript:">
            <volist name="data" id="vo">
            <li style="margin-top:20px;width:100%">
                <notempty name="type">
                    <a href="{:U('detail',['type'=>$type,'id'=>$vo['id']])}">
                <else/>
                    <a href="{:U('detail',['id'=>$vo['id']])}">
                    <img src="{:thumb($vo['image'],174,100,1)}">
                </notempty>
                <div class="title">
                    {$vo.title}
                </div>
                {$vo.deputy_title}
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