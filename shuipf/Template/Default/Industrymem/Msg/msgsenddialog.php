<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<div class="msg_dialog_send">
  <div class="title"><span> 发送给：<span class="nickname" style="color:#CC3300; font-size:12px; margin-left:2px; margin-right:2px;">{$info.username}</span></span></div>
  <div class="main">
    <div class="face"><img class="avatar" width="48" height="48" src="{:U('Api/Avatar/index',array('uid'=>$info['userid'],'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></div>
    <div class="message">
      <div id="fnote" contenteditable="true" class="send" name="fnote"></div>
    </div>
    <div id="emot_fnote" class="emot" to="fnote" style="display:none"></div>
  </div>
  <div id="uid" style="display:none" uid = "{$info.userid}"></div>
</div>
<script type="text/javascript">$("#fnote").emotEditor({emot:true, newLine:true});</script>