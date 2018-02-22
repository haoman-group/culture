<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" type="text/css" href="{$Config_siteurl}statics/ci/css/product_add.css"/>

    <!-- <link href="{$Config_siteurl}statics/js/uploadify/uploadify.css"> -->
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
	<style type="text/css">
	/* m_zlxg */

	.m_zlxg{ width:93px; height:30px; line-height:30px;cursor:pointer;float:left;margin:0 10px 0 0;display:inline;background:url(statics/images/zlxg2.jpg) no-repeat;}

	.m_zlxg p{ width:71px; padding-left:10px; overflow:hidden; line-height:30px; color:#333333; font-size:12px; font-family:"微软雅黑";text-overflow:ellipsis; white-space:nowrap;}

	.m_zlxg2{ position:absolute; top:29px; border:1px solid #ded3c1;background:#fff; width:91px; display:none; max-height:224px;-height:224px; overflow-x:hidden; overflow-y:auto;white-space:nowrap;}

	.m_zlxg2 li{line-height:28px;white-space:nowrap; padding-left:10px;font-family:"微软雅黑";color:#333333; font-size:12px;}

	.m_zlxg2 li:hover{ color:#7a5a21;}

    #content .container .select_div .type ul{display: none}
    #content .container .select_div .type ul:first-child{display: block;}
    #content .container .select_div .brand ul{display: none}
    #content .container .select_div .brand ul:first-child{display: block;}
    #thumb{display: none}


    #thumb_upload {display: inline-block;}
    #thumb_upload li{ float: left; position: relative;}
    #thumb_upload li img{width: 107px;height: 103px}
    #thumb_upload li p{position: absolute;top: 20px;left: 110px;background: #A6E22E;width: 20px;height: 20px;text-align: center;border-radius: 10px;}
    #thumb_upload li p a{display: inline-block;width: 20px;height: 20px;position: absolute;top: 0;left: 0;line-height: 20px;color: #fff}
    #thumb_upload li p:hover{background: red;}
	</style>
</block>


<block name="content">
<div id="nav">
<div class="container">
    
	<ul>
		<li>
			<a href="{$config_siteurl}" class="home_src">首页</a>
		</li>
		<li><span>&gt;</span></li>
		<li>
			<a href="{:getCategory(1,'url')}">产品展示</a>
		</li>
		<li><span>&gt;</span></li>
		<li>
			<a href="javascript:;" class="href_tail">产品发布</a>
		</li>
	</ul>
	<form action="">
		<input type="text" placeholder="输入你要搜索的关键字" />
		<input type="submit" value="搜索" />
	</form>
</div>
</div>
<div id="content">
    <div class="container clearfix">
    	<!--头部搜索框-->
        <div class="header_search">
           		最近使用：
           		<input type="text" name="" id="" value="" />
        </div>
        <!--头部搜索框结束-->
        
        <!--中部选择框-->
        <form method="post" action="{:U('Industry/Product/add')}">
        <div class="select_div">
        	<div class="select category">
        		<ul>
                
                <foreach name ='category' item = 'vo' key ="key">
            		<li cnum="{$vo.id}">{$vo.c_name}<span>></span></li>
                </foreach>   
            	
            	<input type="hidden" name='cate_id' value="{$category[0]['id']}">	
            	</ul>
        	</div>
            <div class="select type" style="vertical-align: top;">
                <foreach name = 'type' item='vo' key ="key">
            		<ul num='{$key}'>
                        <volist name='vo' id='value'>
                		  <li tnum='{$value.tid}' value="{$value['tid']}">{$value.typename}</li>
                        </volist>
                        
                	</ul>
                </foreach>
                <input type="hidden" name='tid' value="{$type[0][0]['tid']}">
        	</div>
        	<div class="select brand" style="vertical-align: top;">
                <foreach name='brand' item='vo' key = 'key'>
        		<ul num="{$key}">
                    <volist name='vo' id="value">
            		  <li bnum="{$value.bid}">{$value.brandname}</li>
                    </volist>
            	</ul>
                </foreach>
                <input type="hidden" name='brand_id'>
        	</div>
        </div>
        <!--中部选择结束-->
        <!--发布内容-->
        <div class="send_content">
        	<h4>填写产品信息</h4>
        	
        	<table border="0" cellspacing="0" cellpadding="0">
        		<tr>
        			<td >*&nbsp;产品名称：</td>
        			<td><input type="text" name="p_name" id="" value=""  class="name" /></td>
        		</tr>
        		<tr>
        			<td>*&nbsp;产&nbsp;&nbsp;地：</td>
        			<td>
						<select id="area" class="LinkageSel" name="area[]"></select>
						<input type="hidden" name="area" class="area" value=""/>
        			</td>
        		</tr>

        		<tr>
        			<td>*&nbsp;旅游产品：</td>
        			<td>
        				
        				<select name="type">
							<option value="0">否</option>
							<option value="佛教用品店">佛教用品店</option>
							<option value="黄河风情街">黄河风情街</option>
							<option value="晋商文化馆">晋商文化馆</option>
							<option value="太行特产购">太行特产购</option>
							<option value="寻根觅祖祠">寻根觅祖祠</option>
							<option value="红色纪念馆">红色纪念馆</option>
        				</select>
        			</td>
        		</tr>
				<!-- <tr>
					<td>*&nbsp;国际馆：</td>
					<td>
						<select name="international">
							<option value="0">否</option>
							<option value="毛里求斯馆">毛里求斯馆</option>

						</select>
					</td>
				</tr> -->
                
        		<tr>
        			<td>*&nbsp;售价：</td>
        			<td><input type="text" name="price" id="" value="" />元</td>
        		</tr>
        		<tr>
        			<td>*&nbsp;生产厂家：</td>
        			<td><input type="text" name="manufacturer" id="" value="" /></td>
        		</tr>
        		<tr>
        			<td>*&nbsp;联系方式：</td>
        			<td><input type="text" name="phone" id="" value="" /></td>
        		</tr>
        		<tr>
        			<td>*&nbsp;上传图片：</td>
        			<td>
                        <Form function="multi_images" parameter="thumb,thumb_upload,[],content,2,50,input,'',png|jpg|gif|jpeg"/>

                        <!--<div class="add" style ="display: inline-block;">

                        <img id="thumb_preview" src="qq" style="cursor:hand" width="107" height="103">
                        </div>-->

                        <!--<input class="button" onclick="javascript:flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|bmp|png,1,,,0','content','','fd30ec18aa0c6a0b2ce1db0c7377230c')" value="" type="button" style="background: url('/statics/images/icon/tianjia2.jpg') no-repeat -1px 0;vertical-align: top">
                        <input id="thumb" class="input" name="info[thumb]" value="" type="text">-->
                       <!--  <Form function="images" parameter="thumb,thumb,thumb'',content"/>  --> 
        			</td>
        		</tr>
        		<tr>
        			<td>*&nbsp;产品描述：</td>
        			<td class="proaddeditorbox">
        				<script type="text/javascript">
        					var GV = {
							    DIMAUB: "{$config_siteurl}",
								JS_ROOT: "{$config_siteurl}statics/js/"
							};
        				</script>
						<script id="editor_product" type="text/javascript" name="p_describe" style="width: 620px;height: 300px;"></script>
		                  <?php echo \Form::editor("editor_product"); ?>
        			</td>
        		</tr>
                <tr>
                    <td></td>
                    <td class="proadd_chks">
                        <input type="checkbox" name="week_shop" id="chk1" value="1">
                        <label for="chk1">一周一品</label>
                        <input type="checkbox" name="sx_make" id="chk2" value="1" >
                        <label for="chk2">山西质造</label>
                        <input type="checkbox" name="special_market" id="chk3" value="1" >
                        <label for="chk3">特价超市</label>
                        <input type="checkbox" name="union_act" id="chk4" value="1" >
                        <label for="chk4">联盟活动</label>
                    </td>
                </tr>
        		<tr>
        			<input type="hidden" name="uid" value="{$uid}">
        			<td colspan="2" class=" sub_but">
        				<input type="submit" id="" name="" value="确认发布" class="submit" style="text-align: center;"/>
        			</td>
        		</tr>
        	</table>
            
        </div>
        <!--发布内容 结束-->
        </form>
    </div>

</div>
</block>


<block name="after_scripts">
    <script type="text/javascript" src="{$config_siteurl}statics/js/address.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#sjld").sjld("#shenfen","#chengshi","#quyu");
        });
    </script>
    <script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "{$config_siteurl}",
    JS_ROOT: "{$config_siteurl}statics/js/"
};
</script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
    <script>
        var uid = {$uid};
        checked_login(uid);
    </script>
    <script src="{$config_siteurl}statics/js/wind.js"></script>

    <script type="text/javascript" src="{$Config_siteurl}statics/js/content_addtop.js"></script>
    <script type="text/javascript">

        $(function(){
            $('.category ul li').click(function(){
                // var num = $(this).attr('num');
                var cid = $(this).attr('cnum');
                $(this).css({"background": "#F5F5F5"}).siblings('.category ul li').css({"background": "#FFF"})
                $('input[name=cate_id]').val(cid)
                // alert(num);
                $('.type ul[num='+ cid +']').css({'display':'block'}).siblings('.type ul').css({'display':'none'});
                $('.brand ul').css({'display':'none'})
            })
            $('.type ul li').click(function(){
                var tid = $(this).attr('tnum');
                $(this).css({"background": "#F5F5F5"}).siblings('.type ul li').css({"background": "#FFF"})
                $('input[name=tid]').val(tid);
                $('.brand ul[num='+ tid +']').css({'display':'block'}).siblings('.brand ul').css({'display':'none'});
            })
            $('.brand ul li').click(function(){
                var bid = $(this).attr('bnum');
                $(this).css({"background": "#F5F5F5"}).siblings('.brand ul li').css({"background": "#FFF"})
                $('input[name=brand_id]').val(bid);
            })
        })
       
        
    </script>

	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/comm.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/linkagesel.js"></script>
	<script>

		var opts = {
			ajax: "/index.php?g=Api&m=Area&a=ajax",
			selStyle: 'margin-left: 6px;',
			select:  '#area',
			head: '请选择',
			defVal: [<?php echo $addr['area'] ?>],
			selName:'area[]',
			level: 3,
		};
		var linkageSel = new LinkageSel(opts);

		linkageSel.onChange(function() {
			var selected = linkageSel.getSelectedArr();
			$(".area").val(selected.toString());
		});
	</script>
    <script type="text/javascript">
        $(function(){

            $('.submit').click(function(){
                var areaarr = $('.LinkageSel:nth-child(3)').val();
                if(!areaarr){
                    alert('请填写详细的产地');
                    return false;
                }
                var p_name = $('input[name=p_name]').val();
                if(!p_name){
                   alert("请填写产品名称") 
                   return false;
                }
                var price = $('input[name=price]').val();
                if(!price){
                   alert("请填写产品售价") 
                   return false;
                }
                var manufacturer = $('input[name=manufacturer]').val();
                if(!manufacturer){
                   alert("请填写产品的生产厂家")  
                   return false;
                }
                var phone = $('input[name=phone]').val();
                if(!phone){
                    alert("请填写联系方式");
                    return false;
                }  
                var des =  editoreditor_product.getContent();
                   
                if(!des){
                    alert('请填写产品描述');
                    return false;
                }

            })
        })
    </script>
</block>
