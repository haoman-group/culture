<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">市级文化云内容列表</a></li>
            <li><a class="lib_add" href="{:U('add')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">ID</td>
                <td align="center">标题</td>
                <td align="center">浏览次数</td>
                <td align="center">作者</td>
                <td align="center">创建时间</td>
                <td align="center">更新时间</td>
                <td align="center">分类</td>
                <td align="center">上传人</td>
                <td align="center">来源</td>
            <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.title}</td>
                    <td align="center">{$vo.views}</td>
                    <td align="center">{$vo.author}</td>
                    <td align="center">{$vo.addtime|date="Y-m-d H:i:s",###}</td>
                    <td align="center">{$vo.updatetime|date="Y-m-d H:i:s",###}</td>
                    <td align="center" style="color:blue;">{$category_array[$vo['category']]}</td>
                    <td align="center">{$vo.operater}</td>
                    <td align="center">{$vo.source}</td>
            <td align="center"><a href="{:U('Admin/CityContent/edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('Admin/CityContent/delete', array('id'=>$vo['id']))}" class="J_ajax_del">[删除]</a></td>
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