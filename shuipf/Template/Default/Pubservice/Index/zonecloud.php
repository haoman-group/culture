<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/index.css" />
    <style>
        .zonewrap {margin:10px;padding:10px;}
        /*.ul-citys {}*/
        .ul-citys li {line-height:23px;}
        .ul-citys .city {font-weight:bold;width:60px;  float:left;color:#A27A7A;}
        .ul-citys .province {font-weight:bold;width:60px;  color:#A27A7A;}
        .ul-country { margin-left:60px; }
        .ul-country li{ display:inline;padding:10px;font-size:14px;word-break:keep-all;}
    </style>
</head>
<body>

<div class="zonewrap">

    <ul class="ul-citys">
        <li><a href="javascript:parent.location.href='http://www.sx-cc.com'"  class="province">全省</a></li>
        <volist name="lists" id="vo">
            <li>
                <a class="city" href="javascript:homepage('http://{$vo.sub_domain}.sx-cc.com')">{$vo.name}市:</a>
                <ul class="ul-country">
                    <volist name="vo['country']" id="voo">
                        <li>
                            <notempty name="voo['sub_domain']">
                                <a style="color:#A27A7A;font-weight:bold;" href="javascript:homepage('http://{$voo.sub_domain}.sx-cc.com')">{$voo.name}</a>
                            <else/>
                                <a href="###">{$voo.name}</a>                            
                            </notempty>
                        </li>
                    </volist>
                </ul>
            </li>
        </volist>
    </ul>
    <!--<div class="ulzones">
        <dl>
            <dt><a>县</a></dt>
            <dd><a>乡</a></dd>
        </dl>
        <dl>
            <dt><a>县</a></dt>
            <dd><a>乡</a></dd>
        </dl>
        <dl>
            <dt><a>县</a></dt>
            <dd><a>乡</a></dd>
        </dl>
    </div>-->


</div>

    <script>
        function homepage(url){
            parent.location.href=url;
        }
    </script>
</body>
</html>