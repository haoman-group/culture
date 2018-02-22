<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap jj">
 <!--  <Admintemplate file="Common/Nav"/> -->
 <div class="nav">
    <ul class="cc">
        <li class="current"><a href="{:U('commentlists')}" >评论->修改</a></li>
        
  </ul>
</div>
  <div class="common-form table_full">

    <form  class="J_ajaxForm" method="post"  action="{:U('commentedit')}">
      <!-- <div class="h_a">文化政策</div> -->
      <div class="table_list">
        <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
          <tbody>
            <tr>
              <th width="147">评论者:</th>
              <td>
                <input type="text "  name="commentname"  value="{$data.commentname}" class="input" disabled="disabled"/>
                <input type="hidden" class="input" name="id" value="{$data.id}"></td>
            </tr>
            <tr>
              <th width="147">日期:</th>
              <td> <input type="text" name="addtime" class="input length_2 J_date" value="{$data.addtime}" style="width:80px;" disabled="disabled"></td>
            </tr>
            <tr>
              <th width="147">标题:</th>
              <td><input type="text" class="input" name="title" id="controller" value="{$data.title}" disabled="disabled"></td>
            </tr>
            <tr>
              <th width="147">状态:</th>
              <td><select name="status">
                <option value="0" <if condition="$data['status'] eq '0'"> selected="selected" </if>>正常</option>
                <option value="1"<if condition="$data['status'] eq '1'"> selected="selected" </if>>被举报</option>
              </select></td>
            </tr>
            
            <tr>
              <th width="147">评论内容:</th>
              <!--<td><textarea name="publish_content" rows="5" cols="57">{$remark}</textarea></td>-->
              <td><script type="text/plain" id="publish_content" name="publish_content">{$data.publish_content}</script>
              <?php echo Form::editor('publish_content','basic','Cudatabase'); ?>
              </td>
            </tr>
            <tr>
             <!--  <td>内容:</td>
              <td>
                <textarea name="publish_content"></textarea> -->
            </tr>
            <!-- <tr>
              <td>类型:</td>
              <td><select name="type">
                  <option value="1" selected>权限认证+菜单</option>
                  <option value="0" >只作为菜单</option>
                </select>
                注意：“权限认证+菜单”表示加入后台权限管理，纯粹是菜单项请不要选择此项。</td>
            </tr> -->
          </tbody>
        </table>
      </div>
      <div class="">
        <div class="btn_wrap_pd">
          <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>