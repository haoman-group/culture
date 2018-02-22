<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<div class="spaceUserInfo">
  <div class="nickname"><span>{$userinfo.username}</span><span></span></div>
  <div class="avatarImages"><img height="160" width="160" src="{:U('Api/Avatar/index',array('uid'=>$userinfo['userid'],'size'=>180))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'">
    <div class="online_state">
        <if condition=" $isonline ">
            <span class="online">当前在线</span>
        <else/>
            <span class="offline">当前离线</span>
        </if>
    </div>
  </div>
  <ul class="info_list no">
    <li><a href="{:UM('Home/following',array('userid'=>$userinfo['userid']))}"><span>{$userinfo.attention}</span><strong>关注</strong></a></li>
    <li><a href="{:UM('Home/fans',array('userid'=>$userinfo['userid']))}"><span>{$userinfo.fans}</span><strong>粉丝</strong></a></li>
    <li class="last"><a href="{:UM('Home/favorites',array('userid'=>$userinfo['userid']))}"><span>{$userinfo.share}</span><strong>分享</strong></a></li>
  </ul>
  <div class="button">
    <div class="and"><a  class="message" href="{:UM('Home/wall',array('userid'=>$userinfo['userid']))}"title="留言"></a></div>
    <div class="and" id="fans">
        <if condition=" $isfans ">
        <a class="attention tabulation" href="{:UM('Home/following',array('userid'=>$userinfo['userid']))}"></a>
        <else/>
        <a onclick="jQuery(function(){ fans.fansAdd({$userinfo.userid}, '{$userinfo.username}')});" class="attention" href="javascript:;"></a>
        </if>
    </div>
  </div>
  {:tag('view_member_home_right',$userinfo)}
</div>