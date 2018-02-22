<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>艺术档案馆</title>
        <template file="Pubservice/Common/_cssjs"/>
    </head>

    <body>
        <div class="wrap">
            <template file="Pubservice/Common/_head"/>
            <div id="nav" style="height:45px !important;">
                <div class="container" style="width: 1200px;">
                    <ul>
                        <li>
                            <a href="{$config_siteurl}" class="home_src">首页</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="##">艺术档案馆</a>
                        </li>
                    </ul>
                    <form action="" method="get" target="_blank">
                        <div class="searbox">
                            <input type="text" placeholder="输入您要搜索的关键词" value=""  name="kw"/>
                            <input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;float:right;width:40px;right:0px !important"><i style="color:#962626" class="fa fa-search"></i>
                        </div>
                    </form>
                </div>
            </div>
            <notempty name="position">
            <div class="archive_vedio">
                <div class="ggwh_Content">
                    <dl class="clearfix">
                        <dt>
                         <if condition="$position['video'] neq ''">
                            <div id="youkuplayer" style="width:720px;height:484px;" data-type="{$position.video}"></div>
                            
                        <else/>
                            <a href="javascript:void(0);"><img src="{$position['images'][0]|default='statics/cu/images/public-service/archive1.jpg'}" alt="images"></a>
                        </if>
                        </dt>
                        <dd>
                            <h5>{$position.title|default="《景德镇建国瓷专场》——清华大学王博博士艺术品专辑讲坛"}</h5>
                            <table>
                                 <tr>
                                    <td>视频标题：<span>{$position.content_json}</span>
                                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年代：<span>20世纪70年代</span> -->
                                    </td>
                                    <!-- <td>专题：<span>瓷器</span></td> -->
                                <!--</tr>
                                <tr>
                                    <td>首播：<strong>2012年4月25日13：25</strong></td>
                                    <td>重播：<strong>2012年4月27日13：25</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="2">时长：<strong>90分钟</strong></td>-->
                                </tr> 
                                <tr>
                                    <td colspan="2">简介：<p>{$position.intro}</p></td>
                                </tr>
                                <tr>
                                    <if condition="$position['category'] eq 'video'">
                                        <td style="padding-top: 30px;"><input type="button" onclick="playVideo()" value="立即播放"></td>
                                    </if>
                                </tr>
                                <tr>
                                    <td style="padding-top: 30px;"><div class="bshare-custom icon-medium-plus"><div class="bsPromo bsPromo2"></div><a title="分享到" href="http://www.bShare.cn/" id="bshare-shareto" class="bshare-more">分享到</a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到微信" class="bshare-weixin"></a><a title="分享到QQ好友" class="bshare-qqim"></a><a title="分享到QQ空间" class="bshare-qzone"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count" style="float: none;">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script></td>
                                </tr>
                            </table>
                        </dd>
                    </dl>
                </div>
            </div>
            </notempty>
            <div class="pp_dangan topic">
                <div class="ggwh_Content clearfix">
                    <div class="topicl">
                        <div class="title">
                            <h5><a href="{:U('Archive/lists',array('category'=>'video'))}" style="color:#393939">专题视频</a></h5>
                        </div>
                         <ul class="clearfix">
                            <for start='0' end='3'>
                            <li>
                                <a href="{:U('show',['id'=>$data['video'][$i]['id']])}">
                                    <div class="img"><img src="{:thumb($data['video'][$i]['images'][0],270,197)}" alt=""></div>
                                    <p class="title">{$data['video'][$i]['title']|default='山西校园首届“赶集网杯”大 学生模特...'}</p>
                                </a>
                            </li>
                            </for>
                         </ul>
                    </div>
                    <div class="topicr">
                        <div class="title">
                            <h5><a href="{:U('Archive/lists',array('category'=>'news'))}" style="color:#393939">创新动态</a></h5>
                        </div>
                        <div class="list">
                            <for start='0' end='5'>
                            <p><a href="{:U('show',['id'=>$data['news'][$i]['id']])}"><i>●</i>{$data['news'][$i]['title']|default='山西省首届“赶集网”大学生...'} </a></p>
                            </for>
                            <div class="img"><img src="{$config_siteurl}statics/cu/images/public-service/dt.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pp_dangan1 jinpin">
                <div class="ggwh_Content">
                    <div class="title">
                        <h5><a href="{:U('Archive/lists',array('category'=>'quality'))}" style="color:#393939">精品鉴赏</a></h5>
                    </div>

                    <ul class="clearfix">
                        <for start='0' end='5'>
                        <li>
                            <a href="{:U('Pubservice/Archive/show',['id'=>$data['quality'][$i]['id']])}">
                                <div class="img"><img src="{:thumb($data['quality'][$i]['images'][0],206,237)}" alt=""></div>
                                <p class="title">{$data['quality'][$i]['title']|default='胭脂水压杯'}</p>
                                <!--<span>清 康熙</span>-->
                                <div class="shadow">
                                    <!--<h5>青花竹石纹玉壶春瓶</h5>-->
                                    <!--<em>清 康熙</em>-->
                                    <!--<p><span>瓷质 高29厘米、口径8.5厘米、足径12厘米</span>器型创烧于北宋，一般认为由诗句“玉壶先春”而得名。</p>-->
                                    <p>{$data['quality'][$i]['intro']}</p>
                                </div>
                            </a>
                        </li>
                        </for>
                    </ul>
                </div>
            </div>
            <div class="gg_zuixin">
                <div class="gg_zuixin_box">
                    <div class="gg_zuixin_left">
                        <div class="title">
                            <h5><a href="{:U('Archive/lists',array('category'=>'result'))}" style="color:#393939">编研成果</a></h5>
                        </div>
                        <div class="zx_left_con" style="padding-bottom: 0;height: 713px">
                            <div class="zx_ph_first">
                                <a href="{:U('Pubservice/Archive/show',['id'=>$data['result'][0]['id']])}"><if condition="$data['result']['0']['images'] neq '' "><img src="{$data['result'][0]['images'][0]}" class="zx_first_img"><else/>
                                <img src="{$config_siteurl}statics/cu/images/public-service/cg1.png" class="zx_first_img"></if></a>
                                <div class="zx_l_c">
                                    <h3><if condition="$data['result'][0]['title'] neq ''">{$data['result'][0]['title']}<else/>暂无信息</if></h3>
                                    <p class="zx_l_gkr"><if condition="$data['result'][0]['hits'] neq ''">{$data['result'][0]['hits']}<else/>0</if>人想看</p>
                                    <p class="zx_l_zw" style="word-wrap:break-word"><if condition="data['result'][0]['intro'] neq ''"><?php echo mb_strcut($data['result'][0]['intro'],0,100);?><else/>暂无信息</if></p>
                                </div>
                            </div>
                            <div class="zx_t_t">
                                <a href="{:U('Pubservice/Archive/show',['id'=>$data['result'][1]['id']])}"></a>
                               <if condition="$data['result']['1']['images'][0] neq '' "><img src="$data['result'][1]['images'][0]"> <else/><img src="{$config_siteurl}statics/cu/images/public-service/cg2.png"></if>
                                <p class="zx_tt_title"><if condition="$data['result'][1]['title'] neq '' ">{$data['result'][1]['title']}<else/>暂无信息</if></p>
                                <p><if condition="$data['result'][1]['hits'] neq '' ">{$data['result'][1]['hits']}<else/>0</if>人想看</p>
                            </div>
                            <div class="zx_t_t zx_three_li">
                                <a href="{:U('Pubservice/Archive/show',['id'=>$data['result'][2]['id']])}"></a>
                               <if condition="$data['result']['2']['images'][0] neq '' "> <img src="{$data['result'][2]['images']['0']}"> <else/><img src="{$config_siteurl}statics/cu/images/public-service/cg3.png"></if>
                                <p class="zx_tt_title"><if condition="$data['result'][2]['title'] neq '' ">{$data['result'][2]['title']}<else/>暂无信息</if></p>
                                <p><if condition="$data['result'][2]['hits'] neq '' ">{$data['result'][2]['hits']}<else/>0</if>人想看</p>
                            </div>
                            <div style="clear: both;"></div>
                            <ul>
                            <volist name="data['result']" id="re" offset="3" length="4">
                                <li>
                                    <a href="{:U('Pubservice/Archive/show',['id'=>$re['id']])}"><if condition="$re['title'] neq ''">{$re['title']}<else/>暂无信息</if> <span><if condition="$re['hits'] neq ''">{$re['hits']}<else/>0</if>人想看</span></a>
                                </li>
                                </volist>
                            </ul>
                        </div>
                    </div>
                    <div class="gg_zuixin_right">
                        <div class="title">
                            <h5><a href="{:U('Archive/lists',array('category'=>'online'))}" style="color:#393939">网上展览</a></h5>
                        </div>
                        <div class="zxtj_images">
                        <for start='0' end='4'>
                            <a href="{:U('Pubservice/Archive/show',['id'=>$data['online'][$i]['id']])}"><img src="{$data['online'][$i]['images'][0]|default='statics/cu/images/public-service/zl1.png'}" alt=""></a>
                        </for>
                            <!--<a href="##"><img src="{$config_siteurl}statics/cu/images/public-service/zl1.png" alt=""></a>
                            <a href="##"><img src="{$config_siteurl}statics/cu/images/public-service/zl2.png" alt=""><img src="{$config_siteurl}statics/cu/images/public-service/zl3.png" alt=""></a>
                            <a href="##"><img src="{$config_siteurl}statics/cu/images/public-service/zl4.png" alt=""></a>-->
                        </div>
                    </div>
                </div>
            </div>
            <template file="Pubservice/Common/_foot"/>
        </div>
    </body>

<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.tab.min.css"/>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<script type="text/javascript" src="{$config_siteurl}statics/cu/pignose/js/pignose.tab.js"></script>
<if condition="$position['video'] neq ''">
<script type="text/javascript" src="http://player.youku.com/jsapi"></script>
                            <script>
                                var player1 = new YKU.Player('youkuplayer',{
                                        styleid: '0',   
                                        client_id: '{:C('YOUKU_CLIENT_ID')}',
                                        vid: '{$position.video}',
                                        newPlayer: true
                                    });
                                function playVideo(){
                                    player.playVideo();
                                }
                            </script>
                            </if>
</html>
