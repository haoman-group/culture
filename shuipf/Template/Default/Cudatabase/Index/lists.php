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
    .sjkTb tbody tr td{overflow: hidden;vertical-align: middle;}
    .sjkTb td:nth-of-type(1){width: 5%;}
    .sjkTb td:nth-of-type(2){width: 5%;}
    .sjkTb td:nth-of-type(3){width: 10%;}
    .sjkTb td:nth-of-type(4){width: 5%;}
    .sjkTb td:nth-of-type(5){width: 20%;}
    .sjkTb td:nth-of-type(6){width: 20%;}
    .sjkTb td:nth-of-type(7){width: 20%;}
    .sjkTb td:nth-of-type(8){width: 5%;}
    .sjkTb td:nth-of-type(9){width: 5%;}
    .sjkTb td:nth-of-type(10){width: 5%;}

    .sjkTb .arts tbody tr td{overflow: hidden;vertical-align: middle;}
    .arts  td:nth-of-type(1){width: 3%;}
    .arts   td:nth-of-type(2){width: 5%;}
    .arts   td:nth-of-type(3){width: 6%;}
    .arts   td:nth-of-type(4){width: 5%;}
    .arts  td:nth-of-type(5){width: 6%;}
    .arts   td:nth-of-type(6){width: 5%;}
    .arts   td:nth-of-type(7){width: 15%;}
    .arts   td:nth-of-type(8){width: 15%;}
    .arts   td:nth-of-type(9){width: 15%;}
    .arts   td:nth-of-type(10){width: 15%;}
    .arts   td:nth-of-type(11){width: 3%;}
    .arts  td:nth-of-type(12){width: 3%;}
    .arts   td:nth-of-type(13){width: 3%;}
   
    
</style>
</head>

<body>
<template file="Cudatabase/Common/_head"/>
<div class="all">
  <div class="ht1" style="color:#FFF;"> {$breadcrumb}</div>
  <div class="ht2"><span  style="color:#FFF;margin-left:45px;line-height:36px;"/>高级搜索</span></div>
    <div>
        <dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
            <dt>市级：</dt>
            <dd><a href="{:U('Cudatabase/Index/lists', array_filter(array_merge($_REQUEST, array('area'=>''))))}" <if condition="empty($_GET['area'])">class='choose'</if>>全部</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'太原')))}" <if condition="$_GET['area'] eq '太原'">class='choose'</if>>太原市</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'阳泉')))}" <if condition="$_GET['area'] eq '阳泉'">class='choose'</if>>阳泉市</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'大同')))}" <if condition="$_GET['area'] eq '大同'">class='choose'</if>>大同市</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'忻州')))}" <if condition="$_GET['area'] eq '忻州'">class='choose'</if>>忻州市</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'朔州')))}" <if condition="$_GET['area'] eq '朔州'">class='choose'</if>>朔州市</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'吕梁')))}" <if condition="$_GET['area'] eq '吕梁'">class='choose'</if>>吕梁市</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'临汾')))}" <if condition="$_GET['area'] eq '临汾'">class='choose'</if>>临汾市</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'运城')))}" <if condition="$_GET['area'] eq '运城'">class='choose'</if>>运城市</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'晋城')))}" <if condition="$_GET['area'] eq '晋城'">class='choose'</if>>晋城市</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'长治')))}" <if condition="$_GET['area'] eq '长治'">class='choose'</if>>长治市</a></dd>
            <dd><a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array('area'=>'晋中')))}" <if condition="$_GET['area'] eq '晋中'">class='choose'</if>>晋中市</a></dd>
        </dl>
        <volist name="recommends" id="recommend">
            <dl class="dsjkSearchdl clearfix" style="margin-top:14px;">
                <assign name="recommend_key" value="$key"/>
                <dt><?php echo $recommendsMap[$key]['name']?>：</dt>
                <dd><a href="{:U('Cudatabase/Index/lists', array_filter(array_merge($_REQUEST, array($key=>''))))}" <if condition="empty($_GET[$key])">class='choose'</if>>全部</a></dd>
                <volist name="recommend" id="recommend_item">
                    <dd>
                        <a href="{:U('Cudatabase/Index/lists', array_merge($_REQUEST, array($recommend_key=>$recommend_item)))}" <if condition="$_GET[$recommend_key] eq $recommend_item">class='choose'</if>>{$recommend_item}</a>
                    </dd>
                </volist>
            </dl>
            <div class="clr"></div>
        </volist>
    </div>
    <!-- 戏剧 -->
     <if condition="$_GET['cid'] eq 14 or $_GET['cid'] eq 15 or $_GET['cid'] eq 16 or $_GET['cid'] eq 17 or $_GET['cid'] eq 18 or $_GET['cid'] eq 256">
    <div class="search-content-tab">
      <table class="table sjkTb"  >
      	<thead >
      		<th >序号</th>
      		<th >类别</th>
      		<th >所属地区</th>
            <if condition="$_GET['cid'] eq 14">
              <th >剧种</th>
            </if>
      		<th >剧团</th>
      		<th >获奖情况</th>
      		<th >代表作</th>
      		<th >下载</th>
      		<th >查看</th>
<!--      		<th >分享</th>-->
      	</thead>
      	<tbody>
          <volist name="lists" id="vo">
      		<tr>
      			<td style="text-align:center">{$vo.id}</td>
      			<td style="text-align:center">{$vo.cate_name}</td>
      			<td style="text-align:center">{$vo.area_display}</td>
                <if condition="$_GET['cid'] eq 14">
                  <td style="text-align:center">{$vo.sub_cate_name_xiju}</td>
                </if>
      			<td style="text-align:center">{$vo.troupe}</td>
      			<td style="text-align:center">{$vo.awards}</td>
      			<td style="text-align:center">{$vo.example}</td>
      			<td><a href=""><img src="{$config_siteurl}statics/cu/images/images/sjk/download.png"/></a></td>
      			<td><a href="{:U('show',array('id'=>$vo['id'],'cid'=>$vo['drama']))}"><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/file.png"/></a></td>
<!--      			<td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/share.png"></a></td>-->
      		</tr>
        </volist>
      	</tbody>
      </table>
      <div class="page">{$pageinfo['page']}</div>
    </div>
  </if>
<!-- 音乐 -->
  <if condition="$_GET['cid'] eq 19 or $_GET['cid'] eq 25 or $_GET['cid'] eq 257 or $_GET['cid'] eq 258 or $_GET['cid'] eq 259 ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead>
          <th >序号</th>
          <th >类别</th>
          <th >所属地区</th>
          <th >机构</th>
          <th >代表人物</th>
          <th >乐种</th>
          <th >乐团</th>
          <th >获奖情况</th>
          <th >代表作</th>
          <th >下载</th>
          <th >查看</th>
<!--          <th >分享</th>-->
        </thead>
        <tbody>
          <volist name="lists" id="vo">
          <tr>
            <td style="text-align:center">{$vo.id}</td>
            <td style="text-align:center">{$vo.cate_name}</td>
            <td style="text-align:center">{$vo.area_display}</td>
            <td style="text-align:center">{$vo.unit}</td>
            <td style="text-align:center">{$vo.figures}</td>
            <td style="text-align:center">{$vo.sub_cate_name_yinyue}</td>
            <td style="text-align:center">{$vo.troupe}</td>
            <td style="text-align:center">{$vo.awards}</td>
            <td style="text-align:center">{$vo.example}</td>
            
            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/download.png"/></a></td>
            <td><a href="{:U('show',array('id'=>$vo['id']))}"><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/file.png"/></a></td>
<!--            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/share.png"></a></td>-->
          </tr>
        </volist>
        </tbody>
      </table>
      <div class="page">{$pageinfo.page}</div>
    </div>
  </if>
<!-- 舞蹈 -->
  <if condition="$_GET['cid'] eq 31 or $_GET['cid'] eq 32 or $_GET['cid'] eq 33 or $_GET['cid'] eq 34 or $_GET['cid'] eq 35 ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead>
          <th >序号</th>
          <th >类别</th>
          <th >所属地区</th>
          <th >表演者</th>
          <th >表演单位</th>
          <th >机构</th>
          <th >获奖情况</th>
          <th  >代表作</th>
          <th >下载</th>
          <th  >查看</th>
<!--          <th  >分享</th>-->
        </thead>
        <tbody>
          <volist name="lists" id="vo">
          <tr>
            <td style="text-align:center">{$vo.id}</td>
            <td style="text-align:center">{$vo.cate_name}</td>
            <td style="text-align:center">{$vo.area_display}</td>
            <td style="text-align:center">{$vo.performer}</td>
            <td style="text-align:center">{$vo.unit}</td>
            <td style="text-align:center">{$vo.agency}</td>
            <td style="text-align:center">{$vo.awards}</td>
            <td style="text-align:center">{$vo.example}</td>
            
            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/download.png"/></a></td>
            <td><a href="{:U('show',array('id'=>$vo['id']))}"><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/file.png"/></a></td>
<!--            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/share.png"></a></td>-->
          </tr>
        </volist>
        </tbody>
      </table>
      <div class="page">{$pageinfo.page}</div>
    </div>
  </if>

<!-- 美术 -->
  <if condition="$_GET['cid'] eq 36 or $_GET['cid'] eq 37 or $_GET['cid'] eq 38 or $_GET['cid'] eq 39 or $_GET['cid'] eq 40 or $_GET['cid'] eq 41  or $_GET['cid'] eq 42 or $_GET['cid'] eq 45 or $_GET['cid'] eq 46">
    <div class="search-content-tab"> 
      <table class="table sjkTb  arts ">
        <thead>
          <th class="art1"  >序号</th>
          <th class="art2"  >类别</th>
          <if condition="$_GET['cid'] eq 36">
            <th class="art3"  >子分类</th>
          </if>
          <th  >所属地区</th>
          <th  >作者</th>
          <th  >题材</th>
          <th  >技法</th>
          <th  >获奖情况</th>
          <th  >艺术家</th>
          <th  >代表作</th>
          <th  >下载</th>
          <th  >查看</th>
<!--          <th  >分享</th>-->
        </thead>
        <tbody>
          <volist name="lists" id="vo">
          <tr>
            <td style="text-align:center">{$vo.id}</td>
            <td style="text-align:center">{$vo.cate_name}</td>
            <if condition="$_GET['cid'] eq 36">
              <td style="text-align:center">{$vo.sub_cate_name_meishu}</td>
            </if>
            <td style="text-align:center;">{$vo.area_display}</td>
            <td style="text-align:center">{$vo.authorname}</td>
            <td style="text-align:center">{$vo.theme}</td>
            <td style="text-align:center">{$vo.technique}</td>
            <td style="text-align:center">{$vo.awards}</td>
            <td style="text-align:center">{$vo.artist}</td>
            <td style="text-align:center">{$vo.example}</td>
            
            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/download.png"/></a></td>
            <td><a href="{:U('show',array('id'=>$vo['id']))}"><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/file.png"/></a></td>
<!--            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/share.png"></a></td>-->
          </tr>
        </volist>
        </tbody>
      </table>
      <div class="page">{$pageinfo.page}</div>
    </div>
  </if>
  <!-- 曲艺 -->
  <if condition="$_GET['cid'] eq 71 or $_GET['cid'] eq 72 or $_GET['cid'] eq 73 or $_GET['cid'] eq 74 or $_GET['cid'] eq 80 or $_GET['cid'] eq 81 ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead  >
          <th >序号</th>
          <th>类别</th>
          <th>所属地区</th>
          <if condition="$_GET['cid'] eq 73">
            <th>曲种</th>
          </if>
          <th>作者</th>
          <th>题材</th>
          <th>技法</th>
          <th>获奖情况</th>
          <th>艺术家</th>
          <th>代表作</th>
          <th>下载</th>
          <th>查看</th>
<!--          <th>分享</th>-->
        </thead>
        <tbody>
          <volist name="lists" id="vo">
          <tr>
            <td style="text-align:center">{$vo.id}</td>
            <td style="text-align:center">{$vo.cate_name}</td>
            <td style="text-align:center">{$vo.area_display}</td>
            <if condition="$_GET['cid'] eq 73">
              <td style="text-align:center">{$vo.sub_cate_name_quyi}</td>
            </if>
            <td style="text-align:center">{$vo.authorname}</td>
            <td style="text-align:center">{$vo.theme}</td>
            <td style="text-align:center">{$vo.technique}</td>
            <td style="text-align:center">{$vo.awards}</td>
            <td style="text-align:center">{$vo.artist}</td>
            <td style="text-align:center">{$vo.example}</td>
            
            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/download.png"/></a></td>
            <td><a href="{:U('show',array('id'=>$vo['id']))}"><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/file.png"/></a></td>
<!--            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/share.png"></a></td>-->
          </tr>
        </volist>
        </tbody>
      </table>
      <div   class="page">{$pageinfo.page}</div>
    </div>
  </if>

  <!-- 杂技 -->

  <if condition="$_GET['cid'] eq 96 or $_GET['cid'] eq 97 or $_GET['cid'] eq 98 or $_GET['cid'] eq 99 or $_GET['cid'] eq 100 or $_GET['cid'] eq 101 or $_GET['cid'] eq 102 or $_GET['cid'] eq 95 ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead  >
          <th>序号</th>
          <th>类别</th>
          <th>所属地区</th>
          <th>机构</th>
          <th>代表人物</th>
          <th>获奖情况</th>
          <th>代表作</th>
          <th>下载</th>
          <th>查看</th>
<!--          <th>分享</th>-->
        </thead>
        <tbody>
          <volist name="lists" id="vo">
          <tr>
            <td style="text-align:center">{$vo.id}</td>
            <td style="text-align:center">{$vo.cate_name}</td>
            <td style="text-align:center">{$vo.area_display}</td>
             <td style="text-align:center">{$vo.unit}</td>
            <td style="text-align:center">{$vo.figures}</td>
            <td style="text-align:center">{$vo.awards}</td>
            <td style="text-align:center">{$vo.example}</td>
            
            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/download.png"/></a></td>
            <td><a href="{:U('show',array('id'=>$vo['id']))}"><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/file.png"/></a></td>
<!--            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/share.png"></a></td>-->
          </tr>
        </volist>
        </tbody>
      </table>
      <div class="page">{$pageinfo.page}</div>
    </div>
  </if>
  <!-- 书法 -->

  <if condition="$_GET['cid'] eq 103 or $_GET['cid'] eq 104 or $_GET['cid'] eq 107 or $_GET['cid'] eq 109 or $_GET['cid'] eq 108 or $_GET['cid'] eq 260 or $_GET['cid'] eq 261 ">
    <div class="search-content-tab"> 
      <table class="table sjkTb">
        <thead  >
          <th>序号</th>
          <th>类别</th>
          <th>所属地区</th>
          <th>作者</th>
          <th>题材</th>
          <th>技法</th>
          <th>获奖情况</th>
          <th>艺术家</th>
          <th>代表作</th>
          <th>下载</th>
          <th>查看</th>
<!--          <th>分享</th>-->
        </thead>
        <tbody>
          <volist name="lists" id="vo">
          <tr>
            <td style="text-align:center">{$vo.id}</td>
            <td style="text-align:center">{$vo.cate_name}</td>
            <td style="text-align:center">{$vo.area_display}</td>
             <td style="text-align:center">{$vo.authorname}</td>
             <td style="text-align:center">{$vo.theme}</td>
             <td style="text-align:center">{$vo.technique}</td>
              <td style="text-align:center">{$vo.awards}</td>
            <td style="text-align:center">{$vo.artist}</td>
           
            <td style="text-align:center">{$vo.example}</td>
            
            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/download.png"/></a></td>
            <td><a href="{:U('show',array('id'=>$vo['id']))}"><img style="width: 14px;" src="{$config_siteurl}statics/cu/images/images/sjk/file.png"/></a></td>
<!--            <td><a><img src="{$config_siteurl}statics/cu/images/images/sjk/share.png"></a></td>-->
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
            var str = $(this).text().length>30 ? $(this).text().substr(0,30) + '...' : $(this).text();            
            if($(v).children().length == 0){
                $(v).text(str);
            }
        })
    })
</script>
</body>
</html>

