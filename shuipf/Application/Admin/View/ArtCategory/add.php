<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />
<style>
    .jsaddimgul .operate span{display: none;}
</style>
<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav" />
        <div class="h_a">添加</div>

        <form action="{:U('ArtCategory/add')}" method="post">
            <div class="table_full table_art">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">类目CID：</th>
                            <td>
                                <input type="text" class="input" name="cid" id="cid" size="20" value={$cid|default=0} readyonly="readonly"></input>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">父类目CID：</th>
                            <td>
                                <input type="text" class="input" name="parent_cid" id="parent_cid" size="20" value="{$parent_id|default=0}" readonly="readonly"></input>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">名称：</th>
                            <td>
                                <input type="text" class="input" name="name" size="20" value=""></input>
                            </td>
                        </tr>

                        <tr>
                            <th width="147">简介：</th>
                            <td>
                                <textarea type="text" class="input_txt" name="description"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">图片：</th>
                            <td>
                                <ul class="explain">
                                    <li>文件上传:</li>
                                    <li>
                                        <a href="javascript:upfile('category_picture')" class="seller_upload_image">上传图片</a>
                                        <p class="tips">提示：1、图片上传大小不得超过4M</p>
                                        <p class="tips">2、本类目下您最多可以上传1张图片</p>
                                    </li>
                                </ul>
                                <ul class="img jsaddimgul" id="category_picture">
                                    <li class="noimg"></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">状态：</th>
                            <td>
                                <input type="text" class="input" name="status" id="status" size="20" value="0">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">是否有子菜单：</th>
                            <td>
                                <select name="is_parent">
                                        <option value="0" <if condition=" $vo['is_parent'] eq '0' "> selected</if> >否</option>
                                        <option value="1" <if condition=" $vo['is_parent'] eq '1' "> selected</if> >是</option>
                                </select>
                                <span>(*是否开发添加子菜单管理功能)</span>
                            </td>
                        </tr>
                         <tr>
                            <th width="147">是否关联：</th>
                            <td>
                                <select name="relation">
                                        <option value="0" <if condition=" $vo['relation'] eq '0' "> selected</if> >否</option>
                                        <option value="1" <if condition=" $vo['relation'] eq '1' "> selected</if> >是</option>
                                </select>
                                <span>(*是否关联Form表单)</span>
                            </td>
                            
                        </tr>
                        <tr>
                            <th width="147">是否为底层类目：</th>
                            <td>
                                <select name="is_leaf">
                                    <option value="0" <if condition=" $vo['is_leaf'] eq '0' "> selected</if> >否</option>
                                    <option value="1" <if condition=" $vo['is_leaf'] eq '1' "> selected</if> >是</option>
                                </select>
                                <span>(*是否分类层级的最后一层)</span>
                            </td>
                        </tr>
                </table>
            </div>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
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
            var str = "<input type='hidden' name='picture' value='" + n +
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