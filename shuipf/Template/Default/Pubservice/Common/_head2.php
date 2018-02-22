<header class="header">
	<div class="headerTop">
		<!-- <script type="text/javascript">document.write('<iframe src="http://218.26.115.226:81/index.php?m=member&c=index&a=mini&forward='+encodeURIComponent(location.href)+'&siteid=1" allowTransparency="true"  width="100%" frameborder="0" scrolling="no"></iframe>')</script> -->
		<!--<div class="ggwh_Content"><span class="pull-left"><a href="#">网站首页</a><span class="gang">|</span>
					<a href="#">收藏本站</a><span style="margin-left: 20px;"><i style="color: #93262A;margin-right: 3px;" class="glyphicon glyphicon-map-marker"></i>太原</span>
					</span><span class="pull-right"><a href="index.php?m=member&c=index&a=login">登录</a><span class="gang">|</span>
					<a href="index.php?m=member&c=index&a=register&siteid=1">注册</a>
					</span>
			<div class="clearfix"></div>
		</div>-->
		<div class="ggwh_Content"><span class="pull-left"><a target="_blank" href="/">网站首页</a><span class="gang">|</span>
					<a href="#">收藏本站</a><span style="margin-left: 20px;"><!-- <i style="color: #93262A;margin-right: 3px;" class="glyphicon glyphicon-map-marker"></i>太原 --></span>

					</span>

					
					<!--<a class="pull-right" style="margin-left: 20px;" href="{:U('Industry/Index/index')}" target="_blank">文化产业服务平台</a>-->
					<a class="pull-right" style="margin-left: 20px;" href="{:U('Content/Resoursemanage/index')}" target="_blank">文化资源管理平台</a>



                    <if condition="($username eq '') and ($userInfo['username'] eq '') ">
					<span class="fl"><a href="{:U('Pubservice/Index/doLogin',array('type'=>'pubservice-register'))}">登录</a><span class="gang">|</span>

					<a href="{:U('Member/Index/register',array('type'=>'pubservice-register'))}">注册</a>
					</span>
					<else/>
					<span class="pull-right">欢迎<if condition="$username neq ''">{$username}<else/>{$userInfo['username']}|{$admin_url}</if>文化公共服务平台<span class="gang">|
						<if condition="$username neq ''"><a href="{:U('Member/User/profile',array('type1'=>1,'type'=>'pubservice-register'))}">个人中心</a>|</if></span>
					<a href="{:U('Cudatabase/Public/doLogout')}">[退出]</a>
					
				</span>
				</if>


			<div class="clearfix"></div>
		</div>

	</div>
	<div class="ggwh_Header">
		<div class="ggwh_Logo">
<!--			<a href="/Pubservice"><img src="{$config_siteurl}statics/cu/images/icon/pubsLogo.png" /></a>-->
			<a href="/"><img src="{$config_siteurl}statics//cu/images/icon/logo.png"  /></a>
			<!--<a href="/Pubservice"><strong>公共服务平台</strong></a>-->
		</div>
		<div class="nav">
			<ul>
				<li <if condition="CONTROLLER_NAME eq 'Active'">class="active"</if>>
					<a href="{:U('Pubservice/Active/index')}" id="catid_10">公共文化活动</a>						
					<!-- <p style="width: 75px" class="smallFont">Cultural Activity</p> -->
				</li>
				<li <if condition="CONTROLLER_NAME eq 'Facility'">class="active"</if>>						
					<a href="{:U('Pubservice/Facility/index',array('city'=>'太原','type'=>'图书馆'))}" id="catid_14">公共文化设施</a>
					<!-- <p style="width: 80px" class="smallFont">Cultural Facilities</p> -->
				</li>
				<li <if condition="CONTROLLER_NAME eq 'Resources'">class="active"</if>>					
					<a href="{:U('Pubservice/Resources/index')}" id="catid_192">数字文化资源</a>
					<!-- <p style="width: 130px" class="smallFont">Cultural Resources Pavilion</p> -->
				</li>
				<!--<li <if condition="CONTROLLER_NAME eq 'Landmark'">class="active"</if>>					-->
					<!--<a href="{:U('Pubservice/Landmark/index')}" id="catid_105">文化地标</a>-->
					<!-- <p style="width:88px" class="smallFont">Cultural Landmark</p> -->
				<!--</li>-->
				<li <if condition="CONTROLLER_NAME eq 'Volunteer'">class="active"</if>>					
					<a href="{:U('Pubservice/Volunteer/index')}" id="catid_101">文化志愿服务</a>						
					<!-- <p style="width:90px" class="smallFont">Cultural volunteers</p> -->
				</li>
				<!--<li class="last-item <if condition='CONTROLLER_NAME eq Baseservices'>active</if>">						-->
					<!--<a href="{:U('Pubservice/Baseservices/index')}" id="catid_67">基本服务项目公示</a>						-->
					<!-- <p style="width:80px" class="smallFont">Basic public services</p> -->
				<!--</li>-->
				<li class="last-item <if condition='CONTROLLER_NAME eq Baseservices'>active</if>">						
					<a href="{:U('Industry/Index/index')}" id="catid_67">文化产业服务</a>						
					 <!--<p style="width:80px" class="smallFont">Basic public services</p> -->
				</li>
			</ul>
			<div class="cls"></div>
		</div>
	</div>
</header>