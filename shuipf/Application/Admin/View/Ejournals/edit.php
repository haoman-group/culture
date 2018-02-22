<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head" />
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('Admin/Ejournals/index')}">电子期刊列表</a></li>
            
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            <form class="J_ajaxForm" action="{:U('edit')}" method="post"  >
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    
                <tr>
                    <th width="147">期刊名称</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="title" value="{$data.title}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">简介</th>
                    <td>
                        <textarea name="intro"  maxlength="145" class="input_txt">{$data.intro}</textarea><span><i>*</i>最多140个汉字</span>
                    </td>
                </tr>
                <tr>
                    <th width="147">出版日期</th>
                    <td>
                    <input type="number" class="input" name="publish_date" value="{$data.publish_date}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">期刊类目</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="category" value="{$data.category}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">总页数</th>
                    <td>
                    <input type="number" class="input" name="pagecount" value="{$data.pagecount}" ><span><i>*</i>如果选择图片上传，最多10页</span>
                    </td>
                </tr>
                <tr>
                    <th width="147">期刊类型</th>
                    <td>
                        <select name="type" id="">
                        <volist name="type_array" id="vo">
                            <option value="{$key}" <if condition="$data['type'] eq $key">selected</if>>{$vo}</option>
                        </volist>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="147">状态</th>
                    <td>
                        <select name="status" id="">
                        <volist name="status_array" id="vo">
                            <option value="{$key}" <if condition="$data['status'] eq $key">selected</if>>{$vo}</option>
                        </volist>
                        </select>
                    </td>
                </tr>
                <if condition="$data['type'] eq 'image'">
                <for start="0" end="$data['pagecount']">
                <?php $page = $i;?>
                    <tr>
                        <th width="147">第{$page}页内容</th>
                        <td>
                            <ul class="explain">
                                    <li>图片内容上传:</li>
                                    <li>
                                        <a href="javascript:upfile('category_picture_{$page}')" class="seller_upload_image">上传图片</a>
                                        <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                        <p class="tips">2、本类目下您最多可以上传1张图片</p>
                                    </li>
                                </ul>
                                <ul class="img jsaddimgul" id="category_picture_{$page}">
                                    <if condition="$data['content'][$page] neq ''">
                                        <li class=''>
                                        <input type="hidden" name="content[]" value="{$data['content'][$page]}">
                                        <img src="{$data['content'][$page]}">
                                        <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                                        </li>
                                    <else/>
                                        <li class="noimg"></li>
                                    </if>
                            </ul>
                        </td>
                    </tr>
                </for>
                <elseif condition="$data['type'] eq 'text'"/>
<!--                    <for start="0" end="$data['pagecount']">-->
<!--                    --><?php //$page = $i+1;?>
<!--                        <tr>-->
<!--                            <th width="147">第{$page}页内容</th>-->
<!--                            <td>-->
<!--                                <textarea name="content[{$page}]"  maxlength="145" class="input_txt">{$data['content'][$page]}</textarea><span><i>*</i>最多140个汉字</span>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                    </for>-->
                    <tr>
                        <th>
                            上传pdf文档
                        </th>
                        <td>
                            <input type="button"  class="btn" id="buttonUpload"  value="上传并转化"/>
                             <ul class="img jsaddimgul" id="pdf-list">
                                <!-- <li class=''>
                                    <input type="hidden" name="pdf[]" value="">
                                    <img src="">
                                    <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                                </li> -->
                            </ul>
                        </td>
                    </tr>
                </if>

                </table>
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交更新</button>
                    </div>
                </div>
                <input type="hidden" name="id" value="{$data.id}">
            </form>
        </div>
    </div>
</div>
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
            var str = "<input type='hidden' name='content[]' value='" + n +
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
    });
    $(".jsaddimgul").on("click","li a",function(){
        var $li=$(this).parent().parent();
        $li.addClass("noimg");
        $li.empty();
    });

    $("#buttonUpload").click(function show(obj){
        layer.open({
            type:2,
            title:"上传pdf",
            area: ['500px','400px'],
            content:"{:U('convert')}",
            btn: ['确定', '取消'],
            yes: function(index,layero) {
                var body = layer.getChildFrame('body', index);  
                console.log($(body).find('#images_lists img').length);　
                $(body).find('#images_lists img').each(function(i){
                    $("#pdf-list").append('<li class=""><input type="hidden" name="content[]" value="'+this.src+'"><img src="'+this.src+'"><div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div></li>');
                });
                layer.close(index);
            },
            cancel: function() {

            }
        });
    });
</script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
<script src="{$config_siteurl}statics/cu/layer/layer.js" type="text/javascript"></script>
</body>
</html>