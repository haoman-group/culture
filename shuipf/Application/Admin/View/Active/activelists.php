<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="">群文活动</a></li>
            <li><a class="lib_add" href="{:U('activeadd')}">添加</a></li>
        </ul>
    </div>
    <div class="table_list">

        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x"
                                                     data-checklist="J_check_x"></td>
                <td align="center">序号</td>
                <td align="center">主标题</td>
                <td align="center">类目</td>
                <td align="center">培训地点</td>
                <td align="center">活动时间</td>
                <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x"
                                                         data-checklist="J_check_x"></td>
                    <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.content_title}</td>
                    <td align="center">{$vo.categoryname}</td>
                    <td align="center">{$vo.training_addr}</td>
                    <td align="center">{$vo.act_time}</td>
                    <td align="center"><a href="{:U('Admin/Active/activeedit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U('Admin/Active/activedelete', array('id'=>$vo['id']))}">[删除]</a></td>
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