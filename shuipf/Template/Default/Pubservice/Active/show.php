<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="{$data.subtitle}">
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
                    <a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{:U('Active/index')}">公共文化活动</a>                    
                </div>
            </div>
        </div>
        
    
        <if condition="$data['type'] eq  2 ">
        <template file="Pubservice/Active/show7"/>
        <else/>
        <template file="Pubservice/Active/show8"/>
        </if>
        <template file="Pubservice/Common/_foot"/>
    </div>
</body>
</html>