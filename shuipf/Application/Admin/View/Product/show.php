<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<style type="text/css">
.cu,.cu-li li,.cu-span span {cursor: hand;!important;cursor: pointer}
 .line_ff9966,.line_ff9966:hover td{
	background-color:#FF9966;
}
 .line_fbffe4,.line_fbffe4:hover td {
	background-color:#fbffe4;
}

</style>
<div class="wrap">

	<div class="h_a">金融服务&nbsp;>&nbsp;信用申请 >&nbsp;审核</div>
    <div class="table_list">
      <table width="100%">
        <colgroup>
        <col width="30%">
        <col width="70%">
        </colgroup>
        <thead>
          <tr>
            <td>栏目</td>
            <td>内容</td>
          </tr>
        </thead>
          <tr>
            <td>产品名称</td>
            <td>{$data.p_name}</td>
          </tr>
          <tr>
            <td>产地</td>
            <td>{$data.province}&nbsp;&nbsp;{$data.city}&nbsp;&nbsp;{$data.region}</td>
          </tr>
          <tr>
            <td>是否属于旅游产品</td>
            <td>
            	<if condition="$data['tourism'] eq 1">
            		{$data.type}
            	<else />
            		不是
            	</if>
            </td>
          </tr>
          <tr>
            <td>价格</td>
            <td>{$data.price}</td>
          </tr>
          <tr>
            <td>生产厂家</td>
            <td>{$data.manufacturer}</td>
          </tr>
          <tr>
            <td>联系方式</td>
            <td>{$data.phone}</td>
          </tr>
          <tr>
            <td>图片</td>
            <td></td>
          </tr>
          <tr>
            <td>产品描述</td>
            <td>{$data.p_describe}</td>
          </tr>
          
          <if condition="$data['status'] eq 0">
          	<tr>
	           <td style="text-align: right;"><button class="audit" value='1' style="display:inline-block;width: 100px;height: 30px;background: #21527A;color: #fff;line-height: 30px;text-align: center;">通过</button></td>
	           <td><button class="audit" style="display:inline-block;width: 100px;height: 30px;" value="2">不合格</button></td>
           	</tr>
          <elseif condition="$data['status'] eq 1"/>
          	<tr>
          		<td>审核结果</td>
          		<td>合格</td>
          	</tr>
          <else />
          	<tr>
          		<td>审核结果</td>
          		<td>不合格</td>
          	</tr>
          </if>
           
        
      </table>
     
    </div>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
$(function(){
	$('.audit').click(function(){
		var val = $(this).val();
		$.post("{:U('Admin/Product/audit')}",{id:"{$data.id}",val:val},function(data){
			if(data.status == 1 ){
				Wind.use("artDialog", function () {
					art.dialog({
						id: "succeed",
						icon: "succeed",
						fixed: true,
						lock: true,
						background: "#CCCCCC",
						opacity: 0,
						content: "成功",
						button:[
							{
								name: '确定',
								callback:function(){
									window.location.href = "{:U('Admin/Product/show',array('id'=>$data['id']))}";
									return true;
								},
								focus: true
							}
						]
					});
				});
			}
		},"json")
	})
	
})

</script>
</body>
</html>