<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('index')}" >地区个性化设置</a></li>
           
            <!--<li ><a value="手机扫描" class='  btn_add1' onclick="tel()"  />文本扫描</a></li>
            <li ><a value="手机扫描" class='  btn_add1'  onclick="tel()" />语音录入</a></li>
            <li ><a value="手机扫描" class='  btn_add' data-type="web"  />网络采集</a></li>-->
        </ul>
    </div>
  <!--<div class="h_a">搜索</div>-->
  <!--<form method="post" action="{:U('index')}">
  <div class="search_type cc mb10">
    <div class="mb10"> <span class="mr20">
    搜索类型：
    <select class="select_2" name="status" style="width:70px;">
        <option value='' <if condition="$_GET['status'] eq ''">selected</if>>不限</option>
                <option value="0" <if condition="$_GET['status'] eq '0'">selected</if>>error</option>
                <option value="1" <if condition="$_GET['status'] eq '1'">selected</if>>success</option>
      </select>
      用户ID：<input type="text" class="input length_2" name="uid" size='10' value="{$_GET.uid}" placeholder="用户ID">
      IP：<input type="text" class="input length_2" name="ip" size='20' value="{$_GET.ip}" placeholder="IP">
      时间：
      <input type="text" name="start_time" class="input length_2 J_date" value="{$_GET.start_time}" style="width:80px;">
      -
      <input type="text" class="input length_2 J_date" name="end_time" value="{$_GET.end_time}" style="width:80px;">
      <button class="btn">搜索</button>
      </span> </div>
  </div>
  </form>-->
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <!--<td align="center" width="30">ID</td>-->
            <td align="center" width="50">地区ID</td>
            <td align="center" width="60">地区名称</td>
            <td align="center" width="120">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="areaList" id="vo">
            <tr>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.name}</td>
              <td align="center">
                <if condition="$vo['span'] neq 100">
                  <a href="{:U('index',['area_id'=>$vo['id']])}">区县管理</a>&nbsp;&nbsp;&nbsp;|
                </if>
                &nbsp;&nbsp;&nbsp;<a href="{:U('edit',['area_id'=>$vo['id']])}">本地管理</a></td>
            </tr>
          </volist>
        </tbody>
      </table>
      <!--<div class="p10">
        <div class="pages"> {$Page} </div>
      </div>-->
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>