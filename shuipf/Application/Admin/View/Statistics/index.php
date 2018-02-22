<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<style type="text/css">
    .table_list tr,.table_list th,.table_list td{padding: 0;}
    .table_list th,.table_list td{padding: 3px 10px;}
    .table_list td{padding-left: 5px;}
    select.cid{margin-left: 10px;}
</style>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
   <div class="nav">
    <ul class="cc">
        <li class="current"><a class="" href="">资源统计</a></li>
       
  </ul>
</div>
    <div class="table_list">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">按资源分类统计：</th>
                    <td>
                        <div id="category" style="display:inline-block;">
                            <select id="parentItems" name="art_cid" onchange="getChildListAndSetValue(this)">
                                <option value='0'>--请选择--</option>
                                <volist name="result" id="ca">
                                    <option value="{$ca['cid']}">{$ca['name']}</option>
                                </volist>
                            </select>
                            <div id="childItems" style="display:inline-block;"></div>
                        </div>
                    </td>
                </tr>
                <tr name="selectshow">
                    <th width="147">按区域统计： </th>
                    <td>
                        <select id="area" class="select_area"></select>
                    </td>
                </tr>

            </table>
            <form class="J_ajaxForm searcho" action="{:U('index')}" method="get" onsubmit="return false;">
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Statistics">
                <input type="hidden" name="a" value="index">
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="search" value="1">
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">按资源格式统计：</th>
                        <td>
                            <select name="file_type" class="file_type" value="{$Think.get.file_type}">
                                <option value="all">全部</option>
                                <option value="video">视频</option>
                                <option value="audio">音频</option>
                                <option value="picture">图片</option>
                                <option value="text">文本</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">发布时间：</th>
                        <td>
                            <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
                            -
                            <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn" type="submit">统计</button>
                    <a style="margin-left:4px;" href="{:U('index')}" class="btn">清除条件</a>
                </div>
            </form>


             <form class="J_ajaxForm searcht" action="{:U('index')}" method="get" onsubmit="return false;" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Statistics">
                <input type="hidden" name="a" value="index">
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="search" value="1">
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">按资源格式统计：</th>
                        <td>
                            <select name="file_type" class="file_type" value="{$Think.get.file_type}">
                                <option value="all">全部</option>
                                <option value="video">视频</option>
                                <option value="audio">音频</option>
                                <option value="picture">图片</option>
                                <option value="text">文本</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">发布时间：</th>
                        <td>
                            <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
                            -
                            <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">加入企业注册时间：</th>
                        <td>
                            <input type="text" name="join_date_start" class="input length_2 J_date" value="{$Think.get.join_date_start}" style="width:80px;">
                            -
                            <input type="text" name="join_date_end" class="input length_2 J_date" value="{$Think.get.join_date_end}" style="width:80px;">
                            
                        </td>
                    </tr>
                     <tr>
                        <th width="147">人数：</th>
                        <td>
                            <input type="number" name="person_num_min" class="input length_2 " value="{$Think.get.person_num_min}" style="width:80px;">
                            -
                            <input type="number" name="person_num_max" class="input length_2 " value="{$Think.get.person_num_max}" style="width:80px;">(人)
                            
                        </td>
                    </tr>
                    <tr>
                        <th width="147">规模：</th>
                        <td>
                            <select name="scale">
                                   <option value="">请选择</option>
                                   <option value="大型">大型</option>
                                   <option value="大型">中型</option>
                                   <option value="大型">小型</option>
                                   <option value="大型">微小型</option>
                                   </select>
                            
                        </td>
                    </tr>
                    <tr>
                        <th width="147">年产值（统计）：</th>
                        <td>
                            <input type="text" name="output_value_min" class="input length_2 " value="{$Think.get.output_value_min}" style="width:80px;">
                            -
                            <input type="text" name="output_value_max" class="input length_2 " value="{$Think.get.output_value_max}" style="width:80px;">(万)
                            
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn" type="submit">统计</button>
                    <a style="margin-left:4px;" href="{:U('index')}" class="btn">清除条件</a>
                </div>
            </form>
        </div>
    </div>

    <div class="table_list" id="lists">
        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="left">资源类别</td>
                <td align="left">所属区域</td>
                <td align="left">资源文件</td>
                <td align="left">上传时间</td>
                <td align="left">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo" key="i">
                <volist name="vo" id="v" key="j">
                    <if condition="$v.total_count gt 0">
                        <tr>
                            <td style="text-align:center">{$v.cate_name}<em style="color:red;">({$v.total_count})</em></td>
                            <td style="text-align:center">{$v.area_name}<em style="color:red;">({$v.area_count})</em></td>
                            <td style="text-align:center">{$v.name}<em style="color:red;">({$v.count})</em></td>
                            <td style="text-align:center">{$v.min_date|substr=0,10}~{$v.max_date|substr=0,10}<em style="color:red;">({$v.date_count})</em></td>
                            <td style="text-align:center">
                                <a>查看</a>
                            </td>
                        </tr>
                    </if>
                </volist>
            </volist>
            </tbody>
        </table>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>

<script>
    $(function(){
        $("form").find("div button").on("click", function(){
            var _this = $(this).parents("form");
            $.ajax({
                type: "get",
                url: "{:U('Admin/StatisticsController/index')}",
                dataType: 'json',
                data: _this.serialize(),
                success: function (result) {
                    if (result.status == 1) {
                        var list_html = '';
                        for (var v in result.data) {
                            for (var w in result.data[v]) {
                                if (result.data[v][w] && result.data[v][w].total_count > 0) {
                                    list_html += '<tr>' +
                                        '<td style="text-align:center">' + result.data[v][w].cate_name + '<em style="color:red;">(' + result.data[v][w].total_count + ')</em></td>' +
                                        '<td style="text-align:center">' + result.data[v][w].area_name + '<em style="color:red;">(' + result.data[v][w].area_count + ')</em></td>' +
                                        '<td style="text-align:center">' + result.data[v][w].name + '<em style="color:red;">(' + result.data[v][w].count + ')</em></td>';
                                    if (result.data[v][w].min_date && result.data[v][w].max_date) {
                                        list_html += '<td style="text-align:center">' + result.data[v][w].min_date.split(" ")[0] + '~' + result.data[v][w].max_date.split(" ")[0] + '<em style="color:red;">(' + result.data[v][w].date_count + ')</em></td>';
                                    } else {
                                        list_html += '<td style="text-align:center"><em style="color:red;">(0)</em></td>';
                                    }
                                    if (result.data[v][w].url_link && "" != result.data[v][w].url_link) {
                                        list_html += '<td style="text-align:center"><a style="cursor:pointer;" href="'+result.data[v][w].url_link+'">[查看]</a></td>';
                                    } else {
                                        list_html += '<td style="text-align:center"><a style="color:#D0D0D0" disabled="true" href="javascript:void(0)">[查看]</a></td>';
                                    }
                                    list_html += '</tr>';
                                }
                            }
                        }
                        $("div.table_list#lists table tbody").html(list_html);
                    }
                }
            });
        });
    });

    $("#parentItems").change(function(){
        if($("#parentItems").val()== 4){
            $(".searcht").show();
            $(".searcho").hide();
            
        }else{
              $(".searcht").hide();
            $(".searcho").show();
        }
    });
</script>
</body>

</html>
