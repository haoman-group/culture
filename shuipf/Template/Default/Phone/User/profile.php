<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">

<form method="post" class="am-form">
    <fieldset>
        <legend>个人信息</legend>
        <div class="am-form-group">
            <label>头像</label>：
            <img class="am-radius" alt="140*140" src="{$avatar}"  onerror="this.src='/statics/extres/member/images/noavatar.jpg'"  width="140" height="140" />
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">用户名</label>：{$userinfo.username}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">昵称</label>：{$userinfo.nickname}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">手机号码</label>：{$userinfo.mobile}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">邮箱</label>：{$userinfo.email}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">性别</label>：<?=($userinfo['sex']>=1)?($userinfo['sex']==1?'男':'女'):'未知';?>
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">个人简介</label>：{$userinfo.about}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">上次登陆时间</label>：{$userinfo.lastdate|date='Y-m-d H:i:s',###}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">上次登陆IP</label>：{$userinfo.lastip}
        </div>
    </fieldset>
    <!-- <fieldset>
        <legend>头像</legend>
    </fieldset> -->
</form>


<!-- 退出按钮 -->
<a class="am-btn am-btn-danger am-radius am-btn-block" href="{:U('logout')}">退出</a>
</block>