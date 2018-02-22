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
<div class="all">
  <div class="ht1"> {$breadcrumb}</div>
  <div class="ht2"><img src="{$config_siteurl}statics/cu/images/images/sjk/weizhi-bg1.png" width="1350" height="50" /></div>
  <div>
    <dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
      <dt>市级：</dt>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_filter(array_merge($_REQUEST, array('area'=>''))))}" <if condition="empty($_GET['area'])">class='choose'</if>>全部</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'太原')))}" <if condition="$_GET['area'] eq '太原'">class='choose'</if>>太原市</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'阳泉')))}" <if condition="$_GET['area'] eq '阳泉'">class='choose'</if>>阳泉市</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'大同')))}" <if condition="$_GET['area'] eq '大同'">class='choose'</if>>大同市</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'忻州')))}" <if condition="$_GET['area'] eq '忻州'">class='choose'</if>>忻州市</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'朔州')))}" <if condition="$_GET['area'] eq '朔州'">class='choose'</if>>朔州市</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'吕梁')))}" <if condition="$_GET['area'] eq '吕梁'">class='choose'</if>>吕梁市</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'临汾')))}" <if condition="$_GET['area'] eq '临汾'">class='choose'</if>>临汾市</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'运城')))}" <if condition="$_GET['area'] eq '运城'">class='choose'</if>>运城市</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'晋城')))}" <if condition="$_GET['area'] eq '晋城'">class='choose'</if>>晋城市</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'长治')))}" <if condition="$_GET['area'] eq '长治'">class='choose'</if>>长治市</a></dd>
      <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('area'=>'晋中')))}" <if condition="$_GET['area'] eq '晋中'">class='choose'</if>>晋中市</a></dd>
    </dl>
    <if condition="$_GET['cid'] eq '162' or $_GET['cid'] eq '163' ">
      <dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
        <dt>级别：</dt>
        <dd><a href="{:U('Cudatabase/Industry/lists', array_filter(array_merge($_REQUEST, array('level'=>''))))}" <if condition="empty($_GET['level'])">class='choose'</if>>全部</a></dd>
        <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('level'=>'国家级')))}" <if condition="$_GET['level'] eq '国家级'">class='choose'</if>>国家级</a></dd>
        <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('level'=>'省级')))}" <if condition="$_GET['level'] eq '省级'">class='choose'</if>>省级</a></dd>
        <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('level'=>'市级')))}" <if condition="$_GET['level'] eq '市级'">class='choose'</if>>市级</a></dd>
        <dd><a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array('level'=>'县级')))}" <if condition="$_GET['level'] eq '县级'">class='choose'</if>>县级</a></dd>
      </dl>
    </if>
    <volist name="recommends" id="recommend">
      <dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
        <assign name="recommend_key" value="$key"/>
        <dt><?php echo $recommendsMap[$key]['name']?>：</dt>
        <dd><a href="{:U('Cudatabase/Industry/lists', array_filter(array_merge($_REQUEST, array($key=>''))))}" <if condition="empty($_GET[$key])">class='choose'</if>>全部</a></dd>
        <volist name="recommend" id="recommend_item">
          <dd>
            <a href="{:U('Cudatabase/Industry/lists', array_merge($_REQUEST, array($recommend_key=>$recommend_item)))}" <if condition="$_GET[$recommend_key] eq $recommend_item">class='choose'</if>>{$recommend_item}</a>
          </dd>
        </volist>
      </dl>
      <div class="clr"></div>
    </volist>
  </div>
    <!-- 企业名录 -->
    <if condition="($_GET['cid'] gt '131') and ($_GET['cid'] lt '142')">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead>
          <th>序号</th>
          <th>类目</th>
          <th>所属地区</th>
          <th>单位名称</th>
          <th>单位性质</th>
          <th>负责人</th>
          <th>联系方式</th>
          <th>通讯地址</th>
          <th>经营产品</th>
          <th>经营模式</th>
          
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
            <td style="text-align:center">{$vo.com_name}</td>
            <td style="text-align:center">{$vo.com_property}</td>
            <td style="text-align:center">{$vo.com_leader}</td>
            <td style="text-align:center">{$vo.com_phone}</td>
            <td style="text-align:center">{$vo.com_addr}</td>
            <td style="text-align:center">{$vo.com_product}</td>
            <td style="text-align:center">{$vo.com_mode}</td>
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

  <!-- 产业项目 -->

  <if condition="$_GET['cid'] eq '142' or $_GET['cid'] eq '143' or $_GET['cid'] eq '144' or$_GET['cid'] eq '145' or $_GET['cid'] eq '146' or $_GET['cid'] eq '147' or $_GET['cid'] eq '148' ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead>
          <th>序号</th>
          <th>类目</th>
          <th>所属地区</th>
          <th>名称</th>
          <th>配套</th>
          <th>实施单位名称</th>
          <th>实施单位性质</th>
          <th>负责人</th>
          <th>联系电话</th>
          <th>联系地址</th>
          <th>投资总额</th>
          <th>融资总额</th>
          <th>投资年限</th>
          <th>合作方式</th>
          <th>资金用途</th>
          
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
            <td style="text-align:center">{$vo.title}</td>
            <td style="text-align:center">{$vo.support}</td>
            <td style="text-align:center">{$vo.com_name}</td>
            <td style="text-align:center">{$vo.com_property}</td>
            <td style="text-align:center">{$vo.com_leader}</td>
            <td style="text-align:center">{$vo.com_phone}</td>
            <td style="text-align:center">{$vo.inv_totle}</td>
            <td style="text-align:center">{$vo.inv_financing}</td>
            <td style="text-align:center">{$vo.inv_years}</td>
            <td style="text-align:center">{$vo.inv_type}</td>
            <td style="text-align:center">{$vo.inv_use}</td>
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
  <!-- 文化产品 -->

  <if condition="$_GET['cid'] eq '152' or $_GET['cid'] eq '153' or $_GET['cid'] eq '154' or$_GET['cid'] eq '155' or $_GET['cid'] eq '156' or $_GET['cid'] eq '157' or $_GET['cid'] eq '158' ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead>
          <th>序号</th>
          <th>类目</th>
          <th>所属地区</th>
          <th>产品名称</th>
          <th>规格</th>
          <th>生产企业</th>
          <th>产品详情</th>
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
            <td style="text-align:center">{$vo.title}</td>
            <td style="text-align:center">{$vo.specification}</td>
            <td style="text-align:center">{$vo.com_name}</td>
            <td style="text-align:center">{$vo.com_product}</td>
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
  <!-- 园区基地 -->

  <if condition="$_GET['cid'] eq '162' or $_GET['cid'] eq '163' ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead>
          <th>序号</th>
          <th>类目</th>
          <th>所属地区</th>
          <th>项目名称</th>
          <th>级别</th>
          <th>基本概况</th>
          
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
            <td style="text-align:center">{$vo.title}</td>
            <td style="text-align:center">{$vo.level}</td>
            <td style="text-align:center">{$vo.intro}</td>
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

  <!-- 会展服务 会展活动-->

  <if condition="$_GET['cid'] eq '167' or $_GET['cid'] eq '168' or $_GET['cid'] eq '169' or $_GET['cid'] eq '170' or $_GET['cid'] eq '171' or $_GET['cid'] eq '172' or $_GET['cid'] eq '173'">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead>
          <th>序号</th>
          <th>类目</th>
          <th>所属地区</th>
          <th>活动名称</th>
          <th>主办者</th>
          <th>承办者</th>
          <th>参展展馆</th>
          <th>展会时间</th>
          <th>地点</th>
          
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
            <td style="text-align:center">{$vo.title}</td>
            <td style="text-align:center">{$vo.sponsor}</td>
            <td style="text-align:center">{$vo.undertaker}</td>
            <td style="text-align:center">{$vo.pavilion}</td>
            <td style="text-align:center">{$vo.opentime}</td>
            <td style="text-align:center">{$vo.addr}</td>
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
  <!-- 会展企业 -->

  <if condition="$_GET['cid'] eq '165' ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead>
          <th>序号</th>
          <th>类目</th>
          <th>所属地区</th>
          <th>单位名称</th>
          <th>单位性质</th>
          <th>负责人</th>
          <th>联系方式</th>
          <th>通讯地址</th>
          <th>经营产品</th>
          <th>经营模式</th>
          
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
            <td style="text-align:center">{$vo.com_name}</td>
            <td style="text-align:center">{$vo.com_property}</td>
            <td style="text-align:center">{$vo.com_leader}</td>
            <td style="text-align:center">{$vo.com_phone}</td>
            <td style="text-align:center">{$vo.com_addr}</td>
            <td style="text-align:center">{$vo.com_product}</td>
            <td style="text-align:center">{$vo.com_mode}</td>
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
  <!-- 会展场馆 -->

  <if condition="$_GET['cid'] eq '166' ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead>
          <th>序号</th>
          <th>类目</th>
          <th>所属地区</th>
          <th>名称</th>
          <th>地点</th>
          <th>竣工时间</th>
          <th>开放时间</th>
          <th>馆藏精品</th>
          <th>总建筑面积</th>
          
          
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
            <td style="text-align:center">{$vo.title}</td>
            <td style="text-align:center">{$vo.addr}</td>
            <td style="text-align:center">{$vo.completetime}</td>
            <td style="text-align:center">{$vo.opentime}</td>
            <td style="text-align:center">{$vo.boutique}</td>
            <td style="text-align:center">{$vo.total_area}</td>
            
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
