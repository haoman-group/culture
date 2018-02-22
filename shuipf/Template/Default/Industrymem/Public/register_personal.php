<extend name="./lvyecms/Template/Default/Content/common/_layout.php" />
<block name="header">
    <template file="Member/Public/_reg_header"/>
</block>
<block name="content">
    <div id="content">
        <div class="box-with-border">
            <form action="{:U('Public/doRegister')}" method="post" id="form_reg">
                <div class="register">
                    <h2> 个人用户注册</h2>
                    <dl class="clearfix">
                        <dt><i>*</i>用户名：</dt><dd><input type="text" value="" placeholder="" name="username"><span>请输入用户名</span></dd>
                        <dt><i>*</i>手机号：</dt><dd><input type="text" value="" name="mobile" id="mobile"><span>请输入手机号</span></dd>
                        <dt><i>*</i>密码：</dt><dd><input type="password" value="" id="password" name="password" style="width: 270px;height: 35px;border: 1px solid #d6d6d6;font-size: 16px;border-radius: 8px;"><span>密码由6位以上数字和字母组成</span></dd>
                        <dt><i>*</i>确认密码：</dt><dd><input type="password" value="" name="repassword" style="width: 270px;height: 35px;border: 1px solid #d6d6d6;font-size: 16px;border-radius: 8px;"><span>请再次输入上面的密码</span></dd>
                        <dt><i>*</i>短信验证码：</dt><dd><input type="text" name="mobile_code" value="">
                            <input type="button" id="btn_send_sms" class="btncomregfrom_verify" value="获取验证码" style="width: 100px;height: 30px;margin-left: 15px;border-radius: 8px;"></dd>
                    </dl>
                </div>
                <div class="agree-div">
                    <label>
                        <input type="checkbox" name="chkuregagree">
                        <span style="color:#909090">我已阅读并接受</span>
                        <span style="color:#242424">《服务条款和声明》</span>
                    </label>
                    <div>
                        <input type="hidden" name="type" value="1"/>
                        <button class="btn" id="btn_submit">立即注册</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</block>

<block name="after_scripts">
    <script src="{$config_siteurl}statics/ci/js/jquery.validate.js"></script>
    <script src="{$config_siteurl}statics/ci/js/vali.js"></script>
    <script type="text/javascript">
        $('#btn_send_sms').click(function () {
            var mobile = $('#mobile').val();
            send_reg_sms(mobile);
        });

    </script>
</block>
