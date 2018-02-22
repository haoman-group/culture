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
  <div class="userinfo" style="background-color: transparent;height: auto;">
    <div style=" width:160px;text-align:center;margin-bottom:2px;font-weight:bold;line-height: 30px;">{$username}</div>
    <div class="face"> <img src="{:U('Api/Avatar/index',array('uid'=>$uid,'size'=>180))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'" id="menu-avatar"> </div>
  </div>
  <div class="menu_center">
    <ul>
      <li > <a href="{:U('User/profile')}"> <span class="iconProfile">个人资料</span> </a></li>
      <li > <a href="{:U('User/bespeak')}"> <span class="iconProfile">我的预约</span> </a></li>
			<li > <a href="{:U('Member/Reader/mycard')}"> <span class="iconFavorites">我的读者证</span> </a></li>
			<li > <a href="{:U('Member/Index/logout')}"> <span class="iconNotification">立即退出</span> </a></li>
			<!--<li> <a href="{:U('User/live',array('type1'=>1))}"> <span class="iconProfile"  style="">我要直播</span> </a></li>-->
			<!--<li > <a href="{:U('User/order',array('type1'=>1))}"> <span class="iconProfile">我的订单</span> </a></li>
			<li > <a href="{:U('Product/lists',array('type1'=>1))}"> <span class="iconProfile">我的产品</span> </a></li>-->
      {:tag('view_member_menu',$User)}
    </ul>
  </div>
</div>