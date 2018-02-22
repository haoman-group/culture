<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文化大数据库</title>
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/public-service.css" />
<link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap/css/bootstrap.min.css" />
<link href="{$config_siteurl}statics/cu/css/css/dsjk.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/css/table.css" />
<style>
  .sjkTb td,.sjkTb th{max-width: 90px;vertical-align: middle;}
  .sjkTb td{text-overflow: ellipsis;white-space: nowrap;overflow: hidden;}
</style>
</head>

<body>
<template file="Cudatabase/Common/_head"/>
<div class="all" style="width: 1190px;margin: 0 auto">
  <div class="ht1"> {$breadcrumb}</div>
  <div class="ht2"><img src="{$config_siteurl}statics/cu/images/images/sjk/weizhi-bg1.png" width="1350" height="50" /></div>
  <div>
    <dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
      <dt>市级：</dt>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_filter(array_merge($_REQUEST, array('area'=>''))))}" <if condition="empty($_GET['area'])">class='choose'</if>>全部</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'太原')))}" <if condition="$_GET['area'] eq '太原'">class='choose'</if>>太原市</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'阳泉')))}" <if condition="$_GET['area'] eq '阳泉'">class='choose'</if>>阳泉市</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'大同')))}" <if condition="$_GET['area'] eq '大同'">class='choose'</if>>大同市</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'忻州')))}" <if condition="$_GET['area'] eq '忻州'">class='choose'</if>>忻州市</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'朔州')))}" <if condition="$_GET['area'] eq '朔州'">class='choose'</if>>朔州市</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'吕梁')))}" <if condition="$_GET['area'] eq '吕梁'">class='choose'</if>>吕梁市</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'临汾')))}" <if condition="$_GET['area'] eq '临汾'">class='choose'</if>>临汾市</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'运城')))}" <if condition="$_GET['area'] eq '运城'">class='choose'</if>>运城市</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'晋城')))}" <if condition="$_GET['area'] eq '晋城'">class='choose'</if>>晋城市</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'长治')))}" <if condition="$_GET['area'] eq '长治'">class='choose'</if>>长治市</a></dd>
      <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('area'=>'晋中')))}" <if condition="$_GET['area'] eq '晋中'">class='choose'</if>>晋中市</a></dd>
    </dl>
    <if condition="$_GET['cid'] neq '114' and $_GET['cid'] neq '115' and $_GET['cid'] neq '116' and $_GET['cid'] neq '124' and $_GET['cid'] neq '125'">
      <!-- <dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
        <dt>级别：</dt>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_filter(array_merge($_REQUEST, array('level'=>''))))}" <if condition="empty($_GET['level'])">class='choose'</if>>全部</a></dd>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('level'=>'国家级')))}" <if condition="$_GET['level'] eq '国家级'">class='choose'</if>>国家级</a></dd>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('level'=>'省级')))}" <if condition="$_GET['level'] eq '省级'">class='choose'</if>>省级</a></dd>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('level'=>'市级')))}" <if condition="$_GET['level'] eq '市级'">class='choose'</if>>市级</a></dd>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('level'=>'县级')))}" <if condition="$_GET['level'] eq '县级'">class='choose'</if>>县级</a></dd>
      </dl> -->
    </if>
    <if condition="$_GET['cid'] eq '85' or $_GET['cid'] eq '86' or $_GET['cid'] eq '87' or $_GET['cid'] eq '88' or $_GET['cid'] eq '89' or $_GET['cid'] eq '90' or $_GET['cid'] eq '91' or $_GET['cid'] eq '92' or $_GET['cid'] eq '93' or $_GET['cid'] eq '94'">
      <dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
        <dt>年龄：</dt>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_filter(array_merge($_REQUEST, array('age_min'=>'', 'age_max'=>''))))}" <if condition="empty($_GET['age_min'])">class='choose'</if>>全部</a></dd>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('age_min'=>'1', 'age_max'=>'15')))}" <if condition="$_GET['age_min'] eq '0'">class='choose'</if>>15岁以下</a></dd>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('age_min'=>'16', 'age_max'=>'25')))}" <if condition="$_GET['age_min'] eq '16'">class='choose'</if>>16岁至25岁</a></dd>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('age_min'=>'26', 'age_max'=>'35')))}" <if condition="$_GET['age_min'] eq '26'">class='choose'</if>>26岁至35岁</a></dd>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('age_min'=>'36', 'age_max'=>'45')))}" <if condition="$_GET['age_min'] eq '36'">class='choose'</if>>36岁至45岁</a></dd>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('age_min'=>'46', 'age_max'=>'55')))}" <if condition="$_GET['age_min'] eq '46'">class='choose'</if>>46岁至55岁</a></dd>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array('age_min'=>'56', 'age_max'=>'150')))}" <if condition="$_GET['age_min'] eq '56'">class='choose'</if>>56岁以上</a></dd>
      </dl>
    </if>
    <volist name="recommends" id="recommend">
      <dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
        <assign name="recommend_key" value="$key"/>
        <dt><?php echo $recommendsMap[$key]["name"]?>：</dt>
        <dd><a href="{:U('Cudatabase/Immaterial/lists', array_filter(array_merge($_REQUEST, array($key=>''))))}" <if condition="empty($_GET[$key])">class='choose'</if>>全部</a></dd>
        <volist name="recommend" id="recommend_item">
          <dd>
            <a href="{:U('Cudatabase/Immaterial/lists', array_merge($_REQUEST, array($recommend_key=>$recommend_item)))}" <if condition="$_GET[$recommend_key] eq $recommend_item">class='choose'</if>>{$recommend_item}</a>
          </dd>
        </volist>
      </dl>
      <div class="clr"></div>
    </volist>
  </div>
    <!-- 代表性项目及代表性传承人 代表性项目 -->
    <if condition="($_GET['cid'] eq 85) or ($_GET['cid'] eq 86 ) or ($_GET['cid'] eq 87 ) or ($_GET['cid'] eq 88 )or ($_GET['cid'] eq 89 )
     or ($_GET['cid'] eq 90 ) or ($_GET['cid'] eq 91 )  or ($_GET['cid'] eq 92 )  or ($_GET['cid'] eq 93 )  or ($_GET['cid'] eq 94 )
    ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
      	<thead>
      		<th>序号</th>
      		<th>类目</th>
      		<th>所属地区</th>
      		<th>省级批次</th>
      		<th>国家级批次</th>
      		<th>项目名称</th>
      		
      		<th>下载</th>
      		<th>查看</th>
      		<th>分享</th>
      	</thead>
      	<tbody>
          <volist name="lists" id="vo">
      		<tr>
      			<td style="text-align:center">{$vo.id}</td>
            <td style="text-align:center">{$vo.cate_name}</td>
            <td style="text-align:center">{$vo.area_display}</td>
            <td style="text-align:center">{$vo.level}</td>
            <td style="text-align:center">{$vo['national_level']}</td>
            <td style="text-align:center">{$vo.re_projectname}</td>
            <!--<td style="text-align:center">{$vo.re_itemnum}</td>
            <td style="text-align:center">{$vo.re_unit}</td>
            <td style="text-align:center">{$vo.re_directorytime}</td>
            <td style="text-align:center">{$vo.re_batch}</td>
            <td style="text-align:center">{$vo.re_protectunit}</td>-->
      			<td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/download.png"/></a></td>
      			<td><a href="{:U('show',array('id'=>$vo['id']))}"><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/file.png"/></a></td>
      			<td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/share.png"></a></td>
      		</tr>
        </volist>
      	</tbody>
      </table>
      <div class="page">{$pageinfo.page}</div>
    </div>
  </if>

  <if condition="$_GET['cid'] eq 233 or $_GET['cid'] eq 234 or $_GET['cid'] eq 235 or $_GET['cid'] eq 236 or $_GET['cid'] eq 237 or $_GET['cid'] eq 238  or $_GET['cid'] eq 239 or $_GET['cid'] eq 240
  or $_GET['cid'] eq 242  or $_GET['cid'] eq 243  or $_GET['cid'] eq 244  or $_GET['cid'] eq 245  or $_GET['cid'] eq 248 ">
   <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead>
          <th>序号</th>
          <th>类目</th>
          <th>所属地区</th>
          <th>项目名称</th> 
          <th>下载</th>
          <th>查看</th>
          <th>分享</th>
        </thead>
        <tbody>
          <volist name="lists" id="vo">
          <tr>
            <td style="text-align:center">{$vo.id}</td>
            <td style="text-align:center">{$vo.cate_name}</td>
            <td style="text-align:center">{$vo.area_display}</td>
            <!-- <td style="text-align:center">{$vo.level}</td>
            <td style="text-align:center">{$vo.ba_name}</td>
            <td style="text-align:center">{$vo.ba_introduction}</td> -->
            <td style="text-align:center">{$vo.re_projectname}</td>
            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/download.png"/></a></td>
            <td><a href="{:U('show',array('id'=>$vo['id']))}"><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/file.png"/></a></td>
            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/share.png"></a></td>
          </tr>
        </volist>
        </tbody>
      </table>
      <div class="page">{$pageinfo.page}</div>
    </div>
</div>
</if>
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
