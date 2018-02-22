<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文化大数据库</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap-theme.min.css" />
    <link href="{$config_siteurl}statics/cu/bootstrap/dsjk.css" rel="stylesheet" type="text/css" />
    <link href="{$config_siteurl}statics/cu/bootstrap/table.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js" ></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="position: relative;">
<!--<div class="userinfo">
    <div class="user-c">欢迎 <span class="style01">test001</span> 登录文化大数据库！ <a href="dsjk-login.html">[退出]</a><a href="dsjkht-index.html">[进入后台]</a></div>
</div>-->
<div class="top">
    <div class="top1">
        <div class="logo">
            <a href="../index.html"><img src="{$config_siteurl}statics/cu/images/index/logo.png" width="258" height="140" /></a>
        </div>
        <form action="" method="get" target="_blank">
            <input type="hidden" name="m" value="search"/>
            <input type="hidden" name="c" value="index"/>
            <input type="hidden" name="a" value="init"/>
            <input type="hidden" name="typeid" value="" id="typeid"/>
            <input type="hidden" name="siteid" value="1" id="siteid"/>
            <div class="searchs">
                <div class="searchs-text"> 
                    <input type="text"  name="q" id="q" class="text02" value="" style="border-radius: 0px;" />
                </div>
                <div class="searchs-btn"> <input type="submit" id="button" value="" class="btn01" /></div>
            </div>
        </form>
    </div>
</div>
<div class="all">
    <div class="left-c" >
    <div><img src="{$config_siteurl}statics/cu/images/public-service/leftpp.png"/></div>
    <div class="left-sidebar">
        <dl class="fy">
            <dt>艺术<i class="pull-right glyphicon glyphicon-menu-right"></i></dt>
            <dd id="40" ><a href="huge-database.html" >艺术门类</a></dd>
        </dl>
        <dl class="ggwh">
            <dt id="41"><a href="public-culture.html">公共文化</a><i class="pull-right glyphicon glyphicon-menu-right"></i></dt>
        </dl>
        <dl class="fy">
            <dt>非物质文化遗产<i class="pull-right glyphicon glyphicon-menu-right"></i></dt>
            <dd id="91"><a href="huge-database.html">代表性项目及传承人</a></dd>                        
        </dl>
        <dl class="whcy">
            <dt>文化产业<i class="pull-right glyphicon glyphicon-menu-right"></i></dt>
            <dd id="96"><a href="huge-database.html">企业名录</a></dd>
            <dd id="97"><a href="huge-database.html">产业项目</a></dd>
            <dd id="180"><a href="huge-database.html">文化产品</a></dd>
        </dl>
        <dl class="whzc">
            <dt id="44"><a href="huge-database.html">文化政策(125)</a><i class="pull-right glyphicon glyphicon-menu-right"></i></dt>
        </dl>
    </div>
</div>
    <div class="right-c">
        <div class="ht"> 艺术 > 艺术门类</div>
        <div class="right-main">
            <div>
                <div class="right-main1">
                    <div class="right-infor">
                        <div class="right-inforT xj">
                            <div class="right-inforT1 xj">戏剧<span class="pull-right right-inforT1R" >88</span></div>
                        </div>
                        <div class="right-inforC">
                            <ul>
                                <li><a href="list1.html">戏曲</a>（12）</li>
                                 <li><a href="list1.html">话剧</a>（12）</li>
                                 <li><a href="list1.html">舞剧</a>（12）</li>
                                 <li><a href="list1.html">歌剧</a>（12）</li>
                                 <li><a href="list1.html">儿童剧</a>（12）</li>
                                 <li><a href="list1.html">音乐剧</a>（12）</li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="right-infor">
                        <div class="right-inforT yy">
                            <div class="right-inforT1 yy">音乐<span class="pull-right right-inforT1R" >66</span></div>
                        </div>
                        <div class="right-inforC">
                            <ul>
                                <li><a href="list1.html">歌曲</a>（12）</li>
                                <li><a href="list1.html">器乐</a>（12）</li>
                                 <!--  <li><a href="#">歌曲</a>（23）</li>
                                <li><a href="#">器乐</a>（43）</li>-->
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="right-infor">
                        <div class="right-inforT wd">
                            <div class="right-inforT1 wd">舞蹈<span class="pull-right right-inforT1R" >42</span></div>
                        </div>
                        <div class="right-inforC">
                            <ul>
                                <li><a href="list1.html">古典舞</a>（12）</li>
                                <li><a href="list1.html">芭蕾舞</a>（12）</li>
                                <li><a href="list1.html">民族舞</a>（12）</li>
                                <li><a href="list1.html">民间舞</a>（12）</li>
                                <li><a href="list1.html">现代舞</a>（12）</li>
                            </ul> 
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="right-infor">
                        <div class="right-inforT ms">
                            <div class="right-inforT1 ms">美术<span class="pull-right right-inforT1R" >28</span></div>
                        </div>
                        <div class="right-inforC">
                            <ul>
                                <li><a href="list1.html">绘画</a>（12）</li>
                                <li><a href="list1.html">雕塑</a>（12）</li>
                                <li><a href="list1.html">工艺美术</a>（12）</li>
                                <li><a href="list1.html">建筑</a>（12）</li>
                            </ul> 
                            <div class="clearfix"></div>
                        </div>
                    </div>
                   <div class="right-infor">
                        <div class="right-inforT qy">
                            <div class="right-inforT1 qy">曲艺<span class="pull-right right-inforT1R" >38</span></div>
                        </div>
                        <div class="right-inforC">
                            <ul>
                                <li><a href="list1.html">鼓书类</a>（12）</li>
                                <li><a href="list1.html">弦书类</a>（12）</li>
                                <li><a href="list1.html">板诵类</a>（12）</li>
                                <li><a href="list1.html">相声</a>（12）</li>
                                <li><a href="list1.html">曲艺小品</a>（12）</li>
                                <li><a href="list1.html">表演唱</a>（12）</li>
                            </ul> 
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="right-infor">
                        <div class="right-inforT zaji">
                            <div class="right-inforT1 zaji">杂技<span class="pull-right right-inforT1R" >23</span></div>
                        </div>
                        <div class="right-inforC" >
                            <ul>
                                <li><a href="list1.html">顶技</a>（12）</li>
                                <li><a href="list1.html">吊子</a>（12）</li>
                                <li><a href="list1.html">口技</a>（12）</li>
                                <li><a href="list1.html">蹬技</a>（12）</li>
                                <li><a href="list1.html">耍花坛</a>（12）</li>
                                <li><a href="list1.html">走钢丝</a>（12）</li>
                                <li><a href="list1.html">爬杆</a>（12）</li>
                                <li><a href="list1.html">转碟</a>（12）</li>                
                            </ul> 
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="right-infor">
                        <div class="right-inforT sf">
                            <div class="right-inforT1 sf">书法<span class="pull-right right-inforT1R" >28</span></div>
                        </div>
                        <div class="right-inforC">
                            <ul>
                                <li><a href="list1.html">篆书</a>（12）</li>
                                <li><a href="list1.html">隶书</a>（12）</li>
                                <li><a href="list1.html">楷书</a>（12）</li>
                                <li><a href="list1.html">行书</a>（12）</li>
                                <li><a href="list1.html">草书</a>（12）</li>
                            </ul> 
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="right-main2">
                    <img src="../images/public-service/dyfb.png">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="clr"></div>
<div id="wh-footer" class="footer" style="position: absolute; z-index: 999;">
    ©2005－2015 Shanxi Yunpingtai.com, All Rights Reserved    |   关于我们   |   网站邮箱   |   网站地图   |  友情链接  |  本网声明
</div>
<script>
   window.onload = function(){

        var h = window.innerHeight
                || document.documentElement.innerHeight
                || document.body.innerHeight;;

        var h1 = $('html').height();

        var fh = $('#wh-footer').height();

        console.log(h +' '+h1+' '+fh);

        if(h1 > h){

            $('#wh-footer').css('top',h1+'px');

        }else{

            $('#wh-footer').css('top',h-(fh+20)+'px');

        }
    }
</script><script type="text/javascript" src="../jquery/jquery.min.js"></script>
<script type="text/javascript" src="../js/dsjk.js"></script>
<script type="text/javascript" src="../js/cookie.js"></script>
<script>
    $('#40').parent().find('dd').css('display','block');
    $('#40').addClass('active3')
    var tabT=document.getElementsByClassName("fyTab");
    var tabV=document.getElementsByClassName("fyTabValue");
    for(var i=0;i<tabT.length;i++){
        tabT[i].setAttribute("onclick","select("+i+")")
    }
    function select(index){
        for(var i=0;i < tabV.length;i++){
            if(index == i){
                tabT[i].classList.add("choose");
                tabV[i].classList.add("choose");
            }
            else{
                tabT[i].classList.remove("choose");
                tabV[i].classList.remove("choose");
            }
        }
    }
</script>
</body>
</html>