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
<div class="nav">
    <ul class="cc">
        <li class="current"><a href="javascript:history.back()" >返回</a></li>
        
  </ul>
</div>
	<div class="h_a">金融服务&nbsp;>&nbsp;信用申请 >&nbsp;审核</div>
    <div class="table_list">
      <table width="100%">
        <colgroup>
        <col width="70">
        <col width="140">
        </colgroup>
        <thead>
          <tr>
            <td>栏目</td>
            <td>内容</td>
          </tr>
        </thead>
        	<tr>
            <td>公司名称</td>
            <td>{$data.cname}</td>
          </tr>
          <tr>
            <td>项目名称</td>
            <td>{$data.pname}</td>
          </tr>
          <tr>
            <td>类型</td>
            <td><if condition='$vo["type"]==1'>公司<else />个人</if></td>
          </tr>
          <tr>
            <td>项目类别</td>
            <td>{$data.categoryname}</td>
          </tr>
          <tr>
            <td>融资金额	</td>
            <td>{$data.money}</td>
          </tr>
          <tr>
            <td>融资方式</td>
            <td>{$data.imethod}</td>
          </tr>
          <tr>
            <td>用途</td>
            <td>{$data.purpose}</td>
          </tr>
          <tr>
          	<td>收益</td>
          	<td>{$data.profit}</td>
          </tr>
          <tr>
          	<td>投资年限</td>
          	<td>{$data.term}</td>
          </tr>
         
          <if condition="$data['agent_status'] eq 0">
          	<tr>
	           <td style="text-align: right;"><button class="audit" value='1' style="display:inline-block;width: 100px;height: 30px;background: #21527A;color: #fff;line-height: 30px;text-align: center;">通过</button></td>
	           <td><button class="audit" style="display:inline-block;width: 100px;height: 30px;" value="2">不合格</button></td>
           	</tr>
          <elseif condition="$data['agent_status'] eq 1"/>
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
		$.post("{:U('Admin/Finance/agent_audit')}",{id:"{$data.id}",val:val},function(data){
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
                  // window.parent.location.reload();
                  
									window.location.href = "{:U('Admin/Finance/agent')}";
									return true;
								},
								focus: true
							}
						]
					});
				});
			}
		},"json");

    

	})
	
})

</script>
</body>
</html>