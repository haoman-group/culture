<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head" />
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('Admin/Archive/index')}">艺术档案列表</a></li>
            
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            <form class="J_ajaxForm" action="{:U('edit')}" method="post"  >
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                
                    <tr  name="selectshow">
                        <th width="147">所属地区：</th>
                         
                      <td><input type="text" name="areaname" value="{$areaname}" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <th width="147">档案标题：</th>
                        <td>
                        <input type="text" class="input" name="title" value="{$data.title}">
                         <input type="hidden" class="input" name="id" value="{$data.id}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">档案简介：</th>
                        <td>
                            <textarea type="text" class="input_txt" name="intro">{$data.intro}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">档案分类：</th>
                        <td>
                            <select name="category" id="">
                                <volist name="category" id="vo">
                                    <option value="{$key}" <if condition="$data['category']  eq $key">selected</if>>{$vo}</option>
                                </volist>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">视频：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upvideo('drama_video')" class="seller_upload_image">上传视频</a>
                                    <p class="tips">本类目下您最多可以上传1部视频</p>
                                </li>
                            </ul>
                            <ul id="drama_video">
                                <for start="0" end="1">
                                    <if condition="$data['video'] neq ''">
                                        <li><input type="text" class="input" name="video" size="20" value="{$data.video}" hidden /></li>
                                        <li><input type="text" class="input input-video" name="content_json" size="60" value="{$data.content_json}" readonly="readonly" /><span>审核中...</span></li>
                                    </if>
                                </for>
                            </ul>
                        </td>
                    </tr>     
                    <tr>
                        <th>图片：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('images')"
                                       class="seller_upload_image">上传图片</a>
                                    <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="images">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$data[images][$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="handwriting_picture_url[]"
                                                   value="{$data[images][$i]}">
                                            <img src="{$data[images][$i]}">
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
                    <tr>
                        <th>是否推荐至首页：</th>
                        <td>
                            <input type="checkbox" name="if_position" value="1" <eq name="data['if_position']" value="1">checked</eq>>是
                        </td>
                    </tr>   
                </table>
                <!-- </div> -->
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">更新</button>
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
            var str = "<input type='hidden' name='"+returnid+"[]' value='" + n +
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