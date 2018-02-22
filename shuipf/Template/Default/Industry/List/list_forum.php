<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="content">
	<!--所在位置-->
	<div id="nav">
			<div class="container">
				<ul>
					<li>
						<a href="{:U('Industry/Index/index')}" class="home_src">首页</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href="{:U('Industry/Index/lists',array('catid'=>1))}">资讯中心</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href="javascript:;" style="color: #2058c2;">产业论坛</a>
					</li>
				</ul>
				
			</div>
		</div>
	<!--页面展示图-->
	<div class="forum_banner">
	    <img src="{$config_siteurl}statics/img/forum_01.jpg"/>		
	</div>
	<!--在线人数、搜索区域-->
	<div class="forum_set_div">
		<!--在线人数-->
		<div class="forum_online">
		    <span class="">
		   		 在线人数
		   		 <b>125</b>
		    </span>
		</div>
		<div class="forum_reg">
		    <a href="#">注册通行证</a>&nbsp;/&nbsp;<a href="#">找回密码</a>
		</div>
		<!--搜索框-->
		<form action="">
			<input type="text" placeholder="输入你要搜索的关键字" />
			<input type="submit" value="搜索" />
		</form>
	</div>
	<!--公告区域-->
	<div class="forum_g_div">
		<div class="forum_notice">
			<div class="forum_g_top">
				<h3>论坛公告</h3>
				<a href="">往期公告>></a>
			</div>
			<div class="forum_notice_content">
				<ul>
					<li>公告</li>
					<p>山西文化山西文化山西文化山西文化山西文化山西文化山西文化山西文化</p>
				</ul>
				
				
			</div>
			
		</div>
		<div class="forum_express">
			<div class="forum_g_top">
				<h3>新帖速递</h3>
				<a href="">更多>></a>
			</div>
		</div>
	</div>
	<!--文章区-->
	<div class="forum_acticle">
		<div class="forum_screen">
			<ul>
				<li class="li_default">默认</li>
				<li class="li_hot">热帖</li>
				<li>主题</li>
				<li>默认</li>
			</ul>
		</div>
		<div class="forum_theme">
			<span>
				全部\主题一\主题二
			</span>
		</div>
		<div class="forum_acticle_title">
			<div class="acticle_div">
				<div class="acticle_list">
					<ul>
						<li class="order"><span class="order_1">1</span></li>
						<li class="title">姚曙光</li>
						<li class="author">黄润滋</li>
						<li class="see">52</li>
						<li class="see">52</li>
						<li class="send_time">2016-12-05</li>
						
					</ul>
					<ul>
						<li class="order"><span class="order_2">2</span></li>
						<li class="title">姚曙光</li>
						<li class="author">黄润滋</li>
						<li class="see">52</li>
						<li class="see">52</li>
						<li class="send_time">2016-12-05</li>
						
					</ul>
					<ul>
						<li class="order"><span class="order_3">3</span></li>
						<li class="title">姚曙光</li>
						<li class="author">黄润滋</li>
						<li class="see">52</li>
						<li class="see">52</li>
						<li class="send_time">2016-12-05</li>
						
					</ul>
					<ul>
						<li class="order"><span class="order_4">4</span></li>
						<li class="title">姚曙光</li>
						<li class="author">黄润滋</li>
						<li class="see">52</li>
						<li class="see">52</li>
						<li class="send_time">2016-12-05</li>
						
					</ul>
					<ul>
						<li class="order"><span class="order_5">5</span></li>
						<li class="title">姚曙光</li>
						<li class="author">黄润滋</li>
						<li class="see">52</li>
						<li class="see">52</li>
						<li class="send_time">2016-12-05</li>
						
					</ul>
					<ul>
						<li class="order"><span class="order_6">6</span></li>
						<li class="title">姚曙光</li>
						<li class="author">黄润滋</li>
						<li class="see">52</li>
						<li class="see">52</li>
						<li class="send_time">2016-12-05</li>
					</ul>
					<ul>
						<li class="order"><span class="order_7">7</span></li>
						<li class="title">姚曙光</li>
						<li class="author">黄润滋</li>
						<li class="see">52</li>
						<li class="see">52</li>
						<li class="send_time">2016-12-05</li>
					</ul>
					<ul>
						<li class="order"><span class="order_8">8</span></li>
						<li class="title">姚曙光</li>
						<li class="author">黄润滋</li>
						<li class="see">52</li>
						<li class="see">52</li>
						<li class="send_time">2016-12-05</li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<!--发送帖子区域-->
	<div class="forum_send_div">
		<h3><img src="{$config_siteurl}statics/img/forum_send_01.png"/>快速发新话题</h3>
		<p class="forum_send_title">标题<input type="text" name="" id="" value="" /></p>
		<p class='forum_send_content'>
			<span>内容</span>
			<textarea name="" rows="" cols=""></textarea>
		</p>
		<div class="forum_send_bt">
			<button>发表帖子</button>
			<div class="edit_pre">
				<span>预览帖子</span>
				<span>修改帖子</span>
			</div>
			
		</div>
	</div>
</block>