<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>阳泉文化云</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/Heritage/css/idangerous.swiper.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/Heritage/css/common.css">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
    
    <style>
        .swiper-slide-visible { opacity: 0.5; -webkit-transform: scale(0.8); -moz-transform: scale(0.8); -ms-transform: scale(0.8); -o-transform: scale(0.8); transform: scale(0.8);}
        .swiper-slide-active { top: 0; opacity: 1; -webkit-transform: scale(1); -moz-transform: scale(1); -ms-transform: scale(1); -o-transform: scale(1); transform: scale(1);  }
        .header{    width: 100%;
    margin: auto;
    position: relative;
    background-color: #f7f7f7;
    height: 25px;
    border-bottom: 1px solid rgba(208, 213, 215, 1);
    color: #666666;
    line-height: 25px;}
    .ggwh_Content {
    width: 1200px;
    margin: auto;
    position: relative;
    }
    .headerTop a {
    color: #666666;
    font-size:14px;
}

    </style>
</head>
<body>
<header class="header">
    <template file="Pubservice/Common/_top"/>
</header>
<article>
    <div class="nav clearfix">
        <div class="container">
            <a href="/Pubservice"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-2.png"  style="height: 58px;float: left;margin-top: 14px;" /></a>
            <ul class="ulnav clearfix">
                <li <if condition="CONTROLLER_NAME eq 'Active'">class="active"</if>>
					<a href="{:U('Pubservice/Active/index')}" id="catid_10">公共文化活动</a>						
					<!-- <p style="width: 75px" class="smallFont">Cultural Activity</p> -->
				</li>
				<li <if condition="CONTROLLER_NAME eq 'Facility'">class="active"</if>>						
					<a href="{:U('Pubservice/Facility/index',array('city'=>$cityname,'type'=>'图书馆'))}" id="catid_14">公共文化设施</a>
					<!-- <p style="width: 80px" class="smallFont">Cultural Facilities</p> -->
				</li>
				<li <if condition="CONTROLLER_NAME eq 'Resources'">class="active"</if>>					
					<a href="{:U('Pubservice/Resources/index')}" id="catid_192">数字文化资源</a>
					<!-- <p style="width: 130px" class="smallFont">Cultural Resources Pavilion</p> -->
				</li>
				<!--<li <if condition="CONTROLLER_NAME eq 'Landmark'">class="active"</if>>					-->
					<!--<a href="{:U('Pubservice/Landmark/index')}" id="catid_105">文化地标</a>-->
					<!-- <p style="width:88px" class="smallFont">Cultural Landmark</p> -->
				<!--</li>-->
				<li <if condition="CONTROLLER_NAME eq 'Volunteer'">class="active"</if>>					
					<a href="{:U('Pubservice/Volunteer/index')}" id="catid_101">文化志愿服务</a>						
					<!-- <p style="width:90px" class="smallFont">Cultural volunteers</p> -->
				</li>
				<!--<li class="last-item <if condition='CONTROLLER_NAME eq Baseservices'>active</if>">						-->
					<!--<a href="{:U('Pubservice/Baseservices/index')}" id="catid_67">基本服务项目公示</a>						-->
					<!-- <p style="width:80px" class="smallFont">Basic public services</p> -->
				<!--</li>-->
				<li class="last-item <if condition='CONTROLLER_NAME eq Baseservices'>active</if>">						
					<a href="{:U('Industry/Index/index')}" id="catid_67">文化产业服务</a>						
					 <!--<p style="width:80px" class="smallFont">Basic public services</p> -->
				</li>
            </ul>
        </div>
    </div>
    <div class="yangquan_top">
        <div class="container">
            <div class="swiper-container" style="height: 400px;" >
                <div class="swiper-wrapper" >
                <for start="0" end="5">
                    <div class="swiper-slide"  >
                        <div class="cell" style="text-align:center;vertical-align:middle;">
                        <if condition="isset($slideData[$i])">
							<a href="{$slideData[$i]['picture_url']}" ><img src="{$slideData[$i]['pub_slide']}" style="text-align:center;vertical-align:middle;" /></a>
						<else/>
					        <img src="{$config_siteurl}statics/cu/images/images/ggindexban{$i+1}.jpg" style="text-align:center;vertical-align:middle" >
					    </if>
                        </div>
                    </div>
                </for>
                    <!--<div class="swiper-slide">
                        <div class="cell"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-1.jpg" alt=""></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cell"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-1.jpg" alt=""></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cell"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-1.jpg" alt=""></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cell"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-1.jpg" alt=""></div>
                    </div>-->
                </div>
            </div>
            <a class="arrow-left btn" href="#"><</a>
            <a class="arrow-right btn" href="#">></a>
        </div>
    </div>
    <div class="activity">
        <div class="container">
            <div class="active_bg">
                <span>CULTURAL ACTIVITY</span>
                <p>文化活动</p>
                <a href="{:U('Pubservice/Active/index',array('areaid'=>25050000))}" target="_blank">查看更多>></a>
            </div>
            <ul class="ulactive clearfix">
              <for start="0" end="4">
              <if condition="isset($active[$i])">
                <li>
                    <img src="{:thumb($active[$i]['image'],162,163,1)}" alt="" style="width:162px;height:163px;"><p>{$active[$i]['content_title']}</p>
                    <div class="zhe">
                        <div class="box">
                            <p><?php echo mb_substr($active[$i]['content_title'],0,8); ?>...</p>
                            <span class="on">活动时间</span>
                            <span>{$active[$i]['act_time']}</span>
                            <span class="on">活动地点</span>
                            <span>{$active[$i]['act_address']}</span>
                            <a href="{:U('Pubservice/Active/show',array('id'=>$active[$i]['id']))}" target="_blank">查看详情</a>
                        </div>
                    </div>
                </li>
                <else/>
                 <li>
                    <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-9.jpg" alt=""><p>山西校园首届“集网杯”大学生</p>
                    <div class="zhe">
                        <div class="box">
                            <p>山西校园首届“赶集网杯”大学生模特</p>
                            <span class="on">活动时间</span>
                            <span>2016-7-20 17:31</span>
                            <span class="on">活动地点</span>
                            <span>徐行镇文化体育服务中心</span>
                            <a href="###">查看详情</a>
                        </div>
                    </div>
                </li>
                </if>
                </for>
                <!--<li>
                    <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-9.jpg" alt=""><p>山西校园首届“集网杯”大学生</p>
                    <div class="zhe">
                        <div class="box">
                            <p>山西校园首届“赶集网杯”大学生模特</p>
                            <span class="on">活动时间</span>
                            <span>2016-7-20 17:31</span>
                            <span class="on">活动地点</span>
                            <span>徐行镇文化体育服务中心</span>
                            <a href="" target="_blank">查看详情</a>
                        </div>
                    </div>
                </li>-->
                <!--<li>
                    <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-9.jpg" alt=""><p>山西校园首届“集网杯”大学生</p>
                    <div class="zhe">
                        <div class="box">
                            <p>山西校园首届“赶集网杯”大学生模特</p>
                            <span class="on">活动时间</span>
                            <span>2016-7-20 17:31</span>
                            <span class="on">活动地点</span>
                            <span>徐行镇文化体育服务中心</span>
                            <a href="" target="_blank">查看详情</a>
                        </div>
                    </div>
                </li>-->
                <!--<li>
                    <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-9.jpg" alt=""><p>山西校园首届“集网杯”大学生</p>
                    <div class="zhe">
                        <div class="box">
                            <p>山西校园首届“赶集网杯”大学生模特</p>
                            <span class="on">活动时间</span>
                            <span>2016-7-20 17:31</span>
                            <span class="on">活动地点</span>
                            <span>徐行镇文化体育服务中心</span>
                            <a href="" target="_blank">查看详情</a>
                        </div>
                    </div>
                </li>-->
            </ul>
        </div>
    </div>
    <div class="news">
        <div class="container">
            <div class="divtit clearfix">
                <p><span>新闻出版</span><i>PRESS AND PUBLICATIONS</i></p>
                <a href="###" class="">查看更多>></a>
            </div>
            <div class="textbox clearfix">
            <for start="0" end="1">
            <if condition="isset($publications[$i])">
                <div class="left">
                    <a href="###" target="_blank"><img src="{:thumb($publications[$i]['cover'],537,348,1)}" alt="" style="height:348px;"></a>
                    <div class="box">
                        <p class="clearfix"><a href="###" target="_blank">{$publications[$i]['title']}</a><i>{$publications[$i]['source']}</i></p>
                        <span style="word-break:break-all"><?php echo mb_substr($publications[$i]['intro'],0,75);?>...</span>
                    </div>
                </div>
                <else/>
                 <div class="left">
                    <a href="" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-3.jpg" alt=""></a>
                    <div class="box">
                        <p class="clearfix"><a href="" target="_blank">省督导组来我市开展印刷复制专项...</a><i>山西网</i></p>
                        <span>为进一步做好印刷复制监管工作，为十九大的胜利召开营造健康有序的产业发展环境，9月11日至12日，由省新闻出版广电局印刷复制管理处处长周媛带队一行3人赴...</span>
                    </div>
                </div>
                </if>
                </for>
                <ul class="right">
                <for start="1" end="4">
                 <if condition="isset($publications[$i])">
                    <li >
                        <img src="{:thumb($publications[$i]['cover'],388,169,1)}" alt="" style="height:169px;">
                        <div class="box">
                            <p>{$publications[$i]['title']}</p>
                            <span><?php echo mb_substr($publications[$i]['intro'],0,50);?>....</span>
                            <a href="###" target="_blank">查看更多>></a>
                        </div>
                    </li>
                    <else/>
                     <li >
                        <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-4.jpg" alt="">
                        <div class="box">
                            <p>省督导组来我市开展印...</p>
                            <span>为进一步做好印刷复制监管工作，为十九大的胜利召开营....</span>
                            <a href="###" target="_blank">查看更多>></a>
                        </div>
                    </li>
                    </if>
                    </for>
                    <!--<li>
                        <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-4.jpg" alt="">
                        <div class="box">
                            <p>省督导组来我市开展印...</p>
                            <span>为进一步做好印刷复制监管工作，为十九大的胜利召开营....</span>
                            <a href="" target="_blank">查看更多>></a>
                        </div>
                    </li>
                    <li>
                        <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-4.jpg" alt="">
                        <div class="box">
                            <p>省督导组来我市开展印...</p>
                            <span>为进一步做好印刷复制监管工作，为十九大的胜利召开营....</span>
                            <a href="" target="_blank">查看更多>></a>
                        </div>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
    <div class="film">
        <div class="container">
            <div class="divtit">
                <p><span>广播影视</span><i>BROADCAST FILM AND TELEVISION</i></p>
                <a href="###" class="">查看更多>></a>
            </div>
            <ul class="ulfilm clearfix">
            <for start="0" end="4">
            <if condition="isset($broadcast[$i])">
                <li>
                    <a href="###" target="_blank"><img src="{:thumb($broadcast[$i]['cover'],275,179,1)}" alt="" style="height:179px;"></a>
                    <a href="###" target="_blank" class="tit">{$broadcast[$i]['title']}</a>
                </li>
                <else/>
                 <li>
                    <a href="###" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-5.jpg" alt=""></a>
                    <a href="###" target="_blank" class="tit">市文化局开展影院安全...</a>
                </li>
                </if>
                </for>
                <!--<li>
                    <a href="" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-5.jpg" alt=""></a>
                    <a href="" target="_blank" class="tit">市文化局开展影院安全...</a>
                </li>
                <li>
                    <a href="" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-5.jpg" alt=""></a>
                    <a href="" target="_blank" class="tit">市文化局开展影院安全...</a>
                </li>
                <li>
                    <a href="" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-5.jpg" alt=""></a>
                    <a href="" target="_blank" class="tit">市文化局开展影院安全...</a>
                </li>-->
            </ul>
        </div>
    </div>
    <div class="latest">
        <div class="container">
            <div class="top clearfix">
                <div class="info">
                    <div class="divtit">
                        <p><span>最新资讯</span><i>RPESS AND PUBLICATIONS</i></p>
                        <a href="{:U('Pubservice/Content/lists',array('areaid'=>25050000))}" class="">查看更多>></a>
                    </div>
                    <for start="0" end="3">
                    <if condition="isset($news[$i])">
                    <div class="divcell clearfix">
                        <div class="left">
                            <p>{$news[$i]['addtime']|date="d",###}</p>
                            <span>{$news[$i]['addtime']|date="Y-m",###}</span>
                        </div>
                        <a href="{:U('Pubservice/Content/show',array('id'=>$news[$i]['id']))}">
                        <div class="right">
                            <p>{$news[$i]['title']}</p>
                            <span style="word-break:break-all"><?php echo mb_substr($news[$i]['content'],0,55);?>...</span>
                        </div>
                        </a>
                    </div>
                    <else/>
                    <div class="divcell clearfix">
                        <div class="left">
                            <p>06</p>
                            <span>2017-06</span>
                        </div>
                        <div class="right">
                            <p>市群艺馆举办“文化惠民在山城”巨城镇西岭村文艺汇演</p>
                            <span>7月27日晚，由我馆主办的“喜迎十九大，文化惠民在山城”文艺汇演在平定县巨城镇西岭村拉开帷幕。</span>
                        </div>
                    </div>
                    </if>
                    </for>
                    <!--<div class="divcell clearfix">
                        <div class="left">
                            <p>06</p>
                            <span>2017-06</span>
                        </div>
                        <div class="right">
                            <p>市群艺馆举办“文化惠民在山城”巨城镇西岭村文艺汇演</p>
                            <span>7月27日晚，由我馆主办的“喜迎十九大，文化惠民在山城”文艺汇演在平定县巨城镇西岭村拉开帷幕。</span>
                        </div>
                    </div>
                    <div class="divcell clearfix">
                        <div class="left">
                            <p>06</p>
                            <span>2017-06</span>
                        </div>
                        <div class="right">
                            <p>市群艺馆举办“文化惠民在山城”巨城镇西岭村文艺汇演</p>
                            <span>7月27日晚，由我馆主办的“喜迎十九大，文化惠民在山城”文艺汇演在平定县巨城镇西岭村拉开帷幕。</span>
                        </div>
                    </div>-->
                </div>
                <div class="advise">
                    <div class="divtit">
                        <p><span>最新推荐</span><i>LATEST RECOMMENDATION</i></p>
                        <a href="###" class="">查看更多>></a>
                    </div>
                    <if condition="$recomm neq ''">
                    <div class="box">
                        <a href="{$recomm['url']}" target="_blank"><img src="{:thumb($recomm['image'],585,238,1)}" alt="" style="width:585px;height:238px;"></a>
                        <a href="{$recomm['url']}" target="_blank"><p>{$recomm['title']}</p></a>
                          <span style="word-break:break-all"><?php echo mb_substr($recomm['content'],0,35); ?>...</span>
                    </div>
                    <else/>
                    <div class="box">
                        <a href="" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-6.jpg" alt="" ></a>
                        <a href="" target="_blank"><p>卡通剧白雪公主与青蛙王子阳泉上演</p></a>
                        <span>经典原创人偶卡通剧《白雪公主与青蛙王子》简介 白雪公主被王子救活后，一直过着幸福的...</span>
                    </div>
                    </if>
                </div>
            </div>
            <div class="btm">
                <div class="clearfix">
                    <div class="product">
                        <span>PRODUCT RECOMMENDATION</span>
                        <p>产品推荐</p>
                        <a href="###">查看更多>></a>
                    </div>
                    <ul class="ulproduct clearfix">
                    <for start="0" end="3">
                    <if condition="isset($winchance[$i])">
                        <li>
                            <img src="{$winchance[$i]['image']}" alt="">
                            <p>{$winchance[$i]['title']}</p>
                            <a href="{$winchance[$i]['url']}" target="_blank">查看详情</a>
                        </li>
                        <else/>
                        <li>
                            <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-7.jpg" alt="">
                            <p>三姐妹剪纸</p>
                            <a href="###" >查看详情</a>
                        </li>
                        </if>
                        </for>
                        <!--<li>
                            <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-7.jpg" alt="">
                            <p>三姐妹剪纸</p>
                            <a href="" target="_blank">查看详情</a>
                        </li>
                        <li>
                            <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-7.jpg" alt="">
                            <p>三姐妹剪纸</p>
                            <a href="" target="_blank">查看详情</a>
                        </li>-->
                    </ul>
                </div>
                <div class="clearfix">
                    <div class="create">
                        <div class="word">
                            <a href="" target="_blank">文创产品&nbsp;></a>
                            <p>艺术美感</p>
                            <span>历史传承</span>
                        </div>
                        <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-1.png" alt="">
                    </div>
                    <ul class="ulproduct clearfix">
                        <for start="3" end="5">
                    <if condition="isset($winchance[$i])">
                        <li>
                            <img src="{$winchance[$i]['image']}" alt="">
                            <p>三姐妹剪纸</p>
                            <a href="{$winchance[$i]['url']}">查看详情</a>
                        </li>
                        <else/>
                        <li>
                            <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-7.jpg" alt="">
                            <p>三姐妹剪纸</p>
                            <a href="###">查看详情</a>
                        </li>
                        </if>
                        </for>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="art">
        <div class="container">
            <div class="divtit">
                <p><span>艺苑风采</span><i>ART STYLE</i></p>
                <a href="###" class="">查看更多>></a>
            </div>
            <div class="box clearfix">
                <div class="left">
                    <p>艺苑风采</p>
                    <span>作品题材广泛，紧扣时代脉搏，群众文艺特色突出，民族特色、地域特色鲜明具有浓郁的生活气息，涌现出了一批精品力作，获得评委和观众的一致好评。</span>
                    <a href="###" >查看详情</a>
                </div>
                <for start="0" end="1">
                <if condition="isset($artstyle[$i])">
                <div class="center">
                    <a href="###" target="_blank">
                        <img src="{:thumb($artstyle[$i][cover],546,384,1)}" alt="" style="height:384px;width:546px;">
                    </a>
                    <div class="word">
                        <span>PAINTING SHOW</span>
                        <p>{$artstyle[$i]['title']}</p>
                        <i style="word-break:break-all"><?php echo mb_substr($artstyle[$i]['intro'],0,20);?>...</i>
                    </div>
                </div>
                <else/>
                <div class="center">
                    <a href="" target="_blank">
                        <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-8.jpg" alt="">
                    </a>
                    <div class="word">
                        <span>PAINTING SHOW</span>
                        <p>春画展示</p>
                        <i>特聘画家近一年来的新作精品</i>
                    </div>
                </div>
                </if>
                </for>
                <div class="right">
                <for start="1" end="3">
                <if condition="isset($artstyle[$i])">
                    <a href="###" target="_blank">
                        <img src="{:thumb($artstyle[$i]['cover'],319,190,1)}" alt="" style="width:319px;height:190px;" >
                        <span>{$artstyle[$i]['title']}</span>
                    </a>
                    <else/>
                     <a href="###" target="_blank">
                        <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-13.jpg" alt="">
                        <span>春画展示</span>
                    </a>
                    </if>
                    <!--<a href="" target="_blank">
                        <img src="{$config_siteurl}statics/cu/Heritage/images/yangquan/yangquan-13.jpg" alt="">
                        <span>春画展示</span>-->
                        </for>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="citytab">
        <div class="container">
            <div class="divtit">
                <p><span>市县文化云</span><i>CITY AND COUNTY CUTURAL CLOUDS</i></p>
                <a href="http://www.sx-cc.com" class="">返回山西文化云</a>
            </div>
            <ul class="ulcitytab clearfix">
                <li class="on"><a href="###">平定县文化云</a></li>
                <li><a href="###">孟县文化云</a></li>
                <li><a href="###">郊区文化云</a></li>
                <li><a href="###">矿区文化云</a></li>
                <li><a href="###">城区文化云</a></li>
            </ul>
        </div>
    </div>
</article>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
<script src="{$config_siteurl}statics/cu/Heritage/js/jquery-1.10.1.min.js"></script>
<script src="{$config_siteurl}statics/cu/Heritage/js/idangerous.swiper.min.js"></script>
<script>
    var mySwiper = new Swiper('.swiper-container',{
        centeredSlides: true,
        slidesPerView: 1,
        watchActiveIndex: true,
        initialSlide: 1,
        loop: true,
        autoplay:5000
    })

    $('.yangquan_top .arrow-left').on('click', function(e){
        e.preventDefault()
        mySwiper.swipePrev()
    })
    $('.yangquan_top .arrow-right').on('click', function(e){
        e.preventDefault()
        mySwiper.swipeNext()
    })
</script>
