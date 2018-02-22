<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">电子期刊列表</a></li>
            <li><a class="lib_add" href="{:U('add')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">id</td>
                <td align="center">期刊名称</td>
                <td align="center">简介</td>
                <td align="center">出版日期</td>
                <td align="center">期刊类目</td>
                <!-- <td align="center">内容</td> -->
                <td align="center">总页数</td>
                 <td align="center">期刊类型</td> 
                <td align="center">点击量</td>
                <td align="center">状态</td>
                <td align="center">时间</td>
            <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.title}</td>
                    <td align="center">{$vo.intro}</td>
                    <td align="center">{$vo.publish_date}</td>
                    <td align="center">{$vo.category}</td>
                    <td align="center">{$vo.pagecount}</td>
                    <td align="center">{$type_array[$vo[type]]}</td>
                    <td align="center">{$vo.hits}</td>
                    <td align="center">{$status_array[$vo[status]]}</td>
                    <td align="center">{$vo.update_time|date="Y-m-d H:i:s",###}</td>
            <td align="center"><a href="{:U('Admin/Ejournals/edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('Admin/Ejournals/delete', array('id'=>$vo['id']))}" class="J_ajax_del">[删除]</a></td>
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