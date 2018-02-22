<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="{:U('index')}">文化地标</a></li>
            <li><a class="lib_add" href="{:U('addEdit')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <!--<td align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>-->
                <td align="center">序号</td>
                <td align="center">标题名称</td>
                <td align="center">简介</td>
                <td align="center">添加时间</td>
                <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="pageinfo.data" id="vo">
                <tr>
                    <!--<td align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>-->
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.title}</td>
                    <td align="center" style="max-width: 400px;">{$vo.introduction}</td>
                    <td align="center">{$vo.addtime}</td>
                    <td align="center"><a href="{:U('addEdit', array('id'=>$vo['id']) )}">[修改]</a>&nbsp;|&nbsp;<a href="{:U('delete', array('id'=>$vo['id']) )}">[删除]</a></td>
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