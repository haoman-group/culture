 
<html>
<head>
    <meta charset="UTF-8">
    <title>文化活动</title>
    <template file="Pubservice/Common/_cssjs"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/public-service.css">
    <script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>
</head>
<body>

    <div class="wrap">
        <template file="Pubservice/Common/_head"/>
        <div class="stepBar">
            <div class="ggwh_Content">
                <div class="stepBarMain">
                    <a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;公共文化活动                    
                </div>
            </div>
        </div>

        <div class="ggwh_Content" style="margin-top: 30px;">
            <div class="xmgsDetailLeft pull-left">
                <div class="top">
                    <h3>目录</h3>
                </div>
                <ul class="ggwh_ZxList" style="padding: 5px;">
                    <li >
                        <a href="{:U('show',array('id'=>$data['parent_id']))}" data-src="js">介&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;绍</a>
                    </li>
                    <li>
                        <a href="{:U('show',array('id'=>$data['parent_id']))}" data-src="xqtz">学期通知</a>                      
                    </li>
                    <li>
                        <a href="{:U('show',array('id'=>$data['parent_id']))}" data-src="kcsz">课程设置</a>
                    </li>
                    <li>
                        <a href="{:U('show',array('id'=>$data['parent_id']))}" data-src="lsjs">老师介绍</a>
                    </li>
                    <li>
                        <a href="{:U('show',array('id'=>$data['parent_id']))}" data-src="bm">报&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</a>
                    </li>
                    <li class="last-item active" >
                        <a data-src="xc">教学现场</a>
                    </li>

                </ul>
            </div>
            <div class="xmgsDetailRight pull-right xc" >
                <div class="top">
                    <span>教学现场</span>                       
                </div>
                <div class="study-live">
                    <h1 class="title">{$data['subtitle']}</h1>
                    <p class="sub-title">主讲人：<span>{$data.lecturer}</span>开讲时间：<span>{$data.start_time}</span></p>                       
                    <div class="row">
                        <notempty name="data.voide">
                        <div class="col-md-7">
                            <!-- <h1>{$data.video_title}</h1> -->
                            <div class="embed-responsive embed-responsive-4by3">
                                <div id="youkuplayer" style="width:580px;height:500px"></div>
                            </div>
                        </div>
                        </notempty>
                        <div class="col-md-5">
                            <div>
                                <notempty name="data.video_title"><h3 style="margin-top: 0;">{$data.video_title}</h3></notempty>
                                <notempty name="data.authorname"><p>导演：{$data.authorname}</p></notempty>
                                <notempty name="data.technique"><p>技法：{$data.technique}</p></notempty>
                                <notempty name="data.performer"><p>主演：{$data.performer}</p></notempty>
                                <notempty name="data.unit"><p>表演单位：{$data.unit}</p></notempty>
                                <notempty name="data.category"><p>类型：{$data.category}</p></notempty>
                                <notempty name="data.theme"><p>题材：{$data.theme}</p></notempty>
                                <notempty name="data.artist"><p>艺术家：{$data.artist}</p></notempty>
                                <notempty name="data.drama"><p>艺术种类：{$data.drama}</p></notempty>
                                <notempty name="data.troupe"><p>剧团：{$data.troupe}</p></notempty>
                                <notempty name="data.awards"><p>获奖情况：{$data.awards}</p></notempty>
                                <notempty name="data.example"><p>代表作：{$data.example}</p></notempty>
                                <notempty name="data.figures"><p>代表人物：{$data.figures}</p></notempty>
                                <notempty name="data.audio"><p>音频：{$data.audio}</p></notempty>
                                <notempty name="data.band"><p>乐团：{$data.band}</p></notempty>
                                <notempty name="data.agency"><p>机构：{$data.agency}</p></notempty>
                                <!-- <notempty name="data.area"><p>所属地区：{$data.area}</p></notempty> -->
                                <notempty name="data.area_display"><p>地区信息：{$data.area_display}</p></notempty>
                                <notempty name="data.region"><p>流布区域：{$data.region}</p></notempty>
                                <notempty name="data.introduction"><p>剧本介绍：</p></notempty>
                                <notempty name="data.introduction"><p style="text-indent: 2em;line-height:25px;">{$data.introduction}</p></notempty>
                            </div>
                        </div>
                    </div>
                    <div class="content">{$data.publish_content}</div>                    
                </div>                                       
            </div>
        </div>
        <template file="Pubservice/Common/_foot"/>
    </div>
</body>
<script type="text/javascript" src="http://player.youku.com/jsapi"></script>
<if condition="$data['voide'] neq ''">
    <script type="text/javascript">
        player = new YKU.Player('youkuplayer',{
            styleid: '0',
            client_id: '{:C('YOUKU_CLIENT_ID')}',
            vid: '{$data.voide}',
            newPlayer: true
        });
    </script>
</if>

<script>
   window.onload = function(){

        var h = window.innerHeight
                || document.documentElement.innerHeight
                || document.body.innerHeight;;

        var h1 = $('html').height();

        var fh = $('#wh-footer').height();

        // console.log(h +' '+h1+' '+fh);

        if(h1 > h){

            $('#wh-footer').css('top',h1+'px');

        }else{

            $('#wh-footer').css('top',h-(fh+20)+'px');

        }

    }
</script>

<script type="text/javascript">
    $(function(){
        var img = "{$data.image}".split(',');
        // console.log(img);
        $.each(img,function(i,v){
            // console.log(i);
            $(".row-img").append('<div class="col-md-2">'+
                    '<div class="thumbnail">'+
                        '<img src="'+v+'" class="img-responsive" alt="剧照1">'+
                    '</div>'+
                '</div> ');
        });
    });
</script>
</html>

  