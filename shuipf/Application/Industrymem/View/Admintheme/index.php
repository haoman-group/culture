<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">搜索</div>
  <form name="searchform" action="" method="get" >
    <input type="hidden" value="Member" name="g">
    <input type="hidden" value="Admintheme" name="m">
    <input type="hidden" value="index" name="a">
    <input type="hidden" value="1" name="search">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20">主题名称：
        <input name="keyword" type="text" value="{$keyword}" class="input" placeholder="请输入关键词..." />
        <button class="btn">搜索</button>
        </span> </div>
    </div>
  </form>
  <form name="myform" action="{:U('Admintheme/delete')}" method="post" class="J_ajaxForm">
  <div class="design_page" style="width: 100%;">
    <ul class="cc">
      <volist name="data" id="vo">
      <li style="height: 240px;margin-right: 15px; width:156px;">
        <div class="img"><img src="{$config_siteurl}statics/extres/member/theme/{$vo.themedir}/thumb.jpg" width="135" height="88" lt="default"></div>
        <div class="title" title="{$vo.theme}">{$vo.theme}</div>
        <div class="type"><span class="themedir">主题目录:{$vo.themedir}</span></div>
        <div class="type"><span class="point">所需积分:<font color="#FF0000">{$vo.point}</font></span></div>
        <div class="type"><span class="datetime">添加时间:{$vo.datetime|date="Y-m-d",###}</span></div>
        <div class="ft"> 
            <input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x"  value="{$vo.id}" name="ids[]">
            <a class="J_ajax_del"  href="{:U('Admintheme/delete',array('id'=>$vo['id']))}">删除</a>
            <a href="{:U('Admintheme/edit',array('id'=>$vo['id']))}">编辑</a>
        </div>
      </li>
      </volist>
    </ul>
  </div>
  <div class="p10">
    <div class="pages"> {$Page} </div>
  </div>
  <div class="btn_wrap">
      <div class="btn_wrap_pd">
        全选 <input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x">
        <button class="btn  mr10 J_ajax_submit_btn" type="submit">删除</button>
      </div>
  </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>