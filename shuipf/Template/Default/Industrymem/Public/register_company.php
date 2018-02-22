<extend name="./lvyecms/Template/Default/Content/common/_layout.php" />
<block name='after_styles'>
	 <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
		<style type="text/css">
			.expimg .button{
				background: white;
				border: 1px solid #d8d8d8;
				width: 70px;
				height: 30px;
				margin-top: 10px;
				margin-bottom: 20px;
			}
			.expimg p{
				font-size: 24px;
				font-weight: 700;
			}
			#licence{
				opacity: 0;
			}
			#sw{
				opacity: 0;
			}
		</style>
</block>
<block name="header">
    <template file="Member/Public/_reg_header"/>
</block>

<block name="content">
    <div id="content">
        <div class="box-with-border">

            <form action="{:U('Public/doRegister')}" method="post" id="form_reg">
            <div class="register">
                <h2> 企业用户注册</h2>
                
                <dl class="clearfix">
                    <dt><i>*</i>企业名称：</dt><dd><input name="username" type="text" value="" placeholder=""><span>请输入企业名称</span></dd>
                    <dt><i>*</i>企业法人：</dt><dd><input name="legal_person" type="text" value="" placeholder=""><span>请输入法人名称</span></dd>
                    <dt><i>*</i>上传附件：</dt><dd><input type="button" class="btn btn-primary linkupintro" value="上传附件" style="background:#900"></dd>
                    <dt><i>*</i>手机号：</dt><dd><input name="mobile" type="text" value="" id="mobile"><span>请输入手机号</span></dd>
                    <dt><i>*</i>企业邮箱：</dt><dd><input name="email" type="text" value=""><span>请输入企业邮箱</span></dd>
                    <dt><i>*</i>密码：</dt><dd><input type="password" name="password" id="password" value="" style="width: 270px;height: 35px;border: 1px solid #d6d6d6;font-size: 16px;border-radius: 8px;"><span>密码由6位以上数字和字母组成</span></dd>
                    <dt><i>*</i>确认密码：</dt><dd><input type="password" name="repassword" value="" style="width: 270px;height: 35px;border: 1px solid #d6d6d6;font-size: 16px;border-radius: 8px;"><span>请再次输入上面的密码</span></dd>
                    <dt><i>*</i>短信验证码：</dt><dd><input type="text" name="mobile_code" value=""><input type="button" id="btn_send_sms" class="btncomregfrom_verify" value="获取验证码"  style="width: 100px;height: 30px;margin-left: 15px;border-radius: 8px;"></dd>
                    
                    
                    
                    <!--<dt><i>*</i>营业执照号：</dt><dd><input name="business_license" type="text" value="" placeholder=""><span>请输入营业执照号</span></dd>
                    <dt><i>*</i>注册资本：</dt><dd><input name="registered_capital" type="text" value="" placeholder=""><span>请输入注册资本</span></dd>
                    <dt><i>*</i>企业地址：</dt><dd><input name="business_address" type="text" value="" placeholder=""><span>请输入注册地址</span></dd>
                    <dt><i>*</i>公司注册类型：</dt><dd><input name="registration_type" type="text" value="" placeholder=""><span>请输入公司注册类型</span></dd>
                    <dt><i>*</i>经营范围：</dt><dd><textarea class="txtarea" name="business_scope"></textarea></dd>
                    -->
                </dl>
            </div>
            <div class="agree-div">
                <label>
                    <input type="checkbox" name="chkuregagree">
                    <span style="color:#909090">我已阅读并接受</span>
                    <span style="color:#242424">《服务条款和声明》</span>
                </label>
                <div>
                    <input type="hidden" name="type" value="2"/>
                    <button class="btn">立即注册</button>
                </div>
            </div>
            </form>
            
        </div>
    </div>

    <div class="upintro modal fade">
        <a class="aclose"></a>
        <div class="ps">
            <p>1、影印件图片必须是证件副本。</p>
            <p>2、影印件要求必须为彩色、清晰的数码相机拍摄件或扫描件，涂改后无效（或黑白影印件加盖公司红色公章）。</p>
            <p>3、影印件上的公司名称必须与您公司信息中填写的公司名称完全一致。</p>
            <p>4、证件须在有效期之内，并且含最新年检通过信息（或为2016年新版营业执照）。</p>
            <p>5、若发照机关为钢印公章，则需要复印营业执照副本并加盖公司红色公章后，再拍照或扫描后上传。</p>
            <p>6、图片必须清晰、完整、方向正确，不能带有无关的水印、标记或者其他网站的logo。</p>
            <p>7、支持jpg、png、bmp的图片格式，大小不超过2M。</p>
        </div>
        <div class="upimgbox" >
        	<div class="expimg left" >
        		<p>请上传营业执照</p>
        		<Form function="images" parameter="licence,licence,'',content"/>
        		<div class="imgbox">
        			<img src=""  id="yingye">
        		</div>
        	</div>
	        <div class="expimg sw right" >
	        	<p>请上传税务登记证</p>
	        	<Form function="images" parameter="sw,sw,'',content"/>
	        	<div class="imgbox">
	        		<img src=""  id="shuiwu">
	        	</div>
	        </div>
	        <div class="btnbox">
	        	<a href="javascript:;" class="register_close" >确定</a>
	        	<a href="javascript:;" class="register_off" onClick="this.value='';" >取消</a>
	        </div>
        </div>
        
        
    </div>

</block>


<block name="after_scripts">
    <script src="{$config_siteurl}statics/bootstrap/js/bootstrap.min.js"></script>
    <script src="{$config_siteurl}statics/ci/js/jquery.validate.js"></script>
    <script src="{$config_siteurl}statics/ci/js/vali.js"></script>
	 <script type="text/javascript">
        //全局变量
        var GV = {
            DIMAUB: "{$config_siteurl}",
            JS_ROOT: "{$config_siteurl}statics/js/"
        };
    </script>
    <script src="{$config_siteurl}statics/js/wind.js"></script>
    <script type="text/javascript" src="{$Config_siteurl}statics/js/content_addtop.js"></script>
    
    <script>
        $(function(){
        	//点击弹上传附件页面
            $(".linkupintro").click(function(){
            	
                $(".upintro").modal({
                });
               
                var time = setInterval(function(){
    				var path  = $("#licence").val();
    				$("#yingye").attr('src',path); 
   				},100);
    			var thumb = setInterval(function(){
    				var img = $("#sw").val();
    				$('#shuiwu').attr('src',img);
    			},100);
            });
            
            //点击图标关闭窗口
            $(".upintro .aclose").click(function(){
                $(".upintro").modal("hide");
            })
            
        })
    </script>
    <script type="text/javascript">
        $('#btn_send_sms').click(function () {
            var mobile = $('#mobile').val();
            send_reg_sms(mobile);
        });
		
		
    </script>
    <script type="text/javascript">
		//点击取消隐藏窗口并清空value值
             $(".register_off").click(function(){
             	$("#licence").attr('value','');
				$("#sw").attr('value','');
             	$(".upintro").modal("hide");
             })
        //点击确定隐藏窗口
            $(".register_close").click(function(){
//          	var path  = $("#licence").val();
//          	alert(path);
            	$(".upintro").modal("hide");
            	
            })
    </script>

</block>



