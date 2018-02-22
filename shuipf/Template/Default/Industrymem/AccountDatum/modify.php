<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />
<block name="after_styles">
    <style>
        .tianjia{width: 500px;border: 1px solid #F0F0F0;;margin:30px auto;}
        .moren {width: 200px;border: 1px solid #F5F5F5;display: inline-block;margin: 20px;}
        .title{font-family: "Adobe Heiti Std";font-size: 14px;padding-top: 10px;}
        .moren span{font-size: 12px;font-family: "Adobe Heiti Std"}
        .diqu{font-size: 16px;text-align: left;display: inline-block}
        .ad{width: 100px;height: 30px;border: 1px solid black;display: inline-block}
    </style>


</block>


<block name="content">

    <div class="tianjia" style="margin-left: 500px;">
        <h3 style="text-align: center;margin-top: 20px;">修改密码</h3>
        <div  style="margin-left: 60px;margin-top: 20px;">
            <form method="post" action="{:U('Industrymem/AccountDatum/editPwd')}">
                <dl class="dluform">
                    <dt>用户名</dt>
                    <dd>{$username}<input type="hidden" name="username" value="{$username}"></dd>
                    <dt style="width: 80px;">请输入旧密码</dt>
                    <dd><input type="password" name="oldpwd" value="" placeholder="请输入您的旧密码"></dd>
                    <dt style="width: 80px;">请输入新密码</dt>
                    <dd><input type="password" name="newpwd" value="" placeholder="请输入您的新密码" ></dd>
                    <dt style="width: 80px;">确认新密码</dt>
                    <dd><input type="password" name="cpwd" value="" placeholder="确认新密码" ></dd>


                    <dd class="ddbtns">

                        <input type="submit" value="确认修改" class="preservation">
                        <input type="button" class="btncancel" value="取消">
                    </dd>
                </dl>
            </form>

        </div>


    </div>

    </div>

</block>
<block name="after_scripts">
<script type="text/javascript" src="{$Config_siteurl}statics/js/layer/layer.js">
</script>
<script>
        var uid = {$uid};
        checked_login(uid);
    </script>
</block>