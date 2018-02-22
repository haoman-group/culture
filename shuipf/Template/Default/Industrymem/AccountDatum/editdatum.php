<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />
<block name="after_styles">

    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/adress.css">

</block>

<block name="content">

    <div class="col-md-9" >





        <div class="tianjia" style="margin-left: 100px;">
            <h3 style="text-align: center;margin-top: 20px;">修改个人资料</h3>
            <div  style="margin-left: 60px;margin-top: 20px;">
                <form method="post" action="">
                    <dl class="dluform">
                        <dt>上传头像</dt>
                        <dd><input type="text" name="name" value="{$username}"></dd>
                        <dt>用户名</dt>
                        <dd><input type="text" name="" value="" placeholder="请输入您的用户名"></dd>

                        <dt>昵称</dt>
                        <dd><input type="text" name="" value="" placeholder="请输入您的昵称" ></dd>
                        <dt>联系电话</dt>
                        <dd><input type="text" name="" value="" placeholder="请输入您的联系电话  " ></dd>
                        <dt>邮箱</dt>
                        <dd><input type="text" name="" value="" placeholder="请输入您的联系电话"></dd>

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