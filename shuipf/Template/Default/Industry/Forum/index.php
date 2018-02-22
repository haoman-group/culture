<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name='after_styles'>
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/list_forum.css">
    <style>

        #thumb_upload li{ float: left; position: relative;}
        #thumb_upload li img{width: 107px;height: 103px}
        #thumb_upload li p{position: absolute;top: 20px;left: 110px;background: #A6E22E;width: 20px;height: 20px;text-align: center;border-radius: 10px;}
        #thumb_upload li p a{display: inline-block;width: 20px;height: 20px;position: absolute;top: 0;left: 0;line-height: 20px;color: #fff}
        #thumb_upload li p:hover{background: red;}
    </style>
</block>


<block name="content">
	<!--所在位置-->
	<div id="nav">
			<div class="container">
				<ul>
					<li>
						<a href="{$config_siteurl}" class="home_src">首页</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href="{:getCategory(1,'url')}">资讯中心</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href="javascript:;" style="color: #2058c2;">我的创意</a>
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
		<!--<div class="forum_online">
		    <span class="">
		   		 在线人数
		   		 <b>{$online_count}</b>
		    </span>
		</div>-->
		<!--<div class="forum_reg">
            <empty name="uid">
                    <a href="{:U('Member/Index/register')}">注册通行证</a>&nbsp;/&nbsp;<a href="{:U('Member/Index/login')}">登录</a>
                <else/>
                    <a href="/bbs?my.htm">{$username}</a>
            </empty>
		</div>-->
		<!--搜索框-->
		<!--<form action="/bbs?search.htm" method="post" id="search_form">
			<input type="text" name="keyword" placeholder="输入你要搜索的关键字" />
			<input type="submit" value="搜索" />
		</form>-->
	</div>
	<!--公告区域-->
    <span style="display: block;width: 1190px;margin: 0 auto;">
             <img src="{$config_siteurl}statics/ci/images/myviewbanner.jpg" alt="">
            </span>
	<div class="forum_g_div">


        <div class="forum_notice" style="width: 585px;">

			<div class="forum_g_top">
				<h3>公告</h3>
				<a href="{:U('Industry/Forum/list_notice')}">往期公告>></a>
			</div>
			<div class="forum_notice_content">
				<ul>
					<li>公告</li>
                    <content action = "lists" catid = "97" order = "id DESC" num= "1" >
                        <volist name='data'  id='vo'>
                           <p>{$vo.description}</p> 
                        </volist>
					
                    </content>
				</ul>
				
				
			</div>
			
		</div>
		<div class="forum_express" style="width: 585px;">
			<div class="forum_g_top">
				<h3>新帖速递</h3>
				<a href="{:U('lists')}">更多>></a>
			</div>
            <ul>
                <li class="hd">
                    <span class="tit">标题</span>
                    <span class="date">发表时间</span>
                    <span class="views">点击</span>
                    <!--<span class="posts">回复</span>-->
                </li>
                <volist name="threads_new" id="vo">
                    <li>
                        <span class="tit"><span>●</span><a href="{:U('show',array('id'=>$vo['id']))}">{$vo.title}</a></span>
                        <span class="date">{$vo.addtime}</span>
                        <span class="views">{$vo.click_num}</span>
                        <span class="posts">{$vo.posts}</span>
                    </li>
                </volist>
            </ul>
		</div>
	</div>
	<!--文章区-->
	<div id="forum_acticle">
		<div class="forum_screen">
			<ul>
                <li class="<empty name='_GET[sort]'>li_default</empty>"><a href="{:U('index')}">默认</a></li>
                <li class="li_hot1 <eq name='_GET[sort]' value='hot'>li_default</eq>"><a href="{:U('index',array('sort'=>'hot'))}">热帖</a></li>
                <li class="<eq name='_GET[sort]' value='jinghua'>li_default</eq>"><a href="{:U('index',array('sort'=>'jinghua'))}">精华</a></li>
                <li class="<eq name='_GET[sort]' value='rank'>li_default</eq>"><a href="{:U('index',array('sort'=>'rank'))}">排行</a></li>
			</ul>
		</div>
		<div class="forum_theme" style="margin-top: 10px;">
			<!--<span>
                <a href="/bbs">全部</a>
                <volist name="forum" id="vo">\<a href="/bbs/?forum-{$vo.fid}.htm">{$vo.name}</a></volist>
			</span>-->
		</div>
		<div class="forum_acticle_title">
			<div class="acticle_div">
				<div class="acticle_list">
                    <ul>
                        <li class="order"></li>
                        <li class="title">标题</li>
                        <li class="author">作者</li>
                        <li class="see">点击</li>
                        <li class="see">回复</li>
                        <li class="send_time">发表时间</li>

                    </ul>
                    <volist name="threads_new" id="wo">
                        <ul>
                            <li class="order"><span class="order_{$i}">{$i}</span></li>
                            <li class="title"><a href="{:U('show',array('id'=>$wo['id']))}">{$wo.title|str_cut=###,40}</a></li>
                            <li class="author">{$wo.username|str_cut=###,6}</li>
                            <li class="see">{$wo.click_num}</li>
                            <li class="see">0</li>
                            
                            <li class="send_time">{$wo.addtime}</li>
                        </ul>
                    </volist>

				</div>
			</div>
		</div>
	</div>
	
	<!--发送帖子区域-->
    <form action="{:U('add')}" method="post" id="post_form">
        <!--<input type="hidden" name="doctype" value="0"/>
        <input type="hidden" name="quotepid" value="0"/>-->
        <input type="hidden" name="userid" value="{$uid}"/>
        <div class="forum_send_div">
            <h3><img src="{$config_siteurl}statics/img/forum_send_01.png"/>快速发新话题</h3>
            <!--<select name="type">
            <option value="">请选择</option>
            <option value="1">热帖</option>
            <option value="2">精华</option>
            </select>-->
            <p class="forum_send_title">标题<input type="text" name="title" id="" value="" /></p>
<!--            <p class='forum_send_content'>-->
<!--                <span>内容</span>-->
<!--                <textarea name="message" rows="" cols=""></textarea>-->
<!--            </p>-->
            <span style="font-size: 16px;font-family:宋体;display: block;margin-top: 40px;">内容</span>
            <td class="proaddeditorbox" style="margin-top: 20px;">
                <script type="text/javascript">
                    var GV = {
                        DIMAUB: "{$config_siteurl}",
                        JS_ROOT: "{$config_siteurl}statics/js/"
                    };
                </script>
                <script id="editor_product" type="text/javascript" name="content" style="width: 1030px;height: 300px;margin-left:50px;"></script>
                <?php echo \Form::editor("editor_product"); ?>
            </td>
                <!--            <td><div id='content_tip'></div><script type="text/plain" id="content" name="message">{$info.content}</script>--><?php //echo Form::editor('content','full','contents',1); ?><!--</td>-->
<!--            <dt style="margin-left: 5px;margin-top: 30px;font-size:14px;font-family: "Microsoft Yahei", "微软雅黑" ">添加图片：</dt><dd class="img" style="height: 60px;margin-left: 80px"><Form function="images" parameter="images,images,'',content"/><span>*（图片大小，分辨率，格式要求）</span></dd>-->
    		<div class="forum_send_bt">
                <input  class="btn" type="submit" value="发表帖子"/>
<!--    			<button onclick="$('#form-post').submit();">发表帖子</button>-->
<!--    			<div class="edit_pre">-->
<!--    				<span>预览帖子</span>-->
<!--    				<span>修改帖子</span>-->
<!--    			</div>-->

    		</div>
        </div>
    </form>
</block>

<block name="after_scripts">
    <script src="{$config_siteurl}statics/js/wind.js"></script>

    <script type="text/javascript" src="{$Config_siteurl}statics/js/content_addtop.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/comm.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/linkagesel.js"></script>
    <script>
        jsearch_form = $('#search_form');
        jsearch_form.on('submit', function() {
            var keyword = jsearch_form.find('input[name="keyword"]').val();
            var url = '/bbs/?search-'+keyword+'.htm';
            window.location = url;
            return false;
        });
       

    </script>
</block>