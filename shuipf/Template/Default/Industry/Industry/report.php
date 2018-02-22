<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <style>
        .menu-mid p{font-size: 13px;letter-spacing: 1px;font-family: "Adobe Heiti Std";color: #919191;line-height: 261%}
        #content .industry .industry-right .img .input{
          }
        #content .industry .industry-right .img{position: relative;}
        .cc{width: 258px;height: 33px;position:absolute;top: 1px;left: 1px}
        #content .industry .industry-right dd.btn{clear:both}
        .industry-right ul li{float: left;width: 50%;border:1px solid #e4e4e4;font-size: 16px;text-align: center;line-height: 80px}
        .industry-right ul li button{width: 120px;height: 45px;border-radius: 5px;background: #1f58c1;color: white;font-size: 14px;line-height: 45px;display: block;margin-top: 0px;margin-left: 170px;margin-bottom: 20px}
    </style>

    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</block>
<block name="content">
    <div id="nav">
        <div class="container">
            <ul>
                <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900">首页</a></li>
                <li><span>></span></li>
                <li><a href="index.html">产业项目</a></li>
                <li><span>></span></li>
                <li><a href="#" style="color: #900;">项目申报系统</a></li>
            </ul>
        </div>
    </div>
    <div id="content">
        <div class="container industry clearfix" >
            <div class="industry-left" style="border: 1px solid #F1F1F1; overflow: hidden;width: 220px" >
                <h2><img src="{$config_siteurl}statics/images/industry13.png" alt="个人中心"></h2>
                <ul>
                    <li><a href="#"><span>●</span>项目申报系统</a></li>
                </ul>
            </div>


            <div class="industry-right" style="height: 200px;border: none">

                <ul>
                    <li style="">
                    下载产业申报相关文档
                    <a href="{:U('Industry/Industry/download')}">下载</a><button style="background:#900"></button>
                    </li>
                    <li style="">
                    上传产业申报相关文档
                    <button style="background:#900">上传</button>
                    </li>
                </ul>
        </div>
    </div>

</block>
<block name="after_scripts">
    <script type="text/javascript">
        //全局变量
        var GV = {
            DIMAUB: "{$config_siteurl}",
            JS_ROOT: "{$config_siteurl}statics/js/"
        };
    </script>
    <script src="{$config_siteurl}statics/js/wind.js"></script>
     <script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
    <script>
        var uid = {$uid};
        checked_login(uid);
    </script>
    <script type="text/javascript" src="{$Config_siteurl}statics/js/content_addtop.js"></script>
    <script>
        function openurl(){
            var radios=document.getElementsByName("judge");

            for(var i=0;i<radios.length;i++){
                if(radios[i].checked){
                    var n=radios[i].value;

                    if(n==1){
                        window.location.href="system-yes.html"
                    }
                    else if(n==0){
                        location.href="system-no.html"
                    }
                }
            }
        }
    </script>
    
    <script type="text/javascript">
        $(function(){
            $('.add').click(function(){
                var data = $('form').serialize();
//                alert(data)
//                var pfinancing = $('input[name=pfinancing]').val();

//
                $.post("{:U('Industry/Industry/add_report')}",data,function(data){
                    // // alert(1)
                    if(!data.status){
                        alert(data.message);
                    }else{
                        alert(data.message);
                        window.location.href="{:U('Industry/Industry/index')}";
                    }
                },"json")
                return false;
            })
        })
    </script>

</block>

