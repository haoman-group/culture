<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name = "after_styles">
	
</block>
<block name='content'>
	<div id="nav">
    <div class="container">
        <ul>
            <li><a href="{$config_siteurl}" class="home_src">首页</a></li>
            <li><span>></span></li>
            <li><a href="{:U('Content/Industry/index')}">产业项目</a></li>
            <li><span>></span></li>
            <li><a href="javascript:;" style="color: #2058c2;">发布系统</a></li>
        </ul>
    </div>
</div>
<div id="content">
    <div class="container industry clearfix">
        <div class="industry-left">
            <h2><img src="{$Config_siteurl}statics/images/industry.png" alt="个人中心"></h2>
            <ul>
                <li><a href="#"><span>●</span>发布系统</a></li>
            </ul>
        </div>
        <div class="industry-right">
            <h5><span>发布系统</span><i>（请填写项目投融资信息）</i></h5>
            <dl class="clearfix">
            	<form method="post">
	                <dt>项目融资总额：</dt><dd><input type="text" value="" name="money"/><i>(万元)</i></dd>
	                <dt>融资合作方式：</dt>
	                <dd>
	                    <select name="imethod" id="" >
	                        <option value="">请选择</option>
	                        <option value="银行贷款">银行贷款</option>
	                        <option value="融资">融资</option>
	                        <option value="物权转让">物权转让</option>
	                        <option value="其他">其他</option>
	                    </select>
	                </dd>
	                <dt>融资资金用途：</dt><dd><textarea name="purpose" id="" cols="30" rows="10" ></textarea></dd>
	                <dt>资金收益预测：</dt><dd><textarea name="profit" id="" cols="30" rows="10" ></textarea></dd>
	                <dt>投资年限：</dt><dd><input type="text" value="" name = "term"></dd>
	                <input type="hidden" name="uid" id="uid" value="{$uid}" />
	                <input type="hidden" name="objid" id="uid" value="{$_GET['oid']}" />
                </form>
                <dd class="btn"><a href="javascript:;" class="submit">确定</a><a href="javascript:;">取消</a></dd>
            </dl>
        </div>
    </div>
</div>	
</block>
<block name = "after_scripts">
	<block name="after_scripts">
		<script type="text/javascript">

			$(function(){
				$(".btn .submit").click(function(){
					var data = $('form').serialize();
					$.post("{:U('Content/Finance/industry_agent')}",data,function(data){
						
							alert('添加成功');

							window.location.href='{:U("Content/industry/detail")}&id='+data.id;
						
					},"json")
				})
			})

		</script>

	</block>
	
</block>
