<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php
switch (ACTION_NAME) {
	case 'Index':
			$user_menu = 'indexm';
			break;
	case 'share':
			$user_menu = 'dancem';
			break;
	case 'album':
			$user_menu = 'albumnm';
			break;
	case 'feed':
			$user_menu = 'feedm';
			break;
	case 'miniblog':
			$user_menu = 'feedm';
			break;
	case 'favorites':
			$user_menu = 'favoritesm';
			break;
	case 'wall':
			$user_menu = 'wallm';
			break;
	case 'following':
			$user_menu = 'fansm';
			break;
	case 'fans':
			$user_menu = 'fansm';
			break;
	case 'skin':
			$user_menu = 'skinm';
			break;
	default:
			$user_menu = 'indexm';
            break;
}
?>
<div id="{$user_menu}" class="nav">
  <ul>
    <li class="mindex"><span><a href="{:UM('Home/index',array('userid'=>$userinfo['userid']))}">主页</a></span></li>
    <li class="mfeed"><span><a href="{:UM('Home/feed',array('userid'=>$userinfo['userid']))}">动态</a></span></li>
    <li class="mfavorites"><span><a href="{:UM('Home/favorites',array('userid'=>$userinfo['userid']))}">收藏</a></span></li>
    <li class="mdance"><span><a href="{:UM('Home/share',array('userid'=>$userinfo['userid']))}">分享</a></span></li>
    <li class="malbum"><span><a href="{:UM('Home/album',array('userid'=>$userinfo['userid']))}">照片</a></span></li>
    <li class="mfans"><span><a href="{:UM('Home/following',array('userid'=>$userinfo['userid']))}">关系</a></span></li>
    <li class="mwall"><span><a href="{:UM('Home/wall',array('userid'=>$userinfo['userid']))}">留言</a></span></li>
    {:tag('view_member_home_nav',$userinfo)}
    <if condition=" ACTION_NAME == 'skin' ">
    <li class="mskin"><span><a href="/index.php?c=Space&amp;a=skin">换肤</a></span></li>
    </if>
  </ul>
</div>