<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">搜索</div>
  <form name="searchform" action="" method="get" >
    <input type="hidden" value="Member" name="g">
    <input type="hidden" value="Adminweibo" name="m">
    <input type="hidden" value="index" name="a">
    <input type="hidden" value="1" name="search">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 搜索类型：
        <select name="type">
          <option value="1" <if condition="$type eq '1'">selected</if>>用户名</option>
          <option value="2" <if condition="$type eq '2'">selected</if> >微博内容</option>
        </select>
        关键字：
        <input type="text" class="input length_2" name="keyword" size='10' value="{$keyword}" placeholder="关键字">
        <button class="btn">搜索</button>
        </span> </div>
    </div>
  </form>
  <form name="myform"  class="J_ajaxForm" action="{:U('Adminweibo/delete')}" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="20" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td width="50" align="center">ID</td>
            <td width="100" align="center">作者</td>
            <td >微博内容</td>
            <td width="180" align="center">时间</td>
            <td width="50" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="weibo" id="vo">
            <tr>
              <td align="center"><input class="input checkbox J_check "  data-yid="J_check_y" data-xid="J_check_x"  name="ids[{$vo.userid}][]" value="{$vo.id}" type="checkbox"></td>
              <td align="center">{$vo.id}</td>
              <td align="center"><a href="{:UM('Home/miniblog',array('userid'=>$vo['userid']))}" target="_blank">{$vo.username}</a></td>
              <td >{$vo.content} - <a href="{:UM('Home/miniblog',array('userid'=>$vo['userid'],'id'=>$vo['id']))}" target="_blank">查看微博</a></td>
              <td align="center">{$vo.datetime|date="Y-m-d H:i:s",###}</td>
              <td align="center"><a class="J_ajax_del" href="{:U("Adminweibo/delete",array("id"=>$vo['id'],'userid'=>$vo['userid']))}">删除</a></td>
            </tr>
            <if condition="$vo['plsum']">
                <volist name="vo['replylist']" id="rs">
                <tr>
                  <td align="center"></td>
                  <td align="center">评论</td>
                  <td align="center">┗━━</td>
                  <td >{$rs.content}<br/>
                    评论ID:<b>{$rs.id}</b>，用户名:<b><a href="{:UM('Home/miniblog',array('userid'=>$rs['userid']))}"  target="_blank">{$rs.username}</a></b></td>
                  <td align="center">{$rs.datetime|date="Y-m-d H:i:s",###}</td>
                  <td align="center"><a class="J_ajax_del" href="{:U("Adminweibo/deletecomment",array("id"=>$rs['id'],'userid'=>$rs['userid']))}">删除</a></td>
                </tr>
                </volist>
            </if>
          </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">删除</button>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>