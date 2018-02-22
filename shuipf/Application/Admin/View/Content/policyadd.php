<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head"/>
<style type="text/css">
    .table_full th {
        width: 147px;
    }

    /*.nav{background: #72A8CF;}
    .nav li a{line-height: 35px;}
    .nav li a:hover{border-bottom: none;}
    .nav li.current a{border-bottom: none;}
    .table_full th{width: 247px;text-align: right;padding-left: 10px;background: none;border-right: none;vertical-align: middle;}
    .table_list tr,.table_list th,.table_list td{background: none;padding: 0;}
    .table_list th,.table_list td{padding: 5px 0;}
    .table_list td{padding-left: 5px;}
    .table_list tr{border-bottom: 1px solid #f5f5f5;}
    textarea.input_txt{width: 620px;height: 28px;box-sizing: border-box;}
    select{width: 200px;}
    select.cid{margin-left: 10px;}
    select.LinkageSel{width: 176px;}
    select.LinkageSel:not(.select_area1){margin-left: 13px !important;}
    .explain{margin-bottom: 0;}
    .table_art td .img li.noimg{border: 1px solid #ccc;box-shadow: 2px 2px 2px #f0f0f0 inset;background-color: #fff;}
    .btn_wrap_pd{padding-left: 557px;}*/
</style>
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li><a href="{:U('policylists')}">政策法规</a></li>
            <li class="current"><a href="###">添加</a></li>
            <!--<li ><a value="手机扫描" class='  btn_add1' onclick="tel()"  />文本扫描</a></li>
            <li ><a value="手机扫描" class='  btn_add1'  onclick="tel()" />语音录入</a></li>
            <li ><a value="手机扫描" class='  btn_add' data-type="web"  />网络采集</a></li>-->
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            
            <form  action="{:U('policyadd')}" method="post"  >
                <input type="hidden" style="opacity: 0; width: 0px;" name="areaid" class="area" value="{$data.areaid}"/>
               
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                    <th>类别：</th>
                    <td>
                        
                            <select id="parentItems" name="parent_cid" >
                                <option value='0'>--请选择--</option>
                                <volist name="result" id="ca">
                                    <option value="{$ca['catid']}">{$ca['catname']}</option>
                                </volist>
                            </select>
                            
                             <select id="grandsonItems" name="cid"  style="display:none">
                               
                                <volist name="result['3']['grandson_list']" id="vo">
                                    <option value="{$vo['catid']}">{$vo['catname']}</option>
                                </volist>
                            </select>
                            
                       
                           
                        
                    </td>
                </tr>
                <tr name="selectshow" >
                    <th>所属地区：</th>
                    <td><select id="area1" class="select_area1"></select></td>
                </tr>
                    <tr>
                        <th>标题:</th>
                        <td>
                             <input type="text" class="input" name="title"  size="50" value="{$data.title}" />
                              <input type="hidden"  name="member_id" class="input" size="50" value="{$userInfo.id}"/> 
                            
                        </td>
                    </tr>

                    <tr>
                        <th>摘要：</th>

                        <td>

                            <textarea type="text" class="input_txt" name="abstract">{$data.abstract}</textarea>
                           
                        </td>
                    </tr>
                    <tr>
                        <th>内容：</th>
                        <td>
                            <script type="text/plain" id="publish_content" name="publish_content">{$data.publish_content}</script>
                                <?php echo Form::editor('publish_content','full','Cudatabase'); ?>
                        </td>
                    </tr>
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
                        <button type="submit">添加</button>
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
<script src="{$config_siteurl}statics/cu/js/Comm/Category.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/linkagesel-min.js"></script>
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

  //地区
  
  $(function(){
    var opts = {
        ajax: '/Api/Address/Area',
        selStyle: 'margin-left: 3px;',
        select: "#area1",
        loaderImg:'/statics/js/linkagesel/ui-anim_basic_16x16.gif',
       
    }
    var linkageSel = new LinkageSel(opts);
    
    linkageSel.onChange(function() {
      
        var selected = linkageSel.getSelectedValue();
        //console.log(selected);
         $(".area").val(selected.toString());
        var addr = "<?php echo  $data['default_area_level'] ?>";
        //   $(".LinkageSel").eq(0).val()!=='' ? $(".LinkageSel").eq(0).attr("disabled",true) : '';
         if($(".LinkageSel").eq(1).val() !==''){
          if(($(".LinkageSel").eq(1).val())%addr==0){
             $(".LinkageSel").eq(1).attr("disabled",true);
          }else{
              $(".LinkageSel").eq(1).attr("disabled",false);
          }
          };
           if($(".LinkageSel").eq(2).val() !==''){
          if(($(".LinkageSel").eq(2).val())%addr==0){
             $(".LinkageSel").eq(2).attr("disabled",true);
          }else{
              $(".LinkageSel").eq(2).attr("disabled",false);
          }
      };
         
        $(".LinkageSel").next("span") ? $(".LinkageSel").next("span").remove() : '';
        // console.log($(".LinkageSel:hidden").next("span"));
        // $(".LinkageSel").eq(0) ? $(".LinkageSel").eq(0).after("<span>省</span>") : '';
        // $(".LinkageSel").eq(1) ? $(".LinkageSel").eq(1).after("<span>市</span>") : '';
        // $(".LinkageSel").eq(2) ? $(".LinkageSel").eq(2).after("<span>县(区)</span>") : '';
        
        $(".LinkageSel").on("change",function(){
            $(".LinkageSel:hidden").next("span").remove();
        });
    });


});  
$("#parentItems").change(function(){
    //console.log(123);
    if($("#parentItems").val() == 27){
       $("#grandsonItems").show();
    }else{
         $("#grandsonItems").hide();
    }
});
</script>
</html>