<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/js/layer/skin/default/layer.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/list_consume_message.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/show_buy.css" />
	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.validate.js"></script>
	<script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/comm.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/linkagesel.js"></script>

	<script>
		(function($){
			$.fn.serializeJson=function(){
				var serializeObj={};
				$(this.serializeArray()).each(function(){
					serializeObj[this.name]=this.value;
				});
				return serializeObj;
			};
		})(jQuery);
	</script>
</head>
<body>
<div class="readdress">
	<form method="post" onsubmit="return false"  class="address_forms" id="form_useraddr">
		<h2 class="new_box_add"><strong>新增收货地址</strong> 电话号码、手机号选填一项，其余均为必填项</h2>
		<!--            <empty name="Think.get.id">-->
		<!--                <input type='hidden' value='addAddr' name='a'>-->
		<!--                <else/>-->
		<!--                <input type='hidden' value='editAddr' name='a'>-->
		<!--            </empty>-->
		<input type="text" name="id" value="{$Think.get.id}" hidden/>

		<dl class="news_box">
			<dt><i>*</i>所在地区</dt>
			<dd class="areas">
				<select id="area"></select>
				<input type="hidden" name="area" class="area" value="{$addr.area}"/>
			</dd>
			<dt><i>*</i>详细地址</dt>
			<dd>
				<textarea class="detailed" type="text" name="address" value="{$addr.address}" placeholder="例如接到名称，门牌号码，楼层和房间号等信息">{$addr.address}</textarea>
			</dd>
			<dt><i>*</i>邮政编码</dt>
			<dd><input type="text" name="postcode" value="{$addr.postcode}" placeholder="如您不清楚邮递区号，请填写030000"/></dd>
			<dt><i>*</i>收货人姓名</dt>
			<dd><input type="text" name="name" value="{$addr.name}" placeholder="长度不超过25个字符"/></dd>
			<dt><i>*</i>手机号码</dt>
			<dd><input type="text" name="phone" value="{$addr.phone}" /></dd>
			<dt>电子邮箱</dt>
			<dd><input type="text" name="email" value="{$addr.email}" /></dd>
			<dt>&nbsp;</dt>
			<!-- <dd class="default"><input type="checkbox" name="default" id="default" value="1" <if condition="$addr.default == 1">checked</if> /><label for="default">设为默认收货地址</label></dd> -->
			<dd><input type="submit" value="保存" class="preservation"  disables='true'/>
				<input type="button" class="btncancel" value="取消" >
			</dd>
		</dl>
	</form>
</div>
<script>
	var lock = false;
	var fnparent = "{$fnparent}";

	var opts = {
		ajax: "/index.php?g=Api&m=Area&a=ajax",
		selStyle: 'margin-left: 6px;',
		select:  '#area',
		head: '请选择',
		defVal: [<?php echo $addr['area'] ?>],
		selName:'area[]',
		level: 3,
	};
	var linkageSel = new LinkageSel(opts);

	linkageSel.onChange(function() {
		var selected = linkageSel.getSelectedArr();
		$(".area").val(selected.toString());
	});

	$(function(){
		$("#form_useraddr").validate({
			errorElement : "i",
			onkeyup : false,
			ignore : "",
			submitHandler : function(form){
				if (lock) {return;}
				lock = true;
				$(form).attr("action","{:U("Api/Buyeraddr/add")}");
				var addrid = $("[name='id']").val();
				$(form).ajaxSubmit({
					"dataType": "json",
					"success":function(res){
						if(res.status === 1){
							if(self != top){
								parent.layer.msg((addrid===""?"添加":"修改")+"成功!");
								if(fnparent){
									var objaddr = $(form).serializeJson();
									objaddr["province"]= $("select").eq(0).find("option:selected").text();
									objaddr["city"]= $("select").eq(1).find("option:selected").text();
									objaddr["block"]= $("select").eq(2).find("option:selected").text();
									objaddr["newid"] = res.data;
									top.freshaddr(objaddr);
									top.layer.closeAll();

								}
								else{
									setTimeout(function(){top.location.reload()},1000);
								}

							}
							else{
								alert( (addrid===""?"添加":"修改")+ "成功!");
							}
						}
						else{
							alert(res.msg);
						}

					},
					"error":function(res){

					}
				});

			},
			rules : {

				address:{
					required:true
				},
				name:{
					required:true
				},
				phone:{
					required:true,
					chkallphone:true

				},
				email:{
					chkemails:true
				}

			},
			messages : {

				address:{
					required:"必填"
				},
				name:{
					required:"必填"
				},
				phone:{
					required:"必填",
					chkallphone : "手机号码不正确"
				},
				email:{
					chkemails:"请输入正确邮箱"
				}
			}
		});

		jQuery.validator.addMethod("chkallphone", function(value, element) {
			return /^(1[3|4|5|8|7|9][0-9]\d{8})|(0\d{2,3}-\d{5,9}|0\d{2,3}-\d{5,9})$/.test(value);
		});

		jQuery.validator.addMethod("chkemails",function(value,element){
			return /^([\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?)?$/.test(value);
		});
		jQuery.validator.addMethod("postcode", function(value, element){
			return /^[1-9]\d{5}(?!\d)$/.test(value);
		});



		$(".btncancel").click(function(){
			parent.layer.closeAll();
		});
	});

</script>
</body>
</html>