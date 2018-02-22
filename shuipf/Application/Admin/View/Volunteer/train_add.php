<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap jj">
 <!--  <Admintemplate file="Common/Nav"/> -->
 <div class="nav">
    <ul class="cc">
        <li ><a href="{:U('train')}">培训</a></li>
        <li class="current"><a href="###">添加</a></li>
  </ul>
</div>
  <div class="common-form table_full">
    <form  class="J_ajaxForm" method="post"  action="{:U('train_add')}">
      <div class="table_list table_art">
        <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
          <tbody>
          <tr>
              <th width="147">标题:</th>
              <td>
                <input type="text"  name="title" class="input" value="{$data.title}" placeholder="请输入标题">
                </td>
            </tr>
            <tr>
              <th width="147">类型:</th>
              <td>
                <select name="type" id="">
                    <volist name="type_array" id="vo">
                        <option value="{$key}">{$vo}</option>
                    </volist>
                </select>
                </td>
            </tr>
            <tr>
                    <th width="147">图片：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('pic')" class="seller_upload_image">上传封面</a>
                                    <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="pic">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$picture_urls[$i] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="pic[]" value="{$data['pic'][$i]}">
                                            <img src="{$picture_urls[$i]}">
                                            <div class="operate">
                                                <span class="sl"></span>
                                                <span class="sr"></span>
                                                <a href="javascript:void(0)" class="tupian"></a>
                                            </div>
                                        </li>
                                        <else/>
                                        <li class="noimg"></li>
                                    </if>
                                </for>
                            </ul>
                        </td>
                    </tr>
            <tr>
              <th width="147">培训内容:</th>
              
              <td>
              <!--<script type="text/plain" id="publish_content" name="intro"></script>-->
              <?php //echo Form::editor('publish_content','basic','Cudatabase'); ?>
              <textarea name="content" rows="5" cols="57">{$data.content}</textarea>
              </td>
            </tr>
            <tr>
              <th width="147">培训须知:</th>
              <td><input type="text" class="input" name="notice" id="notice" value="{$data.notice}" placeholder=""></td>
            </tr>
            <tr>
              <th width="147">培训地址:</th>
              <td><input type="text" class="input" name="addr" id="addr" value="{$data.addr}"></td>
            </tr>
            <tr>
              <th width="147">培训时间:</th>
              <td><input type="text" class="input" name="time" value="{$data.time}"></td>
            </tr>
            <tr>
              <th width="147">联系方式:</th>
              <td><input type="text" class="input" name="contact" value="{$data.contact}"></td>
            </tr>
            <tr>
              <th width="147">需求人数:</th>
              <td><input type="number" class="input" name="totle" value="{$data.totle}">人</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="">
        <div class="btn_wrap_pd">
          <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</body>
<script>
<?php

    $alowexts = "jpg|jpeg|gif|bmp|png";
    $thumb_ext = ",";
    $watermark_setting = 0;
    $module = "Content";
    $catid = "0";
    $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id) {
        flashupload(id + '_images', '封面上传', id, submit_pic, '{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey}');
    }

    function submit_pic(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var in_content = d.$("#att-status").html().substring(1);
        var contents = in_content.split('|');
        if (contents == '') return true;
        $.each(contents, function (i, n) {
            var str = "<input type='hidden' name='" + returnid + "[]' value='" + n +
                "'><img src='" + n + "'><div class='operate'><span class='sl'></span>" +
                "<span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>";
            $('#' + returnid).find(".noimg:first").html(str);
            $('#' + returnid).find(".noimg:first").removeClass("noimg");
        });
    }

    /*封面移动*/
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
</html>