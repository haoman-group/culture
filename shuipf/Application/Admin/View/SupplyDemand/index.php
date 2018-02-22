<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">供需资源列表</a></li>
            <li><a class="lib_add" href="{:U('add')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">id</td>
                <td align="center">分类</td>
                <td align="center">子分类</td>
                <td align="center">个人/公司</td>
                <td align="center">地区ID</td>
                <td align="center">公司或者个人名称</td>
                <td align="center">上传人</td>
                <td align="center">说明</td>
                <td align="center">status</td>
                <td align="center">addtime</td>
                <td align="center">updatetime</td>
            <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.category}</td>
                    <td align="center">{$vo.sub_category}</td>
                    <td align="center">{$vo.type}</td>
                    <td align="center">{$vo.area_id}</td>
                    <td align="center">{$vo.name}</td>
                    <td align="center">{$vo.author}</td>
                    <td align="center">{$vo.intro}</td>
                    <td align="center">{$vo.status}</td>
                    <td align="center">{$vo.addtime|date="Y-m-d H:i:s",###}</td>
                    <td align="center">{$vo.updatetime}</td>
            <td align="center"><a href="{:U('Admin/SupplyDemand/edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('Admin/SupplyDemand/delete', array('id'=>$vo['id']))}" class="J_ajaxDel">[删除]</a></td>
                </tr>
            </volist>
            </tbody>
        </table>
        <div class="p10">
            <div class="pages"> {$pageinfo.page}</div>
        </div>
    </div>
</div>
</body>
</html>