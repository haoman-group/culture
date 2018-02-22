<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">

<form method="post" class="am-form">
    <fieldset>
    <if condition="$if_bind eq true">
        <legend>我的读者证</legend>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">读者证状态</label>：{$userinfo.username}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">读者证编号</label>：{$userinfo.nickname}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">读者姓名</label>：{$userinfo.mobile}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">开户馆</label>：{$userinfo.email}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">证启用日期</label>：<?=($userinfo['sex']>=1)?($userinfo['sex']==1?'男':'女'):'未知';?>
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">证终止日期</label>：{$userinfo.about}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">积分</label>：{$userinfo.lastdate|date='Y-m-d H:i:s',###}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">押金总额</label>：{$userinfo.lastip}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">押金总额</label>：{$userinfo.lastip}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">专项押金</label>：{$userinfo.lastip}
        </div>
        <div class="am-form-group">
            <label for="doc-ipt-pwd-1">借阅次数</label>：{$userinfo.lastip}
        </div>
    <else/>
        <legend><span style="color:red;font-size:16px;"> 暂未绑定读者证！</span></legend>
    </if>
    </fieldset>
    <!-- <fieldset>
        <legend>头像</legend>
    </fieldset> -->
</form>
</block>