<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php
switch (CONTROLLER_NAME) {
	case 'Index':
			$user_menu = 'mfeed';
			break;
	case 'User':
			$user_menu = 'profilem';
			break;
	case 'Relation':
			$user_menu = 'fansm';
			break;
	case 'Message':
			$user_menu = ACTION_NAME=='notification'?'mnotification':'messagem';
			break;
	case 'Wall':
			$user_menu = 'wallm';
			break;
	case 'Miniblog':
			$user_menu = 'miniblogm';
			break;
	case 'Album':
			$user_menu = 'albumm';
			break;
	case 'Favorite':
			$user_menu = 'song';
			break;
	case 'Msg':
			$user_menu = 'messagem';
			break;
	case 'Account':
			$user_menu = 'account';
			break;
	default:
			$user_menu = 'feed';
            break;
}
?>
<div class="user_menu" id="{$user_menu}">
  <div class="userinfo">
    <div style=" width:160px;text-align:center;margin-bottom:2px;font-weight:bold">{$username}</div>
    <div class="face"> <a href="{:UM('Home/index',array('userid'=>$uid))}"> <img src="{:U('Api/Avatar/index',array('uid'=>$uid,'size'=>180))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'" id="menu-avatar"> </a> </div>
    <ul class="info_list">
      <li> <a href="{:U('Relation/following')}"> <span>{$User.attention}</span> <strong>关注</strong> </a> </li>
      <li> <a href="{:U('Relation/fans')}"> <span>{$User.fans}</span> <strong>粉丝</strong> </a> </li>
      <li class="last"> <a href="{:U('Favorite/favorites')}"> <span>{$User.share}</span><strong>分享</strong> </a> </li>
    </ul>
  </div>
  <div class="menu_center">
    <ul>
      <li class="mfeed"> <a href="{:U('Index/home')}"> <span class="iconFeed">首页</span> </a> <em></em> </li>
      <li class="mshare"> <a href="{:U('Share/index')}" target="_self"> <span class="iconShare">分享管理</span> </a> <em></em> </li>
      <li class="msong"><a href="{:U('Favorite/index')}"><span class="iconSong">我的收藏</span></a><em></em></li>
      <li class="mminiblog"> <a href="{:U('Miniblog/miniblog')}"> <span class="iconMiniblog">随便说说</span> </a> <em></em> </li>
      <li class="malbum"> <a href="{:U('Album/album','i=me')}"> <span class="iconAlbum">照片墙</span> </a> <em></em> </li>
      <li class="mwall"> <a href="{:U('Wall/index')}"> <span class="iconWall">留言板</span> </a> <em></em> </li>
      <li class="mmessage"> <a href="{:U('Msg/msg')}"> <span class="iconMessage">私信</span> </a> <em></em> </li>
      <li class="mnotification"> <a href="{:U('Message/notification')}"> <span class="iconNotification">通知</span> </a> <em></em> </li>
      <li class="mfans"> <a href="{:U('Relation/following')}"> <span class="iconFans">关系</span> </a> <em></em> </li>
      <li class="maccount"> <a href="{:U('Account/assets')}"> <span class="iconAccount">账户</span> </a> <em></em> </li>
      <li class="mprofile"> <a href="{:U('User/profile')}"> <span class="iconProfile">设置</span> </a> <em></em> </li>
      {:tag('view_member_menu',$User)}
    </ul>
  </div>
</div>