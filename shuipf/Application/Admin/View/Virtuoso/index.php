<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">艺术品购买列表</a></li>
            <li><a class="lib_add" href="{:U('add')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">ID</td>
                <td align="center">标题</td>
                <td align="center">简介</td>
                <td align="center">价格</td>
                <td align="center">作者</td>
                <td align="center">库存</td>
                <td align="center">时间</td>
                <td align="center">状态</td>
            <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.title}</td>
                    <td align="center">{$vo.intro}</td>
                    <td align="center">{$vo.price}</td>
                    <td align="center">{$vo.author}</td>
                    <td align="center">{$vo.stock}</td>
                    <td align="center">{$vo.updatetime|date="Y-m-d H:i:s",###}</td>
                    <td align="center">{$vo.status}</td>
                    <td align="center">
                        <a href="{:U('Admin/Virtuoso/edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;
                        <a href="{:U('Admin/Virtuoso/delete', array('id'=>$vo['id']))}" class="J_ajax_del">[删除]</a>
                    </td>
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