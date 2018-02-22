<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文化大数据库</title>
<template file="Cudatabase/Common/_cssjs"/>
<style>
  .sjkTb td,.sjkTb th{max-width: 120px;vertical-align: middle;}
  .sjkTb td{text-overflow: ellipsis;white-space: nowrap;overflow: hidden;}
</style>
</head>

<body>
<template file="Cudatabase/Common/_head"/>
<div class="all">
  <div class="ht1"> {$breadcrumb}</div>
  <!--<div class="ht2"><img src="{$config_siteurl}statics/cu/images/images/sjk/weizhi-bg1.png" width="1350" height="50" /></div>-->
	<div>
		<!--<dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
			<dt>市级：</dt>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_filter(array_merge($_REQUEST, array('area'=>''))))}" <if condition="empty($_GET['area'])">class='choose'</if>>全部</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'太原')))}" <if condition="$_GET['area'] eq '太原'">class='choose'</if>>太原市</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'阳泉')))}" <if condition="$_GET['area'] eq '阳泉'">class='choose'</if>>阳泉市</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'大同')))}" <if condition="$_GET['area'] eq '大同'">class='choose'</if>>大同市</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'忻州')))}" <if condition="$_GET['area'] eq '忻州'">class='choose'</if>>忻州市</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'朔州')))}" <if condition="$_GET['area'] eq '朔州'">class='choose'</if>>朔州市</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'吕梁')))}" <if condition="$_GET['area'] eq '吕梁'">class='choose'</if>>吕梁市</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'临汾')))}" <if condition="$_GET['area'] eq '临汾'">class='choose'</if>>临汾市</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'运城')))}" <if condition="$_GET['area'] eq '运城'">class='choose'</if>>运城市</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'晋城')))}" <if condition="$_GET['area'] eq '晋城'">class='choose'</if>>晋城市</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'长治')))}" <if condition="$_GET['area'] eq '长治'">class='choose'</if>>长治市</a></dd>
			<dd><a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array('area'=>'晋中')))}" <if condition="$_GET['area'] eq '晋中'">class='choose'</if>>晋中市</a></dd>
		</dl>-->
		<!--<volist name="recommends" id="recommend">
			<dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
				<assign name="recommend_key" value="$key"/>
				<dt><?php echo $recommendsMap[$key]['name']?>：</dt>
				<dd><a href="{:U('Cudatabase/Policy/lists', array_filter(array_merge($_REQUEST, array($key=>''))))}" <if condition="empty($_GET[$key])">class='choose'</if>>全部</a></dd>
				<volist name="recommend" id="recommend_item">
					<dd>
						<a href="{:U('Cudatabase/Policy/lists', array_merge($_REQUEST, array($recommend_key=>$recommend_item)))}" <if condition="$_GET[$recommend_key] eq $recommend_item">class='choose'</if>>{$recommend_item}</a>
					</dd>
				</volist>
			</dl>
			<div class="clr"></div>
		</volist>-->
	</div>
    
    <div class="search-content-tab"> 
    	<!--<img src="images/sjk/list-001.png" width="1350" height="502" usemap="#Map" border="0" />
      <map name="Map" id="Map">
        <area shape="rect" coords="1171,64,1196,90" href="dsjk-content.html" />
      </map>-->
      <table class="table sjkTb">
      	<thead>
      		<th>序号</th>
      		<th>名称</th>
      		<th>文号</th>
      		<th>类别</th>
      		<th>发布机构</th>
      		<th>发文日期</th>
      		<th>主题词</th>
      		<th>下载</th>
      		<th>查看</th>
      		<th>分享</th>
      	</thead>
      	<tbody>
		  <volist name='lists' id='vo'>
      		<tr>
      			<td>{$vo.id}</td>
      			<td>{$vo.publish_name}</td>
      			<td>{$vo.publish_order}</td>
      			<td>{$vo.cate_name}</td>
      			<td>{$vo.publish_agency}</td>
      			<td>{$vo.publish_date}</td>
      			<td>{$vo.publish_topword}</td>
      			<td><a><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/download.png"/></a></td>
      			<td><a href="{:U('show',array('id'=>$vo['id']))}"><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/file.png"/></a></td>
      			<td><a><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/share.png"></a></td>
      		</tr>
		</volist>
      	</tbody>
      </table>
      <!--<div><img src="{$config_siteurl}statics/cu/images/images/sjk/fenye.png" class="pull-right"></div>-->
	  <div class="page">{$pageinfo.page}</div>
    </div>
</div>
<div class="clr"></div>
<template file="Cudatabase/Common/_foot"/>
<script type="text/javascript">
    $(function(){
        var str = $(".sjkTb").find("td").text().substr(0,36) + '...';
        $.each($(".sjkTb").find("td"),function(i,v){
            var str = $(this).text().length>35 ? $(this).text().substr(0,35) + '...' : $(this).text();            
            if($(v).children().length == 0){
                $(v).text(str);
            }
        })
    })
</script>
</body>
</html>
