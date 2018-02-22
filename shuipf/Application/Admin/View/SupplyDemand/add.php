<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('Admin/SupplyDemand/index')}">供需资源列表</a></li>
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            <form class="J_ajaxForm" action="{:U('add')}" method="post"  >
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    
                <tr>
                    <th width="147">分类</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="category" value="" >
                    </td>
                </tr>
                <tr>
                    <th width="147">子分类</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="sub_category" value="" >
                    </td>
                </tr>
                <tr>
                    <th width="147">个人/公司</th>
                    <td>
                    <input type="text" class="input" name="type" value="" >
                    </td>
                </tr>
                <tr>
                    <th width="147">地区ID</th>
                    <td>
                    <input type="number" class="input" name="area_id" value="" >
                    </td>
                </tr>
                <tr>
                    <th width="147">公司或者个人名称</th>
                    <td>
                        <input type="text" maxlength="145" class="input" name="name" value="" >
                    </td>
                </tr>
                <tr>
                    <th width="147">上传人</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="author" value="" >
                    </td>
                </tr>
                <tr>
                    <th width="147">说明</th>
                    <td>
                        <input type="text" maxlength="1045" class="input" name="intro" value="" >
                    </td>
                </tr>
                <tr>
                    <th width="147">status</th>
                    <td>
                    <input type="text" class="input" name="status" value="" >
                    </td>
                </tr>
                </table>
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>