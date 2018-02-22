<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
 <div class="mb10 cc">
  <span class="fl" style="padding-top:4px;">共<span class="b org">{$count}</span>个未使用主题</span> </div>
  <form name="myform" action="{:U('Admintheme/add')}" method="post" class="J_ajaxForm">
  <div class="table_list">
    <table width="100%">
      <colgroup>
      <col width="70">
      <col width="90">
      <col width="350">
      <col width="150">
      </colgroup>
      <thead>
        <tr>
          <td>全选 <input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
          <td>应用图标</td>
          <td>应用介绍</td>
          <td>最后更新</td>
          <td>操作</td>
        </tr>
      </thead>
      <volist name="data" id="vo">
      <tr>
        <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x"  value="{$key}" name="ids[]"></td>
        <td><img src="{$config_siteurl}statics/extres/member/theme/{$vo.filename}/thumb.jpg"  alt="{$vo.filename}" width="80" height="80"></td>
        <td valign="top">
          <div class="mb5"> 主题名称：<input name="theme[{$key}]" value="{$vo.filename}" class="input" /> </div>
          <div class="mb5"> 所需积分：<input name="point[{$key}]" value="0" class="input" /> </div>
          <div class="mb5"> 主题介绍：<input name="remark[{$key}]" value="" class="input length_4" /> </div>
        </td>
        <td><span>{$vo.mtime|date="Y-m-d H:i:s",###}</span></td>
        <td>
          <button class="J_ajax_upgrade btn_big btn"  type="submit">启用</button>
          </td>
      </tr>
      </volist>
    </table>
  </div>
  <div class="btn_wrap">
      <div class="btn_wrap_pd">
        全选 <input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x">
        <button class="btn  mr10 J_ajax_submit_btn" type="submit">全部启用</button>
      </div>
  </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>