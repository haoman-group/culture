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
            <li class="current"><a href="###">添加</a></li>
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            
            <form class="J_ajaxForm" action="{:U('Admin/Goods/add')}" method="post" enctype="multipart/form-data" >
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                   <tr><th>商品名称</th><td><input type="" name="title" id="" value="" class="input" /></td></tr>
		      	<tr><th>商品价格</th><td><input type="" name="price" id="" value=""  class="input"/><p>(填写不同价格请用“/”逗号隔开)</p></td></tr>
		      	<tr><th>演员列表</th><td><input type="" name="person" id="" value=""  class="input"/><p>(填写不同演员请用“/”逗号隔开)</p></td></tr>
		      	<tr><th>演出场馆</th><td><input type="" name="address" id="" value="" class="input" /></td></tr>
		      	<tr><th>联系电话</th><td><input type="" name="tel" id="" value=""  class="input"/></td></tr>
		      	<tr><th>演出时间</th><td><input type="" name="time" id="" value="" class="input" /><p>请以“1990-12-15 周六 19:30”的格式填写，添加多个请用中文格式下“/”逗号隔开</p></td></tr>
		      	<tr><th>商品简介</th><td><input type="text" name="content" id="" value="" class="input" /></td></tr>
		      	<tr><th>商品状态</th><td>
		      		<select name="status">
		      			<option value="">请选择</option>
		      			<option value="售票中">售票中</option>
		      			<option value="暂停售票">暂停售票</option>
		      		</select>
		      	</td></tr>
		      	<tr><th>商品优惠</th><td>
		      		<select name="keywords">
		      			<option value="">请选择</option>
		      			<option value="特价">特价</option>
		      			<option value="活动">活动</option>
		      			<option value="热卖">热卖</option>
		      			<option value="疯抢">疯抢</option>
		      			<option value="爆款">爆款</option>
		      		</select>
		      	</td></tr>
                   <tr>
                        <th>图片：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('drama_picture')" class="seller_upload_image">上传图片</a>
                                    <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="drama_picture">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="drama_picture_url[]" value="{$picture_urls[$i]}">
                                            <img src="{$picture_urls[$i]}">
                                            <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                    href="javascript:void(0)" class="tupian"></a></div>
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
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
                    </div>
                </div>
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