<extend name="./lvyecms/Template/Default/Content/common/_layout.php" />
<block name="header">
    <template file="Member/Public/_reg_header"/>
</block>
<block name="content">
    <div id="content">
        <!-- <div class="box-with-border"> -->
        <div class="login">
            <form action="{:U('Public/doLogin')}" id="form" method="post">
                <ul>
                    <li><a href="{:U('login')}">个人用户登录</a></li>
                    <li class="on"><a href="javascript:">企业用户登录</a></li>
                </ul>
                <dl>
                    <dt>企业名称：</dt><dd><input type="text" value="" name="loginName"/><span>请输入用户名/手机号码</span></dd>
                    <dt>密码：</dt><dd><input type="password" value="" name="password"/><span>请输入登录密码</span></dd>
                    <dt>验证码：</dt><dd><input class="yzm" type="text" value="" name="vCode"/><img src='{:U("Api/Checkcode/index","type=userlogin&code_len=4&font_size=14&width=80&height=24&font_color=&background=")}' alt="验证码" id="authCode" onclick="changeAuthCode()"/></dd>
                    <dd class="wj" style="display: inline-block"><a href="javascript:$('#form').submit();">登　　录</a>
                        <input type="checkbox" style="width: 20px;display: inline-block;height: 15px;"><span style="margin-left: 0px;">记住用户名 | <a
                                    href="{:U('Industrymem/Index/lostpassword')}" style="width: 80px;height: 0;background: white;color:#CCCCCC ">忘记密码?</a> </span></dd>




                </dl>
                <div class="nousername">
                    <span>没有账户？</span>
                    <a href="{:U('register',['company'=>1])}">免费注册</a>
                </div>
            </form>
        </div>
        <!-- </div> -->
    </div>
</block>