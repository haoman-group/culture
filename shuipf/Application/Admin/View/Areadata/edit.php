<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />
<style>
    /* .jsaddimgul .operate span{display: none;} */
</style>
<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
         <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('index')}" >地区个性化设置</a></li>
           
            <!--<li ><a value="手机扫描" class='  btn_add1' onclick="tel()"  />文本扫描</a></li>
            <li ><a value="手机扫描" class='  btn_add1'  onclick="tel()" />语音录入</a></li>
            <li ><a value="手机扫描" class='  btn_add' data-type="web"  />网络采集</a></li>-->
        </ul>
    </div>
        <div class="h_a">{$area.name}地区内容</div>
        <form action="{:U('edit')}" method="post">
            <div class="table_full table_art">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr >
                            <th style="width:10%;">子域名</th>
                            <td>
                                <?php if (\Admin\Service\User::getInstance()->isAdministrator()) {?>
                                    <input type="text" class="input" name="sub_domain" value="<?=$data['sub_domain']?>" >
                                <?php }else{?>
                                    <label for=""><a target="_blank" href="http://<?=$data['sub_domain']?>.sx-cc.com">http://<?=$data['sub_domain']?>.sx-cc.com</a></label>
                                <?php }?>
                            </td>
                        </tr>
                        <tr>
                            <th>首页展示模块</th>
                            <td>
                                <volist name="modules_list" id="ml">
                                    <input type="checkbox" name="modules['{$key}']" value="{$key}" <?=in_array($key,$data['modules'])?"checked":""?>>
                                    <label>{$ml}</label>
                                    <br>
                                </volist>
                            </td>
                        </tr>
                        <tr >
                        <th style="width:10%;">轮播设置</th>
                        <td>
                            <a class="btn btn_success" href="{:U('Carousel/show',['area'=>$data['area_id']])}">轮播图片设置</a><br><br>
                            <input type="radio" <if condition="$data['slide_style'] eq 'style-default'">checked="checked"</if>name="slide_style" value="style-default" id="default"><label for="style-default">默认样式</label><br>
                            <input type="radio" <if condition="$data['slide_style'] eq 'style-standard'">checked="checked"</if>name="slide_style" value="style-standard" id="standard"><label for="standard">样式1--标准轮播</label><br>
                            <input type="radio" <if condition="$data['slide_style'] eq 'style-effect-cube'">checked="checked"</if>name="slide_style" value="style-effect-cube" id="cube"><label for="cube">样式2--方块切换</label><br>
                            <input type="radio" <if condition="$data['slide_style'] eq 'style-centered-auto'">checked="checked"</if>name="slide_style" value="style-centered-auto" id="centered"><label for="centered">样式3--全屏居中自动贴合</label><br>
                            <input type="radio" <if condition="$data['slide_style'] eq 'style-effect-coverflow'">checked="checked"</if>name="slide_style" value="style-effect-coverflow" id="coverflow"><label for="coverflow">样式4--全屏3D覆盖流效果</label><br>
                            <br>
                            <a class="btn btn_error" target="_blank" href="{:U('admin/Carousel/preview',['area'=>$data['area_id']])}">轮播样式演示</a>
                        </td>
                        </tr>
                </table>
            </div>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                </div>
            </div>
           
            <input type="hidden" name="area_id" value="{$data['area_id']}">
        </form>
    </div>
</body>
<script type="text/javascript">
        <?php
        $alowexts = "jpg|jpeg|gif|bmp|png";
        $thumb_ext = ",";
        $watermark_setting = 0;
        $module = "Content";
        $catid = "0";
        $authkey = upload_key($maxSlidePic.",$alowexts,1,$thumb_ext,$watermark_setting");
        $authkey2 = upload_key("5,$alowexts,1,$thumb_ext,$watermark_setting");
        ?>
        function upfile(id){
            
            flashupload(id+'_images', '图片上传',id,submit_pic,'{$maxSlidePic},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
        }
        function upfile2(id){
            
            flashupload(id+'_images', '图片上传',id,submit_pic,'5,{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey2}');
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
</script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</html>