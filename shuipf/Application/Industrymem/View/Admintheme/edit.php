<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form name="myform" action="{:U('Admintheme/edit')}" method="post" class="J_ajaxForm">
  <input type="hidden" name="id" value="{$data.id}"/>
  <div class="table_list">
    <table width="100%">
      <colgroup>
      <col width="90">
      <col width="350">
      <col width="150">
      </colgroup>
      <thead>
        <tr>
          <td>应用图标</td>
          <td>应用介绍</td>
          <td></td>
        </tr>
      </thead>
      <tr>
        <td><img src="{$config_siteurl}statics/extres/member/theme/{$data.themedir}/thumb.jpg"  alt="{$vo.theme}" width="80" height="80"></td>
        <td valign="top">
          <div class="mb5"> 主题名称：<input name="theme" value="{$data.theme}" class="input" /> </div>
          <div class="mb5"> 所需积分：<input name="point" value="{$data.point}" class="input" /> </div>
          <div class="mb5"> 主题介绍：<input name="remark" value="{$data.remark}" class="input length_4" /> </div>
        </td>
        <td></td>
      </tr>
    </table>
  </div>
  <div class="">
      <div class="btn_wrap_pd">
        <button class="btn  mr10 J_ajax_submit_btn" type="submit">提交</button>
      </div>
  </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>