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
        <li class="current"><a href="{:U('commentlists')}" >金融代理</a></li>
        
  </ul>
</div>
  <div class="h_a">搜索</div>
  <form name="searchform" action="{:U("Content/Content/public_relationlist")}" method="post">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">
        <select class="select_2" name="searchtype" style="width:70px;">
          <option value='title' <if condition=" $_GET['field']=='title' ">selected</if>>标题</option>
          <option value='keywords' <if condition=" $_GET['field']=='keywords' ">selected</if> >关键字</option>
          <option value='description' <if condition=" $_GET['field']=='description' ">selected</if>>描述</option>
          <option value='id' <if condition=" $_GET['field']=='id' ">selected</if>>ID</option>
        </select>
        {$Formcategory}
        关键字：
        <input type="text" class="input length_2" name="keywords" style="width:200px;" value="{$Think.get.keywords}" placeholder="请输入关键字...">
        <button class="btn">搜索</button>
        </span>
      </div>
    </div>
  </form>
    <div class="table_list">
      <table width="100%">
        <colgroup>
        <col width="40">
        <col width="">
        <col width="80">
        <col width="200">
        <col width="140">
        </colgroup>
        <thead>
          <tr>
            <td>ID</td>
            <td>项目名称</td>
            <td>融资金额</td>
            <td>合作方式</td>
            <td>类型</td>
            <td align="center">投资年限(年)</td>
            <td align="center"><span>发布时间</span></td>
            <td>操作</td>
          </tr>
        </thead>
        <volist name="data" id="vo">
          <!--<tr onClick="select_list(this,'{$vo.title}',{:getCategory($vo['catid'],'modelid')},{$vo.id})"  class="cu" title="点击选择">-->
            <td>{$vo.id}</td>
            <td ><a href="javascript:;"><span style="" >
              <if condition=" $vo['status']!=0 ">{$vo.pname}
                <else/>
                <font color="#FF0000">[未审核]</font> - {$vo.pname}</if>
              </span></a>
            </td>
            
            <td>{$vo.money}万</td>
            <td>{$vo.imethod}</td>
            <td> <if condition='$vo["type"]==1'>公司<else />个人</if></td>
            <td align="center">{$vo.term}</td>
            <td align="center">{$vo.inputtime|date="Y-m-d",###}</td>
            <td>
            	<a href="{:U('Admin/Finance/agent_show',array('id'=>$vo['id']))}">查看</a>
                <a href="{:U('Admin/Finance/agent_delete',array('id'=>$vo['id']))}">删除</a>
            	<if condition = "$vo['status'] == 0">
            		<a href="{:U('Admin/Finance/agent_show',array('id'=>$vo['id']))}">审核</a>
            	<else/>
            		已审核
            	</if>
            	
            </td>
          </tr>
        </volist>
      </table>
      <div class="p10"><div class="pages"> {$Page} </div> </div>
    </div>
</div>
<script>
function select_list(obj, title,modelid, id) {
    var relation_ids = window.top.$('#relation').val();
    var sid = 'v'+modelid+ '_' + id;
    if ($(obj).attr('class') == 'line_ff9966' || $(obj).attr('class') == null) {
        $(obj).attr('class', 'line_fbffe4');
        window.top.$('#' + sid).remove();
        if (relation_ids != '') {
            var r_arr = relation_ids.split('|');
            var newrelation_ids = '';
            $.each(r_arr, function (i, n) {
                if (n != id) {
                    if (i == 0) {
                        newrelation_ids = n;
                    } else {
                        newrelation_ids = newrelation_ids + '|' + n;
                    }
                }
            });
            window.top.$('#relation').val(newrelation_ids);
        }
    } else {
        $(obj).attr('class', 'line_ff9966');
        var str = "<li id='" + sid + "'>·<span>" + title + "</span><a href='javascript:;' class='close' onclick=\"remove_relation('" + sid + "'," + id + ")\"></a></li>";
        window.top.$('#relation_text').append(str);
        if (relation_ids == '') {
            window.top.$('#relation').val(id);
        } else {
            relation_ids = relation_ids + '|' + modelid+','+id;
            window.top.$('#relation').val(relation_ids);
        }
    }
}

</script>
</body>
</html>