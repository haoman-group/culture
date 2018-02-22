<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<ul id="commentList" style="overflow: hidden;">
<volist name="comment" id="vo">
  <li id="comment" class="hover" style="_zoom:1;">
    <div class="pic"><a target="_blank" href="{:UM('Home/index',array('userid'=>$vo['userid']))}" class="user_card"><img class="avatar-20" src="{:U('Api/Avatar/index',array('uid'=>$vo['userid'],'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
    <div class="txt">
      <p> <span class="name"><a target="_blank" class="user_card" href="{:UM('Home/index',array('userid'=>$vo['userid']))}">{$vo.username}：</a></span> <span class="content_id">{$vo.content}</span> <span class="time">{$vo.datetime|format_date}</span>
        <if condition="$uid && $uid neq $vo['userid'] "> <a id="comment" class="reply" authorId="{$vo.userid}" nickname="{$vo.username}">回复</a> </if>
      </p>
    </div>
    <if condition="$uid && $ismyhome "> <span cid="{$vo.id}" uid="{$vo.userid}" class="del" title="删除"></span> </if>
  </li>
</volist>
<div class="page">{$Page}</div>
</ul>
<script type="text/javascript">
	$(document).ready(function(){
		albumLib.imageNameModifyInit(); 
		albumLib.replayUserInit();
		albumLib.replayUserCancelInit();
		albumLib.imageCommentDelInit();
	});
</script>