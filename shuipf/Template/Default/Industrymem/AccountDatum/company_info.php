<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />
<block name="after_styles">

    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/ziliao.css">
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <style>
        .main{float: left;margin-left: 70px}
        .main dt{width: 100px}
        .main dd{margin-left: 150px}
        .main_tx img{width:100px;height:100px;border-radius: 50px;text-align: center}
        .main .edit_btn{float: right;display: inline-block; }
        .main .main_tx span{vertical-align: bottom;}

        .main .ddbtns{display: none}
        .about_text{resize: none;width: 600px}
    </style>
</block>

<block name="content">

    <div class="main" >
    <form action="{:U('Industrymem/AccountDatum/company_edit')}" method="post">
        <dl class="dluform" style="width: 800px">
           
            <dt>用户名</dt>
            <dd>{$username}
                <!-- <input type="hidden" name="username" value="111">  -->
                <!-- <span class='edit_btn' onclick="edit(this,'username')">编辑</span>  -->
            </dd>
            <dt>公司名称</dt>
            <dd>
                <empty name="userInfo.nickname">暂未设置<else /> {$userInfo.nickname}</empty>
                <!-- <input type="hidden" name="nickname" value="111">  -->
                <span class='edit_btn' onclick="edit(this,'nickname')">编辑</span></dd>
            <dt>联系方式</dt>
            <dd>{$userInfo.mobile}
                <!-- <input type="hidden" name="mobile" value="111"> -->
                <span class='edit_btn' onclick="edit(this,'mobile')">编辑</span></dd>
            <dt>企业邮箱</dt>
            <dd><empty name="userInfo.email">暂未设置<else /> {$userInfo.email}</empty> 
                <!-- <input type="hidden" name="email" value="111"> -->
                <span class='edit_btn' onclick="edit(this,'email')">编辑</span></dd>
            <dt>企业法人</dt>
            <dd><empty name="userInfo.legal_person">暂未设置<else /> {$userInfo.legal_person}</empty>

                <!-- <input type="hidden" name="about" value="111"> -->
                <span class='edit_btn' onclick="edit(this,'legal_person')">编辑</span></dd>
            <dt>营业执照号</dt>
            <dd><empty name="userInfo.business_license">暂未设置<else /> {$userInfo.business_license}</empty>

                <!-- <input type="hidden" name="about" value="111"> -->
                <span class='edit_btn' onclick="edit(this,'business_license')">编辑</span></dd>
            <dt>公司地址</dt>
            <dd><empty name="userInfo.business_address">暂未设置<else /> {$userInfo.business_address}</empty>

                <!-- <input type="hidden" name="about" value="111"> -->
                <span class='edit_btn' onclick="edit(this,'business_address',2)">编辑</span></dd>
            <dt>公司注册类型</dt>
            <dd><empty name="userInfo.registration_type">暂未设置<else /> {$userInfo.registration_type}</empty>

                <!-- <input type="hidden" name="about" value="111"> -->
                <span class='edit_btn' onclick="edit(this,'registration_type')">编辑</span></dd>
            <dt>经营范围</dt>
            <dd><empty name="userInfo.business_scope">暂未设置<else /> {$userInfo.business_scope}</empty>

                <!-- <input type="hidden" name="about" value="111"> -->
                <span class='edit_btn' onclick="edit(this,'business_scope',2)">编辑</span></dd>

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
        // $(function(){
        //     var data = {name:'www'};
        //     $('.edit_btn').click(function(data) {
        //          Act on the event 
        //         $(this).parent('dd').html('<input type="text" value="" name="'+data.name+'">')
        //     });
        // })
        $(function(){
           $('.btncancel').click(function(event) {
               /* Act on the event */
               window.location.reload();
           });
        })
        function edit(obj,name,type){
            if(type != 2){
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