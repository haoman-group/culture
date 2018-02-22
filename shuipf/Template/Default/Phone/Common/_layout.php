<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{$title|default=山西文化云}</title>
    
    <link rel="stylesheet" href="{$config_siteurl}statics/amazeui/css/amazeui.min.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/amazeui/css/app.css">

    <link rel="stylesheet" href="{$config_siteurl}statics/amazeui/css/amazeui.flat.css" />  
    <script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
    <style>
        .my-am-list > li{
            background:none;
            border:none;
        }
        .am-pagination >.current{
            z-index: 2;
            color: #fff;
            background-color: #962626;
            border-color: #962626;
            cursor: default;
            position: relative;
            display: block;
            padding: .5em 1em;
            text-decoration: none;
            line-height: 1.2;
            border: 1px solid #ddd;
            border-radius: 0;
            margin-bottom: 5px;
            margin-right: 5px;
            box-sizing: border-box;
            display: inline-block;
        }
        .am-pagination>a{
            position: relative;
            display: block;
            padding: .5em 1em;
            text-decoration: none;
            line-height: 1.2;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 0;
            margin-bottom: 5px;
            margin-right: 5px;
            box-sizing: border-box;
            display: inline-block;
        }
        .am-panel{
            margin-bottom:3px;
        }
          .divider-title-wrap p {
              margin-top:-10px;
            display: inline-block;
            width:108px;
            background-color :#962626;
            color:#fff;
            border-radius:5px;
            border:0.4rem double #fff;
            padding:1px 20px 1px 20px;
            box-sizing:border-box;
        }
        .row{margin:0;}
.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{padding:0;}
/* Fuck 15px for iPhone Over */

    </style>
    <block name="style"></block>
</head>
<body>
    <!-- 顶部 -->
    <header data-am-widget="header" class="am-header am-header-default">
        <div class="am-header-left am-header-nav">
            <a href="/Phone">
                <i class="am-header-icon am-icon-home"></i>
                <span class="am-header-nav-title">首页</span>
            </a>
        </div>
        <h1 class="am-header-title" style="overflow:visible;">
            <a href="#title-link">{$title|default=山西文化云}</a>
        </h1>
        
        <notempty name="category">
            <div class="am-header-right am-header-nav">
                <a href="#right-link" class="" data-am-offcanvas>
                    <i class="am-header-icon am-icon-bars"></i>
                </a>
            </div>
        <else/>
            <div class="am-header-right am-header-nav">
                <a href="javascript:history.back();" class="">
                    <i class="am-header-icon am-icon-reply"></i>
                </a>
            </div>
        </notempty>
    </header>
    <!-- 顶部 结束-->

    <block name="content"></block>

    <!-- 侧边栏内容 -->
    <div id="right-link" class="am-offcanvas">
        <div class="am-offcanvas-bar">
            <div class="am-offcanvas-content">
                <ul class=" my-am-list am-list am-list-border">
                    <volist name="category" id="vo">
                        <li><a href="{:U('lists',array('cid'=>$vo['cid']))}">{$vo.name}</a></li>
                    </volist>
                    <li><a href="javascript:history.back();" style="color:#962626;font-size:20px;"><i class="am-header-icon am-icon-reply"></i>返回上一级</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- 侧边栏内容 结束-->
    

    <script type="text/javascript" src="{$config_siteurl}statics/amazeui/js/amazeui.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/amazeui/js/amazeui.widgets.helper.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/amazeui/js/app.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/amazeui/js/handlebars.min.js"></script>
</body>
</html>