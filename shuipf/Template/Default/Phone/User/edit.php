<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">
<form method="post" class="am-form am-form-horizontal">
    <fieldset>
        <legend>个人信息</legend>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">用户名</label>：{$userinfo.username}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">昵称</label>：
            <input type="text" name="nickname" value="{$userinfo.nickname}" class="" id="doc-ipt-nickname-1" placeholder="昵称">
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">手机号码</label>：
            <input type="number" name="mobile" value="{$userinfo.mobile}" class="" id="doc-ipt-mobile-1" placeholder="手机号码">
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">邮箱</label>：
            <input type="email" name="email" value="{$userinfo.email}" class="" id="doc-ipt-email-1" placeholder="邮箱">
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">性别</label>：
            <select name="sex" id="">
                <option value="1" <if condition="$userinfo['sex'] eq '1'">selected</if>>男</option>
                <option value="2" <if condition="$userinfo['sex'] eq '2'">selected</if>>女</option>
            </select>
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">个人简介</label>：
            <textarea class="" name="about" rows="5" id="doc-ta-1">{$userinfo.about}</textarea>
        </div>
        <p><button type="submit" class="am-btn am-btn-primary">提交</button></p>
    </fieldset>
</form>
</block>