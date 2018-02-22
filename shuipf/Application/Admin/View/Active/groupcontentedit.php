<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">

            <form class="J_ajaxForm" action="{:U('groupcontentedit')}" method="post">

                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">活动地点：</th>
                        <td>
                            <input type="text" class="input" name="act_address" value="{$data.act_address}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">副标题：</th>
                        <td>
                            <input type="hidden" class="input" name="parent_id" value="{$data.parent_id}">
                            <input type="hidden" class="input" name="id" value="{$data.id}">
                            <input type="text" class="input" name="subtitle" value="{$data.subtitle}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">活动时间：</th>
                        <td>
                            <input type="text" class="input J_date" name="act_time" size="20" value="{$data.act_time}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">讲座/培训-名称 ：</th>
                        <td>
                            <input type="text" class="input" name="training_title" size="20"
                                   value="{$data.training_title}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">开始时间：</th>
                        <td>
                            <input type="text" class="input J_date" name="start_time" size="20"
                                   value="{$data.start_time}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">结束时间：</th>
                        <td>
                            <input type="text" class="input J_date" name="end_time" size="20" value="{$data.end_time}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">培训地点：</th>
                        <td>
                            <input type="text" class="input" name="training_addr" size="20"
                                   value="{$data.training_addr}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">授课讲师：</th>
                        <td>
                            <input type="text" class="input" name="lecturer" size="20" value="{$data.lecturer}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">时长：</th>
                        <td>
                            <input type="text" class="input" name="duration" size="20" value="{$data.duration}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">参与方式：</th>
                        <td>
                            <input type="text" class="input" name="participation_mode" size="20"
                                   value="{$data.participation_mode}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">联系人：</th>
                        <td>
                            <input type="text" class="input" name="contacts" size="20" value="{$data.contacts}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">联系电话：</th>
                        <td>
                            <input type="text" class="input" name="contacts_tel" size="20" value="{$data.contacts_tel}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">容纳人数：</th>
                        <td>
                            <input type="text" class="input" name="acceptance" size="20" value="{$data.acceptance}">
                        </td>
                    </tr>

                     <tr>
                            <th width="147">详情：</th>
                            <td>
                                <script type="text/plain" id="publish_content2" name="publish_content">
                                    {$data.publish_content}
                                
                                </script>
                                <?php echo Form::editor('publish_content2', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>


                    <tr>
                            <th width="147">是否开启预约：</th>
                            <td>
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="1" <eq name="data.if_bespeak" value="1">checked</eq> >是
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" <eq name="data.if_bespeak" value="2">checked</eq>>否
                            </td>
                        </tr>

                </table>
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

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
    $authkey_audio = upload_key("$maxAudioNum,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upvideo(id) {
        videoupload(id + '_upload', '视频上传', id, submit_video, '{$maxVideoNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey_video}')
    }

    function upaudio(id) {
        audioupload(id + '_upload', '音频上传', id, submit_audio, '{$maxAudioNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey_audio}')
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
        // console.log(video_id);
        audio_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="' + audio_id + '" hidden /></li>';
        audio_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="' + audio_title + '" readonly="readonly" /><span>审核中...</span></li>';
        //只能上传一个视频,如果需要改变上传限制,所有视频的show页面都必须进行修改
        $('#' + returnid).html(audio_html);
    }


</script>
<Admintemplate file="Common/submit"/>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</body>
</html>