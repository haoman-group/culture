<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head" />
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('Admin/Virtuoso/index')}">艺术品购买列表</a></li>
            
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            <form class="J_ajaxForm" action="{:U('edit')}" method="post"  >
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    
                <tr>
                    <th width="147">标题</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="title" value="{$data.title}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">简介</th>
                    <td>
                        <textarea type="text" class="input_txt" name="intro" >{$data.intro}</textarea>
                    </td>
                </tr>
                <th>图片：</th>
                <td>
                    <ul class="explain">
                        <li>文件上传:</li>
                        <li>
                            <a href="javascript:upfile('images')" class="seller_upload_image">上传图片</a>
                            <p class="tips" style="color:red;">提示：1、图片上传大小不得超过4M</p>
                            <p class="tips" style="color:red;">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
                            <p class="tips" style="color:red;">3、第一张图片将作为封面展示</p>
                        </li>
                    </ul>
                    <ul class="img jsaddimgul" id="images">
                        <for start="0" end="$maxPicNum">
                            <if condition="$images[$i] neq ''">
                                <li class=''>
                                    <input type="hidden" name="images[]" value="{$images[$i]}">
                                    <img src="{$images[$i]}">
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
                    <th width="147">价格</th>
                    <td>
                    <input type="number" class="input" name="price" value="{$data.price}" required="required">
                    </td>
                </tr>
                <tr>
                    <th width="147">作者</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="author" value="{$data.author}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">详情</th>
                    <td>
                        <script type="text/plain" id="content" name="content">{$data.content}</script>
                        <?php echo Form::editor('content','full','Cudatabase'); ?> 
                    </td>
                </tr>
                <tr>
                    <th width="147">库存</th>
                    <td>
                    <input type="number" class="input" name="stock" value="{$data.stock}" required="required">
                    </td>
                </tr>
                <!-- <tr>
                    <th width="147">属性</th>
                    <td>
                        <textarea type="text" class="input_txt" name="property" >{$data.property}</textarea>
                    </td>
                </tr> -->
                <tr>
                    <th width="147">状态</th>
                    <td>
                        <select name="status" id="">
                            <option value="normal"  <if condition="$data['status'] eq 'normal'">selected</if>>正常</option>
                            <option value="offline" <if condition="$data['status'] eq 'offline'">selected</if>>下线</option>
                        </select>
                    </td>
                </tr>
                </table>
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">更新</button>
                    </div>
                </div>
                <input type="hidden" name="id" value="{$data.id}">
            </form>
        </div>
    </div>
</div>
<script>
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
</script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</body>
</html>