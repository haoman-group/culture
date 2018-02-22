<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">培训辅导</a></li>
            <li><a class="lib_add" href="{:U('add')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">序号</td>
                <td align="center">主标题</td>
                <td align="center">培训/讲座</td>
                <td align="center">主办单位</td>
                <td align="center">活动地点</td>
                <td align="center">活动时间</td>
                <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.content_title}</td>
                    <td align="center">{$vo.categoryname}</td>
                    <td align="center">{$vo.host_unit}</td>
                    <td align="center">{$vo.act_address}</td>
                    <td align="center">{$vo.act_time}</td>
                    <td align="center"><a href="{:U('Admin/Active/edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('Admin/Active/delete', array('id'=>$vo['id']))}">[删除]</a></td>
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