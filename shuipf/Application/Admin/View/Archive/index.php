<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">艺术档案</a></li>
            <li><a class="lib_add" href="{:U('add')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center">序号</td>
                <td align="center">档案标题</td>
                <td align="center">简介</td>
                <td align="center">档案类型</td>
                <td align="center">首页推荐</td>
                <td align="center">更新时间</td>
                <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.title}</td>
                    <td align="center">{$vo.intro}</td>
                    <td align="center">{$category[$vo[category]]}</td>
                    <td align="center"><?php echo $vo['if_position']=='1'?'推荐':'否';?></td>
                    <td align="center">{$vo.updatetime|date="Y-m-d H:i:s",###}</td>
                    <td align="center"><a href="{:U('Admin/Archive/edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('Admin/Archive/delete', array('id'=>$vo['id']))}">[删除]</a></td>
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