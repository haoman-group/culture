<extend name="./shuipf/Template/Default/Industrymem/common/_layout.php" />
<block name="after_styles">
<link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</block>
<block name="content">

    <form>
        <dl class="dluform">
            <dt>企业名称</dt>
            <dd><input type="text" name="name" value=""></dd>
            <dt>手机号码</dt>
            <dd><input type="text" name="phone" value=""></dd>
            <dt>电子邮箱</dt>
            <dd><input type="text" name="email" value=""></dd>

            <dd class="ddbtns">
                <input type="submit" value="保存" class="preservation">
                <input type="button" class="btncancel" value="取消">
            </dd>
        </dl>
    </form>

</block>
<block name="after_scripts">
<script type="text/javascript" src="{$Config_siteurl}statics/js/layer/layer.js">
</script>
<script>
        var uid = {$uid};
        checked_login(uid);
    </script>
</block>