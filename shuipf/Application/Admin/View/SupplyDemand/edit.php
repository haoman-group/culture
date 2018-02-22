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
            <form class="J_ajaxForm" action="{:U('edit')}" method="post"  >
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    
                <tr>
                    <th width="147">分类</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="category" value="{$data.category}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">子分类</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="sub_category" value="{$data.sub_category}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">个人/公司</th>
                    <td>
                    <input type="text" class="input" name="type" value="{$data.type}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">地区ID</th>
                    <td>
                    <input type="number" class="input" name="area_id" value="{$data.area_id}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">公司或者个人名称</th>
                    <td>
                        <input type="text" maxlength="145" class="input" name="name" value="{$data.name}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">上传人</th>
                    <td>
                        <input type="text" maxlength="45" class="input" name="author" value="{$data.author}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">说明</th>
                    <td>
                        <input type="text" maxlength="1045" class="input" name="intro" value="{$data.intro}" >
                    </td>
                </tr>
                <tr>
                    <th width="147">status</th>
                    <td>
                    <input type="text" class="input" name="status" value="{$data.status}" >
                    </td>
                </tr>
                </table>
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">更新</button>
                    </div>
                </div>
                <input type="hidden" name="id" value="{$data.id}">
            </form>
        </div>
    </div>
</div>
</body>
</html>