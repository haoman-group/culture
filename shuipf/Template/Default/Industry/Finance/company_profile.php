<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name='after_styles'>
	<style type="text/css">
		#content .content_main{border: 1px solid #ccc;margin: 0 auto;width: 1200px;}
		#content .company_title h3{background: #e2ebf2 none repeat scroll 0 0;color: #3398db;height: 50px;line-height: 50px;}
		#content .company_title p{font: 14px/22px "微软雅黑";text-indent: 2em;color: #686a76;padding: 20px;}
		#content .obj_list{padding-top: 40px;margin: 0 auto;width: 1200px;}
		#content .obj_list .obj_div{width: 270px;height: 292px;border: 1px solid #ccc;display: inline-block;margin-left: 22px;margin-bottom: 22px;}
		#content .obj_list .obj_div img{width: 270px;height: 205px;padding: 20px;}
		#content .obj_list .obj_div h4{padding: 7px 20px 0;}
		#content .obj_list .obj_div p{padding: 0 20px;font: 14px/18px "微软雅黑";}
	</style>
	
</block>


<block name="content">
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{:U('Industry/Index/index')}" class="home_src">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="{:U('Industry/Index/lists',array('catid'=>21))}">金融服务</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;">评价结果</a>
				</li>
				<li>
					<a href="javascript:;">五星企业</a>
				</li>
				<li>
					<a href="javascript:;" style="color: #2058c2;">育达集团</a>
				</li>
			</ul>
			<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" />
				<input type="submit" value="搜索" />
			</form>
		</div>
	</div>
	<div id="content">
		<div class="content_main">
			<div class="company_title">
				<h3>丨&nbsp;育达集团</h3>
				<p>asdsdgdfhgjhdsfasd</p>
			</div>
		</div>
		<div class="obj_list">
			<div class="obj_div">
				<img src="{$Config_siturl}statics/images/b.jpg"/>
				<h4>项目名称：舞台先工艺品1</h4>
				<p>行业： 文化旅游 地区： 山西省</p>
				<p>行业： 文化旅游 地区： 山西省</p>
				
			</div>
			<div class="obj_div">
				<img src="{$Config_siturl}statics/images/b.jpg"/>
				<h4>项目名称：舞台先工艺品1</h4>
				<p>行业： 文化旅游 地区： 山西省</p>
				<p>行业： 文化旅游 地区： 山西省</p>
				
			</div>
			<div class="obj_div">
				<img src="{$Config_siturl}statics/images/b.jpg"/>
				<h4>项目名称：舞台先工艺品1</h4>
				<p>行业： 文化旅游 地区： 山西省</p>
				<p>行业： 文化旅游 地区： 山西省</p>
				
			</div>
			<div class="obj_div">
				<img src="{$Config_siturl}statics/images/b.jpg"/>
				<h4>项目名称：舞台先工艺品1</h4>
				<p>行业： 文化旅游 地区： 山西省</p>
				<p>行业： 文化旅游 地区： 山西省</p>
				
			</div>
			<div class="obj_div">
				<img src="{$Config_siturl}statics/images/b.jpg"/>
				<h4>项目名称：舞台先工艺品1</h4>
				<p>行业： 文化旅游 地区： 山西省</p>
				<p>行业： 文化旅游 地区： 山西省</p>
				
			</div>
		</div>
		
		
	</div>
</block>