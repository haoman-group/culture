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
            <td>{$data.company_name}</td>
          </tr>
          <tr>
            <td>法人代表</td>
            <td>{$data.representative_name}</td>
          </tr>
          <tr>
            <td>电话</td>
            <td>{$data.tel}</td>
          </tr>
          <tr>
            <td>营业执照</td>
            <td>{$data.licence}</td>
          </tr>
          <tr>
            <td>税务登记</td>
            <td>{$data.tax}</td>
          </tr>
          <tr>
            <td>公司人数</td>
            <td>{$data.workers_num}</td>
          </tr>
          <tr>
            <td>是否缴纳社会保障	</td>
            <td><if condition="$data['is_assurance'] eq 1">是<else/>否</if></td>
          </tr>
          <tr>
            <td>上年度缴纳社保人数</td>
            <td>{$data.prev_assurance_num}</td>
          </tr>
          <tr>
            <td>上年度电费</td>
            <td>{$data.prev_electric_fee}</td>
          </tr>
          <tr>
            <td>上年度产值</td>
            <td>{$data.prev_output_value}</td>
          </tr>
          <tr>
            <td>上年度销售总额</td>
            <td>{$data.prev_sales}</td>
          </tr>
          <tr>
            <td>上年度纳税</td>
            <td>{$data.prev_tax}</td>
          </tr>
          <tr>
            <td>上年度总资产</td>
            <td>{$data.prev_assets}</td>
          </tr>
          <tr>
            <td>上年度可抵押资产</td>
            <td>{$data.prev_mortgage}</td>
          </tr>
          <tr>
            <td>上年度负债率</td>
            <td>{$data.prev_debt_ratio}</td>
          </tr>
           <tr>
            <td style="text-align: right;"><button class="audit" value='1' style="display:inline-block;width: 100px;height: 30px;background: #21527A;color: #fff;line-height: 30px;text-align: center;">通过</button></td>
            <td><button class="audit" style="display:inline-block;width: 100px;height: 30px;" value="2">不合格</button></td>
           
          </tr>
        
      </table>
     
    </div>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
$(function(){
	$('.audit').click(function(){
		var val = $(this).val();
		$.post("{:U('Industry/Finance/audit')}",{id:"{$data.id}",val:val},function(data){
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
									window.location.href = "{:U('Industry/Finance/show')}";
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