<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head"/>
<style type="text/css">
    .table_list tr,.table_list th,.table_list td{padding: 0;}
    .table_list th,.table_list td{padding: 3px 10px;}
    .table_list td{padding-left: 5px;}
    select.cid{margin-left: 10px;}    
</style>
<body>
<div class="wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">搜索</div>
    <div class="table_list">
        <div class="table_full">
            <form class="J_ajaxForm"  method="get">
                <input type="hidden" name="g" value="admin">
                <input type="hidden" name="m" value="Library">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
                <input type="hidden" name="area" class="area" value="{$Think.get.area}">
                  <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                      <tr>
                          <th width="147">地区：</th>
                          <td><select id="area"  class=""  data-default="{$Think.get.area}"></select></td>
                          <!-- <td width="15"><input type="submit" class="btn" value="检索" /></td> -->
                          <!-- <td width="15"><a class="btn" href="{:U('Admin/Library/search')}"  >清除条件</a></td> -->
                      </tr>
                  </table>
                  <div style="margin: 10px 0 0;">
                      <button class="btn">搜索</button>
                      <a style="margin-left:4px;" href="{:U('Admin/Library/search')}" class="btn">清除条件</a>
                  </div>
            </form>
        </div>
    </div>
    <!-- <form action="{:U('Admin/Library/search')}" method="post">
          <select id="Province" hidden><select>
          市级:<select id="City" name="city"></select>
          区县:<select id="Area" name="area"></select>
         <script type="text/javascript"> new PCAS("Province=山西省","City","Area");</script>
      <input type="submit" class="btn" value="检索">
    </form> -->
    <div class="table_list">
      <if condition="$lists neq '' ">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td align="left">序号</td>
            <td align="left">名称</td>
            <td align="left">地区</td>
            <td align="left">占地面积(平方米)</td>
            <td align="left">总藏量(万册、件)</td>
            <td align="left">官方网站</td>
            <td align="left">联系电话</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="lists" id="vo">
            <tr>
             <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
              <td align="left" style="text-align:center">{$vo.id}</td>
              <td align="left" style="text-align:center">{$vo.name}</td>
              <td align="left" style="text-align:center">{$vo.area_display}</td>
              <td align="left" style="text-align:center">{$vo.covered_area}</td>
              <td align="left" style="text-align:center">{$vo.num_totle}</td>
              <td align="left" style="text-align:center">{$vo.dig_website}</td>
              <td align="left" style="text-align:center">{$vo.telephone}</td>
              <td align="left" style="text-align:center"><a href="{:U('Admin/Library/show', array('id'=>$vo['id']))}">[查看]</a></td>
            </tr>
          </volist>
        </tbody>
      </table>
      <else/>
     <span style="color:red">没有相关数据</span>
    </if>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div>
</div>
</body>
</html>