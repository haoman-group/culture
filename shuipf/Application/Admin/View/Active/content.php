<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap jj">
 <!--  <Admintemplate file="Common/Nav"/> -->
 <div class="nav">
    <ul class="cc">
        <li ><a href="{:U('exlist')}">活动管理</a></li>
        <li class="current"><a href="###">修改</a></li>
  </ul>
</div>
  <div class="common-form table_full">
    <form class="J_ajaxForm" method="post"  action="{:U('content')}">
      <div class="table_list table_art">
        <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
          <tbody>
           
            <tr>
              <th width="147">活动标题:</th>
              <td>
                <input type="text"  name="content_title" class="input" value="{$data.content_title}" placeholder="请输入标题" required>
                <input type="hidden" name="parent_id" value="{$parent_id}">
                </td>
            </tr>
            <tr>
                    <th width="147">图片：</th>
                        <td>
                            <ul class="explain">
                                <li>文件上传:</li>
                                <li>
                                    <a href="javascript:upfile('image')" class="seller_upload_image">上传封面</a>
                                    <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                    <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                </li>
                            </ul>
                            <ul class="img jsaddimgul" id="image">
                                <for start="0" end="$maxPicNum">
                                    <if condition="$data['image'] neq ''">
                                        <li class=''>
                                            <input type="hidden" name="image" value="{$data.image}">
                                            <img src="{$data['image']}">
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
              <th width="147">简介:</th>
              
              <td>
              <!--<script type="text/plain" id="publish_content" name="intro"></script>-->
              <?php //echo Form::editor('publish_content','basic','Cudatabase'); ?>
              <textarea name="abstract" rows="5" cols="57">{$data.abstract}</textarea>
              </td>
            </tr>
            <tr>
              <th width="147">时间:</th>
              <td><input type="text" class="input" name="act_time" id="controller" value="{$data.act_time}" placeholder="" required="required"/></td>
            </tr>
            <tr>
              <th width="147">地点:</th>
              <td><input type="text" class="input" name="act_address" id="action" value="{$data.act_address}" required="required"></td>
            </tr>
            <tr>
              <th width="147">总人数上线:</th>
              <td><input type="number" class="input" name="acceptance" value="{$data.acceptance}"></td>
            </tr>
            <tr>
              <th width="147">联系人:</th>
              <td><input type="text" class="input" name="contacts" value="{$data.contacts}">
              
              </td>
              
            </tr>
            <tr>
              <th width="147">联系方式:</th>
              <td><input type="text" class="input" name="contacts_tel" value="{$data.contacts_tel}" required="required"></td>
            </tr>
            <tr>
              <th width="147">是否开启预约：</th>
              <td>
                  <input type="radio" class="if_bespeak" name="if_bespeak"  value="1" <eq name="data.if_bespeak" value="1">checked</eq> >是
                  <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" <eq name="data.if_bespeak" value="2">checked</eq>>否
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="">
        <div class="btn_wrap_pd">
          <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
        </div>
      </div>
     
    </form>
  </div>
  
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
            var str = "<input type='hidden' name='" + returnid + "' value='" + n +
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
    $("#active_type").change(function(){
        var cid = $(this).val();
        if(cid == '228'){
            $("#term_type select").prop("disabled", false);
            $("#term_type").show();
        }else{
            $("#term_type select").prop("disabled", true);
            $("#term_type").hide();
        }
    })

    
</script>
</html>