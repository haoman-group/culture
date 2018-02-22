<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">
<form method="post" class="am-form">
    <fieldset>
        <legend>山西文化云会员登陆</legend>
        <div class="am-form-group">
            <label for="doc-ipt-email-1">用户名</label>
            <input type="text" name="username" class="" id="doc-ipt-email-1" placeholder="输入名称">
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">密码</label>
            <input type="password" name="password" class="" id="doc-ipt-pwd-1" placeholder="输入密码">
        </div>

        <p><button type="submit" class="am-btn am-btn-danger am-radius am-btn-block">提交</button></p>
    </fieldset>
</form>
</block>