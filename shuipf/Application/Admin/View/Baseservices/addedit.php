<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<style>
    .jsaddimgul .operate span {
        display: none;
    }
</style>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('index')}"><if condition="$data['id'] eq ''">基本服务项目->添加<else/>基本服务项目->修改</if></a></li>
            
        </ul>
    </div>
    <!-- <div class="h_a">添加</div> -->

    <form action="{:U('Baseservices/addedit')}" method="post" class="J_ajaxForm">
        <div class="table_full table_art">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">标题：</th>
                    <td colspan="3">
                        <input type="text" class="input" name="project_title" id="cid" size="20"
                               value="{$data.project_title}" required></input>
                    </td>
                </tr>
                <tr>
                    <th width="147">项目类型：</th>
                    <td colspan="3">
                        <select name="type">
                            <foreach name="type" item='ty'>
                                <option value="{$ty}">{$ty}</option>
                            </foreach>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="147">所在地区：</th>
                    <td colspan="3"><select id="area" class="select_area1"></select></td>
                </tr>
                <tr>
                    <th width="147">封面图片：</th>
                    <td colspan="3">
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
                                    <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                            href="javascript:void(0)" class="tupian"></a></div>
                                </li>
                                <else/>
                                <li class="noimg"></li>
                            </if>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th width="147">开馆时间：</th>
                    <td colspan="3">
                        <input type="text" name="business_hours" value="{$data.business_hours}" class="input ">
                        <!-- <textarea type="text" class="input_txt" name="business_hours">{$data.business_hours}</textarea> -->
                    </td>
                </tr>
                <tr>
                    <th width="147">闭馆时间：</th>
                    <td colspan="3">
                        <input type="text" name="closing_hours" value="{$data.closing_hours}" class="input ">
                        <!-- <textarea type="text" class="input_txt" name="closing_hours">{$data.closing_hours}</textarea> -->
                    </td>
                </tr>
                <tr>
                    <th width="147" rowspan='<?php echo count($data['Content']) + 2 ?>'>内容：</th>
                    <td>目录标题</td>
                    <td>内容</td>
                    <td>操作</td>
                </tr>
                <volist name="data['Content']" id="vo">
                    <tr>
                        <td>{$vo.content_title}</td>
                        <td><a class="btn_preview" data-idcontent="{$vo.id_content}" href="###">预览</a></td>
                        <td><a class="btn_add" data-idproject="{$data.id}" data-idcontent='{$vo.id_content}' href="###">[修改]</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="{:U('Admin/Baseservices/content_del',array('id_content'=>$vo['id_content']))}">[删除]</a>
                        </td>
                    </tr>
                </volist>
                <tr>
                    <td><a class="btn_add btn" data-idproject="{$data.id}" data-idcontent=''>新增内容</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>

                </tr>
            </table>
        </div>
        <div class="">
            <div class="btn_wrap_pd">
                <a class="btn mr10 J_ajax_submit_btn" href="{:U('index')}">返回</a>
                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                <input type="hidden" name="id" value="{$data.id}"/>
                <input type="hidden" name="area" value="{$data.area}" class="area"/>
            </div>
        </div>
    </form>
</div>
</body>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<script type="text/javascript">
    <?php
    $alowexts = "jpg|jpeg|gif|bmp|png|mp3";
    $thumb_ext = ",";
    $watermark_setting = 0;
    $module = "Content";
    $catid = "0";
    $authkey = upload_key("1,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id) {
        flashupload(id + '_images', '图片上传', id, submit_pic, '1,{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey}');
    }

    function submit_pic(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var in_content = d.$("#att-status").html().substring(1);
        var contents = in_content.split('|');
        if (contents == '') return true;
        $.each(contents, function (i, n) {
            var str = "<input type='hidden' name='cover' value='" + n +
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


    //layer iframe 层
    $('.btn_add').on('click', function () {
        var id_content = $(this).data('idcontent');
        var id_project = $(this).data('idproject');
        if (id_project == '' || id_project == 'null' || id_project == 'undefined') {
            layer.msg('请先填写项目基本信息!');
            return false;
        }
        var index = layer.open({
            type: 2,
            title: '添加',
            shadeClose: true,
            shade: 0.8,
            area: ['80%', '80%'],
            content: '/Admin/Baseservices/content?id_content=' + id_content + '&id_project=' + id_project
        });
    });

    //layer iframe 层
    $('.btn_preview').on('click', function () {
        var id_content = $(this).data('idcontent');
        if (id_content == '' || id_content == 'null' || id_content == 'undefined') {
            layer.msg('错误的ID!');
            return false;
        }
        var index = layer.open({
            type: 2,
            title: '内容预览',
            shadeClose: true,
            shade: 0.8,
            area: ['80%', '80%'],
            content: '/Admin/Baseservices/preview?id_content=' + id_content
        });
    });
</script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</html>