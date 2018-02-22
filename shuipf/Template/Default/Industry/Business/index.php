<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <style>
        .industry .industry-left .shengming{border: 2px solid #f2f2f2;margin-top: 22px}
        .industry .industry-left .shengming p{text-indent: 2em;padding:0 13px;font-size: 14px;color: #696b76;line-height: 24px}
        #content .industry .industry-left h2{top:0;left: -1px}
        .industry-right form span{color: red;}
        /*.industry-right form input{width: 320px;}*/
    </style>
</block>
<block name="content">
	<!--头部导航-->
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{$config_siteurl}" class="home_src">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="{:getCategory(16,'url')}">消费服务</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="{:U('Industry/Consume/consume')}">商家联盟</a>
				</li>
				<li><span>></span></li>
                <li style="color: #2058c2;">我要加入</li>
			</ul>
			<!--<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" />
				<input type="submit" value="搜索" />
			</form>-->
		</div>
	</div>
	<div id="content">
    <div class="container industry clearfix">
        <div class="industry-left" style="border:none">
            <h2 style="width: 260px;"></h2>
            <ul style="border: 2px solid #f2f2f2;">
                <li><a href="javascript:;"><span>●</span>我要加入</a></li>
            </ul>

            <div class= 'shengming' style="">
                <h3 style="padding: 10px 13px;border-bottom: 2px solid #2058c2;line-height: 44px;font-size: 24px;color: #2058c2;text-align: center;margin: 10px">免责声明</h3>
                <p style="margin-top: 10px">1、本平台所展示的各类形式（包括但不仅限于文字、图片、图表）的商家仅供参考使用，仅代表联盟方的观点，并不代表本平台同意其说法或描述，与本网站立场无关，也不构成任何建议。</p>
                <p style="">2、本平台不保证信息的额合理性、准确性和完整性，且不对信息的不合理、不准确或遗漏导致损失和损伤承担责任。</p>
                <p style="">3、不做交易和服务的根据，如自行使用本平台资料发生偏差，本平台均不承担任何责任。对于用户根据本平台提供的信息所做出的一切行为，本平台亦不承担任何形式的责任。</p>
                <p style="">以上声明的内容最终解释权归山西省文化创意产业联盟商家平台所有。</p>
                <p style="margin-bottom: 10px">特此声明！</p>
            </div>
        </div>
        
        <div class="industry-right">
            <h5><span>我要加入</span></h5>
            <form method="post" enctype="multipart/form-data" action="{:U('Industry/Business/do_business_alliance')}">
            <dl class="clearfix">

                <dt>企业名称：</dt><dd><input type="text" value="" placeholder="" name="name"><span style="color: #e60000;">&nbsp;&nbsp;&nbsp;*</span></dd>
                <dt>企业所在地：</dt>
                        <dd class="ddarea">
                            <select id="area" class="LinkageSel" name="area[]"></select>
                            <input type="hidden" name="city" class="area" value=""/>
                            <span style="color: #e60000;">&nbsp;&nbsp;*</span>
                        </dd>
                <dt>注册资本：</dt><dd><input type="text" value="" placeholder="" name="registered"><span style="color: #e60000;">&nbsp;&nbsp;&nbsp;*</span></dd> 
                <dt>企业地址：</dt><dd><input type="text" value="" placeholder="" name="adress"></dd>
                
                <dt>法人代表：</dt><dd><input type="text" value="" placeholder="" name="legal_person"><span style="color: #e60000;">&nbsp;&nbsp;&nbsp;*</span></dd>
                <dt>联系人：</dt><dd><input type="text" value="" placeholder="" name="linkman"><span style="color: #e60000;">&nbsp;&nbsp;&nbsp;*</span></dd>
                <dt>联系电话：</dt><dd><input type="text" value="" placeholder="" name="telephone"><span style="color: #e60000;">&nbsp;&nbsp;&nbsp;*</span></dd>
                <dt>联系人邮箱：</dt><dd><input type="text" value="" placeholder="" name="email"><span style="color: #e60000;">&nbsp;&nbsp;&nbsp;*</span></dd>
                <dt>年营业额：</dt><dd><input type="text" value="" placeholder="" name="turnover"><span style="color: #e60000;">&nbsp;&nbsp;&nbsp;*</span></dd>
<!--=======
                <dt>企业名称：</dt><dd><input type="text" value="" placeholder="" name="name"><span>*(必填)</span></dd>
                <dt>企业所在地：</dt>
                        <dd class="ddarea">
                            <select id="area" class="LinkageSel" name="area[]"></select>
                            <input type="hidden" name="city" class="area" value=""/><span>*</span>
                        </dd>
                <dt>注册资本：</dt><dd><input type="text" value="" placeholder="" name="registered"><span>*</span></dd>
                <dt>企业详细地址：</dt><dd><input type="text" value="" placeholder="" name="adress"><span>*</span></dd>
                
                <dt>法人代表：</dt><dd><input type="text" value="" placeholder="" name="legal_person"><span>*</span></dd>
                <dt>联系人：</dt><dd><input type="text" value="" placeholder="" name="linkman"><span>*</span></dd>
                <dt>联系电话：</dt><dd><input type="text" value="" placeholder="" name="telephone"><span>*</span></dd>
                <dt>联系人邮箱：</dt><dd><input type="text" value="" placeholder="" name="email"><span>*</span></dd>
                <dt>年营业额：</dt><dd><input type="text" value="" placeholder="" name="turnover"><span>*</span></dd>
>>>>>>> 2dde6e4bad5e6d2738663beb4f330c8c41096f08-->
                <dt>公司注册类型：</dt><dd>
                    <select name="company_type"><span>*</span>
                        <option value="请选择">请选择</option>
                        <option value="国有">国有</option>
                        <option value="民营">民营</option>
                        <option value="混合">混合</option>
                        <option value="其他">其他</option>
                    </select>
                    <span style="color: #e60000;">&nbsp;&nbsp;*</span>
                </dd>
                <dt>所属行业：</dt>
                <dd>
                	<select name="industry"><span>*</span>
                		<option value="请选择">请选择</option>
                		<option value="新闻出版发行服务">新闻出版发行服务</option>
                		<option value="广播电视电影服务">广播电视电影服务</option>
                		<option value="文化艺术服务">文化艺术服务</option>
                		<option value="文化信息传输服务">文化信息传输服务</option>
                		<option value="文化创意和设计服务">文化创意和设计服务</option>
                		<option value="文化休闲娱乐服务">文化休闲娱乐服务</option>
                		<option value="工艺美术品的生产">工艺美术品的生产</option>
                        <option value="文化产品生产的辅助生产">文化产品生产的辅助生产</option>
                        <option value="文化产品的生产">文化产品的生产</option>
                        <option value="文化专用设备服务">文化专用设备服务</option>
                	</select>
                	
                		
                </dd>
                <!--<dt>所属行业：</dt><dd><input type="text" value="" name="industry"></dd>-->
                <dt>企业商标：
                	<dd>
                		
                			<input type="file"  name="photo" id="_f">
                				
 					</dd>

 				</dt>
 					<dt>经营范围：</dt><dd><textarea id="" cols="30" rows="5" placeholder="" name="range"></textarea><span style="color: #e60000;">&nbsp;&nbsp;&nbsp;*</span></dd>
                	<dt>产品介绍：</dt><dd><textarea  id="" cols="30" rows="5" placeholder="" name="introduce"></textarea><span style="color: #e60000;">&nbsp;&nbsp;&nbsp;*</span></dd>
                    <dt>企业概况：</dt><dd><textarea  id="" cols="30" rows="5" placeholder="" name="company_content"></textarea><span style="color: #e60000;">&nbsp;&nbsp;&nbsp;*</span></dd>
                    <dt>展示页面：</dt>
                    <dd>
                    <td class="proaddeditorbox">
                        <script type="text/javascript">
                            var GV = {
                             DIMAUB: "{$config_siteurl}",
                             JS_ROOT: "{$config_siteurl}statics/js/"
                        };
                         </script>
                         <script id="editor_product" type="text/javascript" name="survey" style="width: 370px;height: 300px;"></script>
                <?php echo \Form::editor("editor_product"); ?>
            </td>                    
                    </dd>

 				       

          
 				
 				
                <div>
                <input  type="submit" name="" id="" value="确定" class="btn" style="background: #fff;border: 1px solid #6b6b6b;line-height: 21px;font-size: 14px;margin-left: 600px;padding: 0 20px;border-radius: 0;margin-bottom: 95px;" />
              	<!--<a href="" style="display: block;width: 71px;height: 22px;border: 1px solid #6b6b6b;line-height: 22px;text-align: center;float: right;">取消</a>-->
              	<input style="float: right;width: 72px;height: 23px;border: 1px solid #6b6b6b;background: white;font-size: 14px;" type="button" name="" id="btn_quxiao" value="取消" />
              	</div>
            </dl>
            </form>
        </div>
    </div>
</div>

<!--<script>
    function openurl(){
         var radios=document.getElementsByName("judge");
         
         for(var i=0;i<radios.length;i++){
              if(radios[i].checked){
                var n=radios[i].value;
                
                if(n==1){
                    window.location.href="system-yes-personal.html"
                }
                else if(n==0){
                    location.href="detail-personal.html"
                }
              }
         }
    }
</script>-->
</block>
<block name="after_scripts">
<script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/comm.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/linkagesel.js"></script>
 <script>

        var opts = {
            ajax: "/index.php?g=Api&m=Area&a=ajax",
            selStyle: 'margin-left: 6px;',
            select:  '#area',
            head: '请选择',
            defVal: [4,84,],
            selName:'area[]',
            level: 3,
        };
        var linkageSel = new LinkageSel(opts);

        linkageSel.onChange(function() {
            var selected = linkageSel.getSelectedArr();
            $(".area").val(selected.toString());
        });
        $('#btn_quxiao').click(function(){
//      	alert(1);
        	window.location="{:U('Industry/Consume/consume')}";
        })
    </script>
</block>
