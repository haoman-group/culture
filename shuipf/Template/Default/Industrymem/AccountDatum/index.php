<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />
<block name="after_styles">

    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/ziliao.css">
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <style>
        .main{float: left;margin-left: 70px}
        
        .main_tx img{width:100px;height:100px;border-radius: 50px;text-align: center}
        .main .edit_btn{float: right;display: inline-block; }
        .main .main_tx span{vertical-align: bottom;}

        .main .ddbtns{display: none}
        .about_text{resize: none;width: 600px}
        .input{display: none}
        .main .button{vertical-align: bottom;width: auto;height: auto;border: none;background: #fff;color: #fff}
    </style>
</block>

<block name="content">

    <div class="main" >
    <form action="{:U('Industrymem/AccountDatum/editdatum')}" method="post">
        <dl class="dluform" style="width: 800px">
            <dd class="main_tx"><img id='licence_preview' src="{$userInfo.userpic}" alt="">
            <!-- <input type="hidden" name="userpic" value="{$Config_siteurl}statics/ci/images/cardlist1.jpg"> -->

            <span class="edit_img">编辑</span>
            <Form function="images" parameter="licence,licence,'',content"/>
            <!-- <img id='licence_preview' src="" alt=""> --></dd>
            <dt>用户名</dt>
            <dd>{$username}
                <!-- <input type="hidden" name="username" value="111">  -->
                <!-- <span class='edit_btn' onclick="edit(this,'username')">编辑</span>  -->
            </dd>
            <dt>昵称</dt>
            <dd>
                <empty name="userInfo.nickname">暂未设置<else /> {$userInfo.nickname}</empty>
                <!-- <input type="hidden" name="nickname" value="111">  -->
                <span class='edit_btn' onclick="edit(this,'nickname')">编辑</span></dd>
            <dt>联系方式</dt>
            <dd>{$userInfo.mobile}
                <!-- <input type="hidden" name="mobile" value="111"> -->
                <span class='edit_btn' onclick="edit(this,'mobile')">编辑</span></dd>
            <dt>邮箱</dt>
            <dd><empty name="userInfo.email">暂未设置<else /> {$userInfo.email}</empty> 
                <!-- <input type="hidden" name="email" value="111"> -->
                <span class='edit_btn' onclick="edit(this,'email')">编辑</span></dd>
            <dt>个人介绍</dt>
            <dd><empty name="userInfo.about">暂未设置<else /> {$userInfo.about}</empty>

                <!-- <input type="hidden" name="about" value="111"> -->
                <span class='edit_btn' onclick="edit(this,'about')">编辑</span></dd>
            <dd class="ddbtns">

                <input type="submit" value="保存" class="preservation">
                <input type="button" class="btncancel" value="取消">
            </dd>
        </dl>
    </form>
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
    <script type="text/javascript" src="{$Config_siteurl}statics/js/layer/layer.js">

    </script>
    <script type="text/javascript" src="{$Config_siteurl}statics/js/content_addtop.js"></script>
    <script>
            var uid = {$uid};
            checked_login(uid);
    </script>
    <script>
        $(function(){
            $('.edit_img').click(function(data) {
                $(".button").trigger('click');
                $('.ddbtns').css({'display':'block'})
            });

           $('.btncancel').click(function(event) {
               /* Act on the event */
               window.location.reload();
           });
        })
        
        function edit(obj,name){
            if(name != 'about'){
                var str =  '<input type="text" value="" name="'+name+'">';
            }else{
                var str =  '<textarea class="about_text"  name="' + name + '"></textarea>';
            }
            $(obj).parent('dd').html(str);
            $('.ddbtns').css({'display':'block'})
            // var i = $(obj).index();
            // alert(i)
        }
    </script>
</block>