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
            <form class="J_ajaxForm" action="{:U('add')}" method="post"  >
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    
                <tr>
                    <th width="147">期刊名称</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="title" value="" >
                    </td>
                </tr>
                <tr>
                    <th width="147">简介</th>
                    <td>
                        <textarea name="intro"  maxlength="145" class="input_txt"></textarea><span><i>*</i>最多140个汉字</span>
                    </td>
                </tr>
                <tr>
                    <th width="147">出版日期</th>
                    <td>
                    <input type="date" class="input" name="publish_date" value="" >
                    </td>
                </tr>
                <tr>
                    <th width="147">期刊类目</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="category" value="" >
                    </td>
                </tr>
                <tr>
                    <th width="147">总页数</th>
                    <td>
                    <input type="number" class="input" max="10" name="pagecount" value="" ><span><i>*</i>最多10页</span>
                    </td>
                </tr>
                <tr>
                    <th width="147">期刊类型</th>
                    <td>
                        <select name="type" id="">
                        <volist name="type_array" id="vo">
                            <option value="{$key}">{$vo}</option>
                        </volist>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="147">状态</th>
                    <td>
                        <select name="status" id="">
                        <volist name="status_array" id="vo">
                            <option value="{$key}">{$vo}</option>
                        </volist>
                        </select>
                    </td>
                </tr>
                </table>
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">下一步</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>