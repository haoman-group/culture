<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>最新资讯</title>
        <template file="Pubservice/Common/_cssjs"/>
    </head>

    <body>
        <div class="wrap">
            <template file="Pubservice/Common/_head"/>
            <div class="stepBar">
                <div class="ggwh_Content">
                    <div class="stepBarMain">
                        <a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="link2" href="{:U('Pubservice/Content/lists',array('news_id'=>$data['news_id']))}">{$news_name}</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;{$data['title']}
                    </div>
                </div>
            </div>
            <div class="ggwh_Content" style="margin-top: 30px;">
                <div class="xmgsDetailLeft pull-left" style="float:left;">
                    <div class="top">
                        <h3>目录</h3>
                    </div>
                    <div class="tab-wrapper pignose-tab-wrapper pignose-tab-wrapper-root" style="float:left;">
                    <ul class=" pignose-tab-group " style="padding: 5px;">
                        <li class=" pignose-tab-list ggwh_left_list">
                        <volist name="category" id="vo">
                            <a href="{:U('Pubservice/Content/lists',array('news_id'=>$vo['cid']))}" class="pignose-tab-btn active">{$vo['name']}</a>
                            </volist>
                           
                        </li>
                    </ul>
                    </div>
                   
            </div>
              <div class="xmgsDetailRight pull-right pignose-tab-container active" style="padding:0;float:left;width:900px;">
                                <div class="top1">
                                    <span>{$news_name}</span>
                                </div>
                                <div class="xmgsDetailRMain">
                                    <h3 class="text-center">{$data['title']}</h3>
                                    <h6 class="text-center"><?php echo date("Y-m-d H:i:s",$data['addtime']) ?>  来源：{$data['upload_unit']}   </h6>
                                    <if condition="$data['video'] neq ''">
                                        <div id="youkuplayer" style="margin:20px;width:720px;height:484px;" data-type="{$data.video}"></div>
                                    </if>
                                    <div class="img" class="text-center">
                                    <volist name="data['images']" id="im">
                                        <img src="{$im}" alt="" style="width:600px;padding:18px;">
                                    </volist>
                                    <p style="font-size: 16px; color: #4d4d4d;">{$data['content']}</p>
                                    <div class="bshare-custom icon-medium-plus" style="text-align: right;margin-top: 30px;"><a title="分享到" href="http://www.bShare.cn/" id="bshare-shareto" class="bshare-more">分享到</a><a title="分享到微信" class="bshare-weixin"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到QQ好友" class="bshare-qqim"></a><a title="分享到豆瓣" class="bshare-douban"></a><a title="分享到百度空间" class="bshare-baiduhi"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
                                    <div class="tag">
                                        <volist name="same" id="wo">
                                            <a href="{:U('Pubservice/Content/show',array('id'=>$wo['id']))}" style="color: #4d4d4d"><span>●</span><?php echo mb_strcut($wo['title'],0,65);?>...</a>
                                        </volist>
                                    </div>

                                </div>
                            </div>
                </div>
        </div>
        <template file="Pubservice/Common/_foot"/>
    </body>
   
   
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.tab.min.css"/>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<script type="text/javascript" src="{$config_siteurl}statics/cu/pignose/js/pignose.tab.js"></script>
<if condition="$data['video'] neq ''">
<script type="text/javascript" src="http://player.youku.com/jsapi"></script>
                            <script>
                                var player1 = new YKU.Player('youkuplayer',{
                                        styleid: '0',   
                                        client_id: '{:C('YOUKU_CLIENT_ID')}',
                                        vid: '{$data.video}',
                                        newPlayer: true
                                    });
                                function playVideo(){
                                    player.playVideo();
                                }
                            </script>
</if>
</html>
