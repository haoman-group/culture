<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>基本服务项目公示</title>
        <template file="Pubservice/Common/_cssjs"/>
        <style>
            .ggwh_ZxList .ggwh_left_list{
                list-style:none;
            }
        </style>
    </head>

    <body>
        <div class="wrap">
            <template file="Pubservice/Common/_head"/>
            <div class="stepBar">
                <div class="ggwh_Content">
                    <div class="stepBarMain">
                        <a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="link" href="">{$news_name}</a>
                    </div>
                </div>
            </div>
            <div class="ggwh_Content" style="margin-top: 30px;">
                <div class="xmgsDetailLeft pull-left">
                    <div class="top">
                        <h3>目录</h3>
                    </div>
                    <div class="tab-wrapper pignose-tab-wrapper pignose-tab-wrapper-root">
                    <ul class=" pignose-tab-group " style="padding: 20px;position: static;max-height:510px;min-height:500px;">
                        <li class=" pignose-tab-list ggwh_left_list">
                        <volist name="category" id="vo">
                            <a href="{:U('Pubservice/Content/lists',array('news_id'=>$vo['cid']))}" class="pignose-tab-btn active">{$vo['name']}</a>
                            </volist>
                            <div class="xmgsDetailRight pull-right pignose-tab-container active" style="padding: 0;left: 25%;">
                                <div class="top1">
                                    <span>{$news_name}</span>
                                </div>
                                <div class="xmgsDetailRMain lists" style="min-height:510px;">
                                    <ul>
                                        <volist name="data" id="wo">
                                            <li><a href="{:U('Pubservice/Content/show',array('id'=>$wo['id']))}">{$key+1} {$wo['title']}</a><span class="time" style="margin-top:15px;"><?php echo date("Y-m-d H:i:s",$wo['addtime']) ?></span></li>
                                        </volist>
                                    </ul>
                                </div>
                            </div>
                        </li>                  
                    </ul>
                    </div>
                 
                </div>
                  
            </div>
              <div class="page">
                 {$pageinfo.page}
                </div>
           
        </div>
         <template file="Pubservice/Common/_foot"/>
    </body>
   
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.tab.min.css"/>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<script type="text/javascript" src="{$config_siteurl}statics/cu/pignose/js/pignose.tab.js"></script>
</html>
