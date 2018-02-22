<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">招募</a></li>
            <li><a class="lib_add" href="{:U('recruit_add')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">序号</td>
                <td align="center">标题</td>
                <td align="center">服务地点</td>
                <td align="center">服务时间</td>
                <td align="center">需求人数</td>
                <td align="center">简介</td>
                <td align="center">招募条件</td>
                <td align="center">联系方式</td>
                <td align="center">发布时间</td>
                <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.title}</td>
                    <td align="center">{$vo.addr}</td>
                    <td align="center">{$vo.time}</td>
                    <td align="center">{$vo.totle}</td>
                    <td align="center">{$vo.intro}</td>
                    <td align="center">{$vo.condition}</td>
                    <td align="center">{$vo.contact}</td>
                    <td align="center">{$vo.update_time|date="Y-m-d H:i:s",###}</td>
                    <td align="center"><a href="{:U('recruit_edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('recruit_delete', array('id'=>$vo['id']))}">[删除]</a></td>
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