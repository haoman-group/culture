<extend name="./shuipf/Template/Default/Industry/common/_layout.php"/>
<block name="after_styles">

    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/finance.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/page_common.css" />
    <style>
        .prodlistbox .ulcell .subject_img {padding: 0}
        .prodlistbox .ulcell .subject_img img{width: 274px}
        .prodlistbox .ulcell .subject_img h5{height: 65px;line-height: 65px;margin-top: 0}
    </style>
</block>
<block name="after_scripts">
	<script type="text/javascript">
        $(function(){
            $('.brandattr .brandl dd a').click(function(){
                $(this).addClass('bluea').siblings('a').removeClass('bluea');
                var type = $(this).attr('name');
                var msg = $(this).text()
                var id = $(this).index();

                // alert(msg);
                $('input[name='+type+']').val(msg);
                $('input[name='+type+'_id]').val(id)
                var brand = $('input[name=brand]').val();
                var craft= $('input[name=craft]').val();
                var color = $('input[name=color]').val();
                var func = $('input[name=func]').val();
                
                var url = "{:U('Industry/Product/subject')}&brand="+brand+"&craft="+craft+"&color="+color+"&func="+func;
                var data = $('form').serialize();
                 $.post("{:U('Industry/Product/subject')}",data, function(data) {
                    
                });
                
            })
        })
			function filter(type,msg){
              
				$('input[name='+type+']').val(msg);

				var brand = $('input[name=brand]').val();
				var craft= $('input[name=craft]').val();
				var color = $('input[name=color]').val();
				var func = $('input[name=func]').val();
				//拼网址
				var url = "{:U('Industry/Product/subject')}&brand="+brand+"&craft="+craft+"&color="+color+"&func="+func;
				// window.location.href = url;
               
			}
		
	</script>
</block>
<block name="content">
    
    <div id="nav">
        <div class="container">
            <ul>
                <li>
                    <a href="{$config_siteurl}" class="home_src" style="color:#900">首页</a>
                </li>
                <li><span>&gt;</span></li>
                <li>
                    <a href="{:U('Industry/Product/index')}">产品展示</a>
                </li>
                <li><span>&gt;</span></li>
              
                <li>
                    <a href="javascript:;" class="href_tail on" style="color:#900">主题馆</a>
                </li>
                <if condition = "$_GET['category']">
                    <li><span>&gt;</span></li>
               
                    <li>
                        <a href="javascript:;" class="href_tail on">{$_GET['category']}</a>
                    </li>
                    
                </if>
                <if condition = "$_GET['type']">
                    <li><span>&gt;</span></li>
                    <li>
                        <a href="javascript:;" class="href_tail on">{$_GET['type']}</a>
                    </li>
                </if>
            </ul>
            <form action="">
                <input type="text" placeholder="输入你要搜索的关键字" />
                <input type="submit" value="搜索" />
            </form>
        </div>
    </div>
    
    <div id="content">
        <div class="container clearfix">
            
            
            <div class="brandattr" style="border-top: none;">
                <dl class="brandl">
                    <dt>品　牌：</dt>
                    <dd>
                        <a href="javascript:;" name="brand" class="bluea">中阳剪纸</a>
                        <a href="javascript:;" name="brand">广灵剪纸</a>
                        <a href="javascript:;" name="brand" >静乐剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','孝义剪纸')" >孝义剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','隰县剪纸')" >隰县剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','武乡剪纸')" >武乡剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','浮山剪纸')" >浮山剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','新绛戏曲剪纸')" >新绛戏曲剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','高平剪纸')" >高平剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','沁源剪纸')" >沁源剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','陵川剪纸')" >陵川剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','右玉剪纸')" >右玉剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','柳林剪纸')" >柳林剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','寿阳福寿剪纸')" >寿阳福寿剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','左权剪纸')" >左权剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','闻喜剪纸')" >闻喜剪纸</a>
                        <a href="javascript:;" onclick="filter('brand','万荣剪纸')" >万荣剪纸</a>
                    </dd>
                </dl>
                <dl class="brandl">
                    <dt>技　艺：</dt>
                    <dd>
                        <a href="javascript:;" onclick="filter('craft','阴刻')" >阴刻</a>
                        <a href="javascript:;" onclick="filter('craft','阳刻')" class="bluea">阳刻</a>
                        <a href="javascript:;" onclick="filter('craft','阴阳结合')" >阴阳结合</a>
                        <a href="javascript:;" onclick="filter('craft','刺孔剪')" >刺孔剪</a>
                        <a href="javascript:;" onclick="filter('craft','折叠剪纸')" >折叠剪纸</a>
                        <a href="javascript:;" onclick="filter('craft','剪影')" >剪影</a>
                        <a href="javascript:;" onclick="filter('craft','撕纸')" >撕纸</a>
                    </dd>
                </dl>
                <dl class="brandl">
                    <dt>色　彩：</dt>
                    <dd>
                        <a href="javascript:;" onclick="filter('color','点染剪纸')" >点染剪纸</a>
                        <a href="javascript:;" onclick="filter('color','套色剪纸')" class="bluea">套色剪纸</a>
                        <a href="javascript:;" onclick="filter('color','阴分色剪纸刻')" >分色剪纸</a>
                        <a href="javascript:;" onclick="filter('color','填色剪纸')" >填色剪纸</a>
                        <a href="javascript:;" onclick="filter('color','木印剪纸')" >木印剪纸</a>
                        <a href="javascript:;" onclick="filter('color','喷绘剪纸')" >喷绘剪纸</a>
                        <a href="javascript:;" onclick="filter('color','勾绘剪纸')" >勾绘剪纸</a>
                        <a href="javascript:;" onclick="filter('color','彩编剪纸')" >彩编剪纸</a>
                    </dd>
                </dl>
                <dl class="brandl">
                    <dt>功　能：</dt>
                    <dd>
                        <a href="javascript:;" onclick="filter('func','窗花')" >窗花</a>
                        <a href="javascript:;" onclick="filter('func','喜花')" class="bluea">喜花</a>
                        <a href="javascript:;" onclick="filter('func','礼花')" >礼花</a>
                        <a href="javascript:;" onclick="filter('func','鞋花')" >鞋花</a>
                        <a href="javascript:;" onclick="filter('func','门阀')" >门阀</a>
                        <a href="javascript:;" onclick="filter('func','斗香花')" >斗香花</a>
                        <a href="javascript:;" onclick="filter('func','剪纸旗幡')" >剪纸旗幡</a>
                        <a href="javascript:;" onclick="filter('func','其他')" >其他</a>
                    </dd>
                </dl>
            </div>
            <div class="prodlistbox">
                <ul class="ulcell">
                	<foreach name='data' item="vo">
	                    <li>
	                        <div class="anaimg subject_img">
	                            <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}">
	                                <img src=".{$vo['thumb'][0]}">
	                            </a>
	                            <h5><a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}">{$vo.p_name|str_cut=###,10}</a></h5>
	                        </div>
	                    </li>
                    </foreach>
                </ul>
                <form method="post">
                	<input type="hidden" name="brand" id="brand" value="{$brand}" />
                	<input type="hidden" name="craft" id="craft" value="{$craft}" />
                	<input type="hidden" name="color" id="color" value="{$color}" />
                	<input type="hidden" name="func" id="func" value="{$func}" />
                    <input type="hidden" name="brand_id" value="{$brand_id}">
                    <input type="hidden" name="craft_id" value="{$craft_id}">
                    <input type="hidden" name="color_id" value="{$color_id}">
                    <input type="hidden" name="func_id" value="{$func_id}">
                </form>
              
                
            </div>
            <if condition= "$page">
                <div class="pagebox">
                    {$page}
                </div>
            </if>
            
        </div>
    </div>


</block>