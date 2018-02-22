<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<div class="spaceUserInfo">
  <ul class="info_list">
    <li><a href="{:UM('Home/following',array('userid'=>$userinfo['userid']))}"><span>{$userinfo.attention}</span><strong>关注</strong></a></li>
    <li><a href="{:UM('Home/fans',array('userid'=>$userinfo['userid']))}"><span>{$userinfo.fans}</span><strong>粉丝</strong></a></li>
    <li class="last"><a href="{:UM('Home/favorites',array('userid'=>$userinfo['userid']))}"><span>{$userinfo.share}</span><strong>分享</strong></a></li>
  </ul>
</div>