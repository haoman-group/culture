<div class="headerTop">
		<div class="ggwh_Content">
			<span class="pull-left">
				<a target="_blank" href="{$config_siteurl}">网站首页</a>
				<span class="gang">|</span>
				<a href="javascript:AddFavorite('山西文化云','http://www.sx-cc.com/');">收藏本站</a>
				<script>
				function AddFavorite(title, url) {
						try {
							window.external.addFavorite(url, title);
						}
						catch (e) {
							try {
								window.sidebar.addPanel(title, url, "");
							}
							catch (e) {
								alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
							}
						}
					}
				</script>
				<!-- <span style="margin-left: 20px;"> -->
				<!-- <i style="color: #93262A;margin-right: 3px;" class="glyphicon glyphicon-map-marker"></i>太原 -->
				<!-- </span> -->
			</span>

			<i class="fa fa-map-marker" style="margin:0 5px 0 30px;color:#962626;"></i><a href="javascript:citylist()" class="on">{$cityname}</a>
			<a class="pull-right" style="margin-left: 20px;" href="{:U('Content/Resoursemanage/index')}" target="_blank">文化资源管理平台</a>
            <if condition="($username eq '') and ($userInfo['username'] eq '') ">
				<span class="fl" style="margin-left:20px;"><a href="{:U('Pubservice/Index/doLogin',array('type'=>'pubservice-register'))}">登录</a><span class="gang">|</span>
				<a href="{:U('Member/Index/register',array('type'=>'pubservice-register'))}">注册</a>
				</span>
			<else/>
				<span class="pull-right">欢迎
					<if condition="$username neq ''">
						<b>&nbsp;{$username}</b>
					<else/>
						{$userInfo['username']}|{$admin_url}
					</if>
					<span class="gang">
						<if condition="$username neq ''"><a href="{:U('Member/User/profile')}">[个人中心]</a></if>
					</span>
					<a href="{:U('Cudatabase/Public/doLogout')}" style="color:grey;">[退出]</a>		
				</span>
			</if>
			<div class="clearfix"></div>
		</div>
	</div>