<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="header">
    <template file="Member/Public/_reg_header"/>
</block>
<block name="content">
    <div id="content">
        <div class="login" style="border: none;">
            <form action="{:U('Industrymem/Public/doLogin')}" id="form" method="post">
                
                <dl style="width: 540px;border: 1px solid #ccc;float: none;margin: 0 auto;padding: 20px 55px 20px 55px;">
                	<div style="font-size: 16px;width: 430px;height: 25px;">
                		<div style="width: 215px;float: left;text-align: right;padding-right: 10px;"><input type="radio" name="radio" id="" value="个人登录" checked="" style="width: 15px;height: 15px;margin-right: 10px;margin-top: 10px;"/>个人登录</div>
                		<div style="width: 215px;float: left;text-align: left;padding-left: 50px;"><input type="radio" name="radio" id="" value="企业登录" class="on" / style="width: 15px;height: 15px;margin-right: 10px;margin-top: 10px;">企业登录</div>
                	</div>
                	<div style="margin-top: 15px;">
                		<dt style="background: url();"></dt><dd style="margin: auto;position: relative;height: 40px;"><div style="width: 44px;height: 40px;background: url({$config_siteurl}statics/ci/images/username.png) no-repeat;float: left;"></div><input type="text" class="username" placeholder="请输入用户名/手机号" name="loginName" style="line-height: 40px;text-align: center;position: absolute;top: 0px;"/></dd>
                    	<dt></dt><dd style="margin: auto;margin-top: 20px;position: relative;height: 40px;"><div style="background: url({$config_siteurl}statics/ci/images/password_update.png) no-repeat;width: 44px;height: 40px;float: left;"></div><input type="password" value="" name="password" placeholder="请输入登录密码" style="line-height: 40px;text-align: center;position: absolute;top: 0px;"/></dd>
                    	<dt></dt><dd style="margin: auto;border: none;margin-top: 8px;"><input class="yzm" type="text" value="" name="vCode" placeholder="请输入验证码" style="line-height: 40px;text-align: center;"/>
                    	<img style="margin-top: 16px;" src='{:U("Api/Checkcode/index","type=userlogin&code_len=4&font_size=14&width=150&height=40&font_color=&background=")}' alt="验证码" id="authCode" />
                    	<a href="javascript:;" onclick="changeAuthCode()" style="display: block;float: right;font-size: 12px;line-height: 18px;color: #900;margin-top: -10px;"> 看不清，换一张</a>
                    	</dd>                    
                    <dd class="wj" style="border: none;margin-left: 0;">
                    	<span style="display: block;width: 280px;margin-left: 108px;">
                    		<input id="user_people" type="checkbox" style="width: 18px;display: inline-block;height: 20px;float: left;margin-top: 15px;">
                    			<div>
                    				<span style="margin-left: 10px;"><label for="user_people" style="font-weight: 400;">记住用户名</label>&nbsp;&nbsp; |&nbsp;&nbsp;</span>
                        			<a href="{:U('Industrymem/Index/lostpassword')}" style="width: 80px;height: 0;background: white;color:#CCCCCC ">忘记密码? </a>
                    			</div>
                        	
                        </span>
                    	<a class="login_a" href="javascript:$('#form').submit();" style="font-size: 22px;margin-left: 60px;">登&nbsp;&nbsp;&nbsp;&nbsp;　　录</a>
                    	<div style="line-height: 20px;margin-left: 110px;">
                    		<p style="float: left;color: #b7b7b7;font-size: 15px;">您还没有账号，</p>
                    		<a href="{:U('Industry/Public/register')}" style="color: #900;">个人注册</a>
                        	,<a href="{:U('Industry/Public/register',['company'=>1])}" style="color: #900;">企业注册</a>
                    	</div>
                    	
                    </dd>

                	</div>
                    
                </dl>
            </form>
        </div>
    </div>
</block>