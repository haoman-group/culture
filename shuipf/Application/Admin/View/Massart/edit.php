<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />
<style>
 th{
     width:167px;
 }
</style>
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('Admin/Massart/index')}">群众文艺列表</a></li>
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            <form class="J_ajaxForm" action="{:U('edit')}" method="post"  >
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">

                    
                <tr name="selectshowhidden" >
                <th>所属地区：</th>
                <td><select id="area" class="select_area1"></select></td>
                </tr>
                <tr>
                    <th width="147">标题</th>
                    <td>
                    
                <input type="hidden" style="opacity: 0; width: 0px;" name="areaid" class="area" value="{$data.areaid}"/>
                        <input type="text" maxlength="145" class="input length_5" name="title" value="{$data['title']}" >
                        <input type="hidden" maxlength="145" class="input" name="id" value="{$data['id']}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">副标题</th>
                    <td>
                        <input type="text" maxlength="255" class="input length_5" name="deputy_title" value="{$data['deputy_title']}" required="required">
                    </td>
                </tr>
                <tr>
                    <th width="147">内容</th>
                    <td>
                        <textarea type="text" class="input_txt" name="content" >{$data['content']}</textarea>
                    </td>
                </tr>
                  <tr>
                        <th>视频：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upvideo('music_video')" class="seller_upload_image">上传视频</a>
                                    <p class="tips">本类目下您最多可以上传{$maxVideoNum}部视频</p>
                                </li>
                            </ul>
                            <ul id="music_video">
                                <for start="0" end="$maxVideoNum">
                                    <if condition="$data['video'] neq ''">
                                        <li><input type="text" class="input" name="music_video[]" size="20"
                                                   value="{$data['video']}" hidden/></li>
                                        <li><input type="text" class="input input-video" name="music_video_title[]"
                                                   size="60" value="{$data['video_title']}" readonly='readonly'/><span>审核中...</span>
                                        </li>
                                    </if>
                                </for>
                            </ul>
                        </td>
                    </tr>
                <!--<tr>
                    <th width="147">视频标题</th>
                    <td>
                        <input type="text" maxlength="145" class="input" name="video_title" value="" >
                    </td>
                </tr>-->
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
                                    <if condition="$drama_picture_url[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="drama_picture_url[]" value="{$drama_picture_url[$i]}">
                                            <img src="{$drama_picture_url[$i]}">
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
                <!--<tr>
                    <th width="147">封面</th>
                    <td>
                        <input type="text" maxlength="145" class="input" name="cover" value="" >
                    </td>
                </tr>-->
                <tr>
                    <th width="147">关键词</th>
                    <td>
                        <input type="text" maxlength="500" class="input" name="keywords" value="{$data['keywords']}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">文艺分类</th>
                    <td>
                        <select name="category">
                        <volist name="category" id="vo">
                        <option value="{$key}" <if condition="$data['category'] eq $key " >selected="selected" </if>>{$vo}
                        </option>
                        </volist>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="147">第几届</th>
                    <td>
                       <select name="session">
                        <for start="1" end="20">
                            <option value="{$i}" <if condition="$data['session'] eq $i " >selected="selected" </if>>第{$i}届
                            </option>
                        </for>
                        </select>
                    </td>
                </tr>
                <!-- <tr>
                    <th width="147">类型</th>
                    <td>
                        <input type="text" maxlength="145" class="input" name="type" value="{$data['type']}" >
                    </td>
                </tr> -->
                </table>
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
    $watermark_setting = 0;
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