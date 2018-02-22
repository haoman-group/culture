<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head" />
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('Admin/Article/articlelists')}">文章管理->文章添加</a></li>
            
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr name="selectshow" style="display:none">
                    <th width="147">所属地区：</th>                             
                    <td ><select id="area"  class="select_area1" ></select></td>
                </tr>
            </table>
            <form class="J_ajaxForm" action="{:U('add')}" method="post"  >
    
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">标题：</th>
                        <td>
                        <input type="text" class="input" name="subtitle" value="{$data.subtitle}">
                        </td>
                    </tr>
                    <tr>
                     <th width="147">主讲人：</th>
                    <td>
                    <input type="hidden" name="parent_id" value="{$_GET['parent_id']}">
                    <input type="text" class="input" name="lecturer" size="20" value="{$data.lecturer}">
                    </td>
                    </tr>
                    <tr>
                     <th width="147">开始时间：</th>
                    <td>
                    <input type="text" class="input" name="start_time" size="20" value="{$data.start_time}">
                    </td>
                    </tr>
                     <tr>
                    <td>详情:</td>
                    <td><script type="text/plain" id="publish_content" name="publish_content"></script>
                   <?php echo Form::editor('publish_content','basic','Cudatabase'); ?>
                   </td>
                   </tr>
                    <tr>
                        <th width="147">视频：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upvideo('drama_video')" class="seller_upload_image">上传视频</a>
                                    <p class="tips">本类目下您最多可以上传{$maxVideoNum}部视频</p>
                                </li>
                            </ul>
                            <ul id="drama_video">
                                <for start="0" end="$maxVideoNum">
                                    <if condition="$video_ids[$i] neq ''">
                                        <li><input type="text" class="input" name="drama_video[]" size="20" value="{$video_ids[$i]}" hidden /></li>
                                        <li><input type="text" class="input input-video" name="drama_video_title[]" size="60" value="{$video_titles[$i]}" readonly="readonly" /><span>审核中...</span></li>
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
    $watermark_setting = 0;
    $module = "Content";
    $catid = "0";
    $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id){
        flashupload(id+'_images', '图片上传',id,submit_pic,'{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
    }

    function submit_pic(uploadid,returnid){
        var d = uploadid.iframe.contentWindow;
        var in_content = d.$("#att-status").html().substring(1);
        var contents = in_content.split('|');
        if (contents == '') return true;
        $.each(contents, function (i, n) {
            var str = "<input type='hidden' name='"+returnid+"_url[]' value='" + n +
                "'><img src='"+n+"'><div class='operate'><span class='sl'></span>" +
                "<span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>";
            $('#' + returnid).find(".noimg:first").html(str);
            $('#' + returnid).find(".noimg:first").removeClass("noimg");
        });
    }

    /*图片移动*/
    $(".jsaddimgul").on("click","li span",function(){
        var $ul1=$(this).parent().parent();
        if($(this).hasClass("sl")){
            var $ul2=$(this).parent().parent().prev("li");
        }
        else {
            var $ul2=$(this).parent().parent().next("li");
        }
        var ulhtml1=$ul1.html();
        var ulhtml2=$ul2.html();
        $ul1.html(ulhtml2);
        $ul2.html(ulhtml1);
        if($ul2.hasClass("noimg")){
            $ul2.removeClass("noimg");
            $ul1.addClass("noimg");
        }
    })
    $(".jsaddimgul").on("click","li a",function(){
        var $li=$(this).parent().parent();
        $li.addClass("noimg");
        $li.empty();
    })
    <?php
    $authkey_video = upload_key("$maxVideoNum,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upvideo(id) {
        videoupload(id+'_upload', '视频上传',id,submit_video, '{$maxVideoNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey_video}')
    }

    function submit_video(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var video_id = d.$("#video-id").html();
        var video_title = d.$("#video-title").html();
        // console.log(video_id);
        video_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="'+video_id+'" hidden /></li>';
        video_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="'+video_title+'" readonly="readonly" /><span>审核中...</span></li>';
        //只能上传一个视频,如果需要改变上传限制,所有视频的show页面都必须进行修改
        $('#' + returnid).html(video_html);

    }


</script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
<script>

</script>
</html>