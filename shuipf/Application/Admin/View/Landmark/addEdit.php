<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />
<style>
    .jsaddimgul .operate span{display: none;}
</style>
<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('index')}"><if condition="$data['id'] eq ''">文化地标->添加<else/>文化地标->修改</if></a></li>
            
        </ul>
    </div>
        

        <form action="{:U('Landmark/addEdit')}" method="post" class="J_ajaxForm" >
            <div class="table_full table_art">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">标题：</th>
                            <td>
                                <input type="text" class="input" name="title" id="cid" size="20" value="{$data.title}" ></input>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">封面图片：</th>
                            <td>
                                <ul class="explain">
                                    <li>文件上传:</li>
                                    <li>
                                        <a href="javascript:upfile('cover')" class="seller_upload_image">上传图片</a>
                                        <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                        <p class="tips">2、本类目下您最多可以上传1张图片</p>
                                    </li>
                                </ul>
                                <ul class="img jsaddimgul" id="cover">
                                    <if condition="$data['cover'] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="cover" value="{$data.cover}">
                                            <img src="{$data.cover}">
                                            <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                                        </li>
                                    <else/>
                                        <li class="noimg"></li>
                                    </if>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">简介：</th>
                            <td>
                                <textarea type="text" class="input_txt" name="introduction">{$data.introduction}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <th width="147">正文：</th>
                             <td><script type="text/plain" id="content" name="content">{$data.content}</script>
                                <?php echo Form::editor('content','basic','Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            
                        </tr>
                </table>
            </div>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
                    <input type="hidden" name="id" value="{$data.id}"/>
                </div>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript">
    <?php
    $alowexts = "jpg|jpeg|gif|bmp|png|mp3";
    $thumb_ext = ",";
    $watermark_setting = 0;
    $module = "Content";
    $catid = "0";
    $authkey = upload_key("1,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id){
        flashupload(id+'_images', '图片上传',id,submit_pic,'1,{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
    }

    function submit_pic(uploadid,returnid){
        var d = uploadid.iframe.contentWindow;
        var in_content = d.$("#att-status").html().substring(1);
        var contents = in_content.split('|');
        if (contents == '') return true;
        $.each(contents, function (i, n) {
            var str = "<input type='hidden' name='cover' value='" + n +
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
</script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</html>