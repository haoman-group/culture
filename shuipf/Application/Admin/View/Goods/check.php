<!--<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>添加新文章 - 系统后台 - {$Config.sitename} - by LvyeCMS</title>
<Admintemplate file="Admin/Common/Cssjs"/>
<style type="text/css">
.col-auto {
	overflow: hidden;
	_zoom: 1;
	_float: left;
	border: 1px solid #c2d1d8;
}
.col-right {
	float: right;
	width: 210px;
	overflow: hidden;
	margin-left: 6px;
	border: 1px solid #c2d1d8;
}

body fieldset {
	border: 1px solid #D8D8D8;
	padding: 10px;
	background-color: #FFF;
}
body fieldset legend {
    background-color: #F9F9F9;
    border: 1px solid #D8D8D8;
    font-weight: 700;
    padding: 3px 8px;
}
.list-dot{ padding-bottom:10px}
.list-dot li,.list-dot-othors li{padding:5px 0; border-bottom:1px dotted #c6dde0; font-family:"宋体"; color:#bbb; position:relative;_height:22px}
.list-dot li span,.list-dot-othors li span{color:#004499}
.list-dot li a.close span,.list-dot-othors li a.close span{display:none}
.list-dot li a.close,.list-dot-othors li a.close{ background: url("{$config_siteurl}statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
.list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
.list-dot-othors li{float:left;width:24%;overflow:hidden;}
</style>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <form name="myform" id="myform" action="{:U("add")}" method="post" class="J_ajaxForms" enctype="multipart/form-data">
  <div class="col-right">
    <div class="table_full">
      <table width="100%">
      	
	  </table>
	</div>
	</form>
	
	</div>
	<div class="col-auto">
    <div class="h_a">信息发布</div>
    <div class="table_full">
    	<form action="{:U('Goods/edit',array('id' => $data['id']))}" method="post">
		      <table width="100%">
		      	<tr><td>商品名称</td><td><input type="" name="title" id="" value="{$data.title}" /></td></tr>
		      	<tr><td>商品图片</td><td><img src="{$data.thumb}" style="width: 150px;height: 50px;"/></td></tr>
		      	<tr><td>商品价格</td><td><input type="" name="price" id="" value="{$data.price}" /></td></tr>
		      	<tr><td>演员列表</td><td><input type="" name="person" id="" value="{$data.person}" /></td></tr>
		      	<tr><td>演出场馆</td><td><input type="" name="address" id="" value="{$data.address}" /></td></tr>
		      	<tr><td>联系电话</td><td><input type="" name="tel" id="" value="{$data.tel}" /></td></tr>
		      	<tr><td>演出时间</td><td><input type="" name="time" id="" value="{$data.time}" /></td></tr>
		      	<tr><td>商品简介</td><td><input type="" name="content" id="" value="{$data.content}" /></td></tr>
		      	<tr><td>商品状态</td><td><input type="" name="status" id="" value="{$data.status}" /></td></tr>
		      	<tr><td>商品优惠</td><td><input type="" name="keyowrds" id="" value="{$data.keywords}" /></td></tr>
		      </table>
        	<input type="submit" value="提交"/ style="margin-top: 10px;margin-left: 15px;">
    	</form>
    </div>	-->
	<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<style type="text/css">
    .table_full th {
        width: 147px;
    }
</style>
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li><a href="{:U('index')}">商品列表</a></li>
            <li class="current"><a href="###">查看</a></li>
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            
            <form class="J_ajaxForm" action="{:U('Admin/Goods/edit')}" method="post" enctype="multipart/form-data" >
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
				<input type="hidden" name="id" value="{$data['id']}">
                <tr><th>商品名称</th><td><input type="" name="title" id="" value="{$data.title}" class="input"  disabled="disabled" /></td></tr>
		      	<tr><th>商品价格</th><td><input type="" name="price" id="" value="{$data.price}"  class="input" disabled="disabled" /><p>(填写不同价格请用“/”逗号隔开)</p></td></tr>
		      	<tr><th>演员列表</th><td><input type="" name="person" id="" value="{$data.person}"  class="input" disabled="disabled" /><p>(填写不同演员请用“/”逗号隔开)</p></td></tr>
		      	<tr><th>演出场馆</th><td><input type="" name="address" id="" value="{$data.address}" class="input" disabled="disabled" /></td></tr>
		      	<tr><th>联系电话</th><td><input type="" name="tel" id="" value="{$data.tel}"  class="input" disabled="disabled" /></td></tr>
		      	<tr><th>演出时间</th><td><input type="" name="time" id="" value="{$data.time}" class="input" disabled="disabled" /><p>请以“1990-12-15 周六 19:30”的格式填写，添加多个请用中文格式下“/”逗号隔开</p></td></tr>
		      	<tr><th>商品简介</th><td><input type="text" name="content" id="" value="{$data.content}" class="input" disabled="disabled" /></td></tr>
		      	<tr><th>商品状态</th><td>
		      		<select name="status" disabled="disabled">
		      			<option value="">请选择</option>
		      			<option value="售票中" <if condition="$data['status'] eq '售票中' "> selected="selected"</if>>售票中</option>
		      			<option value="暂停售票" <if condition="$data['status'] eq '暂停售票' "> selected="selected"</if>>暂停售票</option>
		      		</select>
		      	</td></tr>
		      	<tr><th>商品优惠</th><td>
		      		<select name="keywords" disabled="disabled">
		      			<option value="">请选择</option>
		      			<option value="特价" <if condition="$data['keywords'] eq '特价' "> selected="selected"</if>>特价</option>
		      			<option value="活动" <if condition="$data['keywords'] eq '活动' "> selected="selected"</if>>活动</option>
		      			<option value="热卖" <if condition="$data['keywords'] eq '热卖' "> selected="selected"</if>>热卖</option>
		      			<option value="疯抢" <if condition="$data['keywords'] eq '疯抢' "> selected="selected"</if>>疯抢</option>
		      			<option value="爆款" <if condition="$data['keywords'] eq '爆款' "> selected="selected"</if>>爆款</option>
		      		</select>
		      	</td></tr>
                   <tr>
                        <th>图片：</th>
                        <td>
                           
                            <ul class="img jsaddimgul" id="drama_picture">
                                <for start="0" end="$count">
                                    <if condition="$picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="drama_picture_url[]" value="{$picture_urls[$i]}">
                                            <img src="{$picture_urls[$i]}">
                                            
                                        </li>
                                        <else/>
                                        
                                        <li class="noimg"></li>
                                    </if>
                                </for>
                            </ul>
                        </td>
                    </tr>
                </table>
                <!-- </div> -->
                
            </form>        
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    <?php
    $alowexts = "jpg|jpeg|gif|bmp|png";
    $thumb_ext = ",";
    $watermark_setting = 1;
    $module = "Content";
    $catid = "0";
	
    $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id) {
        flashupload(id + '_images', '图片上传', id, submit_pic, '{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey}');
    }

    function submit_pic(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var in_content = d.$("#att-status").html().substring(1);
        var contents = in_content.split('|');
        if (contents == '') return true;
        $.each(contents, function (i, n) {
            var str = "<input type='hidden' name='" + returnid + "_url[]' value='" + n +
                "'><img src='" + n + "'><div class='operate'><span class='sl'></span>" +
                "<span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>";
            $('#' + returnid).find(".noimg:first").html(str);
            $('#' + returnid).find(".noimg:first").removeClass("noimg");
        });
    }

    /*图片移动*/
    $(".jsaddimgul").on("click", "li span", function () {
        var $ul1 = $(this).parent().parent();
        if ($(this).hasClass("sl")) {
            var $ul2 = $(this).parent().parent().prev("li");
        }
        else {
            var $ul2 = $(this).parent().parent().next("li");
        }
        var ulhtml1 = $ul1.html();
        var ulhtml2 = $ul2.html();
        $ul1.html(ulhtml2);
        $ul2.html(ulhtml1);
        if ($ul2.hasClass("noimg")) {
            $ul2.removeClass("noimg");
            $ul1.addClass("noimg");
        }
    })
    $(".jsaddimgul").on("click", "li a", function () {
        var $li = $(this).parent().parent();
        $li.addClass("noimg");
        $li.empty();
    })
    <?php
    $authkey_video = upload_key("$maxVideoNum,$alowexts,1,$thumb_ext,$watermark_setting");
    $allowexts_audio = "mp3|wav";
    $authkey_audio = upload_key("$maxAudioNum,$allowexts_audio,1,$thumb_ext,$watermark_setting");
    ?>
    function upvideo(id) {
        videoupload(id + '_upload', '视频上传', id, submit_video, '{$maxVideoNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey_video}');
    }

    function upaudio(id) {
        audioupload(id + '_upload', '音频上传', id, submit_audio, '{$maxAudioNum},{$allowexts_audio},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey_audio}');
    }

    function submit_video(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var video_id = d.$("#video-id").html();
        var video_title = d.$("#video-title").html();
        // console.log(video_id);
        video_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="' + video_id + '" hidden /></li>';
        video_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="' + video_title + '" readonly="readonly" /><span>审核中...</span></li>';
        //只能上传一个视频,如果需要改变上传限制,所有视频的show页面都必须进行修改
        $('#' + returnid).html(video_html);

    }

    function submit_audio(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var audio_id = d.$("#audio-id").html();
        var audio_title = d.$("#audio-title").html();
        audio_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="' + audio_id + '" hidden /></li>';
        audio_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="' + audio_title + '" readonly="readonly" /><span>审核中...</span></li>';
        //只能上传一个音频,如果需要改变上传限制,所有音频的show页面都必须进行修改
        $('#' + returnid).html(audio_html);
    }


</script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<script>
 $('a.btn_add').on('click',function(){
        var type = $(this).data('type');
        
       
        var index = layer.open({
            type: 2,
            title: '添加',
            shadeClose: true,
            shade: 0.8,
            area: ['40%', '40%'],
            content: '/Admin/Art/'+type
        });
    });

    function tel(){
        alert("正在研发，敬请期待");
    }
</script>
</html>