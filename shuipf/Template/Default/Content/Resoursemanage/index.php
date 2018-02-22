<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>文化资源管理平台</title>
    <!-- <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/zzsc.css" type="text/css" media="screen" /> -->
    <script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/cu/js/zzsc.js"></script>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
    <!-- <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/resourse-manage.css"/> -->
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/remanage.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/index.css"/> -->

</head>
<body>
<div id="top" style="border-bottom: 1px solid #962626">
    <div class="container" style="width:1200px; margin: 0 auto;">
        <div class="logo"><a href="/index"><img src="{$config_siteurl}statics/cu/images/icon/logo.png" alt="文化资源管理平台"><img src="{$config_siteurl}statics/cu/images/icon/resourselog.png" alt="文化资源管理平台"></a></div>
        <div class="top_txt">
            <ul>
                <li class="desc" style="color: #952523">漫步云端/畅想文化</li>
                <li class="chinese"><a href="#" class="on">中</a><a href="#">英</a></li>
                <li class="weixin"></li>
            </ul>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content manindexcon">
    <div class="container">
        <div class="topleft">                    
            <a  href="http://<?=$_SERVER['SERVER_NAME']?>:8081/"><img src="{$config_siteurl}statics/cu/images/public-service/leftlog.gif" width="585" height="135" /></a>
        </div>
        <div class="topright" style="margin-left:20px;">                    
            <a  href="{:U('Cudatabase/Index/index',array('type'=>'database-register'))}"><img src="{$config_siteurl}statics/cu/images/public-service/rightlog.gif" width="585" height="135" /></a>
        </div>
        <div class="clr"></div>
        <div class="main">
        <div class="mainleft">
            <div id="header">
                <div class="wrap">
                    <div id="slide-holder">
                        <div id="slide-runner">
                            <a href="#" ><img id="slide-img-1" src="{$config_siteurl}statics/cu/images/public-service/x1.jpg" class="slide" alt="" /></a>
                            <a href="#" ><img id="slide-img-2" src="{$config_siteurl}statics/cu/images/public-service/x2.jpg" class="slide" alt="" /></a>
                            <a href="#" ><img id="slide-img-3" src="{$config_siteurl}statics/cu/images/public-service/x3.jpg" class="slide" alt="" /></a>
                            <div id="slide-controls">
                                <p id="slide-client" class="text"><strong></strong><span></span></p>
                                <p id="slide-desc" class="text"></p>
                                <p id="slide-nav"></p>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        if(!window.slider) {
                            var slider={};
                        }

                        slider.data= [
                            {
                                "id":"slide-img-1", // 与slide-runner中的img标签id对应
                                "client":"唐风晋韵",
                                "desc":"山西画院三十周年美术作品展" //这里修改描述
                            },
                            {
                                "id":"slide-img-2",
                                "client":"中国共产党山西省文化厅直属机关第六次代表大会",
                                "desc":""
                            },
                            {
                                "id":"slide-img-3",
                                "client":"舞蹈欣赏",
                                "desc":""
                            },


                        ];
                    </script>
                </div>
            </div>
            </div>
            <div class="mainright"  style="margin-left:20px;"><div class="rightnews"><h1>文化部办公厅关于开展第十一届全国优秀舞蹈节目展演、第十届全国优秀
                杂技节目展演承办申报工作的通知</h1><P>各省、自治区、直辖市文化厅（局），新疆生产建设兵团文化广播电视局：
                为贯彻落实党的十八大和十八届三中、四中全会精神，贯彻落实习近平总
                书记系列重要讲话特别是在文艺工作座谈会上的重要讲话精神，展示创作成果，
                推出优秀人才，2016年，文化部拟举办第十一届全国优秀舞蹈节目展演和第十
                届全国优秀杂技节目展演。为进一步规范以上两项活动的承办申报工作，现将
                有关事项通知如下...</P><br /><span>2015年11月10日 | <a href="#">更多文字链接</a></span></div>
            </div>
        </div>
        <div class="clr"></div>
        <div class="main1">
            <div class="mainleft1">
                <div class="leftnews"><a href="#"><img src="{$config_siteurl}statics/cu/images/public-service/new1.gif" width="585" height="275" border="0" /></a></div>
                <div class="leftnews1" ><h1 style="color:#636363;font-size:19px;">话剧《生命如歌》唱响国家大剧院</h1><span><a href="#"><div style="height:10px;"></div><span style="color:rgba(99,99,99,0.75);font-size:14px;line-hight:14px;">10月17日、18日晚</span><div style="height:10px;"></div><span style="color:rgba(99,99,99,0.75);font-size:14px;line-hight:24px;width:100%;">我省优秀新创舞台剧晋京展演重点剧目话剧《生命如歌》
                    在国家大剧院连演两场，演出一票难求，深深拨动了首都观众的心弦。</span></a></span>
                </div>
            </div>

            <div class="mainright1" style="margin-left:20px;">
                <div class="leftnews"><a href="#"><img src="{$config_siteurl}statics/cu/images/public-service/new2.gif" width="585" height="275" border="0" /></a></div>
                <div class="leftnews1"><h1 style="color:#636363;font-size:19px;">新编历史京剧《陈廷敬》成功首演</h1><span><a href="#"><div style="height:10px;"></div><span style="color:rgba(99,99,99,0.75);font-size:14px;line-hight:14px;">7月23日</span><div style="height:10px;"></div><span style="color:rgba(99,99,99,0.75);font-size:14px;line-hight:24px;width:100%;">山西省京剧院全新创作的新编历史京剧《陈廷敬》在青年宫演艺中心
                    与观众见面。该剧由省委宣传部、省文化厅主办，山西演艺集团。。。
                    </span></a></span>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <div class="main2">
            <div class="mainleft2">
                <div class="leftnews"><a href="#"><img src="{$config_siteurl}statics/cu/images/public-service/new3.gif" width="585" height="275" border="0" /></a></div>
                <div class="leftnews1"><h1 style="color:#636363;font-size:19px;">新编晋剧现代戏《红高粱》首演成功</h1><span><a href="#"><div style="height:10px;"></div><span style="color:rgba(99,99,99,0.75);font-size:14px;line-hight:14px;">5月6日至7日</span><div style="height:10px;"></div><span style="color:rgba(99,99,99,0.75);font-size:14px;line-hight:24px;width:100%;">山西省晋剧院全新创排的晋剧现代戏《红高粱》在山西大剧院
                    首演，现场座无虚席，演出颇受观众喜爱。</span></a></span>
                </div>
            </div>

            <div class="mainright2" style="margin-left:20px;"><div class="leftnews"><a href="#"><img src="{$config_siteurl}statics/cu/images/public-service/new4.gif" width="585" height="275" border="0" /></a></div>
                <div class="leftnews1"><h1 style="color:#636363;font-size:19px;">话剧《那山那村那女人》拉开山西省优秀剧目展演帷幕</h1><span><a href="#"><div style="height:10px;"></div><span style="color:rgba(99,99,99,0.75);font-size:14px;line-hight:14px;">9月14日至16日</span><div style="height:10px;"></div><span style="color:rgba(99,99,99,0.75);font-size:14px;line-hight:24px;width:100%;">由山西省话剧院创作的话剧《那山那村那女人》在太原市青
                    年宫演艺中心连演3场，段爱平“一秉至公”的剧情深深地感染了观众。</span></a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <div class="container">
        <p class="link">
            <a href="">关于我们</a>
            <a href="">网站邮箱</a>
            <a href="">网站地图</a>
            <a href="">友情链接</a>
            <a href="">本网声明</a>
        </p>
        <p class="worker">
            <a href="">中国文化市场网</a> · 
            <a href="">中国文化产业网</a> · 
            <a href="">国家数字文化网</a> · 
            <a href="">山西演艺网</a> · 
            <a href="">山西省图书馆</a> · 
            <a href="">山西省非物质文化遗产保护网</a> · 
            <a href="">中国城市文化网</a> · 
            <a href="">中国文化报社</a> · 
            <a href="">艺术中国</a> · 
            <a href="">中国文化信息网</a>
        </p>
        <p class="copy">© 2005－2015 Shanxi Yunpingtai.com, All Rights Reserved</p>
    </div>
</div>
</body>
</html>
